-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2019 at 04:55 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `airplanes`
--

CREATE TABLE `airplanes` (
  `id` int(10) UNSIGNED NOT NULL,
  `airplane_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `airplanes`
--

INSERT INTO `airplanes` (`id`, `airplane_name`, `created_at`, `updated_at`) VALUES
(1, 'Vietnam Airlines', NULL, NULL),
(2, 'VietJet Air', NULL, NULL),
(3, 'Japan Airlines', NULL, NULL),
(4, 'Bamboo Airways', NULL, NULL),
(5, 'China Airways', NULL, NULL),
(6, 'American Airlines', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `id` int(10) UNSIGNED NOT NULL,
  `airport_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `airport_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`id`, `airport_name`, `airport_code`, `city_name`, `created_at`, `updated_at`) VALUES
(1, 'Noi Bai', 'HAN', 'Ha Noi', NULL, NULL),
(2, 'Tan Son Nhat', 'SGN', 'Ho Chi Minh City', NULL, NULL),
(3, 'Tokyo International Airport', 'HND', 'Tokyo', NULL, NULL),
(4, 'Hokaido Airport', 'HKO', 'Hokaido', NULL, NULL),
(5, 'Shanghai International Airport', 'SHI', 'Shanghai', NULL, NULL),
(6, 'Beijing International Airport', 'BEG', 'Beijing', NULL, NULL),
(7, 'Kennendy International Airport', 'KEN', 'New York', NULL, NULL),
(8, 'San Francisco International Airport', 'SAN', 'San Francisco', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_list`
--

CREATE TABLE `booking_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total_passenger` int(11) NOT NULL DEFAULT '0',
  `total_cost` int(11) NOT NULL DEFAULT '0',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ccv_code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flight_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_list`
--

INSERT INTO `booking_list` (`id`, `user_id`, `total_passenger`, `total_cost`, `payment_method`, `card_number`, `name_card`, `ccv_code`, `flight_id`, `created_at`, `updated_at`) VALUES
(60, 5, 1, 2000000, 'transfer', '21312321321321', 'tiencao', '111', 20, '2019-03-29 09:46:14', '2019-03-29 09:46:14'),
(61, 5, 2, 4000000, 'transfer', '3213213213213', 'caotien', '111', 20, '2019-03-29 09:46:50', '2019-03-29 09:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'Viet Nam', NULL, NULL),
(2, 'Japan', NULL, NULL),
(3, 'China', NULL, NULL),
(4, 'America', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` int(10) UNSIGNED NOT NULL,
  `flight_class_id` int(10) UNSIGNED NOT NULL,
  `flight_type` int(10) UNSIGNED NOT NULL,
  `flight_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flight_airplane_id` int(10) UNSIGNED NOT NULL,
  `flight_total_passenger` int(11) NOT NULL DEFAULT '0',
  `flight_cost` int(11) NOT NULL DEFAULT '0',
  `flight_airport_from_id` int(10) UNSIGNED NOT NULL,
  `flight_airport_to_id` int(10) UNSIGNED NOT NULL,
  `flight_departure_date` date DEFAULT NULL,
  `flight_return_date` date DEFAULT NULL,
  `flight_departure_time` datetime NOT NULL,
  `flight_arrival_time` datetime NOT NULL,
  `duration` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `flight_class_id`, `flight_type`, `flight_code`, `flight_airplane_id`, `flight_total_passenger`, `flight_cost`, `flight_airport_from_id`, `flight_airport_to_id`, `flight_departure_date`, `flight_return_date`, `flight_departure_time`, `flight_arrival_time`, `duration`, `created_at`, `updated_at`) VALUES
