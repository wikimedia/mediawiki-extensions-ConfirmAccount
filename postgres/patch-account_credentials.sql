-- (c) Aaron Schulz, 2007

BEGIN;

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
