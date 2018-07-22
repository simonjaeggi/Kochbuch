-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Database Kochbuch
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Database Kochbuch
-- -----------------------------------------------------
DROP database if exists Kochbuch;
CREATE Database `Kochbuch` DEFAULT CHARACTER SET utf8 ;
USE `Kochbuch` ;

-- -----------------------------------------------------
-- Table `Kochbuch`.`tbl_Rezept`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Kochbuch`.`tbl_Rezept` ;

CREATE TABLE IF NOT EXISTS `Kochbuch`.`tbl_Rezept` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Autor` VARCHAR(45) NULL,
  `Gericht` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Kochbuch`.`tbl_Zutat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Kochbuch`.`tbl_Zutat` ;

CREATE TABLE IF NOT EXISTS `Kochbuch`.`tbl_Zutat` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `Typ` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Kochbuch`.`tbl_Zutaten_Rezept`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Kochbuch`.`tbl_Zutaten_Rezept` ;

CREATE TABLE IF NOT EXISTS `Kochbuch`.`tbl_Zutaten_Rezept` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tbl_Rezept_id` INT NOT NULL,
  `tbl_Zutat_id` INT NOT NULL,
  `Menge` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_Zutaten_Rezept_tbl_Rezept_idx` (`tbl_Rezept_id` ASC),
  INDEX `fk_tbl_Zutaten_Rezept_tbl_Zutat1_idx` (`tbl_Zutat_id` ASC),
  CONSTRAINT `fk_tbl_Zutaten_Rezept_tbl_Rezept`
    FOREIGN KEY (`tbl_Rezept_id`)
    REFERENCES `Kochbuch`.`tbl_Rezept` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_Zutaten_Rezept_tbl_Zutat1`
    FOREIGN KEY (`tbl_Zutat_id`)
    REFERENCES `Kochbuch`.`tbl_Zutat` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Kochbuch`.`tbl_Arbeitsschritt`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Kochbuch`.`tbl_Arbeitsschritt` ;

CREATE TABLE IF NOT EXISTS `Kochbuch`.`tbl_Arbeitsschritt` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Text` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Kochbuch`.`tbl_Arbeitsschritte_Rezept`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Kochbuch`.`tbl_Arbeitsschritte_Rezept` ;

CREATE TABLE IF NOT EXISTS `Kochbuch`.`tbl_Arbeitsschritte_Rezept` (
  `tbl_Rezept_id` INT NOT NULL,
  `tbl_Arbeitsschritt_id` INT NOT NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  `Arbeitsschritt_Nummer` VARCHAR(45) NOT NULL,
  INDEX `fk_tbl_Arbeitsschritte_Rezept_tbl_Rezept1_idx` (`tbl_Rezept_id` ASC),
  INDEX `fk_tbl_Arbeitsschritte_Rezept_tbl_Arbeitsschritt1_idx` (`tbl_Arbeitsschritt_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tbl_Arbeitsschritte_Rezept_tbl_Rezept1`
    FOREIGN KEY (`tbl_Rezept_id`)
    REFERENCES `Kochbuch`.`tbl_Rezept` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_Arbeitsschritte_Rezept_tbl_Arbeitsschritt1`
    FOREIGN KEY (`tbl_Arbeitsschritt_id`)
    REFERENCES `Kochbuch`.`tbl_Arbeitsschritt` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Kochbuch`.`tbl_Tipp`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Kochbuch`.`tbl_Tipp` ;

CREATE TABLE IF NOT EXISTS `Kochbuch`.`tbl_Tipp` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Text` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Kochbuch`.`tbl_Tipps_Rezept`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Kochbuch`.`tbl_Tipps_Rezept` ;

CREATE TABLE IF NOT EXISTS `Kochbuch`.`tbl_Tipps_Rezept` (
  `tbl_Rezept_id` INT NOT NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  `tbl_Tipp_id` INT NOT NULL,
  INDEX `fk_tbl_Tipps_Rezept_tbl_Rezept1_idx` (`tbl_Rezept_id` ASC),
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_Tipps_Rezept_tbl_Tipp1_idx` (`tbl_Tipp_id` ASC),
  CONSTRAINT `fk_tbl_Tipps_Rezept_tbl_Rezept1`
    FOREIGN KEY (`tbl_Rezept_id`)
    REFERENCES `Kochbuch`.`tbl_Rezept` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_Tipps_Rezept_tbl_Tipp1`
    FOREIGN KEY (`tbl_Tipp_id`)
    REFERENCES `Kochbuch`.`tbl_Tipp` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
