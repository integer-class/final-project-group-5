-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2023 at 08:45 PM
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
(1, 'Ultra Milk Strawberry', 'Azhar', 'This drink contains milk!!!', 'Drink', 97, 4000, 7000, '/opt/lampp/htdocs/final-project-group-5/e-canteen-jti/public/uploads/ultramilk.jpg', 'PRODUCT-7684579165'),
(9, 'Mie Sedap Cup Kari Special', 'Azhar', 'Sluurppp!!!', 'Food', 97, 5000, 7500, '/opt/lampp/htdocs/final-project-group-5/e-canteen-jti/public/uploads/misedap.jpg', 'PRODUCT-7593652487'),
(10, 'Good Day Vanilla', 'Azhar', 'Good Day Coffee for u if u\'re feel sleepy', 'Drink', 99, 2000, 3500, '/opt/lampp/htdocs/final-project-group-5/e-canteen-jti/public/uploads/gooddayvanila.jpeg', 'PRODUCT-9461867354'),
(15, 'test', 'test', 'test', 'test', 0, 1000, 10000, '/opt/lampp/htdocs/final-project-group-5/e-canteen-jti/public/uploads/ultramilk.jpg', 'PRODUCT-8087125265');

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
(43, '2023-12-12 01:59:37', 3500.00, 10000.00, 6500.00, 2, 'TRANSACTION-420976');

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
(40, 1, 10, 1, 3500.00, 3500.00, 'TRANSACTION-420976');

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Sales`
--
ALTER TABLE `Sales`
  MODIFY `sales_transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `SalesDetail`
--
ALTER TABLE `SalesDetail`
  MODIFY `sales_transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
