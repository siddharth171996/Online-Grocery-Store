-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 12:15 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_id`, `username`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `image`) VALUES
(1, 'admin1', 'deeksha', 'phatte', 'dp@gmail.com', 'admin@123', '7894561233', 'goa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(20) NOT NULL,
  `P_id` int(20) NOT NULL,
  `uid` int(20) NOT NULL,
  `vid` int(20) NOT NULL,
  `Pname` varchar(50) NOT NULL,
  `P_quantity` int(20) NOT NULL,
  `Price` decimal(20,2) NOT NULL,
  `orig_price` decimal(20,2) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `P_id`, `uid`, `vid`, `Pname`, `P_quantity`, `Price`, `orig_price`, `image`) VALUES
(5, 3, 2, 2, 'Carrot', 3, '10.00', '30.00', 'img-4.jpg'),
(6, 1, 2, 2, 'Cauliflower', 2, '20.00', '50.00', 'img-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(20) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `status`, `image`) VALUES
(1, 'Fruits and Vegetables', 'Active', 'icon-1.svg'),
(6, 'Dairy & Eggs', 'Inactive', 'icon-3.svg'),
(7, 'Beverages', 'Active', 'icon-4.svg'),
(8, 'Snacks', 'Active', 'icon-5.svg'),
(9, 'Personal Care', 'Inactive', 'icon-8.svg');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `order_items_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `P_id` int(20) NOT NULL,
  `Price` decimal(50,2) NOT NULL,
  `quantity` int(20) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `vid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`order_items_id`, `order_id`, `P_id`, `Price`, `quantity`, `status`, `vid`) VALUES
(1, 25, 4, '45.00', 1, NULL, 1),
(3, 42, 4, '45.00', 1, NULL, 1),
(4, 43, 1, '20.00', 3, NULL, 2),
(5, 43, 3, '10.00', 4, NULL, 2),
(6, 48, 4, '45.00', 1, NULL, 1),
(7, 6, 1, '20.00', 1, NULL, 2),
(8, 7, 3, '10.00', 1, NULL, 2),
(9, 50, 4, '45.00', 2, NULL, 1),
(10, 51, 1, '20.00', 1, NULL, 2),
(11, 51, 3, '10.00', 5, NULL, 2),
(12, 52, 3, '10.00', 1, NULL, 2),
(13, 52, 1, '20.00', 1, NULL, 2),
(14, 53, 1, '20.00', 1, NULL, 2),
(15, 53, 3, '10.00', 12, NULL, 2),
(16, 54, 1, '20.00', 1, NULL, 2),
(17, 54, 3, '10.00', 2, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(20) NOT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `customer_id` int(20) NOT NULL,
  `vid` int(20) NOT NULL,
  `total_amount` decimal(50,2) NOT NULL,
  `order_date` datetime(5) NOT NULL,
  `status` varchar(20) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `delivery_time` time NOT NULL,
  `address_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `transaction_id`, `customer_id`, `vid`, `total_amount`, `order_date`, `status`, `payment_mode`, `delivery_time`, `address_id`) VALUES
