-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2023 at 02:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cargogo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `username`, `password`) VALUES
(1, 'admin@admin.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand`) VALUES
(1, 'Audi'),
(2, 'BMW'),
(3, 'Mercedes'),
(4, 'Ford'),
(5, 'Subaru'),
(6, 'Ferrari'),
(7, 'Bugatti'),
(9, 'McLaren'),
(11, 'Bentley'),
(12, 'Chevrolet'),
(13, 'Lamborghini');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `model` varchar(20) NOT NULL,
  `prod_year` varchar(4) NOT NULL,
  `seats` int(1) NOT NULL,
  `engine_size` varchar(10) NOT NULL,
  `fuel_type` varchar(20) NOT NULL,
  `trans_type` varchar(10) NOT NULL,
  `pic_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `brand_id`, `model`, `prod_year`, `seats`, `engine_size`, `fuel_type`, `trans_type`, `pic_name`) VALUES
(17, 1, 'R8', '2002', 1, '1', '1', '1', 'audi_r8.jpg'),
(18, 1, 'A4', '2002', 1, '1', '1', '1', 'audi_a4.jpg'),
(19, 2, 'M3', '2002', 1, '1', '1', '1', 'bmw_e46.jpg'),
(20, 2, 'X6', '2002', 1, '1', '1', '1', 'bmw_x6.jpg'),
(21, 3, 'AMG', '2002', 1, '1', '1', '1', 'merc_amg.jpg'),
(22, 3, 'C63', '2002', 1, '1', '1', '1', 'merc_c63.jpg'),
(23, 4, 'Focus', '2002', 1, '1', '1', '1', 'ford_focus.jpg'),
(24, 4, 'GT', '2002', 1, '1', '1', '1', 'ford_gt.jpg'),
(25, 5, 'Impreza', '2002', 1, '1', '1', '1', 'subaru_impreza.jpg'),
(26, 5, 'Forester', '2002', 1, '1', '1', '1', 'subaru_forester.jpg'),
(27, 6, 'LaFerrari', '2002', 1, '1', '1', '1', 'ferrari_laferrari.jpg'),
(28, 6, 'F40', '2002', 1, '1', '1', '1', 'ferrari_f40.jpg'),
(29, 7, 'Chiron', '2002', 1, '1', '1', '1', 'bugatti_chiron.jpg'),
(30, 7, 'Veyron', '2002', 1, '1', '1', '1', 'bugatti_veyron.jpg'),
(33, 9, 'F1', '2002', 1, '1', '1', '1', 'mclaren_f1.jpg'),
(35, 9, 'MP4', '2002', 1, '1', '1', '1', 'mclaren_mp4.jpg'),
(36, 11, 'Continental', '2002', 1, '1', '1', '1', 'bentley_continental.jpg'),
(37, 12, 'Aveo', '2009', 4, '1500', 'Benzin', '5', 'Aveo'),
(38, 13, 'Hurricane', '2009', 4, '1500', 'Benzin', '5', 'amdlog.png');

-- --------------------------------------------------------

--
-- Table structure for table `car_ratings`
--

CREATE TABLE `car_ratings` (
  `rating_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `rating` int(2) NOT NULL,
  `description` varchar(60) NOT NULL,
  `rate_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_ratings`
--

INSERT INTO `car_ratings` (`rating_id`, `car_id`, `rating`, `description`, `rate_date`) VALUES
(1, 17, 5, 'Jó', '2023-08-23'),
(2, 18, 6, 'Jó', '2023-08-23'),
(3, 19, 3, 'Jó', '2023-08-23'),
(4, 20, 4, 'Jó', '2023-08-23'),
(5, 21, 8, 'Jó', '2023-08-23'),
(6, 22, 6, 'Jó', '2023-08-23'),
(7, 23, 1, 'Jó', '2023-08-23'),
(8, 24, 10, 'Jó', '2023-08-23'),
(9, 25, 4, 'Jó', '2023-08-23'),
(10, 26, 7, 'Jó', '2023-08-23'),
(11, 27, 9, 'Jó', '2023-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `completed_orders`
--

CREATE TABLE `completed_orders` (
  `comp_order_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `personal_id` bigint(13) NOT NULL,
  `drivers_id` bigint(9) NOT NULL,
  `location` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `fname`, `lname`, `personal_id`, `drivers_id`, `location`, `email`, `username`, `password`, `reg_date`) VALUES
(1, 'Custo', 'Mer', 2406002850013, 7053, 'PS ZITISTE', 'customer@gmail.com', 'customer', 'customer', '2023-07-31'),
(2, 'Vásár', 'torda', 0, 0, '', 'vasarlo@gmail.com', 'vasarlo', 'vasarlo', '2023-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `drive_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `employee_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `order_time` int(2) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`drive_id`, `car_id`, `customer_id`, `employee_id`, `order_id`, `order_time`, `order_date`) VALUES
(9, 19, 1, 1, 17, 36, '2023-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `personal_id` int(13) NOT NULL,
  `drivers_id` int(9) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `employee_username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `fname`, `lname`, `personal_id`, `drivers_id`, `phone`, `location`, `email`, `employee_username`, `password`) VALUES
(1, 'Norbert', 'Takarics', 2147483647, 859645, '0692125355', 'BEOGRAD', 'ntakarics@gmail.com', 'employee', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `order_time` int(2) NOT NULL,
  `order_date` date NOT NULL,
  `driver` int(1) NOT NULL,
  `price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `car_id`, `order_time`, `order_date`, `driver`, `price`) VALUES
(2, 1, 24, 12, '2023-08-31', 0, '0.00'),
(4, 1, 19, 48, '2023-08-31', 0, '0.00'),
(5, 1, 24, 24, '2023-09-07', 0, '0.00'),
(6, 1, 20, 36, '2024-01-01', 0, '0.00'),
(8, 1, 27, 24, '2023-09-28', 0, '0.00'),
(10, 1, 19, 24, '2023-11-30', 0, '0.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `brand_id` (`brand_id`) USING BTREE;

--
-- Indexes for table `car_ratings`
--
ALTER TABLE `car_ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `completed_orders`
--
ALTER TABLE `completed_orders`
  ADD PRIMARY KEY (`comp_order_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`drive_id`),
  ADD KEY `car_id` (`car_id`) USING BTREE,
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`) USING BTREE,
  ADD KEY `car_id` (`car_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `car_ratings`
--
ALTER TABLE `car_ratings`
  MODIFY `rating_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `completed_orders`
--
ALTER TABLE `completed_orders`
  MODIFY `comp_order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `drive_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
