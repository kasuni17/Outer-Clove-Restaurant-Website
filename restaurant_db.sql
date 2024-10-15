-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 03:04 PM
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
-- Database: `restaurant_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_name`, `price`, `quantity`, `image`) VALUES
(1, '', '', '', ''),
(2, '', '', '', ''),
(13, 'Iced Green Tea', '', '', ''),
(14, 'Valerie’s Chokeslam', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `contact`, `message`) VALUES
(1, 6, 'vish', 'vish@gmail.com', '0711458171', 'Could you kindly provide details about the cuisine you offer, any signature dishes or specialties, and whether you accommodate dietary preferences or restrictions?\r\n\r\n'),
(10, 0, 'hash', 'hash1@gmail.com', '0771234321', 'hello'),
(11, 0, 'nethmi', 'nethmigmail.com', '0711234567', 'Could you kindly provide details about the cuisine you offer, any signature dishes or specialties, and whether you accommodate dietary preferences or restrictions?');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `order_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `order_total`) VALUES
(25, 'nethmi', '0711234567', 'nethmi@gmail.com', 'cash', 'kandy', '2', '2450', 2450.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `description`, `image`) VALUES
(6, 'Iced Green Tea', '1250', 'Iced green tea with mint and lime.', 'uploadsd31998ee4e9f560d06d81652d7bab948.jpg'),
(8, 'Valerie’s Chokeslam', '1200', 'Mint with grapes', 'uploads43563435e841e9885a08138a5196b716.jpg'),
(9, 'Isso Burger', '1550', 'Crumbed prawn patty topped with cheese, caramelized onions, pickled cucumber, egg, lettuce, tomato in a soft bun', 'uploadse4c818320cbe352941b28f0efa5f5711.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `party_size` int(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`name`, `contact`, `party_size`, `date`, `time`, `message`) VALUES
('name', '0', 0, '0000-00-00', '00:00:00', 'message'),
('name', '0', 0, '0000-00-00', '00:00:00', 'message'),
('dfsd', '342424244', 23, '2023-12-28', '11:00:00', '3rea'),
('kasuni', '0711458171', 3, '2023-12-30', '17:00:00', 'birthday party.'),
('kasun', '0712345432', 3, '2023-12-30', '15:00:00', 'Friendship meeting'),
('sanu', '0711455232', 6, '2023-12-29', '19:36:00', 'Party'),
('jone', '0723456789', 9, '2023-12-31', '18:00:00', 'Year End Party.'),
('jone', '0812345678', 6, '2024-01-06', '11:30:00', 'birthday party'),
('mashi', '0771232165', 3, '2024-01-02', '09:00:00', 'birthday party.'),
('jone', '0776786567', 4, '2024-01-03', '11:00:00', 'lunch '),
('nethmi', '0711234567', 5, '2024-01-06', '18:00:00', 'birthday pary.'),
('nethmi', '0711234567', 5, '2024-01-06', '18:00:00', 'birthday pary.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'kasuni', 'kasuni@gmail.com', 'kasuni', 'admin'),
(2, 'hash', 'hash@gmail.com', 'hash', 'admin'),
(17, 'nethmi', 'nethmi@gmail.com', 'nethmi', 'user'),
(19, 'nikini', 'nikini@gmail.com', 'nikini', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