(6, '3350b6200706ea981179', 1, 2, '40.00', '2020-06-30 13:04:28.00000', 'processing', 'online', '14:00:00', 1),
(7, '8f4c26c18fbc434e5ea1', 1, 2, '30.00', '2020-07-05 12:30:58.00000', 'processing', 'online', '00:00:00', 1),
(25, '0', 1, 1, '45.00', '2020-07-29 20:01:43.00000', 'processing', 'COD', '00:00:00', 1),
(42, '0', 1, 1, '45.00', '2020-07-29 20:49:39.00000', 'processing', 'COD', '00:00:00', 1),
(43, '0', 1, 1, '100.00', '2020-07-29 20:50:36.00000', 'processing', 'COD', '00:00:00', 2),
(48, '0', 1, 1, '45.00', '2020-07-29 23:03:03.00000', 'processing', 'COD', '00:00:00', 2),
(50, '0', 4, 1, '90.00', '2020-08-01 23:45:16.00000', 'processing', 'COD', '00:00:00', 3),
(51, '9414ac365a4ab3c7d965', 4, 2, '70.00', '2020-08-01 23:46:54.00000', 'processing', 'online', '00:00:00', 3),
(52, '0', 4, 2, '30.00', '2020-08-01 23:50:34.00000', 'processing', 'COD', '00:00:00', 3),
(53, '0', 4, 2, '140.00', '2020-08-02 00:01:51.00000', 'processing', 'COD', '00:00:00', 3),
(54, '0', 4, 2, '40.00', '2020-08-02 00:04:57.00000', 'processing', 'COD', '00:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Pid` int(20) NOT NULL,
  `Pname` varchar(50) NOT NULL,
  `cat_id` int(20) NOT NULL,
  `MRP` decimal(20,2) NOT NULL,
  `Discount_mrp` decimal(20,2) DEFAULT NULL,
  `quantity` int(20) NOT NULL,
  `Descp` varchar(200) NOT NULL,
  `image` varchar(50) NOT NULL,
  `vid` int(20) NOT NULL,
  `shop_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Pid`, `Pname`, `cat_id`, `MRP`, `Discount_mrp`, `quantity`, `Descp`, `image`, `vid`, `shop_id`) VALUES
(1, 'Cauliflower', 1, '50.00', '20.00', 5, '2kg farmed from belgao', 'img-1.jpg', 2, 2),
(3, 'Carrot', 1, '30.00', '10.00', 25, '1kg', 'img-4.jpg', 2, 2),
(4, 'Eggs', 6, '60.00', '45.00', 12, 'Nutrition rich Eggs', 'img-15.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(20) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `shop_image` varchar(100) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `status` varchar(50) NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(50) DEFAULT NULL,
  `gst_no` varchar(50) NOT NULL,
  `license_no` int(50) NOT NULL,
  `vid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shop_id`, `shop_name`, `shop_image`, `open_time`, `close_time`, `status`, `street_address`, `city`, `state`, `pincode`, `gst_no`, `license_no`, `vid`) VALUES
(1, 'DeeMart', 'Gro1.jpg', '08:00:00', '18:00:00', 'Active', 'kothrud', 'Pune', 'Maharashtra', 411038, 'abcde1234', 12345679, 1),
(2, 'SuperSid Mart', 'Gro3.jpg', '09:00:00', '22:00:00', 'Active', 'Rambaugh colony', 'Pune', 'Maharashtra', 411038, 'siddd1234', 987654321, 2),
(3, 'purumart', 'Gro4.jpg', '15:00:00', '23:00:00', 'Active', 'khorlim', 'Mapusa', 'Goa', 403507, 'purupuru123', 12345678, 10),
(4, 'rutumart', 'Gro5.jpg', '10:00:00', '21:00:00', 'InActive', 'Talegao', 'Panaji', 'Goa', 403507, 'qwerty12345', 123456789, 11),
(9, 'Bagaytdar', 'Gro5.jpg', '09:00:00', '15:00:00', 'Active', 'khorlim', 'Mapusa', 'Goa', 403507, 'qwerty123', 11019876, 9);

-- --------------------------------------------------------

--
-- Table structure for table `shopreq`
--

