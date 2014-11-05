CREATE TABLE IF NOT EXISTS `sanity`.`requests` (
 `request_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing request_id of each request, unique index',
 `exercice_id` int(11) NOT NULL COMMENT 'Foreign key company_id of each company',
 `request_creation_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of request''s account',
 `request_startdate_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of request''s account',
 `request_enddate_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of request''s account',
 `request_starthour_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of request''s account',
 `request_endhour_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of request''s account',
 `request_validation_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of request''s account',
 `request_cancelation_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of request''s account',
 `request_length` int(10) DEFAULT NULL COMMENT 'timestamp of the creation of request''s account',

 `request_type` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'request''s name, unique',
 `request_status` varchar(63) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'request''s password in salted and hashed format',
 `request_note` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'request''s email, unique',
 `request_credit` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'request''s activation status',

 PRIMARY KEY (`request_id`),
 FOREIGN KEY (`exercice_id`) REFERENCES exercices(`exercice_id`),
 #UNIQUE KEY `request_name` (`request_name`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='request data';
