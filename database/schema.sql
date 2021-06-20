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
  `number` INT NOT NULL,
  `name` TINYTEXT NOT NULL,
  `expiration` DATE NOT NULL,
  `user` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_payment_user`
    FOREIGN KEY (`user`)
    REFERENCES `ecommerce`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  `zipcode` INT NOT NULL,
  `street` TINYTEXT NOT NULL,
  `number` INT NOT NULL,
  `additional` LONGTEXT NULL,
  `user` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_delivery_user`
    FOREIGN KEY (`user`)
    REFERENCES `ecommerce`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  `birth` DATE NULL,
  `phone` INT NULL,
  `picture` TINYTEXT NULL,
  `payment` INT NULL,
  `delivery` INT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_user_payment`
    FOREIGN KEY (`payment`)
    REFERENCES `ecommerce`.`PaymentMethod` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_user_delivery`
    FOREIGN KEY (`delivery`)
    REFERENCES `ecommerce`.`DeliveryAddress` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `IDX_user_payment` ON `ecommerce`.`User` (`payment` ASC) INVISIBLE;

CREATE INDEX `IDX_user_delivery` ON `ecommerce`.`User` (`delivery` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `ecommerce`.`Order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`Order` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `contact` TINYTEXT NOT NULL,
  `bill` TINYTEXT NOT NULL,
  `tracking` TINYTEXT NOT NULL,
  `date` DATETIME NOT NULL,
  `amount` FLOAT NOT NULL,
  `user` INT NULL,
  `state` TINYINT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_order_user`
    FOREIGN KEY (`user`)
    REFERENCES `ecommerce`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `IDX_order` ON `ecommerce`.`Order` (`user` ASC, `date` ASC, `state` ASC) INVISIBLE;


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
  `name` VARCHAR(250) NOT NULL,
  `description` LONGTEXT NULL,
  `price` FLOAT NOT NULL,
  `stock` INT NOT NULL,
  `picture1` TINYTEXT NOT NULL,
  `picture2` TINYTEXT NULL,
  `picture3` TINYTEXT NULL,
  `category` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_product_category`
    FOREIGN KEY (`category`)
    REFERENCES `ecommerce`.`Category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `IDX_product` ON `ecommerce`.`Product` (`category` ASC, `name` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `ecommerce`.`OrderProduct`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`OrderProduct` (
  `order` INT NOT NULL,
  `product` INT NOT NULL,
  `quantity` INT NOT NULL,
  PRIMARY KEY (`order`, `product`),
  CONSTRAINT `FK_orderproduct_order`
    FOREIGN KEY (`order`)
    REFERENCES `ecommerce`.`Order` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_orderproduct_product`
    FOREIGN KEY (`product`)
    REFERENCES `ecommerce`.`Product` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `IDX_orderproduct` ON `ecommerce`.`OrderProduct` (`product` ASC) INVISIBLE;


-- -----------------------------------------------------
-- Table `ecommerce`.`Cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`Cart` (
  `session` INT NOT NULL,
  `product` INT NOT NULL,
  `quantity` INT NOT NULL,
  `user` INT NULL,
  PRIMARY KEY (`session`, `product`),
  CONSTRAINT `FK_cart_user`
    FOREIGN KEY (`user`)
    REFERENCES `ecommerce`.`User` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_cart_product`
    FOREIGN KEY (`product`)
    REFERENCES `ecommerce`.`Product` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `IDX_cart` ON `ecommerce`.`Cart` (`user` ASC, `session` ASC, `product` ASC) VISIBLE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;