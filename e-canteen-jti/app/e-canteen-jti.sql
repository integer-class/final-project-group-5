-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2023 at 05:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-canteen-jti`
--

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `buy_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `product_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`product_id`, `product_name`, `supplier_name`, `description`, `category`, `stock`, `buy_price`, `sell_price`, `image`, `product_code`) VALUES
(1, 'Ultra Milk Strawberry', 'Azhar', 'description', 'Drink', 60, 5000, 7000, '/opt/lampp/htdocs/final-project-group-5/e-canteen-jti/public/uploads/ultramilk.jpg', 'PRODUCT-7593652487'),
(9, 'Mie Sedap Cup Kari Special', 'Azhar', 'des', 'Food', 60, 5000, 7500, '/opt/lampp/htdocs/final-project-group-5/e-canteen-jti/public/uploads/misedap.jpg', 'PRODUCT-7593652481'),
(10, 'Good Day Vanilla', 'Azhar', 'Des', 'Drink', 59, 2000, 3500, '/opt/lampp/htdocs/final-project-group-5/e-canteen-jti/public/uploads/gooddayvanila.jpeg', 'PRODUCT-9461867354'),
(15, 'test', 'test', 'test', 'test', 0, 1000, 10000, '/opt/lampp/htdocs/final-project-group-5/e-canteen-jti/public/uploads/test.jpeg', 'PRODUCT-8087125265');

-- --------------------------------------------------------

--
-- Table structure for table `Sales`
--

CREATE TABLE `Sales` (
  `sales_transaction_id` int(11) NOT NULL,
  `sales_transaction_date` timestamp NOT NULL DEFAULT convert_tz(current_timestamp(),'+00:00','+07:00'),
  `total` decimal(10,2) DEFAULT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `change` decimal(10,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sales_transaction_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Sales`
--

