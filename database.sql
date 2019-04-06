CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb`;

-- -----------------------------------------------------
-- Table `mydb`.`modules`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`modules` (
	`id` INT NOT NULL AUTO_INCREMENT ,
	`title` VARCHAR(100) NULL ,
	`description` VARCHAR(255) NULL ,
	`created_at` timestamp NULL,
	`updated_at` timestamp NULL,
	`status` INT NULL,
	PRIMARY KEY (`id`)
)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`activities`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`activities` (
	`id` INT NOT NULL AUTO_INCREMENT ,
	`module_id` INT,
	`title` VARCHAR(100) NULL ,
	`description` VARCHAR(255) NULL ,
	`created_at` timestamp NULL,
	`updated_at` timestamp NULL,
	`status` INT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`module_id`) REFERENCES modules(`id`)
)
ENGINE = InnoDB;
