-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2017 at 06:02 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taxifare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `username`, `email`, `mobile`, `image`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Raju', 'Raj', 'admin', 'admin@admin.com', '9839293222', NULL, '$2y$10$MUfiUg01Qb.49Dqgmxden.sWv/RF2/wIRVwtAe5g8V5CoBxuN9Amu', 1, '43PDy8k3F4140HNiZ9dFDGC11pRX9f2rVonKhWnFX2CRovhtDuUwqsIu4SAG', NULL, '2017-08-31 01:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suburb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fb_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pinterest_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `company_name`, `phone_number`, `email`, `country`, `state`, `city`, `suburb`, `street_address`, `postal_code`, `fb_link`, `twitter_link`, `skype_id`, `linkedin_address`, `instagram_address`, `pinterest_address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hello', '+1 2345543', 'taxifare@gmail.com', 'United States', 'Californias', 'Sacramento', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2017-08-30 22:26:58', '2017-08-30 22:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE IF NOT EXISTS `drivers` (
  `id` int(10) unsigned NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `fullname`, `email`, `username`, `password`, `image`, `phone_number`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nabin Khatri', 'driver@driver.com', 'submenabin', '$2y$10$67H71aDpoHlhfFxeItsP0.mgqHinli0q0GksOBlkHdcjex2l9dy1S', 'images/DriverImage/kavyansh_new5.jpg', '9841981466', 1, 'MOFC7eiuE4z0q3otZz71Ylye4tls9GxchKLLv9QXGdqWPYvt8azo1Omlzz8k', '2017-08-28 00:59:28', '2017-08-31 02:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `mail_logs`
--

CREATE TABLE IF NOT EXISTS `mail_logs` (
  `id` int(10) unsigned NOT NULL,
  `booking_id` int(10) unsigned NOT NULL,
  `sender_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `messages` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mail_logs`
--

INSERT INTO `mail_logs` (`id`, `booking_id`, `sender_address`, `receiver_address`, `subject`, `messages`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'admin@admin.com', 'driver@driver.com', 'mail sent', 'Hello mail is sent', 0, '2017-08-29 21:26:29', '2017-08-29 22:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2017_08_15_030623_create_admins_table', 1),
(8, '2017_08_20_074820_create_taxi_bookings_table', 2),
(12, '2017_08_24_030912_create_mail_logs_table', 3),
(14, '2017_08_28_024623_create_drivers_table', 4),
(15, '2017_08_31_033244_create_contacts_table', 5),
(16, '2017_08_31_043019_create_taxi_fares_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxi_bookings`
--

CREATE TABLE IF NOT EXISTS `taxi_bookings` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `no_passenger` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pickup_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pickup_date` date DEFAULT NULL,
  `start_location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estimated_fare` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_logged_in` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taxi_bookings`
--

INSERT INTO `taxi_bookings` (`id`, `user_id`, `no_passenger`, `pickup_time`, `pickup_date`, `start_location`, `end_location`, `estimated_fare`, `is_logged_in`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, '1', '11:45 AM', '2017-08-22', 'Sacramento County, CA, United States', 'Sacramento Street, Berkeley, CA, United States', '231.5004', 'Y', 1, '2017-08-22 00:11:49', '2017-08-22 00:11:49'),
(4, 2, '1', '12:00 PM', '2017-08-22', 'California Street, San Francisco, CA, United States', 'Sacramento Street, San Francisco, CA, United States', '6.35484', 'Y', 1, '2017-08-22 00:23:53', '2017-08-22 00:23:53'),
(5, 3, '1', '9:45 AM', '2017-08-25', 'Cason Trail, Murfreesboro, TN, United States', 'Cason Square Boulevard, Murfreesboro, TN, United States', '6.60528', 'Y', 1, '2017-08-24 22:06:41', '2017-08-24 22:06:41'),
(6, 2, '1', '12:00 PM', '2017-08-30', 'California 1, Mill Valley, CA, United States', 'California Street, San Francisco, CA, United States', '32.4006', 'Y', 1, '2017-08-30 00:26:22', '2017-08-30 00:26:22'),
(7, 2, '5', '4:30 PM', '2017-08-30', 'Sacramento, CA, United States', 'Sacramento Street, San Francisco, CA, United States', '223.23588', 'Y', 1, '2017-08-30 01:49:31', '2017-08-30 01:49:31'),
(8, 2, '4', '1:30 PM', '2017-08-31', 'Sacramento Street, San Francisco, CA, United States', '2nd Avenue, Sacramento, CA, United States', '230.2482', 'Y', 1, '2017-08-30 01:55:00', '2017-08-30 01:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `taxi_fares`
--

CREATE TABLE IF NOT EXISTS `taxi_fares` (
  `id` int(10) unsigned NOT NULL,
  `taxi_initial_fare` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taxi_fares`
--

INSERT INTO `taxi_fares` (`id`, `taxi_initial_fare`, `tax`, `status`, `created_at`, `updated_at`) VALUES
(1, '3', '20', 1, '2017-08-31 00:27:11', '2017-08-31 00:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `username`, `email`, `Mobile`, `image`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Nabin', NULL, 'Khatri', 'khatrinabin', 'submergednabin@gmail.com', '9841981466', 'images/clientsImage/kavyansh_new5.jpg', '$2y$10$JXJGTiMp.AAMUGuogQzT..9LUzIJedMsksGKNrzEn1DF4SNfB4Qyi', 1, 'K7DQZHHsCOdGmJJYwpJhTdDEhepdKnvtbEJnw0nwdzkcpsY2znWmWvXKG0B8', '2017-08-22 00:02:51', '2017-08-22 00:02:51'),
(3, 'Girish', NULL, 'Bro', 'girishbro', 'girishk@g.com', '9841981222', 'images/clientsImage/gallery1.jpg', '$2y$10$HqufqT1VF7D7qSsWcYKpmeUKz9s5j71/sgv20mxrDLBjE9AkZ8XJK', 1, 'tKK8EdSpOpFUapKWHuwbES1oJ8LsXeD86ABNc45dvghAujAzUa5gbEGITkqb', '2017-08-24 22:05:04', '2017-08-24 22:05:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_logs`
--
ALTER TABLE `mail_logs`
  ADD PRIMARY KEY (`id`), ADD KEY `mail_logs_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `taxi_bookings`
--
ALTER TABLE `taxi_bookings`
  ADD PRIMARY KEY (`id`), ADD KEY `taxi_bookings_user_id_foreign` (`user_id`);

--
-- Indexes for table `taxi_fares`
--
ALTER TABLE `taxi_fares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mail_logs`
--
ALTER TABLE `mail_logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `taxi_bookings`
--
ALTER TABLE `taxi_bookings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `taxi_fares`
--
ALTER TABLE `taxi_fares`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mail_logs`
--
ALTER TABLE `mail_logs`
ADD CONSTRAINT `mail_logs_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `taxi_bookings` (`id`);

--
-- Constraints for table `taxi_bookings`
--
ALTER TABLE `taxi_bookings`
ADD CONSTRAINT `taxi_bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
