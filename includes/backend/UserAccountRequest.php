<?php

use MediaWiki\MediaWikiServices;

class UserAccountRequest {
	/* Initially supplied fields */
	protected $id;
	protected $name;
	protected $realName;
	protected $email;
	protected $registration;
	protected $bio;
	protected $notes;
	protected $urls;
	protected $type;
	protected $areas;
	protected $fileName;
	protected $fileStorageKey;
	protected $ip;
	protected $xff;
	protected $agent;
	protected $emailToken;
	protected $emailTokenExpires;
	/* Fields set if user later confirms email */
	protected $emailAuthTimestamp;
	/* Fields used by the admins */
	protected $deleted;
	protected $rejectedTimestamp;
	protected $heldTimestamp;
	protected $user;
	protected $comment;

	private function __construct() {
	}

	/**
	 * @param stdClass $row
	 * @return UserAccountRequest
	 */
	public static function newFromRow( $row ) {
		$req = new self();

		$req->id = (int)$row->acr_id;
		$req->name = $row->acr_name;
		$req->realName = $row->acr_real_name;
		$req->email = $row->acr_email;
		$req->registration = wfTimestampOrNull( TS_MW, $row->acr_registration );
		$req->bio = $row->acr_bio;
		$req->notes = $row->acr_notes;
		$req->urls = $row->acr_urls;
		$req->type = (int)$row->acr_type;
		$req->areas = self::expandAreas( $row->acr_areas ?? '' );
		$req->fileName = strlen( $row->acr_filename ?? '' )
			? $row->acr_filename
			: null;
		$req->fileStorageKey = $row->acr_storage_key;
		$req->ip = $row->acr_ip;
		$req->xff = $row->acr_xff;
		$req->agent = $row->acr_agent;
		$req->emailToken = $row->acr_email_token; // MD5 of token
		$req->emailTokenExpires = wfTimestampOrNull( TS_MW, $row->acr_email_token_expires );
		$req->emailAuthTimestamp = wfTimestampOrNull( TS_MW, $row->acr_email_authenticated );
		$req->deleted = (bool)$row->acr_deleted;
		$req->rejectedTimestamp = wfTimestampOrNull( TS_MW, $row->acr_rejected );
		$req->heldTimestamp = wfTimestampOrNull( TS_MW, $row->acr_held );
		$req->user = (int)$row->acr_user;
		$req->comment = $row->acr_comment;

		return $req;
	}

	/**
	 * @param array $fields
	 * @return UserAccountRequest
	 */
	public static function newFromArray( array $fields ) {
		$req = new self();

		$req->id = isset( $fields['id'] )
			? (int)$fields['id']
			: null; // determined on insertOn()
		$req->name = $fields['name'];
		$req->realName = $fields['real_name'];
		$req->email = $fields['email'];
		$req->registration = wfTimestampOrNull( TS_MW, $fields['registration'] );
		$req->bio = $fields['bio'];
		$req->notes = $fields['notes'];
		$req->urls = $fields['urls'];
		$req->type = (int)$fields['type'];
		$req->areas = is_string( $fields['areas'] ?? '' )
			? self::expandAreas( $fields['areas'] ?? '' ) // DB format
			: $fields['areas']; // already expanded
		$req->fileName = strlen( $fields['filename'] ?? '' )
			? $fields['filename']
			: null;
		$req->fileStorageKey = $fields['storage_key'] ?? '';
		$req->ip = $fields['ip'] ?? '';
		$req->xff = $fields['xff'] ?? '';
		$req->agent = $fields['agent'] ?? '';
		$req->emailToken = $fields['email_token'] ?? ''; // MD5 of token
		$req->emailTokenExpires = wfTimestampOrNull( TS_MW, $fields['email_token_expires'] ?? '' );
		// These fields are typically left to default on insertion...
		$req->emailAuthTimestamp = wfTimestampOrNull( TS_MW, $fields['email_authenticated'] ?? null );
		$req->deleted = $fields['deleted'] ?? false;
		$req->rejectedTimestamp = wfTimestampOrNull( TS_MW, $fields['rejected'] ?? null );
		$req->heldTimestamp = wfTimestampOrNull( TS_MW, $fields['held'] ?? null );
		$req->user = (int)( $fields['user'] ?? 0 );
		$req->comment = $fields['comment'] ?? '';

		return $req;
	}

