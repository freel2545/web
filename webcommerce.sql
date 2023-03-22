-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for webcommerce
CREATE DATABASE IF NOT EXISTS `webcommerce` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `webcommerce`;

-- Dumping structure for table webcommerce.login
CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webcommerce.login: ~0 rows (approximately)
INSERT INTO `login` (`username`, `password`, `name`, `address`) VALUES
	('freel', '1234', 'freel', 'adadawdada');

-- Dumping structure for table webcommerce.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `order_address` text COLLATE utf8_unicode_ci NOT NULL,
  `order_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `order_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Column 6` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `order_total` int(11) NOT NULL DEFAULT 0,
  `order_date` date DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webcommerce.orders: ~0 rows (approximately)
INSERT INTO `orders` (`order_id`, `order_name`, `order_address`, `order_email`, `order_phone`, `Column 6`, `order_total`, `order_date`) VALUES
	(1, '0', '', '', '', '', 0, NULL),
	(2, 'Wanutsanai', '44444', 'freel2545@gmail.com', '0805533854', '', 1230, '2022-08-21'),
	(3, 'Wanutsanai', '44444', 'freel2545@gmail.com', '0805533854', '', 1230, '2022-08-21'),
	(4, 'Wanutsanai', '44444', 'freel2545@gmail.com', '0805533854', '', 1230, '2022-08-21'),
	(5, 'Wanutsanai', '44444', 'freel2545@gmail.com', '0805533854', '', 1230, '2022-08-21'),
	(6, 'Wanutsanai', 'wdw', 'freel2545@gmail.com', '0896995331', '', 200, '2022-08-21');

-- Dumping structure for table webcommerce.order_detail
CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rder_number` int(11) DEFAULT NULL,
  `order_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webcommerce.order_detail: ~0 rows (approximately)
INSERT INTO `order_detail` (`order_id`, `product_id`, `rder_number`, `order_price`) VALUES
	(6, 16, 1, 200);

-- Dumping structure for table webcommerce.product
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `product_detail` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_image` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webcommerce.product: ~3 rows (approximately)
INSERT INTO `product` (`product_id`, `product_name`, `type_id`, `product_detail`, `product_price`, `product_image`) VALUES
	(2, 'Broom', 3, 'MadeinChaina', 30, '2.jpg'),
	(3, '$name', 0, '$detail', 100, '3.jpg'),
	(4, 'football', 2, 'dasdwasdwasdwa', 1000, '4.jpg'),
	(16, 'เขียง', 1, 'เขียงไม้', 200, '16.jpg');

-- Dumping structure for table webcommerce.product_type
CREATE TABLE IF NOT EXISTS `product_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webcommerce.product_type: ~2 rows (approximately)
INSERT INTO `product_type` (`type_id`, `type_name`) VALUES
	(1, 'kitchen'),
	(2, 'Sport'),
	(3, 'Home'),
	(4, 'animal feed');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
