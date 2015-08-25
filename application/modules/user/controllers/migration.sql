ALTER TABLE `zerocorp`.`customer` 
DROP COLUMN `password`,
DROP COLUMN `active_hash`,
DROP COLUMN `email_address`;

ALTER TABLE `zerocorp`.`users` 
CHANGE COLUMN `email` `email_address` VARCHAR(150) NOT NULL COMMENT '' ,
CHANGE COLUMN `hashed_password` `password` TEXT NOT NULL COMMENT '' ,
ADD COLUMN `active_hash` TEXT NULL COMMENT '' AFTER `status`;

ALTER TABLE `zerocorp`.`users` 
ADD COLUMN `active` INT NULL DEFAULT 0 COMMENT '' AFTER `active_hash`;

ALTER TABLE `zerocorp`.`customer` 
DROP COLUMN `active`;
