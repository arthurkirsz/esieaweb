CREATE TABLE IF NOT EXISTS `sanity`.`companies` (
 `company_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing company_id of each company, unique index',
 `company_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'company''s name, unique',
 `company_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'company''s email, unique',
 `company_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'company''s activation status (payment related)',
 `company_account_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'company''s account type (basic, premium, etc)',
 `company_has_avatar` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if company has a local avatar, 0 if not (logo)',
 `company_creation_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of company''s account',
 PRIMARY KEY (`company_id`),
 UNIQUE KEY `company_name` (`company_name`),
 UNIQUE KEY `company_email` (`company_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='company data';
