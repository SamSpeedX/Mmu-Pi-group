CREATE TABLE IF NOT EXISTS `mtumba`.`users` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `username` VARCHAR(100) NOT NULL , 
    `email` VARCHAR(100) NOT NULL , 
    `password` VARCHAR(100) NOT NULL , 
    `address` VARCHAR(100) NOT NULL ,
    `token` VARCHAR(100) NOT NULL , 
    `created_at` TIMESTAMP(6) NOT NULL , PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mtumba`.`sellars` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `username` VARCHAR(100) NOT NULL , 
    `email` VARCHAR(100) NOT NULL , 
    `password` VARCHAR(100) NOT NULL , 
    `number` VARCHAR(255) NOT NULL,
    `location` VARCHAR(255) NOT NULL,
    `token` VARCHAR(100) NOT NULL , 
    `created_at` TIMESTAMP(6) NOT NULL , PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mtumba`.`products` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(100) NOT NULL , 
    `description` VARCHAR(100) NOT NULL , 
    `price` VARCHAR(100) NOT NULL , 
    `img` VARCHAR(100) NOT NULL ,
    `category` VARCHAR(100) NOT NULL ,
    `date` VARCHAR(100) NOT NULL ,
    `total` VARCHAR(100) NOT NULL ,
    `token` VARCHAR(100) NOT NULL , 
    `created_at` TIMESTAMP(6) NOT NULL , PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mtumba`.`carts` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(100) NOT NULL , 
    `description` VARCHAR(100) NOT NULL , 
    `price` VARCHAR(100) NOT NULL , 
    `token` VARCHAR(100) NOT NULL , 
    `created_at` TIMESTAMP(6) NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mtumba`.`payments` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `sellar` VARCHAR(255) NOT NULL,
    `price` VARCHAR(100) NOT NULL , 
    `token` VARCHAR(100) NOT NULL , 
    `created_at` TIMESTAMP(6) NOT NULL , PRIMARY KEY (`id`)
) ENGINE = InnoDB;
