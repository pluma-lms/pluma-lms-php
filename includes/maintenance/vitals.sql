CREATE TABLE  `pluma_testing`.`vitals` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
`name` VARCHAR( 30 ) NOT NULL ,
`birth` VARCHAR( 16 ) NOT NULL ,
`gender` INT( 1 ) NOT NULL ,
`ethnicity` VARCHAR( 16 ) NOT NULL ,
`parent1` VARCHAR( 30 ) NOT NULL ,
`parent2` VARCHAR( 30 ) NOT NULL ,
`school_id` INT( 10 ) NOT NULL ,
`address` VARCHAR( 48 ) NOT NULL ,
`grade` INT( 2 ) NOT NULL ,
PRIMARY KEY (  `id` )
) ENGINE = INNODB;