INSERT INTO `Sales` (`sales_transaction_id`, `sales_transaction_date`, `total`, `paid`, `change`, `user_id`, `sales_transaction_code`) VALUES
(1, '2023-12-12 00:17:40', 10000.00, 20000.00, 10000.00, 2, 'TRANSACTION-123456737515'),
(42, '2023-12-12 00:17:53', 5000.00, 10000.00, 5000.00, 2, 'TRANSACTION-123456194621'),
(43, '2023-12-12 01:59:37', 3500.00, 10000.00, 6500.00, 2, 'TRANSACTION-420976'),
(44, '2023-12-12 03:01:07', 35000.00, 100000.00, 65000.00, 2, 'TRANSACTION-351663'),
(45, '2023-12-12 14:14:02', 14000.00, 20000.00, 6000.00, 2, 'TRANSACTION-671141'),
(46, '2023-12-16 17:43:40', 22000.00, 30000.00, 8000.00, 2, 'TRANSACTION-439732'),
(47, '2023-12-16 17:43:43', 22000.00, 30000.00, 8000.00, 2, 'TRANSACTION-410941'),
(48, '2023-12-16 17:43:58', 22000.00, 30000.00, 8000.00, 2, 'TRANSACTION-210991'),
(49, '2023-12-16 17:44:51', 22000.00, 30000.00, 8000.00, 2, 'TRANSACTION-848894'),
(50, '2023-12-16 17:48:08', 14500.00, 20000.00, 5500.00, 2, 'TRANSACTION-350789'),
(51, '2023-12-16 18:02:09', 29000.00, 30000.00, 1000.00, 2, 'TRANSACTION-606765'),
(52, '2023-12-16 18:02:22', 7000.00, 10000.00, 3000.00, 2, 'TRANSACTION-670326'),
(53, '2023-12-16 18:15:38', 14500.00, 15000.00, 500.00, 2, 'TRANSACTION-914867'),
(54, '2023-12-16 18:19:21', 84000.00, 85000.00, 1000.00, 2, 'TRANSACTION-952420'),
(55, '2023-12-16 18:48:23', 14500.00, 20000.00, 5500.00, 2, 'TRANSACTION-992366'),
(56, '2023-12-16 18:51:31', 21000.00, 25000.00, 4000.00, 2, 'TRANSACTION-516794'),
(57, '2023-12-16 19:23:51', 7000.00, 100000.00, 93000.00, 2, 'TRANSACTION-748517'),
(58, '2023-12-16 20:07:24', 32500.00, 35000.00, 2500.00, 2, 'TRANSACTION-434645'),
(59, '2023-12-16 20:16:18', 0.00, 15000.00, 15000.00, 2, 'TRANSACTION-343603'),
(60, '2023-12-16 20:19:07', 0.00, 25000.00, 25000.00, 2, 'TRANSACTION-665138'),
(61, '2023-12-16 20:20:49', 0.00, 15000.00, 15000.00, 2, 'TRANSACTION-759330'),
(62, '2023-12-16 20:29:27', 14500.00, 100000.00, 85500.00, 2, 'TRANSACTION-186275'),
(63, '2023-12-16 20:51:48', 52500.00, 100000.00, 47500.00, 2, 'TRANSACTION-138295'),
(64, '2023-12-17 03:24:49', 14500.00, 20000.00, 5500.00, 2, 'TRANSACTION-513708'),
(65, '2023-12-17 03:47:44', 22500.00, 25000.00, 2500.00, 2, 'TRANSACTION-127531'),
(66, '2023-12-17 19:17:03', 22000.00, 50000.00, 28000.00, 2, 'TRANSACTION-997758'),
(67, '2023-12-17 19:29:06', 7000.00, 10000.00, 3000.00, 2, 'TRANSACTION-965912'),
(68, '2023-12-18 17:32:21', 3500.00, 5000.00, 1500.00, 2, 'TRANSACTION-164659'),
(69, '2023-12-18 17:40:20', 7000.00, 7000.00, 0.00, 2, 'TRANSACTION-736824'),
(70, '2023-12-18 17:40:41', 43500.00, 50000.00, 6500.00, 2, 'TRANSACTION-152367'),
(71, '2023-12-18 17:45:45', 18000.00, 20000.00, 2000.00, 2, 'TRANSACTION-186460'),
(72, '2023-12-18 21:02:30', 3500.00, 5000.00, 1500.00, 2, 'TRANSACTION-948328'),
(73, '2023-12-18 21:44:00', 14500.00, 15000.00, 500.00, 2, 'TRANSACTION-426242'),
(74, '2023-12-20 10:42:55', 3500.00, 5000.00, 1500.00, 2, 'TRANSACTION-608172'),
(75, '2023-12-20 13:53:09', 14500.00, 15000.00, 500.00, 2, 'TRANSACTION-368135'),
(76, '2023-12-20 14:30:14', 36000.00, 40000.00, 4000.00, 2, 'TRANSACTION-670315'),
(77, '2023-12-20 22:00:44', 3500.00, 5000.00, 1500.00, 2, 'TRANSACTION-898154');

-- --------------------------------------------------------

--
-- Table structure for table `SalesDetail`
--

