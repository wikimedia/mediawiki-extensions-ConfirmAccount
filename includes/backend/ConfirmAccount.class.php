<?php

use MediaWiki\MediaWikiServices;
use MediaWiki\WikiMap\WikiMap;
use Wikimedia\Rdbms\FakeResultWrapper;

class ConfirmAccount {
	/**
	 * Move old stale requests to rejected list. Delete old rejected requests.
	 */
	public static function runAutoMaintenance() {
		global $wgRejectedAccountMaxAge, $wgConfirmAccountRejectAge, $wgConfirmAccountFSRepos;

		$dbw = MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_PRIMARY );
		$repo = self::getFileRepo( $wgConfirmAccountFSRepos['accountreqs'] );

		# Select all items older than time $encCutoff
		$encCutoff = $dbw->addQuotes( $dbw->timestamp( time() - $wgRejectedAccountMaxAge ) );
		$res = $dbw->select( 'account_requests',
			[ 'acr_id', 'acr_storage_key' ],
			[ "acr_rejected < {$encCutoff}" ],
			__METHOD__
		);

		# Clear out any associated attachments and delete those rows
		foreach ( $res as $row ) {
			$key = $row->acr_storage_key;
			if ( $key ) {
				$path = $repo->getZonePath( 'public' ) . '/' .
					UserAccountRequest::relPathFromKey( $key );
				if ( $path && file_exists( $path ) ) {
					unlink( $path );
				}
			}
			$dbw->delete( 'account_requests', [ 'acr_id' => $row->acr_id ], __METHOD__ );
		}

		# Select all items older than time $encCutoff
		$encCutoff = $dbw->addQuotes( $dbw->timestamp( time() - $wgConfirmAccountRejectAge ) );
		# Old stale accounts will count as rejected. If the request was held, give it more time.
		$dbw->update( 'account_requests',
			[ 'acr_rejected' => $dbw->timestamp(),
				'acr_user' => 0, // dummy
				'acr_comment' => wfMessage( 'confirmaccount-autorej' )->inContentLanguage()->text(),
				'acr_deleted' => 1 ],
			[ "acr_rejected IS NULL",
				"acr_registration < {$encCutoff}",
				"acr_held < {$encCutoff} OR acr_held IS NULL" ],
			__METHOD__
		);