	/**
	 * @param int $id
	 * @param string|null $from 'dbmaster' to use primary DB
	 * @return UserAccountRequest|null
	 */
	public static function newFromId( $id, $from = null ) {
		$db = ( $from == 'dbmaster' )
			? MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_PRIMARY )
			: MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_REPLICA );
		$row = $db->selectRow( 'account_requests', '*', [ 'acr_id' => $id ], __METHOD__ );
		if ( !$row ) {
			return null;
		}
		return self::newFromRow( $row );
	}

	/**
	 * @param string $name
	 * @param string|null $from 'dbmaster' to use primary DB
	 * @return UserAccountRequest|null
	 */
	public static function newFromName( $name, $from = null ) {
		$db = ( $from == 'dbmaster' )
			? MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_PRIMARY )
			: MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_REPLICA );
		$row = $db->selectRow( 'account_requests', '*', [ 'acr_name' => $name ], __METHOD__ );
		if ( !$row ) {
			return null;
		}
		return self::newFromRow( $row );
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getRealName() {
		return $this->realName;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return string TS_MW timestamp
	 */
	public function getRegistration() {
		return $this->registration;
	}

	/**
	 * @return string
	 */
	public function getBio() {
		return $this->bio;
	}

	/**
	 * @return string
	 */
	public function getNotes() {
		return $this->notes;
	}

	/**
	 * @return array
	 */
	public function getUrls() {
		return $this->urls;
	}

	/**
	 * @param string $flat Use 'flat' to get a raw blob back
	 * @return array|string Flat blob or array from expanded blob
	 */
	public function getAreas( $flat = 'expanded' ) {
		if ( $flat == 'expanded' ) {
			return $this->areas;
		} elseif ( $flat == 'flat' ) {
			return self::flattenAreas( $this->areas );
		}
		throw new MWException( 'Invalid value for $flat parameter.' );
	}

	/**
	 * @return int
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @return string|null
	 */
	public function getFileName() {
		return $this->fileName;
	}

	/**
	 * @return string|null
	 */
	public function getFileStorageKey() {
		return $this->fileStorageKey;
	}

	/**
	 * @return string
	 */
	public function getIP() {
		return $this->ip;
	}

	/**
	 * @return string
	 */
	public function getXFF() {
		return $this->xff;
	}

	/**
	 * @return string
	 */
	public function getAgent() {
		return $this->agent;
	}

	/**
	 * @return string
	 */
	public function getEmailToken() {
		return $this->emailToken;
	}

	/**
	 * @return string TS_MW timestamp
	 */
	public function getEmailTokenExpires() {
		return $this->emailTokenExpires;
	}

	/**
	 * @return string|null TS_MW timestamp
	 */
	public function getEmailAuthTimestamp() {
		return $this->emailAuthTimestamp;
	}

	/**
	 * @return bool Request is deleted (either rejected or expired)
	 */
	public function isDeleted() {
		return $this->deleted;
	}

	/**
	 * @return string|null TS_MW timestamp
	 */
	public function getRejectTimestamp() {
		return $this->rejectedTimestamp;
	}

	/**
	 * @return string|null TS_MW timestamp
	 */
	public function getHeldTimestamp() {
		return $this->heldTimestamp;
	}

	/**
	 * @return int User ID
	 */
	public function getHandlingUser() {
		return $this->user;
	}

	/**
	 * @return string
	 */
	public function getHandlingComment() {
		return $this->comment;
	}

	/**
	 * Try to insert the request into the database
	 * @return int
	 */
	public function insertOn() {
		$dbw = MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_PRIMARY );
		$row = [
			'acr_name' 			=> strval( $this->name ),
			'acr_email' 		=> strval( $this->email ),
			'acr_real_name' 	=> strval( $this->realName ),
			'acr_registration' 	=> $dbw->timestamp( $this->registration ),
			'acr_bio' 			=> strval( $this->bio ),
			'acr_notes' 		=> strval( $this->notes ),
			'acr_urls' 			=> strval( $this->urls ),
			'acr_type' 			=> strval( $this->type ),
			'acr_areas' 		=> self::flattenAreas( $this->areas ),
			'acr_filename' 		=> isset( $this->fileName )
				? $this->fileName
				: null,
			'acr_storage_key'	=> isset( $this->fileStorageKey )
				? $this->fileStorageKey
				: null,
			'acr_comment' 		=> strval( $this->comment ),
			'acr_ip' 			=> strval( $this->ip ), // for spam blocking
			'acr_xff' 			=> strval( $this->xff ), // for spam blocking
			'acr_agent' 		=> strval( $this->agent ), // for spam blocking
			'acr_deleted' 		=> (int)$this->deleted,
			'acr_email_token' 	=> strval( $this->emailToken ), // MD5 of token
			'acr_email_token_expires' => $dbw->timestamp( $this->emailTokenExpires )
		];
		# Allow for some fields to be handled automatically...
		if ( $this->id ) {
			$row['acr_id'] = $this->id;
		}
		# Insert into pending requests...
		$dbw->insert( 'account_requests', $row, __METHOD__ );
		$this->id = $this->id ?: $dbw->insertId(); // set for accessors

		return $this->id;
	}

	/**
	 * Mark this request as rejected
	 * @param User $admin
	 * @param string $timestamp
	 * @param string $reason
	 * @return bool Success
	 */
	public function markRejected( User $admin, $timestamp, $reason = '' ) {
		$dbw = MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_PRIMARY );
		$dbw->update( 'account_requests',
			[
				'acr_rejected' => $dbw->timestamp( $timestamp ),
				'acr_user'     => $admin->getID(),
				'acr_comment'  => $reason,
				'acr_deleted'  => 1 ],
			[ 'acr_id' => $this->id, 'acr_deleted' => 0 ],
			__METHOD__
		);
		return ( $dbw->affectedRows() > 0 );
	}

	/**
	 * Mark this request as held
	 * @param User $admin
	 * @param string $timestamp
	 * @param string $reason
	 * @return bool Success
	 */
	public function markHeld( User $admin, $timestamp, $reason = '' ) {
		$dbw = MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_PRIMARY );
		$dbw->update( 'account_requests',
			[
				'acr_held'    => $dbw->timestamp( $timestamp ),
				'acr_user'    => $admin->getID(),
				'acr_comment' => $reason ],
			[ 'acr_id' => $this->id, 'acr_held IS NULL', 'acr_deleted' => 0 ],
			__METHOD__
		);
		return ( $dbw->affectedRows() > 0 );
	}

	/**
	 * @return bool
	 * @throws MWException
	 */
	public function remove() {
		if ( !$this->id ) {
			throw new MWException( "Account request ID is not set." );
		}
		$dbw = MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_PRIMARY );
		$dbw->delete( 'account_requests', [ 'acr_id' => $this->id ], __METHOD__ );

		return ( $dbw->affectedRows() > 0 );
	}

	/**
	 * Try to acquire a username in the request queue for insertion
	 * @param string $name
	 * @return bool
	 */
	public static function acquireUsername( $name ) {
		$dbw = MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_PRIMARY );
		$conds = [ 'acr_name' => $name ];
		if ( $dbw->selectField( 'account_requests', '1', $conds, __METHOD__ ) ) {
			return false; // already in use
		}
		return !$dbw->selectField( 'account_requests', '1',
			$conds, __METHOD__, [ 'FOR UPDATE' ] ); // acquire LOCK
	}

	/**
	 * Try to acquire an email address in the request queue for insertion
	 * @param string $email
	 * @return bool
	 */
	public static function acquireEmail( $email ) {
		$dbw = MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_PRIMARY );
		$conds = [ 'acr_email' => $email ];
		if ( $dbw->selectField( 'account_requests', '1', $conds, __METHOD__ ) ) {
			return false; // already in use
		}
		return !$dbw->selectField( 'account_requests', '1',
			$conds, __METHOD__, [ 'FOR UPDATE' ] ); // acquire LOCK
	}

	/**
	 * Flatten areas of interest array
	 * Used by ConfirmAccountsPage
	 * @param array $areas
	 * @todo just serialize()
	 * @return string
	 */
	protected static function flattenAreas( array $areas ) {
		$flatAreas = '';
		foreach ( $areas as $area ) {
			$flatAreas .= $area . "\n";
		}
		return $flatAreas;
	}

	/**
	 * Expand areas of interest to array
	 * Used by ConfirmAccountsPage
	 * @param string $areas
	 * @todo just unserialize()
	 * @return array
	 */
	public static function expandAreas( $areas ) {
		$list = explode( "\n", $areas );
		foreach ( $list as $n => $item ) {
			$list[$n] = trim( str_replace( ' ', '_', $item ) );
		}
		unset( $list[count( $list ) - 1] );
		return $list;
	}

	/**
	 * Get path relative to zone for an account request attachment file.
	 * This assures compatibility with the old FileStore sytem.
	 * @param string $key File storage key
	 * @return string
	 */
	public static function relPathFromKey( $key ) {
		return "{$key[0]}/{$key[0]}{$key[1]}/{$key[0]}{$key[1]}{$key[2]}/{$key}";
	}
}