(20, 1, 1, 'FC001', 1, 0, 2000000, 1, 2, '2019-04-01', NULL, '2019-04-01 22:00:00', '2019-04-01 23:00:00', '01:00:00', '2019-03-29 08:05:00', '2019-03-29 08:05:00'),
(21, 2, 2, 'FC002', 2, 0, 2000000, 2, 1, '2019-04-02', '2019-04-02', '2019-04-02 03:00:00', '2019-04-02 05:00:00', '02:00:00', '2019-03-29 08:06:26', '2019-03-29 08:06:26'),
(22, 3, 2, 'FC003', 5, 0, 6000000, 5, 2, '2019-04-03', '2019-04-04', '2019-04-03 23:00:00', '2019-04-04 02:00:00', '03:00:00', '2019-03-29 08:08:04', '2019-03-29 08:08:04'),
(23, 1, 1, 'FC004', 3, 0, 3000000, 3, 5, '2019-04-05', NULL, '2019-04-05 01:00:00', '2019-04-05 22:00:00', '21:00:00', '2019-03-29 08:09:28', '2019-03-29 08:09:28'),
(24, 1, 2, 'FC005', 6, 0, 30000000, 8, 1, '2019-04-06', '2019-04-09', '2019-04-06 01:00:00', '2019-04-09 19:00:00', '18:00:00', '2019-03-29 08:11:19', '2019-03-29 08:11:19'),
(25, 3, 1, 'FC006', 2, 0, 3000000, 1, 5, '2019-04-10', NULL, '2019-04-10 01:15:00', '2019-04-10 05:10:00', '03:55:00', '2019-03-29 08:15:24', '2019-03-29 08:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `flight_classes`
--

CREATE TABLE `flight_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `flight_class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flight_classes`
--

INSERT INTO `flight_classes` (`id`, `flight_class_name`, `created_at`, `updated_at`) VALUES
(1, 'Economy', NULL, NULL),
(2, 'Business', NULL, NULL),
(3, 'Premium Economy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_06_024258_create_flights_table', 1),
(4, '2019_03_06_032825_create_flight_classes_table', 1),
(5, '2019_03_06_041007_create_airplanes_table', 1),
(6, '2019_03_06_041051_create_airports_table', 1),
(7, '2019_03_12_032612_create_countries_table', 1),
(8, '2019_03_22_122123_create_passenger_table', 2),
(9, '2019_03_22_124410_create_booking_list_table', 2),
(10, '2019_03_22_125557_create_booking_list_table', 3),
(11, '2019_03_22_150146_create_passenger_table', 4),
(12, '2019_03_22_150301_create_booking_list_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pas_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pas_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flight_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `title`, `pas_first_name`, `pas_last_name`, `flight_id`, `user_id`, `created_at`, `updated_at`) VALUES
(71, 'mr', 'tiến', 'cao', 20, 5, '2019-03-29 09:46:13', '2019-03-29 09:46:13'),
(72, 'mr', 'cao', 'tiến', 20, 5, '2019-03-29 09:46:50', '2019-03-29 09:46:50'),
(73, 'mr', 'tiến', 'cao', 20, 5, '2019-03-29 09:46:50', '2019-03-29 09:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dob`, `gender`, `phone`, `address`, `isAdmin`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Bùi Văn Phúc', 'phucbui@gmail.com', '$2y$10$t1OqxbW1k.VsErB8UyrFvujpggseK0LrtDVr908Rcz8lnAfW5m/VO', NULL, NULL, '1111111111', NULL, NULL, 'NgH9rVQYFeqRvlfZaxk1KtOfpCRONVxZDTjk3iqvVVDMMg55Zi9N5bA5B6LI', '2019-03-28 19:13:06', '2019-03-28 19:13:06'),
(5, 'Cao Lê Viết Tiến', 'tiencao@gmail.com', '$2y$10$Gc6bHYg1llQhzeSR40pYmuNr.bpY2yUeB4E7VwY3weeVK6G85e7vu', NULL, NULL, '2222222222', NULL, NULL, 'b1TszNIn77SKF1ADqnjEk9auHfBP7UieYfjnuqv8F3GQMKQqaUoVdwVLBvK9', '2019-03-28 19:13:44', '2019-03-28 19:13:44'),
(6, 'Lê Văn Trí', 'trile@gmail.com', '$2y$10$0agFJg86Y84WitE.t4Y54ukN8pIAnXdxXqDNDl90OqzfmErVnK8sS', NULL, NULL, '3333333333', NULL, NULL, 'ZaQdSMG6vRRTA9IQK11aOZP6pwwvJUgqABtH0FGr2N0QqEX0uEI1qZIyvtn4', '2019-03-28 19:14:21', '2019-03-28 19:14:21'),
(7, 'Trần Thanh Duy', 'duytran@gmail.com', '$2y$10$4on9QV1lDRfuiQ/ZU.B1qOZKSBTZdIO3PqtZfOUg8gJK9dpnBRyq2', NULL, NULL, '4444444444', NULL, NULL, 'NO4cfPvppq2BlITkJCCFaaVJluBuQjfEmAGsY9E2ImwXaWZAIZzBcM1N9drL', '2019-03-28 19:14:51', '2019-03-28 19:14:51'),
(8, 'Phạm Minh Thuận', 'thuanpham@gmail.com', '$2y$10$3pmaf71hiCZz1ljk0.kw5.XiQCSSu/OZplVHTdxb1BgFqwQhKtdiy', NULL, NULL, '5555555555', NULL, NULL, 'NTmrUQhs7vQj2popjB8kqiLX9F03jc3TRBa11GFy3iUJ2z1pvhTA3XU2KjUV', '2019-03-28 19:15:18', '2019-03-28 19:15:18'),
(9, 'ADMIN', 'admin@gmail.com', '$2y$10$k6V.lctJrtvVGZhW.RTbIeBLtSxZodNxRwwtQFaLDeGAqHTHtC3BS', NULL, NULL, '5555555554', NULL, 1, 'WoMeyydqAcMYzZ2GuOsV81NropqXK7Wkkkzv5IJ7e4MfrE4k3uNQbz1bSKxi', '2019-03-28 19:17:17', '2019-03-28 19:17:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airplanes`
--
ALTER TABLE `airplanes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight_classes`
--
ALTER TABLE `flight_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airplanes`
--
ALTER TABLE `airplanes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `booking_list`
--
ALTER TABLE `booking_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `flight_classes`
--
ALTER TABLE `flight_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
