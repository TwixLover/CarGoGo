-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Aug 24. 18:30
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
(5, 'Subaru'),
(6, 'Ferrari'),
(7, 'Bugatti'),
(9, 'McLaren');

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
(35, 9, 'MP4', '2002', 1, '1', '1', '1', 'mclaren_mp4.jpg');

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
  `price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `customers`
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
-- A tábla adatainak kiíratása `customers`
--

INSERT INTO `customers` (`customer_id`, `fname`, `lname`, `personal_id`, `drivers_id`, `location`, `email`, `username`, `password`, `reg_date`) VALUES
(1, 'Custo', 'Mer', 2406002850013, 7053, 'PS ZITISTE', 'customer@gmail.com', 'customer', 'customer', '2023-07-31');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `drivers`
--

CREATE TABLE `drivers` (
  `drive_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `employee_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `drivers`
--

INSERT INTO `drivers` (`drive_id`, `car_id`, `customer_id`, `employee_id`, `order_id`) VALUES
(5, 24, 1, 1, 15);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `employees`
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
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `employees`
--

INSERT INTO `employees` (`employee_id`, `fname`, `lname`, `personal_id`, `drivers_id`, `phone`, `location`, `email`, `username`, `password`) VALUES
(1, 'Norbert', 'Takarics', 2147483647, 859645, '0692125355', 'BEOGRAD', 'ntakarics@gmail.com', 'employee', 'employee');

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
  `price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `car_id`, `order_time`, `order_date`, `driver`, `price`) VALUES
(2, 1, 24, 12, '2023-08-31', 0, '0.00'),
(4, 1, 19, 48, '2023-08-31', 0, '0.00'),
(5, 1, 24, 24, '2023-09-07', 0, '0.00'),
(6, 1, 20, 36, '2024-01-01', 0, '0.00'),
(8, 1, 27, 24, '2023-09-28', 0, '0.00'),
(10, 1, 19, 24, '2023-11-30', 0, '0.00'),
(12, 1, 19, 36, '2023-11-04', 1, '0.00'),
(14, 1, 24, 12, '2023-09-22', 1, '0.00');

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
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `drivers`
--
ALTER TABLE `drivers`
  MODIFY `drive_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
