CREATE TABLE IF NOT EXISTS `sanity`.`exercices` (
 `exerice_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing exercice_id of each exercice, unique index',
 `company_id` int(11) NOT NULL COMMENT 'Foreign key company_id since exercice is company specific',
 `exercice_year` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'exercice''s current year',
 `exercice_trigger_date` bigint(20) DEFAULT NULL COMMENT 'timestamp of the exercice''s end/start date',
 PRIMARY KEY (`exercice_id`),
 FOREIGN KEY `company_id` REFERENCES `companies` (`company_id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='exercice data';
