use `datafeed`;

CREATE TABLE IF NOT EXISTS `datafeed`.`post` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `entity_id` INT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `category_id` INT NOT NULL,
    `sku` VARCHAR(150) NOT NULL,
    `description` LONGTEXT NULL,
    `short_description` LONGTEXT NULL,
    `price` DECIMAL(10, 4) NULL,
    `link` LONGTEXT NOT NULL,
    `image` text NOT NULL,
    `brand_id` INT NOT NULL,
    `rating` INT NULL,
    `caffeine_type` ENUM('Caffeinated', 'Decaffeinated', 'Caffeine Free') NULL DEFAULT 'Caffeinated',
    `entity_count` INT NULL,
    `flavored` INT NULL,
    `seasonal` INT NULL,
    `in_stock` VARCHAR(150) NOT NULL,
    `facebook` BOOLEAN NOT NULL,
    `is_k_cup` BOOLEAN NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `datafeed`.`category` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `datafeed`.`brand` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);


ALTER TABLE `post` ADD INDEX(entity_id, name);

ALTER TABLE `category` ADD INDEX(`name`);

ALTER TABLE `brand` ADD INDEX(`name`);

