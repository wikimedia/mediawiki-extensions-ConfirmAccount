-- (c) Aaron Schulz, 2007

ALTER TABLE /*$wgDBprefix*/account_requests
	ADD acr_xff VARCHAR(255) NULL default '',
	ADD acr_agent VARCHAR(255) NULL default '';

ALTER TABLE /*$wgDBprefix*/account_credentials
	ADD acd_xff VARCHAR(255) NULL default '',
	ADD acd_agent VARCHAR(255) NULL default '';
