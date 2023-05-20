CREATE TABLE `clients` (
   `id` CHAR(36) NOT NULL,
   `first_name` VARCHAR(255) NOT NULL,
   `last_name` VARCHAR(255) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `properties` (
   `id` CHAR(36) NOT NULL,
   `address` VARCHAR(255) NOT NULL,
   `postal_code` VARCHAR(255) NOT NULL,
   `price` INTEGER NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
