-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Aug 26. 16:38
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `cargogo`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `username`, `password`) VALUES
(1, 'admin@admin.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `brands`
--

INSERT INTO `brands` (`brand_id`, `brand`) VALUES
(1, 'Audi'),
(2, 'BMW'),
(3, 'Mercedes'),
(4, 'Ford'),
(12, 'Chevrolet'),
(13, 'Lamborghini');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cars`
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
-- A tábla adatainak kiíratása `cars`
--

INSERT INTO `cars` (`car_id`, `brand_id`, `model`, `prod_year`, `seats`, `engine_size`, `fuel_type`, `trans_type`, `pic_name`) VALUES
(17, 1, 'R8', '2020', 2, '6000 cc', 'Benzin', 'Automata', 'audi_r8.jpg'),
(18, 1, 'A4', '2023', 5, '5000 cc', 'Benzin', 'Manual', 'audi_a4.jpg'),
(19, 2, 'M3', '2002', 5, '3200 cc', 'Benzin', 'Manual', 'bmw_e46.jpg'),
(20, 2, 'X6', '2016', 5, '4500 cc', 'Benzin', 'Automata', 'bmw_x6.jpg'),
(21, 3, 'AMG', '2009', 2, '6000 cc', 'Benzin', 'Automata', 'merc_amg.jpg'),
(22, 3, 'C63', '2020', 5, '2000 cc', 'Diesel', 'Automata', 'merc_c63.jpg'),
(23, 4, 'Focus', '2009', 5, '2500 cc', 'Benzin', 'Manual', 'ford_focus.jpg'),
(25, 5, 'Impreza', '2006', 5, '2500 cc', 'Benzin', 'Manual', 'subaru_impreza.jpg'),
(27, 6, 'LaFerrari', '2023', 2, '7000 cc', 'Benzin', 'Automata', 'ferrari_laferrari.jpg'),
(37, 12, 'Aveo', '2009', 4, '1500', 'Benzin', 'Manual', 'chevrolet_aveo.jpg'),
(38, 13, 'Huracan', '2020', 2, '6000 cc', 'Benzin', 'Automata', 'lambo_huracan.jpg'),
(39, 4, 'GT', '2002', 2, '6000 cc', 'Benzin', 'Manual', 'ford_gt.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `car_ratings`
--

CREATE TABLE `car_ratings` (
  `rating_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `rating` int(2) NOT NULL,
  `description` varchar(60) NOT NULL,
  `rate_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `car_ratings`
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
-- Tábla szerkezet ehhez a táblához `completed_orders`
--

CREATE TABLE `completed_orders` (
  `comp_order_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `personal_id` varchar(13) NOT NULL,
  `drivers_id` varchar(9) NOT NULL,
  `location` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `reg_date` date NOT NULL,
  `is_blocked` tinyint(1) NOT NULL,
  `verification` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `customers`
--

INSERT INTO `customers` (`customer_id`, `fname`, `lname`, `personal_id`, `drivers_id`, `location`, `email`, `username`, `password`, `reg_date`, `is_blocked`, `verification`) VALUES
(6, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd@gmail.com', 'asd', '$2y$10$zvH8fD0NwKhIxREDXbHEEu3ltCCcbq.Wf42RbMyVL36f61BLmfby6', '2023-08-26', 0, '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `drivers`
--

CREATE TABLE `drivers` (
  `drive_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `employee_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `order_time` int(2) NOT NULL,
  `order_date` date NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `drivers`
--

INSERT INTO `drivers` (`drive_id`, `car_id`, `customer_id`, `employee_id`, `order_id`, `order_time`, `order_date`, `price`) VALUES
(12, 38, 6, 1, 21, 12, '2023-09-23', '300.00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `personal_id` varchar(13) NOT NULL,
  `drivers_id` varchar(9) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `employee_username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `is_blocked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `employees`
--

INSERT INTO `employees` (`employee_id`, `fname`, `lname`, `personal_id`, `drivers_id`, `phone`, `location`, `email`, `employee_username`, `password`, `is_blocked`) VALUES
(1, 'asdasd', 'Takarics', '2147483647', '859645', '0692125355', 'BEOGRAD', 'ntakarics@gmail.com', 'employee', 'employee', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `order_time` int(2) NOT NULL,
  `order_date` date NOT NULL,
  `driver` int(1) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `car_id`, `order_time`, `order_date`, `driver`, `price`) VALUES
(19, 6, 21, 12, '2023-08-23', 0, '100.00');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- A tábla indexei `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- A tábla indexei `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `brand_id` (`brand_id`) USING BTREE;

--
-- A tábla indexei `car_ratings`
--
ALTER TABLE `car_ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `car_id` (`car_id`);

--
-- A tábla indexei `completed_orders`
--
ALTER TABLE `completed_orders`
  ADD PRIMARY KEY (`comp_order_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `car_id` (`car_id`);

--
-- A tábla indexei `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- A tábla indexei `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`drive_id`),
  ADD KEY `car_id` (`car_id`) USING BTREE,
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `order_id` (`order_id`);

--
-- A tábla indexei `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`) USING BTREE,
  ADD KEY `car_id` (`car_id`) USING BTREE;

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT a táblához `car_ratings`
--
ALTER TABLE `car_ratings`
  MODIFY `rating_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `completed_orders`
--
ALTER TABLE `completed_orders`
  MODIFY `comp_order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `drivers`
--
ALTER TABLE `drivers`
  MODIFY `drive_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