CREATE TABLE `SalesDetail` (
  `sales_transaction_detail_id` int(11) NOT NULL,
  `sales_transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `sales_transaction_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `SalesDetail`
--

INSERT INTO `SalesDetail` (`sales_transaction_detail_id`, `sales_transaction_id`, `product_id`, `quantity`, `subtotal`, `unit_price`, `sales_transaction_code`) VALUES
(39, 1, 1, 1, 4000.00, 4000.00, 'TRANSACTION-123456194621'),
(40, 1, 10, 1, 3500.00, 3500.00, 'TRANSACTION-420976'),
(41, 1, 1, 5, 35000.00, 7000.00, 'TRANSACTION-351663'),
(42, 1, 1, 2, 14000.00, 7000.00, 'TRANSACTION-671141'),
(43, 1, 1, 12, 84000.00, 7000.00, 'TRANSACTION-952420'),
(44, 1, 1, 1, 7000.00, 7000.00, 'TRANSACTION-992366'),
(45, 1, 1, 1, 7000.00, 7000.00, 'TRANSACTION-992366'),
(46, 1, 1, 2, 14000.00, 7000.00, 'TRANSACTION-516794'),
(47, 1, 1, 2, 14000.00, 7000.00, 'TRANSACTION-516794'),
(48, 1, 1, 1, 7000.00, 7000.00, 'TRANSACTION-748517'),
(49, NULL, 1, 1, 7000.00, 7000.00, 'TRANSACTION-353022'),
(50, NULL, 1, 1, 7000.00, 7000.00, 'TRANSACTION-574929'),
(51, NULL, 1, 1, 7000.00, 7000.00, 'TRANSACTION-806220'),
(52, NULL, 1, 1, 7000.00, 7000.00, 'TRANSACTION-186275'),
(53, NULL, 9, 1, 7500.00, 7500.00, 'TRANSACTION-186275'),
(54, NULL, 1, 5, 35000.00, 7000.00, 'TRANSACTION-138295'),
(55, NULL, 10, 5, 17500.00, 3500.00, 'TRANSACTION-138295'),
(56, NULL, 1, 1, 7000.00, 7000.00, 'TRANSACTION-513708'),
(57, NULL, 9, 1, 7500.00, 7500.00, 'TRANSACTION-513708'),
(58, NULL, 9, 3, 22500.00, 7500.00, 'TRANSACTION-127531'),
(59, NULL, 1, 1, 7000.00, 7000.00, 'TRANSACTION-997758'),
(60, NULL, 9, 2, 15000.00, 7500.00, 'TRANSACTION-997758'),
(61, NULL, 10, 2, 7000.00, 3500.00, 'TRANSACTION-965912'),
(62, NULL, 10, 1, 3500.00, 3500.00, 'TRANSACTION-164659'),
(63, NULL, 10, 2, 7000.00, 3500.00, 'TRANSACTION-736824'),
(64, NULL, 9, 3, 22500.00, 7500.00, 'TRANSACTION-152367'),
(65, NULL, 1, 3, 21000.00, 7000.00, 'TRANSACTION-152367'),
(66, NULL, 10, 1, 3500.00, 3500.00, 'TRANSACTION-186460'),
(67, NULL, 9, 1, 7500.00, 7500.00, 'TRANSACTION-186460'),
(68, NULL, 1, 1, 7000.00, 7000.00, 'TRANSACTION-186460'),
(69, NULL, 10, 1, 3500.00, 3500.00, 'TRANSACTION-948328'),
(70, NULL, 1, 1, 7000.00, 7000.00, 'TRANSACTION-426242'),
(71, NULL, 9, 1, 7500.00, 7500.00, 'TRANSACTION-426242'),
(72, NULL, 10, 1, 3500.00, 3500.00, 'TRANSACTION-608172'),
(73, NULL, 9, 1, 7500.00, 7500.00, 'TRANSACTION-368135'),
(74, NULL, 1, 1, 7000.00, 7000.00, 'TRANSACTION-368135'),
(75, NULL, 10, 2, 7000.00, 3500.00, 'TRANSACTION-670315'),
(76, NULL, 9, 2, 15000.00, 7500.00, 'TRANSACTION-670315'),
(77, NULL, 1, 2, 14000.00, 7000.00, 'TRANSACTION-670315'),
(78, NULL, 10, 1, 3500.00, 3500.00, 'TRANSACTION-898154');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` enum('admin','cashier') NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`user_id`, `username`, `password`, `email`, `role`, `address`, `phone_number`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin@gmail.com', 'admin', 'JL. Sukarno Hatta No.9', '+62895378456'),
(2, 'cashier', '5f4dcc3b5aa765d61d8327deb882cf99', 'cashier@gmail.com', 'cashier', 'JL. Sukarno Hatta No.10', '+6289592803743');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `Sales`
--
ALTER TABLE `Sales`
  ADD PRIMARY KEY (`sales_transaction_id`),
  ADD KEY `cashier_id` (`user_id`);

--
-- Indexes for table `SalesDetail`
--
ALTER TABLE `SalesDetail`
  ADD PRIMARY KEY (`sales_transaction_detail_id`),
  ADD KEY `sales_transaction_id` (`sales_transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `Sales`
--
ALTER TABLE `Sales`
  MODIFY `sales_transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `SalesDetail`
--
ALTER TABLE `SalesDetail`
  MODIFY `sales_transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Sales`
--
ALTER TABLE `Sales`
  ADD CONSTRAINT `Sales_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `SalesDetail`
--
ALTER TABLE `SalesDetail`
  ADD CONSTRAINT `SalesDetail_ibfk_1` FOREIGN KEY (`sales_transaction_id`) REFERENCES `Sales` (`sales_transaction_id`),
  ADD CONSTRAINT `SalesDetail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `Product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
