-- (c) Aaron Schulz, 2007

-- Table structure for table `Confirm account`

BEGIN;

CREATE SEQUENCE account_requests_acr_id_seq;
CREATE TABLE account_requests (
  acr_id                   INTEGER  PRIMARY KEY NOT NULL DEFAULT nextval('account_requests_acr_id_seq'),
  acr_name                 TEXT      NOT NULL UNIQUE,
  acr_real_name            TEXT,
  acr_email                TEXT,
  acr_email_token          CHAR(32),
  acr_email_token_expires  TIMESTAMPTZ,
  acr_email_authenticated  TIMESTAMPTZ,
  acr_registration         TIMESTAMPTZ,
  acr_bio                  TEXT,
  acr_notes                TEXT,
  acr_urls                 TEXT,
  acr_ip                   CIDR,
  acr_filename             TEXT,
  acr_storage_key          TEXT,
  acr_type                 INTEGER,
  acr_deleted              BOOL      NOT NULL DEFAULT 'false',
  acr_rejected             TIMESTAMPTZ,
  acr_held                 TIMESTAMPTZ,
  acr_user                 INTEGER  REFERENCES mwuser(user_id) ON DELETE SET NULL,
  acr_comment              TEXT      NOT NULL default ''
);

CREATE INDEX acr_type_del_reg ON account_requests (acr_type,acr_deleted,acr_registration)
CREATE INDEX acr_email_token ON account_requests (acr_email_token);

CREATE SEQUENCE account_credentials_acd_id_seq;
CREATE TABLE account_credentials (
  acd_id                   INTEGER   UNIQUE KEY NOT NULL DEFAULT nextval('account_credentials_acd_id_seq'),
  acd_user_id              INTEGER,
  acd_real_name            TEXT,
  acd_email                TEXT,
  acd_email_authenticated  TIMESTAMPTZ,
  acd_registration         TIMESTAMPTZ,
  acd_bio                  TEXT,
  acd_notes                TEXT,
  acd_urls                 TEXT,
  acd_ip                   CIDR,
  acd_filename             TEXT,
  acd_storage_key          TEXT,
  acd_accepted             TIMESTAMPTZ,
  acd_user                 INTEGER   REFERENCES mwuser(user_id) ON DELETE SET NULL,
  acd_comment              TEXT       NOT NULL default '',
  PRIMARY KEY (acd_user_id,acd_id)
);

COMMIT;
