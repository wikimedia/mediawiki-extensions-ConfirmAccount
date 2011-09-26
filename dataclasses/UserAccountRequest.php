<?php
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

	private function __construct() {}

	public static function newFromRow( Object $row ) {
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
		$req->areas = self::expandAreas( $row->acr_areas );
		$req->fileName = $row->acr_filename;
		$req->fileStorageKey = $row->acr_storage_key;
		$req->ip = $row->acr_ip;
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
		$req->areas = is_string( $fields['areas'] )
			? self::expandAreas( $fields['areas'] ) // DB format
			: $fields['areas']; // already expanded
		$req->fileName = $fields['filename'];
		$req->fileStorageKey = $fields['storage_key'];
		$req->ip = $fields['ip'];
		$req->emailToken = $fields['email_token']; // MD5 of token
		$req->emailTokenExpires = wfTimestampOrNull( TS_MW, $fields['email_token_expires'] );
		// These fields are typically left to default on insertion...
		$req->emailAuthTimestamp = isset( $fields['email_authenticated'] )
			? wfTimestampOrNull( TS_MW, $fields['email_authenticated'] )
			: null;
		$req->deleted = isset( $fields['deleted'] )
			? $fields['deleted']
			: false;
		$req->rejectedTimestamp = isset( $fields['rejected'] )
			? wfTimestampOrNull( TS_MW, $fields['rejected'] )
			: null;
		$req->heldTimestamp = isset( $fields['held'] )
			? wfTimestampOrNull( TS_MW, $fields['held'] )
			: null;
		$req->user = isset( $fields['user'] )
			? (int)$fields['user']
			: 0;
		$req->comment = isset( $fields['comment'] )
			? $fields['comment']
			: '';

		return $req;
	}

	public function getId() {
		return	$this->id;
	}

	public function getName() {
		return	$this->name;
	}

	public function getRealName() {
		return	$this->realName;
	}

	public function getEmail() {
		return	$this->email;
	}

	public function getRegistration() {
		return	$this->registration;
	}

	public function getBio() {
		return	$this->bio;
	}

	public function getNotes() {
		return	$this->notes;
	}

	public function getUrls() {
		return	$this->urls;
	}

	public function getAreas() {
		return	$this->areas;
	}

	public function getFileName() {
		return	$this->fileName;
	}

	public function getFileStorageKey() {
		return	$this->fileStorageKey;
	}

	public function getIP() {
		return	$this->ip;
	}

	public function getEmailToken() {
		return	$this->emailToken;
	}

	public function getEmailTokenExpires() {
		return	$this->emailTokenExpires;
	}

	public function getEmailAuthTimestamp() {
		return	$this->emailAuthTimestamp;
	}

	public function isDeleted() {
		return	$this->deleted;
	}

	public function getRejectTimestamp() {
		return	$this->rejectedTimestamp;
	}

	public function getHeldTimestamp() {
		return	$this->heldTimestamp;
	}

	public function getHandlingUser() {
		return	$this->user;
	}

	public function getHandlingComment() {
		return	$this->comment;
	}

	public function insertOn() {
		$dbw = wfGetDB( DB_MASTER );
		# Allow for some fields to be handled automatically...
		$acr_id = is_null( $this->id )
			? $this->id
			: $dbw->nextSequenceValue( 'account_requests_acr_id_seq' );
		# Insert into pending requests...
		$dbw->insert( 'account_requests',
			array(
				'acr_id' 			=> $acr_id,
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
				'acr_ip' 			=> strval( $this->ip ), // possible use for spam blocking
				'acr_deleted' 		=> (int)$this->deleted,
				'acr_email_token' 	=> strval( $this->emailToken ), // MD5 of token
				'acr_email_token_expires' => $dbw->timestamp( $this->emailTokenExpires ),
			),
			__METHOD__
		);
		$this->id = $acr_id; // set for accessors

		return $this->id;
	}

	public function remove() {
		if ( !$this->id ) {
			throw new MWException( "Account request ID is not set." );
		}
		$dbw = wfGetDB( DB_MASTER );
		$dbw->delete( 'account_requests', array( 'acr_id' => $this->id ), __METHOD__ );

		return ( $dbw->affectedRows() > 0 );
	}

	/**
	 * Flatten areas of interest array
	 * Used by ConfirmAccountsPage
	 * @todo just serialize()
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
	 * @todo just unserialize()
	 */
	public static function expandAreas( $areas ) {
		$list = explode( "\n", $areas );
		foreach ( $list as $n => $item ) {
			$list[$n] = trim( "wpArea-" . str_replace( ' ', '_', $item ) );
		}
		unset( $list[count( $list ) - 1] );
		return $list;
	}
}
