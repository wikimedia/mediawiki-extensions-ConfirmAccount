<?php
/**
 * Class containing updater functions for a ConfirmAccount environment
 */
class ConfirmAccountUpdaterHooks implements
	\MediaWiki\Installer\Hook\LoadExtensionSchemaUpdatesHook
{

	/**
	 * @param DatabaseUpdater $updater
	 * @return bool
	 */
	public function onLoadExtensionSchemaUpdates( $updater ) {
		$base = __DIR__;
		$type = $updater->getDB()->getType();
		if ( $type === 'mysql' || $type === 'sqlite' ) {
			$base = "$base/mysql";

			$updater->addExtensionTable( 'account_requests', "$base/ConfirmAccount.sql" );
			$updater->addExtensionField(
				'account_requests', 'acr_filename', "$base/patch-acr_filename.sql"
			);
			$updater->addExtensionTable( 'account_credentials', "$base/patch-account_credentials.sql" );
			$updater->addExtensionField( 'account_requests', 'acr_areas', "$base/patch-acr_areas.sql" );
			if ( $type !== 'sqlite' ) {
				$updater->modifyExtensionField(
					'account_requests', 'acr_email', "$base/patch-acr_email-varchar.sql"
				);
			}
			$updater->addExtensionIndex( 'account_requests', 'acr_email', "$base/patch-email-index.sql" );
			$updater->addExtensionField( 'account_requests', 'acr_agent', "$base/patch-acr_agent.sql" );
			$updater->dropExtensionIndex(
				'account_requests', 'acr_deleted_reg', "$base/patch-drop-acr_deleted_reg-index.sql"
			);
		} elseif ( $type === 'postgres' ) {
			$base = "$base/postgres";

			$updater->addExtensionUpdate(
				[ 'addTable', 'account_requests', "$base/ConfirmAccount.pg.sql", true ]
			);
			$updater->addExtensionUpdate(
				[ 'addPgField', 'account_requests', 'acr_held', "TIMESTAMPTZ" ]
			);
			$updater->addExtensionUpdate(
				[ 'addPgField', 'account_requests', 'acr_filename', "TEXT" ]
			);
			$updater->addExtensionUpdate(
				[ 'addPgField', 'account_requests', 'acr_storage_key', "TEXT" ]
			);
			$updater->addExtensionUpdate(
				[ 'addPgField', 'account_requests', 'acr_comment', "TEXT NOT NULL DEFAULT ''" ]
			);
			$updater->addExtensionUpdate(
				[ 'addPgField', 'account_requests', 'acr_type', "INTEGER NOT NULL DEFAULT 0" ]
			);
			$updater->addExtensionUpdate(
				[ 'addTable', 'account_credentials', "$base/patch-account_credentials.sql", true ]
			);
			$updater->addExtensionUpdate(
				[ 'addPgField', 'account_requests', 'acr_areas', "TEXT" ]
			);
			$updater->addExtensionUpdate(
				[ 'addPgField', 'account_credentials', 'acd_areas', "TEXT" ]
			);
			$updater->addExtensionUpdate(
				[ 'addIndex', 'account_requests', 'acr_email', "$base/patch-email-index.sql", true ]
			);
			$updater->addExtensionUpdate(
				[ 'addPgField', 'account_requests', 'acr_agent', "$base/patch-acr_agent.sql", true ]
			);
			$updater->addExtensionUpdate(
				[ 'dropFkey', 'account_requests', 'acr_user' ]
			);
			$updater->addExtensionUpdate(
				[ 'dropFkey', 'account_credentials', 'acd_user' ]
			);
		}
		return true;
	}
}
