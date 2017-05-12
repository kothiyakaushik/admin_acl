-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2017 at 10:23 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_ithub_five`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `user_id`, `state_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Ahemdabad', 0, 1, '1', NULL, NULL, NULL),
(3, 'Indeore', 0, 2, '1', NULL, NULL, NULL),
(4, 'Bhopal', 0, 2, '1', NULL, NULL, NULL),
(5, 'Mumbai', 0, 3, '1', NULL, NULL, NULL),
(6, 'Nagpur', 0, 3, '1', NULL, NULL, NULL),
(7, 'Karnal', 0, 4, '1', NULL, NULL, NULL),
(8, 'Sonipat1', 0, 2, '1', NULL, NULL, '2017-05-12 14:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'India', 1, '1', NULL, NULL, NULL),
(2, 'Nepal', 1, '1', NULL, NULL, NULL),
(3, 'Bhutan', 1, '1', NULL, NULL, NULL),
(5, 'Sri Lanka', 1, '1', NULL, NULL, NULL),
(6, 'China', 1, '1', NULL, NULL, NULL),
(7, 'Russia', 1, '1', NULL, '2017-05-04 04:28:31', NULL),
(8, 'United States of America', 1, '1', NULL, NULL, NULL),
(13, 'USA', 1, '1', '2017-05-04 04:34:28', '2017-05-04 04:34:28', NULL),
(16, 'sidney', 1, '1', '2017-05-04 05:30:03', '2017-05-04 05:30:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'orders', 'this is test only', '2017-05-03 23:19:32', '2017-05-03 23:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_05_03_093203_create_items_table', 1),
('2017_05_03_093217_entrust_setup_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'Display Role Listing', 'See only Listing Of Role', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(2, 'role-create', 'Create Role', 'Create New Role', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(3, 'role-edit', 'Edit Role', 'Edit Role', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(4, 'role-delete', 'Delete Role', 'Delete Role', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(5, 'item-list', 'Display Item Listing', 'See only Listing Of Item', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(6, 'item-create', 'Create Item', 'Create New Item', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(7, 'item-edit', 'Edit Item', 'Edit Item', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(8, 'item-delete', 'Delete Item', 'Delete Item', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(9, 'country-list', 'Display country Listing', 'See only Listing Of country', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(10, 'country-create', 'Create country', 'Create New country', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(11, 'country-edit', 'Edit country', 'Edit country', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(12, 'country-delete', 'Delete country', 'Delete country', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(13, 'state-list', 'Display state Listing', 'See only Listing Of state', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(14, 'state-create', 'State country', 'Create New state', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(15, 'state-edit', 'Edit state', 'Edit state', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(16, 'state-delete', 'Delete state', 'Delete state', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(17, 'pincode-list', 'Display pincode Listing', 'See only Listing Of pincode', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(18, 'pincode-create', 'State pincode', 'Create New pincode', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(19, 'pincode-edit', 'pincode state', 'Edit pincode', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(20, 'pincode-delete', 'Delete pincode', 'Delete pincode', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(21, 'city-list', 'Display city Listing', 'See only Listing Of city', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(22, 'city-create', 'city pincode', 'Create New city', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(23, 'city-edit', 'city state', 'Edit city', '2017-05-03 04:12:00', '2017-05-03 04:12:00'),
(24, 'city-delete', 'Delete city', 'Delete city', '2017-05-03 04:12:00', '2017-05-03 04:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pincodes`
--

CREATE TABLE `pincodes` (
  `id` int(11) NOT NULL,
  `pincode_no` varchar(15) NOT NULL,
  `city_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'master-admin', NULL, NULL, NULL),
(2, 'sub-admin', 'sub-admin', 'this is sub admin', NULL, '2017-05-03 23:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `user_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Gujarat', 1, 1, '1', NULL, NULL, NULL),
(2, 'Madhya Pradesh', 1, 1, '1', NULL, NULL, NULL),
(3, 'Haryana', 1, 1, '1', NULL, NULL, NULL),
(4, 'Panjab', 1, 1, '1', NULL, NULL, '2017-05-12 13:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 'admin@admin.com', '$2y$10$gwm2QrFHA9FgQ6GxKj44RepDAxB1GrWALw1TCtxTexrskCuFaUvz2', 'HPtplyvr5lVitxE9Qn7rzUUhw9JSEakA0WWqgL5TH7lcrdwj4uc7lYMN1HIR', '2017-05-03 05:21:55', '2017-05-04 05:21:19'),
(2, 'sagar', 'sagarr@webplanex.com', '$2y$10$ozkLbG4.Mud1JysAqlEQoOtGgRrkSSMe2IYimKWKx5XfagcvZP6cy', '9RktUbXjkqpJTSGS4MH9UVrins3ruByzS1C7WeXEydEDv3CF9fdTmD7jqbiJ', '2017-05-03 23:18:17', '2017-05-04 03:43:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `pincodes`
--
ALTER TABLE `pincodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `pincodes`
--
ALTER TABLE `pincodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
