CREATE TABLE IF NOT EXISTS `#__documentary_video` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`created_by` INT(11)  NOT NULL ,
`created_date` DATETIME NOT NULL ,
`url` VARCHAR(255)  NOT NULL ,
`title` VARCHAR(255)  NOT NULL ,
`image` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

