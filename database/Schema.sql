-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ecommerce
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ecommerce` ;

-- -----------------------------------------------------
-- Schema ecommerce
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET utf8 ;
USE `ecommerce` ;

-- -----------------------------------------------------
-- Table `ecommerce`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `token` TINYTEXT NOT NULL,
  `email` TINYTEXT NOT NULL,
  `firstname` TINYTEXT NULL,
  `lastname` TINYTEXT NULL,
  `birth` DATETIME NULL,
  `phone` VARCHAR(12) NULL,
  `picture` TINYTEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`Checkout`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`Checkout` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `contact` TINYTEXT NOT NULL,
  `bill` TINYTEXT NOT NULL,
  `tracking` TINYTEXT NOT NULL,
  `date` DATETIME NOT NULL,
  `amount` FLOAT NOT NULL,
  `user` INT NULL,
  `state` TINYINT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE INDEX `IDX_checkout` ON `ecommerce`.`Checkout` (`user` ASC, `date` DESC, `state` ASC) INVISIBLE;


-- -----------------------------------------------------
-- Table `ecommerce`.`Category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`Category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` TINYTEXT NOT NULL,
  `VAT` FLOAT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`Product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`Product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(500) NOT NULL,
  `description` LONGTEXT NULL,
  `price` FLOAT NOT NULL,
  `stock` INT NOT NULL,
  `picture1` TINYTEXT NOT NULL,
  `picture2` TINYTEXT NULL,
  `picture3` TINYTEXT NULL,
  `category` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE INDEX `IDX_product` ON `ecommerce`.`Product` (`category` ASC, `name` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `ecommerce`.`CheckoutProduct`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`CheckoutProduct` (
  `ordered` INT NOT NULL,
  `product` INT NOT NULL,
  `quantity` INT NOT NULL,
  PRIMARY KEY (`ordered`, `product`))
ENGINE = InnoDB;

CREATE INDEX `IDX_checkoutproduct` ON `ecommerce`.`CheckoutProduct` (`product` ASC) INVISIBLE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;