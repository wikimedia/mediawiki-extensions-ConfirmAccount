<?php

namespace MediaWiki\Extension\ConfirmAccount\Hooks;

use ALItem;
use ALRow;
use ALTree;
use ErrorPageError;
use MediaWiki\Auth\AuthManager;
use MediaWiki\Context\RequestContext;
use MediaWiki\Extension\ConfirmAccount\ConfirmAccount;
use MediaWiki\Extension\ConfirmAccount\UserAccountRequest;
use MediaWiki\Hook\SkinTemplateNavigation__UniversalHook;
use MediaWiki\Output\Hook\BeforePageDisplayHook;
use MediaWiki\Output\OutputPage;
use MediaWiki\Skin\SkinComponentUtils;
use MediaWiki\SpecialPage\Hook\AuthChangeFormFieldsHook;
use Skin;
use SkinTemplate;

/**
 * Class containing hooked functions for a ConfirmAccount environment
 */
class UI implements
	BeforePageDisplayHook,
	SkinTemplateNavigation__UniversalHook,
	AuthChangeFormFieldsHook
{
	/**
	 * @param SkinTemplate $skin
	 * @param array &$links
	 */
	public function onSkinTemplateNavigation__Universal( $skin, &$links ): void {
		# Add a link to Special:RequestAccount if a link exists for login
		if ( isset( $links['user-menu']['login'] ) || isset( $links['user-menu']['login-private'] ) ) {
			$links['user-menu']['createaccount'] = [ // overwrite the normal createaccount
				'text' => $skin->msg( 'requestaccount-login' )->text(),
				'href' => SkinComponentUtils::makeSpecialUrl( 'RequestAccount' ),
				'active' => $skin->getTitle()->isSpecial( 'RequestAccount' ),
				'icon' => 'userAdd'
			];
		}
	}

	/**
	 * Add "x email-confirmed open account requests" notice
	 * @param OutputPage $out
	 * @param Skin $skin
	 */
	public function onBeforePageDisplay( $out, $skin ): void {
		global $wgConfirmAccountNotice;

		$context = $out->getContext();
		if ( !$wgConfirmAccountNotice || !$context->getUser()->isAllowed( 'confirmaccount' ) ) {
			return;
		}
		# Only show on some special pages
		$title = $context->getTitle();
		if ( !$title->isSpecial( 'Recentchanges' ) && !$title->isSpecial( 'Watchlist' ) ) {
			return;
		}
		$count = ConfirmAccount::getOpenEmailConfirmedCount( '*' );
		if ( $count > 0 ) {
			$out->prependHtml(
				'<div id="mw-confirmaccount-msg" class="plainlinks mw-confirmaccount-bar">' .
				$context->msg( 'confirmaccount-newrequests' )->numParams( $count )->parse() .
				'</div>'
			);

			$out->addModules( 'ext.confirmAccount' ); // CSS
		}
	}

	/**
	 * For AdminLinks extension
	 * @param ALTree &$admin_links_tree
	 * @return bool
	 */
	public function onAdminLinks( ALTree &$admin_links_tree ) {
		$users_section = $admin_links_tree->getSection( wfMessage( 'adminlinks_users' )->escaped() );
		$extensions_row = $users_section->getRow( 'extensions' );

		if ( $extensions_row === null ) {
			$extensions_row = new ALRow( 'extensions' );
			$users_section->addRow( $extensions_row );
		}

		$extensions_row->addItem( ALItem::newFromSpecialPage( 'ConfirmAccounts' ) );
		$extensions_row->addItem( ALItem::newFromSpecialPage( 'UserCredentials' ) );

		return true;
	}

	/**
	 * @param array $requests
	 * @param array $fieldInfo
	 * @param array &$formDescriptor
	 * @param string $action
	 * @return bool
	 * @throws ErrorPageError
	 */
	public function onAuthChangeFormFields(
		$requests, $fieldInfo, &$formDescriptor, $action
	) {
		if ( $action !== AuthManager::ACTION_CREATE ) {
			return true;
		}

		$request = RequestContext::getMain()->getRequest();
		$accReqId = $request->getInt( 'AccountRequestId' );
		$isAllowed = RequestContext::getMain()->getUser()->isAllowed( 'confirmaccount' );
		if ( $accReqId && $isAllowed ) {
			$accReq = UserAccountRequest::newFromId( $accReqId );
			if ( !$accReq ) {
				throw new ErrorPageError( 'createacct-error', 'confirmaccount-badid' );
			}
		} else {
			return true;
		}

		$formDescriptor['username']['default'] = $accReq->getName();

		$formDescriptor['mailpassword']['default'] = 1;
		$formDescriptor['mailpassword']['checked'] = true;
		$formDescriptor['mailpassword']['readonly'] = true;
		$formDescriptor['mailpassword']['validation-callback'] = static function ( $v ) {
			return ( $v === true )
				? true
				: wfMessage( 'confirmaccount-mismatched' );
		};

		unset( $formDescriptor['password'] );
		unset( $formDescriptor['retype'] );

		$formDescriptor['email']['default'] = $accReq->getEmail();
		$formDescriptor['email']['readonly'] = true;
		$formDescriptor['email']['validation-callback'] = static function ( $v ) use ( $accReq ) {
			return ( $v === $accReq->getEmail() )
				? true
				: wfMessage( 'confirmaccount-mismatched' );
		};

		$formDescriptor['realname']['default'] = $accReq->getRealName();
		$formDescriptor['realname']['readonly'] = true;
		$formDescriptor['realname']['validation-callback'] = static function ( $v ) use ( $accReq ) {
			return ( $v === $accReq->getRealName() )
				? true
				: wfMessage( 'confirmaccount-mismatched' );
		};

		$formDescriptor['accountrequestid'] = [
			'name' => 'AccountRequestId',
			'type' => 'hidden',
			'default' => $accReqId
		];

		return true;
	}
}
