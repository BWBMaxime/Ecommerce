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
-- Table `ecommerce`.`PaymentMethod`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`PaymentMethod` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` ENUM('visa', 'mastercard', 'americanexpress', 'paypal') NOT NULL,
  `number` VARCHAR(16) NOT NULL,
  `name` TINYTEXT NOT NULL,
  `expiration` DATETIME NOT NULL,
  `user` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE INDEX `IDX_paymentmethod` ON `ecommerce`.`PaymentMethod` (`user` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `ecommerce`.`DeliveryAddress`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`DeliveryAddress` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` ENUM('home', 'pickup') NOT NULL DEFAULT 'home',
  `country` TINYTEXT NOT NULL,
  `city` TINYTEXT NOT NULL,
  `zipcode` VARCHAR(10) NOT NULL,
  `street` TINYTEXT NOT NULL,
  `number` INT NOT NULL,
  `additional` LONGTEXT NULL,
  `user` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE INDEX `IDX_delivery` ON `ecommerce`.`DeliveryAddress` (`user` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `ecommerce`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `token` TINYTEXT NOT NULL,
  `mail` TINYTEXT NOT NULL,
  `firstname` TINYTEXT NULL,
  `lastname` TINYTEXT NULL,
  `birth` DATETIME NULL,
  `phone` VARCHAR(12) NULL,
  `picture` TINYTEXT NULL,
  `payment` INT NULL,
  `delivery` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE INDEX `IDX_user_payment` ON `ecommerce`.`User` (`payment` ASC) INVISIBLE;

CREATE INDEX `IDX_user_delivery` ON `ecommerce`.`User` (`delivery` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `ecommerce`.`Ordered`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`Ordered` (
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

CREATE INDEX `IDX_ordered` ON `ecommerce`.`Ordered` (`user` ASC, `date` DESC, `state` ASC) INVISIBLE;


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
-- Table `ecommerce`.`OrderedProduct`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`OrderedProduct` (
  `ordered` INT NOT NULL,
  `product` INT NOT NULL,
  `quantity` INT NOT NULL,
  PRIMARY KEY (`ordered`, `product`))
ENGINE = InnoDB;

CREATE INDEX `IDX_orderedproduct` ON `ecommerce`.`OrderedProduct` (`product` ASC) INVISIBLE;


-- -----------------------------------------------------
-- Table `ecommerce`.`Cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`Cart` (
  `session` INT NOT NULL,
  `product` INT NOT NULL,
  `quantity` INT NOT NULL,
  `user` INT NULL,
  PRIMARY KEY (`session`, `product`))
ENGINE = InnoDB;

CREATE INDEX `IDX_cart` ON `ecommerce`.`Cart` (`user` ASC, `session` ASC, `product` ASC) VISIBLE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;