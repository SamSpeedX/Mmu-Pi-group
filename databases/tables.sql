-- Active: 1740602929565@@127.0.0.1@3306@mtumba
DROP TABLE users;
CREATE TABLE IF NOT EXISTS `mtumba`.`users` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `username` VARCHAR(100) NOT NULL , 
    `email` VARCHAR(100) NOT NULL , 
    `password` VARCHAR(100) NOT NULL , 
    `address` VARCHAR(100) NOT NULL ,
    `role` ENUM('admin', 'member', 'marchant', 'buyer') DEFAULT 'buyer',
    `token` VARCHAR(100) NOT NULL , 
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)
) ENGINE = InnoDB;

DROP TABLE roles;
CREATE TABLE IF NOT EXISTS `mtumba`.`roles` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `role` ENUM('admin', 'member', 'marchant') DEFAULT 'member' ,
    `token` VARCHAR(100) NOT NULL , 
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
-- i 
INSERT INTO `roles` (role, token) VALUES ('admin', 'role_67bda48935aec');
INSERT INTO `roles` (role, token) VALUES ('member', 'role_67bda7c6d70f7');
INSERT INTO `roles` (role, token) VALUES ('marchant', 'role_67bda7d98df1b');

DROP TABLE marchants;
CREATE TABLE IF NOT EXISTS `mtumba`.`marchants` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `status` ENUM('inactive', 'active', 'pending') DEFAULT 'pending' ,
    `country` VARCHAR(100) NOT NULL ,
    `nida` VARCHAR(20) NULL ,
    `tin` VARCHAR(10) NULL ,
    `location` VARCHAR(255) NOT NULL,
    `lat` VARCHAR(100) NOT NULL ,
    `lng` VARCHAR(100) NOT NULL ,
    `token` VARCHAR(100) NOT NULL , 
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

DROP TABLE sellars;
DROP TABLE products;
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
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mtumba`.`categories` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(100) NOT NULL , 
    `token` VARCHAR(100) NOT NULL , 
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO `categories` (name, token) VALUES ('all', 'fysameyufw8fyfewfyg432yg23');

DROP TABLE `carts`;
CREATE TABLE IF NOT EXISTS `mtumba`.`carts` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `sellar_token` VARCHAR(100) NOT NULL ,
    `buyer_token` VARCHAR(100) NOT NULL ,
    `name` VARCHAR(100) NOT NULL , 
    `description` VARCHAR(100) NOT NULL , 
    `price` VARCHAR(100) NOT NULL , 
    `total` INT(50) NOT NULL ,
    `token` VARCHAR(100) NOT NULL , 
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mtumba`.`orders` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `marchant` VARCHAR(100) NOT NULL ,
    `buyer` VARCHAR(100) NOT NULL ,
    `order_id` VARCHAR(100) NOT NULL ,
    `status` ENUM('Moving', 'Arrieved', 'Cancelled', 'Pending') DEFAULT 'Pending' ,
    `operator` VARCHAR(100) NOT NULL ,
    `start_date` VARCHAR(100) NOT NULL ,
    `delivery_date` VARCHAR(100) NOT NULL ,
    `name` VARCHAR(100) NOT NULL , 
    `description` VARCHAR(100) NOT NULL , 
    `price` VARCHAR(100) NOT NULL , 
    `img` VARCHAR(100) NOT NULL ,
    `token` VARCHAR(100) NOT NULL , 
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

DROP TABLE payments;
CREATE TABLE IF NOT EXISTS `mtumba`.`payments` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `sellar` VARCHAR(100) NOT NULL,
    `buyer` VARCHAR(100) NOT NULL ,
    `price` VARCHAR(100) NOT NULL , 
    `token` VARCHAR(100) NOT NULL , 
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `member_chats`(
    `id` INT NOT NULL AUTO_INCREMENT ,
    `outgoing` VARCHAR(100) NOT NULL ,
    `incoming` VARCHAR(100) NOT NULL ,
    `message` TEXT NOT NULL ,
    `status` ENUM('unread', 'readed') DEFAULT 'unread' ,
    `token` VARCHAR(100) NOT NULL ,
    `create_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `chats`(
    `id` INT NOT NULL AUTO_INCREMENT ,
    `outgoing` VARCHAR(100) NOT NULL ,
    `incoming` VARCHAR(100) NOT NULL ,
    `message` TEXT NOT NULL ,
    `status` ENUM('unread', 'readed') DEFAULT 'unread' ,
    `token` VARCHAR(100) NOT NULL ,
    `create_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

DROP TABLE `messages`;
CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` VARCHAR(255) NOT NULL,
  `outgoing_msg_id` VARCHAR(255) NOT NULL,
  `msg` varchar(1000) NOT NULL ,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE `zeno_orders`;
CREATE TABLE IF NOT EXISTS `zeno_orders`(
    `id` INT NOT NULL AUTO_INCREMENT ,
    `token` VARCHAR(50) NOT NULL ,
    `order_id` VARCHAR(50) NOT NULL ,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`id`)
)

-- ALTER TABLE users 
-- DROP COLUMN role;

-- ALTER TABLE users
/* ADD COLUMN role ENUM('admin', 'member', 'merchant', 'buyer') DEFAULT 'buyer' AFTER address; */

-- ALTER TABLE roles 
-- DROP COLUMN created_at;

/* ALTER TABLE marchant
ADD COLUMN `lat` VARCHAR(100) NOT NULL AFTER location, */
    /* `lng` VARCHAR(100) NOT NULL , ; */
/* ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Password123!'; FLUSH PRIVILEGES; */
