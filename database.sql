-- MySQL Script generated by MySQL Workbench
-- Tue Aug 23 23:27:42 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db` DEFAULT CHARACTER SET utf8 ;
USE `db` ;

-- -----------------------------------------------------
-- Table `db`.`coche`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db`.`coche` (
  `id_coche` INT NOT NULL AUTO_INCREMENT,
  `matricula` VARCHAR(10) NOT NULL,
  `marca` VARCHAR(100) NOT NULL,
  `anio_fab` YEAR NOT NULL,
  PRIMARY KEY (`id_coche`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db`.`mecanico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db`.`mecanico` (
  `id_mecanico` INT NOT NULL AUTO_INCREMENT,
  `curp` VARCHAR(18) NOT NULL,
  `nombre` VARCHAR(60) NOT NULL,
  `puesto` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id_mecanico`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db`.`trabajo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db`.`trabajo` (
  `id_trabajo` INT NOT NULL AUTO_INCREMENT,
  `id_coche` INT NOT NULL,
  `id_mecanico` INT NOT NULL,
  `hrs` INT NOT NULL,
  `fecha_rep` DATETIME NOT NULL,
  PRIMARY KEY (`id_trabajo`),
  INDEX `fk_trabajo_mecanico_idx` (`id_mecanico` ASC) VISIBLE,
  INDEX `fk_trabajo_coche1_idx` (`id_coche` ASC) VISIBLE,
  CONSTRAINT `fk_trabajo_mecanico`
    FOREIGN KEY (`id_mecanico`)
    REFERENCES `db`.`mecanico` (`id_mecanico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trabajo_coche1`
    FOREIGN KEY (`id_coche`)
    REFERENCES `db`.`coche` (`id_coche`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;