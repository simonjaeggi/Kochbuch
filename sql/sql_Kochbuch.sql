-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema kochbuch
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `kochbuch` ;

-- -----------------------------------------------------
-- Schema kochbuch
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `kochbuch` DEFAULT CHARACTER SET utf8 ;
USE `kochbuch` ;

-- -----------------------------------------------------
-- Table `kochbuch`.`tbl_Benutzer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kochbuch`.`tbl_Benutzer` ;

CREATE TABLE IF NOT EXISTS `kochbuch`.`tbl_Benutzer` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Email` VARCHAR(50) NOT NULL,
  `HashedPassword` VARCHAR(255) NOT NULL,
  `Firstname` VARCHAR(50) NOT NULL,
  `Lastname` VARCHAR(50) NOT NULL,
  `Username` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kochbuch`.`tbl_Rezept`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kochbuch`.`tbl_Rezept` ;

CREATE TABLE IF NOT EXISTS `kochbuch`.`tbl_Rezept` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Benutzer_ID` INT NULL,
  `Name` VARCHAR(50) NOT NULL,
  `Tipp` MEDIUMTEXT NULL,
  `ExtAutor` VARCHAR(45) NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_Rezept_Benutzer1_idx` (`Benutzer_ID` ASC),
  CONSTRAINT `fk_Rezept_Benutzer1`
    FOREIGN KEY (`Benutzer_ID`)
    REFERENCES `kochbuch`.`tbl_Benutzer` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kochbuch`.`tbl_Zutat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kochbuch`.`tbl_Zutat` ;

CREATE TABLE IF NOT EXISTS `kochbuch`.`tbl_Zutat` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kochbuch`.`tbl_Zubereitung`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kochbuch`.`tbl_Zubereitung` ;

CREATE TABLE IF NOT EXISTS `kochbuch`.`tbl_Zubereitung` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Rezept_ID` INT NOT NULL,
  `Zubereitungsschritt` MEDIUMTEXT NULL,
  PRIMARY KEY (`ID`, `Rezept_ID`),
  INDEX `fk_Zubereitung_Rezept1_idx` (`Rezept_ID` ASC),
  CONSTRAINT `fk_Zubereitung_Rezept1`
    FOREIGN KEY (`Rezept_ID`)
    REFERENCES `kochbuch`.`tbl_Rezept` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kochbuch`.`tbl_Zutatenmenge`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `kochbuch`.`tbl_Zutatenmenge` ;

CREATE TABLE IF NOT EXISTS `kochbuch`.`tbl_Zutatenmenge` (
  `Rezept_ID` INT NOT NULL,
  `Zutat_ID` INT NOT NULL,
  `Menge` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`Rezept_ID`, `Zutat_ID`),
  INDEX `fk_Rezept_has_Zutat_Zutat1_idx` (`Zutat_ID` ASC),
  INDEX `fk_Rezept_has_Zutat_Rezept1_idx` (`Rezept_ID` ASC),
  CONSTRAINT `fk_Rezept_has_Zutat_Rezept1`
    FOREIGN KEY (`Rezept_ID`)
    REFERENCES `kochbuch`.`tbl_Rezept` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Rezept_has_Zutat_Zutat1`
    FOREIGN KEY (`Zutat_ID`)
    REFERENCES `kochbuch`.`tbl_Zutat` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
