create table tx_classifieds_domain_model_add (
  hidden int(1) DEFAULT '1' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	bodytext TEXT,
	b64img LONGTEXT
);
