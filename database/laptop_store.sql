-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2024 at 04:01 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `adminname`, `mypassword`) VALUES
(4, 'tie@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `bills_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `total_price` int DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`bills_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(6, 'Accessories'),
(7, 'Laptop'),
(8, 'Smartphones'),
(9, 'Cameras');

-- --------------------------------------------------------

--
-- Table structure for table `detail_bill`
--

DROP TABLE IF EXISTS `detail_bill`;
CREATE TABLE IF NOT EXISTS `detail_bill` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_bills` int DEFAULT NULL,
  `id_product` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_bills` (`id_bills`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `price` varchar(20) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `model` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int NOT NULL,
  `description` text NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `model`, `image`, `price`, `description`, `category_id`) VALUES
(14, 'HeadPhone', '../../assets/imgproduct02.png', 20, 'Sony WH-CH520 over-ear headphones feature DSEE digital sound to help deliver realistic sound along with a battery that lasts up to 40 hours. Besides, this Sony headset product has a quite compact design and an extremely convenient integrated microphone design.', 6),
(15, 'Laptop', '../../assets/imgproduct03.png', 50, 'Macbook Air M1 is a product line with a thin, light, luxurious and sophisticated design along with an affordable price, so MacBook Air has attracted a large number of users to love and choose. This is also one of the latest Macbook Air versions that customers cannot miss when coming to CellphoneS. Below are details about the design and configuration of the machine.', 7),
(16, 'Headphone', '../../assets/imgproduct05.png', 15, 'The Edifier W820NB Plus bluetooth headset is a very valuable upgrade, equipped with many modern features. And the manufacturer perfected the Edifier headphone device with extremely optimal, simple, youthful design.', 6),
(17, 'Laptop', '../../assets/imgproduct06.png', 55, 'Asus Vivobook 15 OLED A1505VA-L1114W laptop brings great work and entertainment experiences with extremely impressive configuration parameters. The device helps you complete all tasks quickly when integrating a leading processor. With a brilliant OLED screen, the Asus Vivobook laptop also opens up a world of extremely rich and realistic entertainment.', 7),
(18, 'Samsung J5', '../../assets/imgproduct07.png', 10, 'Galaxy J5 Prime is a mid-range smartphone with a very reasonable price based on configuration for a famous manufacturer like Samsung.', 8),
(19, 'Camera', '../../assets/imgproduct09.png', 10, 'Instax Camera Mini 12 will continue its predecessors to become an instant photography device worth owning in the near future. In addition to inheriting a youthful, easy-to-use design, Fujifilm Instax Camera Mini 12 will also have many improvements to bring better quality photos.', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mypassword`) VALUES
(6, 'truongne', 'truongne@gmail', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD CONSTRAINT `detail_bill_ibfk_1` FOREIGN KEY (`id_bills`) REFERENCES `bills` (`bills_id`),
  ADD CONSTRAINT `detail_bill_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