		# Clear cache for notice of how many account requests there are
		self::clearAccountRequestCountCache();
	}

	/**
	 * Flag a user's email as confirmed in the db
	 *
	 * @param string $name
	 */
	public static function confirmEmail( $name ) {
		$dbw = MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_PRIMARY );
		$dbw->update( 'account_requests',
			[ 'acr_email_authenticated' => $dbw->timestamp() ],
			[ 'acr_name' => $name ],
			__METHOD__ );
		# Clear cache for notice of how many account requests there are
		self::clearAccountRequestCountCache();
	}

	/**
	 * Generate and store a new email confirmation token, and return
	 * the URL the user can use to confirm.
	 * @param string $token
	 * @return string
	 */
	public static function confirmationTokenUrl( $token ) {
		$title = SpecialPage::getTitleFor( 'RequestAccount' );
		return $title->getCanonicalURL( [
			'action' => 'confirmemail',
			'wpEmailToken' => $token
		] );
	}

	/**
	 * Generate, store, and return a new email confirmation code.
	 * A hash (unsalted since it's used as a key) is stored.
	 * @param User $user
	 * @param string &$expiration
	 * @return string
	 */
	public static function getConfirmationToken( $user, &$expiration ) {
		global $wgConfirmAccountRejectAge;

		$expires = time() + $wgConfirmAccountRejectAge;
		$expiration = wfTimestamp( TS_MW, $expires );
		$token = MWCryptRand::generateHex( 32 );
		return $token;
	}

	/**
	 * Generate a new email confirmation token and send a confirmation
	 * mail to the user's given address.
	 *
	 * @param User $user
	 * @param string $ip User IP address
	 * @param string $token
	 * @param string $expiration
	 * @return true|Status True on success, a Status object on failure.
	 */
	public static function sendConfirmationMail( User $user, $ip, $token, $expiration ) {
		$url = self::confirmationTokenUrl( $token );
		$lang = MediaWikiServices::getInstance()->getUserOptionsManager()
			->getOption( $user, 'language' );
		$contentLanguage = MediaWikiServices::getInstance()->getContentLanguage();
		return $user->sendMail(
			wfMessage( 'requestaccount-email-subj' )->inLanguage( $lang )->text(),
			wfMessage( 'requestaccount-email-body',
				$ip,
				$user->getName(),
				$url,
				$contentLanguage->timeanddate( $expiration, false ),
				$contentLanguage->date( $expiration, false ),
				$contentLanguage->time( $expiration, false )
			)->inLanguage( $lang )->text()
		);
	}

	/**
	 * Get request information from an email confirmation token
	 *
	 * @param string $code
	 * @return array
	 */
	public static function requestInfoFromEmailToken( $code ) {
		global $wgConfirmAdminEmailExtraFields;
		$dbr = MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_REPLICA );
		# Create updated array with acr_ prepended because of database names
		$acrAdminEmailFields = array_merge( array_map( static function ( $fieldName ) {
			return ( 'acr_' . $fieldName );
		}, $wgConfirmAdminEmailExtraFields ), [ 'acr_name', 'acr_email_authenticated' ] );
		# Get all specified user information from database
		$reqUserInfo = $dbr->selectRow( 'account_requests',
			$acrAdminEmailFields,
			[
				'acr_email_token' => md5( $code ),
				'acr_email_token_expires > ' . $dbr->addQuotes( $dbr->timestamp() ),
			] );
		# Split the essential array values and the possible body arguments
		$adminEmailBodyArguments = array_slice( (array)$reqUserInfo, 0, -2 );
		return [
			array_values( $adminEmailBodyArguments ),
			$reqUserInfo->acr_name,
			$reqUserInfo->acr_email_authenticated
		];
	}

	/**
	 * Get the number of account requests for a request type
	 * @param int $type
	 * @return array Assosiative array with 'open', 'held', 'type' keys mapping to integers
	 */
	public static function getOpenRequestCount( $type ) {
		$dbr = MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_REPLICA );
		$open = (int)$dbr->selectField( 'account_requests', 'COUNT(*)',
			[ 'acr_type' => $type, 'acr_deleted' => 0, 'acr_held IS NULL' ],
			__METHOD__
		);
		$held = (int)$dbr->selectField( 'account_requests', 'COUNT(*)',
			[ 'acr_type' => $type, 'acr_deleted' => 0, 'acr_held IS NOT NULL' ],
			__METHOD__
		);
		$rej = (int)$dbr->selectField( 'account_requests', 'COUNT(*)',
			[ 'acr_type' => $type, 'acr_deleted' => 1, 'acr_user != 0' ],
			__METHOD__
		);
		return [ 'open' => $open, 'held' => $held, 'rejected' => $rej ];
	}

	/**
	 * Get the number of open email-confirmed account requests for a request type
	 * @param int|string $type A request type or '*' for all
	 * @return int
	 */
	public static function getOpenEmailConfirmedCount( $type = '*' ) {
		# Check cached results
		$cache = MediaWikiServices::getInstance()->getMainWANObjectCache();
		$key = $cache->makeKey( 'confirmaccount', 'econfopencount', $type );
		$count = $cache->get( $key );
		# Only show message if there are any such requests
		if ( $count === false ) {
			$conds = [
				'acr_deleted' => 0, // not rejected
				'acr_held IS NULL', // nor held
				'acr_email_authenticated IS NOT NULL' ]; // email confirmed
			if ( $type !== '*' ) {
				$conds['acr_type'] = (int)$type;
			}
			$dbw = MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_PRIMARY );
			$count = (int)$dbw->selectField( 'account_requests', 'COUNT(*)', $conds, __METHOD__ );
			# Cache results (invalidated on change )
			$cache->set( $key, $count, 3600 * 24 * 7 );
		}
		return $count;
	}

	/**
	 * Clear account request cache
	 * @return void
	 */
	public static function clearAccountRequestCountCache() {
		global $wgAccountRequestTypes;

		$types = array_keys( $wgAccountRequestTypes );
		$types[] = '*'; // "all" types count
		$cache = MediaWikiServices::getInstance()->getMainWANObjectCache();
		foreach ( $types as $type ) {
			$key = $cache->makeKey( 'confirmaccount', 'econfopencount', $type );
			$cache->delete( $key );
		}
	}

	/**
	 * Verifies that it's ok to include the uploaded file
	 *
	 * @param string $tmpfile the full path of the temporary file to verify
	 * @param string $extension The filename extension that the file is to be served with
	 * @return Status object
	 */
	public static function verifyAttachment( $tmpfile, $extension ) {
		global $wgVerifyMimeType, $wgMimeTypeBlacklist;

		// magically determine mime type
		$magic = MediaWikiServices::getInstance()->getMimeAnalyzer();
		$mime = $magic->guessMimeType( $tmpfile, false );
		# check mime type, if desired
		if ( $wgVerifyMimeType ) {
			wfDebug( "\n\nmime: <$mime> extension: <$extension>\n\n" );
			# Check mime type against file extension
			if ( !UploadBase::verifyExtension( $mime, $extension ) ) {
				return Status::newFatal( 'filetype-mime-mismatch', $extension, $mime );
			}
			# Check mime type blacklist
			if ( isset( $wgMimeTypeBlacklist ) && $wgMimeTypeBlacklist !== null
				&& self::checkFileExtension( $mime, $wgMimeTypeBlacklist ) ) {
				return Status::newFatal( 'filetype-badmime', $mime );
			}
		}
		wfDebug( __METHOD__ . ": all clear; passing.\n" );
		return Status::newGood();
	}

	/**
	 * Perform case-insensitive match against a list of file extensions.
	 * Returns true if the extension is in the list.
	 *
	 * @param string $ext
	 * @param array $list
	 * @return bool
	 */
	protected static function checkFileExtension( $ext, $list ) {
		return in_array( strtolower( $ext ), $list );
	}

	/**
	 * Get the text to add to this users page for describing editing topics
	 * for each "area" a user can be in, as defined in MediaWiki:requestaccount-areas.
	 *
	 * @return array Associative mapping of the format:
	 *    (name => ('project' => x, 'userText' => y, 'grpUserText' => (request type => z)))
	 * Any of the ultimate values can be the empty string
	 */
	public static function getUserAreaConfig() {
		static $res; // process cache
		if ( $res !== null ) {
			return $res;
		}
		$res = [];
		// Message describing the areas a user can be interested in, the corresponding wiki page,
		// and any text that is automatically appended to the userpage on account acceptance.
		// Format is <name> | <wikipage> [| <text for all>] [| <text group0>] [| <text group1>] ...
		$msg = wfMessage( 'requestaccount-areas' )->inContentLanguage();
		if ( $msg->exists() ) {
			$areas = explode( "\n*", "\n" . $msg->text() );
			foreach ( $areas as $n => $area ) {
				$set = explode( "|", $area );
				if ( count( $set ) >= 2 ) {
					$name = trim( str_replace( '_', ' ', $set[0] ) );
					$res[$name] = [];

					$res[$name]['project'] = trim( $set[1] ); // name => WikiProject mapping
					if ( isset( $set[2] ) ) {
						$res[$name]['userText'] = trim( $set[2] ); // userpage text for all
					} else {
						$res[$name]['userText'] = '';
					}

					$res[$name]['grpUserText'] = []; // userpage text for certain request types
					$categories = array_slice( $set, 3 ); // keys start from 0 now in $categories
					foreach ( $categories as $i => $cat ) {
						$res[$name]['grpUserText'][$i] = trim( $cat ); // category for group $i
					}
				}
			}
		}
		return $res;
	}

	/**
	 * Get a block for this user if they are blocked from requesting accounts
	 * @param User $user
	 * @return Block|false
	 */
	public static function getAccountRequestBlock( User $user ) {
		global $wgAccountRequestWhileBlocked;

		$block = false;
		# If a user cannot make accounts, don't let them request them either
		if ( !$wgAccountRequestWhileBlocked ) {
			if ( method_exists( \MediaWiki\Block\BlockManager::class, 'getCreateAccountBlock' ) ) {
				// MW 1.42+
				$isExempt = $user->isAllowed( 'ipblock-exempt' );
				$block = MediaWikiServices::getInstance()->getBlockManager()
					->getCreateAccountBlock(
						$user,
						$isExempt ? null : $user->getRequest(),
						false
					) ?: false;
			} else {
				$block = $user->isBlockedFromCreateAccount();
			}
		}

		return $block;
	}

	/**
	 * @return UserArray
	 */
	public static function getAdminsToNotify() {
		$groups = MediaWikiServices::getInstance()->getGroupPermissionsLookup()
			->getGroupsWithPermission( 'confirmaccount-notify' );
		if ( !count( $groups ) ) {
			return UserArray::newFromResult( new FakeResultWrapper( [] ) );
		}

		$dbr = MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_REPLICA );

		return UserArray::newFromResult( $dbr->select(
			[ 'user' ],
			[ '*' ],
			[ 'EXISTS (' .
				$dbr->selectSqlText( 'user_groups', '1',
					[
						'ug_user = user_id',
						'ug_group' => $groups,
						'ug_expiry IS NULL OR ug_expiry >= ' . $dbr->addQuotes( $dbr->timestamp() )
					]
				) .
				')' ],
			__METHOD__,
			[ 'LIMIT' => 200 ] // sanity
		) );
	}

	/**
	 * @param array $info
	 * @return FileRepo
	 */
	public static function getFileRepo( $info ) {
		$repoName = $info['name'];
		$directory = $info['directory'];
		if ( method_exists( MediaWikiServices::class, 'getLockManagerGroupFactory' ) ) {
			// MediaWiki 1.34+
			$lockManagerGroup = MediaWikiServices::getInstance()->getLockManagerGroupFactory()
				->getLockManagerGroup( WikiMap::getCurrentWikiId() );
		} else {
			$lockManagerGroup = LockManagerGroup::singleton( WikiMap::getCurrentWikiId() );
		}
		$info['backend'] = new FSFileBackend( [
				'name' => $repoName . '-backend',
				'wikiId' => WikiMap::getCurrentWikiId(),
				'lockManager' => $lockManagerGroup->get( 'fsLockManager' ),
				'containerPaths' => [
					"{$repoName}-public" => "{$directory}",
					"{$repoName}-temp" => "{$directory}/temp",
					"{$repoName}-thumb" => "{$directory}/thumb",
				],
				'fileMode' => 0644,
				'tmpDirectory' => wfTempDir()
			]
		);
		return new FileRepo( $info );
	}
}