CREATE TABLE `shopreq` (
  `req_id` int(20) NOT NULL,
  `owner_nm` varchar(100) NOT NULL,
  `shop_nm` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gst_no` varchar(100) NOT NULL,
  `phone` int(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `verified` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopreq`
--

INSERT INTO `shopreq` (`req_id`, `owner_nm`, `shop_nm`, `email`, `gst_no`, `phone`, `address`, `verified`) VALUES
(1, 'Deeksha ', 'HappyMart', 'dp@gmail.com', 'qwerty12345', 12345678, 'Hno. 78', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `useraddress`
--

CREATE TABLE `useraddress` (
  `add_id` int(20) NOT NULL,
  `uid` int(20) NOT NULL,
  `address_name` varchar(500) NOT NULL,
  `locality` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(20) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraddress`
--

INSERT INTO `useraddress` (`add_id`, `uid`, `address_name`, `locality`, `city`, `state`, `pincode`, `type`) VALUES
(1, 1, 'H.No. 111 Sainagar, Sirsaim,Assonora Bardez Goa', 'Assonora', 'Mapusa', 'Goa', 403503, 'Home'),
(2, 1, 'Flat no.14, Kashinath Apts, Rambaugh Colony', 'Kothrud', 'Pune', 'Maharashtra', 411038, 'Office'),
(3, 4, 'Hno.111  near bandeshwar temple', 'banda bus stop', 'banda', 'Maharashtra', 411036, 'Home');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(20) NOT NULL,
  `uidUsers` varchar(50) NOT NULL,
  `uemail` varchar(50) DEFAULT NULL,
  `upassword` varchar(100) NOT NULL,
  `uphone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uidUsers`, `uemail`, `upassword`, `uphone`) VALUES
(1, 'Deeksha', 'd@gmail.com', '$2y$10$L5FjagxQnl3/TgGbi0MU.uWYEeIoUxefuIlA8hNDGgngJ6rXlW9n2', '7894561233'),
(2, 'siddharth', 's@gmail.com', '$2y$10$slfPaRyYVebXr1jM9CC5ie0CDgCyQcUCM3lfYHOBoREsJX3oAm6Aa', '7038432798'),
(3, 'Raveena', 'r@gmail.com', '$2y$10$U05pRs.fcrJozWN./vNUN.BKgXQ08oqW0FL1EFKVZ27CagoE7mAFu', '9422061765'),
(4, 'Sarvesha', 'saru@gmail.com', '$2y$10$KvPfulMKfdH5jFNaCuwVSuSaIs6.GPNF3YQ9uX0akicnlPtT5ScXG', '8459457934');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vid` int(20) NOT NULL,
  `vname` varchar(20) NOT NULL,
  `vemail` varchar(50) NOT NULL,
  `vphone` varchar(20) NOT NULL,
  `vpassword` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vid`, `vname`, `vemail`, `vphone`, `vpassword`, `address`) VALUES
(1, 'Raveena', 'r@gmail.com', '7038432798', '$2y$10$vmIfXhUx/LBn3fghloNryehHUeecpmthkVqWRiRNB4cOFYeT.09I2', 'Mapusa,Goa'),
(2, 'Sid', 'sid@gmail.com', '7038432798', '$2y$10$4JpWkWfxiFJLDh7RePvNeuqoy5ysByB33ExFVHo/ckP4XGhOZDIKu', 'Pune,Maharashtra'),
(9, 'Deeksha', 'dp@gmail.com', '9923653099', '$2y$10$lVsOS239B6CnMGpCh4CG/OnOBGw/QU9mvcnAYhtwYviSGkv0aJtAa', ''),
(10, 'purva', 'puru@gmail.com', '8999386180', '$2y$10$v6zcuFqJO9DB3Nf8QATF0erXXPYJunU1NBxD0o3JnXMuDclpslaE.', ''),
(11, 'Rutwik', 'rutu@gmail.com', '9765528078', '$2y$10$wo4WMoCcKvVTqgsy/QAPJOyOuLn.RvfyBeYUYtdiU/q4GwL2qFrqq', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_id` int(20) NOT NULL,
  `Product_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `P_id` (`P_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `vid` (`vid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`order_items_id`),
  ADD KEY `P_id` (`P_id`),
  ADD KEY `vid` (`vid`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Pid`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `vid` (`vid`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`),
  ADD KEY `vid` (`vid`);

--
-- Indexes for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD PRIMARY KEY (`add_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `A_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `order_items_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Pid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `useraddress`
--
ALTER TABLE `useraddress`
  MODIFY `add_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`P_id`) REFERENCES `product` (`Pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`vid`) REFERENCES `vendor` (`vid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`P_id`) REFERENCES `product` (`Pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`vid`) REFERENCES `vendor` (`vid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderitems_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `useraddress` (`add_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`vid`) REFERENCES `vendor` (`vid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`vid`) REFERENCES `vendor` (`vid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD CONSTRAINT `useraddress_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
