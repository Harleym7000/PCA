-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 12:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pca`
--

-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE `causes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Red Sails Festival', '2020-08-09 13:26:51', '2020-08-09 13:26:51'),
(2, 'Childrens Activities', '2020-08-09 13:26:51', '2020-08-09 13:26:51'),
(3, 'Older Peoples Activities', '2020-08-09 13:26:51', '2020-08-09 13:26:51'),
(4, 'Family Activities', '2020-08-09 13:26:51', '2020-08-09 13:26:51'),
(5, 'Christmas Events', '2020-08-09 13:26:51', '2020-08-09 13:26:51'),
(6, 'Health and Well Being', '2020-08-09 13:26:51', '2020-08-09 13:26:51'),
(7, 'Social Enterprise', '2020-08-09 13:26:51', '2020-08-09 13:26:51'),
(8, 'Town Hall', '2020-08-09 13:26:51', '2020-08-09 13:26:51'),
(9, 'Social Housing and Newcomers', '2020-08-09 13:26:51', '2020-08-09 13:26:51'),
(10, 'Town Clean-Ups', '2020-08-09 13:26:51', '2020-08-09 13:26:51'),
(11, 'Committee Work', '2020-08-09 13:26:51', '2020-08-09 13:26:51'),
(12, 'Grant Applications', '2020-08-09 13:26:51', '2020-08-09 13:26:51'),
(13, 'First Aid', '2020-08-09 13:26:51', '2020-08-09 13:26:51'),
(14, 'Health & Safety', '2020-08-09 13:26:51', '2020-08-09 13:26:51'),
(15, 'Cultural Heritage', '2020-08-09 13:26:51', '2020-08-09 13:26:51'),
(16, 'Photography', '2020-08-09 13:26:52', '2020-08-09 13:26:52'),
(17, 'Anti-Social Behaviour', '2020-08-09 13:26:52', '2020-08-09 13:26:52'),
(18, 'Other', '2020-08-09 13:26:52', '2020-08-09 13:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `cause_user`
--

CREATE TABLE `cause_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cause_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cause_user`
--

INSERT INTO `cause_user` (`user_id`, `cause_id`) VALUES
(1, 1),
(1, 11),
(16, 1),
(16, 12),
(16, 14),
(34, 3),
(34, 1),
(34, 8);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `sent` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `created_at`, `updated_at`, `sent`) VALUES
(2, NULL, NULL, 1),
(3, '2020-08-15 22:59:52', '2020-08-15 22:59:52', 1),
(4, '2020-08-18 10:23:43', '2020-08-18 10:23:43', 1),
(5, '2020-08-22 13:37:23', '2020-08-22 13:37:23', 1),
(6, '2020-09-07 10:12:50', '2020-09-07 10:12:50', 1),
(7, '2020-09-07 22:32:28', '2020-09-07 22:32:28', 1),
(8, '2020-09-11 09:50:04', '2020-09-11 09:50:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_response`
--

CREATE TABLE `contact_response` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `responding_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `managed_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `date`, `time`, `venue`, `image`, `managed_by`, `approved`, `created_at`, `updated_at`) VALUES
(2, 'Portstewart Town Clean-Up', 'This is a test event for demo purposes', '2020-09-19', '10:00:00', 'Witches Hat', 'cleanup.jpg', 'PCA', 1, '2020-08-21 21:58:16', '2020-08-27 12:26:43'),
(3, 'Red Sails Festival 2021', 'This is event four', '2021-07-25', '10:30:00', 'Witches Hat', 'smkc_1598051353.jpg', 'PCA', 1, '2020-08-21 22:09:13', '2020-08-22 12:13:02'),
(5, 'Health and Wellbeing', 'Event not organised by PCA', '2020-10-08', '14:00:00', 'Zoom', 'smkc_1598051353.jpg', 'Someone Else', 1, '2020-08-27 14:17:10', '2020-08-27 14:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guest_event_registrations`
--

CREATE TABLE `guest_event_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `forename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guest_event_registrations`
--

INSERT INTO `guest_event_registrations` (`id`, `event_id`, `forename`, `surname`, `email`, `contact_no`) VALUES
(3, 2, 'Harley', 'Mulholland', 'harleym7000@gmail.com', '07843941507'),
(5, 3, 'Harley', 'Mulholland', 'harleym7000@gmail.com', '07843941507');

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
(49, '2014_10_12_000000_create_users_table', 1),
(50, '2014_10_12_100000_create_password_resets_table', 1),
(51, '2019_08_19_000000_create_failed_jobs_table', 1),
(52, '2020_06_07_001410_create_events_table', 1),
(53, '2020_06_07_003429_create_news_table', 1),
(54, '2020_06_07_005158_create_subs_table', 1),
(55, '2020_06_07_011943_create_contact_us_table', 1),
(56, '2020_08_01_152436_create_visitors_table', 1),
(57, '2020_08_01_155306_create_policy_table', 1),
(58, '2020_08_02_174103_create_contact_response_table', 1),
(59, '2020_08_04_164425_create_causes_table', 1),
(60, '2020_08_09_124839_laratrust_setup_tables', 1),
(61, '2020_08_26_162700_create_user_events_table', 2),
(62, '2020_09_29_103306_create_user_event_registrations_table', 3),
(63, '2020_10_02_115216_create_guest_event_registrations_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `story` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `story`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Tackling Antisocial Behaviour', 'Recent weekends in Portstewart have seen a definite rise in anti-social behaviour. Portstewart Community Association are taking the appropriate steps to try and tackle this', 'pcaLogo.png', '2020-09-10 17:50:00', '2020-09-10 17:50:00'),
(2, 'COVID-19 Scrubs', 'To help out our NHS during this difficult time, Portstewart Community Association are helping to make scrubs which will be delivered to to the local hospitals ', 'pcaLogo.png', '2020-08-09 12:26:37', '2020-08-09 12:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('harleymdev@gmail.com', '$2y$10$.Is83Uaf9IycFhEFe1RpzOttxqN0gg4MJJtp7YqvMHEUkYlNKzrTO', '2020-08-27 14:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2020-08-09 13:26:57', '2020-08-09 13:26:57'),
(2, 'users-read', 'Read Users', 'Read Users', '2020-08-09 13:26:57', '2020-08-09 13:26:57'),
(3, 'users-update', 'Update Users', 'Update Users', '2020-08-09 13:26:57', '2020-08-09 13:26:57'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2020-08-09 13:26:57', '2020-08-09 13:26:57'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2020-08-09 13:26:57', '2020-08-09 13:26:57'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2020-08-09 13:26:57', '2020-08-09 13:26:57'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2020-08-09 13:26:57', '2020-08-09 13:26:57'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2020-08-09 13:26:57', '2020-08-09 13:26:57'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2020-08-09 13:26:57', '2020-08-09 13:26:57'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2020-08-09 13:26:57', '2020-08-09 13:26:57'),
(11, 'module_1_name-create', 'Create Module_1_name', 'Create Module_1_name', '2020-08-09 13:26:59', '2020-08-09 13:26:59'),
(12, 'module_1_name-read', 'Read Module_1_name', 'Read Module_1_name', '2020-08-09 13:26:59', '2020-08-09 13:26:59'),
(13, 'module_1_name-update', 'Update Module_1_name', 'Update Module_1_name', '2020-08-09 13:26:59', '2020-08-09 13:26:59'),
(14, 'module_1_name-delete', 'Delete Module_1_name', 'Delete Module_1_name', '2020-08-09 13:26:59', '2020-08-09 13:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Role'),
(2, 1, 'App\\Role'),
(3, 1, 'App\\Role'),
(4, 1, 'App\\Role'),
(5, 1, 'App\\Role'),
(6, 1, 'App\\Role'),
(7, 1, 'App\\Role'),
(8, 1, 'App\\Role'),
(9, 1, 'App\\Role'),
(10, 1, 'App\\Role'),
(1, 2, 'App\\Role'),
(2, 2, 'App\\Role'),
(3, 2, 'App\\Role'),
(4, 2, 'App\\Role'),
(9, 2, 'App\\Role'),
(10, 2, 'App\\Role'),
(9, 3, 'App\\Role'),
(10, 3, 'App\\Role'),
(11, 4, 'App\\Role'),
(12, 4, 'App\\Role'),
(13, 4, 'App\\Role'),
(14, 4, 'App\\Role');

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'PCA Membership form.docx', '2020-08-14 16:51:34', '2020-08-14 16:51:34'),
(4, 'unnamed.jpg', '2020-08-14 16:53:00', '2020-08-14 16:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'Admin', '2020-08-09 13:26:57', '2020-08-09 13:26:57'),
(2, 'Event Manager', 'Event Manager', 'Event Manager', '2020-08-09 13:26:58', '2020-08-09 13:26:58'),
(3, 'Committee Member', 'Committee Member', 'Committee Member', '2020-08-09 13:26:58', '2020-08-09 13:26:58'),
(4, 'Author', 'Author', 'Author', '2020-08-09 13:26:59', '2020-08-09 13:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 1, ''),
(3, 1, ''),
(4, 1, ''),
(2, 2, 'App\\User'),
(3, 3, 'App\\User'),
(4, 4, 'App\\User'),
(2, 15, ''),
(3, 16, ''),
(3, 17, ''),
(3, 18, ''),
(1, 34, ''),
(2, 34, ''),
(3, 34, ''),
(4, 34, '');

-- --------------------------------------------------------

--
-- Table structure for table `subs`
--

CREATE TABLE `subs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subs`
--

INSERT INTO `subs` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'sub@sub.com', '2020-08-09 13:26:54', '2020-08-09 13:26:54'),
(2, 'sub2@sub2.com', '2020-08-09 13:26:54', '2020-08-09 13:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mob_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `logged_in` tinyint(4) NOT NULL DEFAULT 0,
  `time_logged_in` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `address`, `town`, `postcode`, `tel_no`, `mob_no`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `logged_in`, `time_logged_in`, `ip_address`) VALUES
(1, 'Admin', 'User', '11 superadministrator Road', 'Portstewart', 'BT55 7TU', '02870707070', '07707070707', 'admin@app.com', NULL, '$2y$10$DAkuPKomnEkwmsrys.M/7.LA8wfzN.16KiIYip2vbDFciTrRsiG3i', NULL, '2020-08-09 13:26:58', '2020-08-22 12:41:40', 1, '2020-08-15 14:35:07', '127.0.0.1'),
(2, 'user', 'Event Manager', '11 administrator Road', 'Portstewart', 'BT55 7TU', '02870707070', '07707070707', 'event@app.com', NULL, '$2y$10$CdWddxSFuoPgWQpRSH/gNuW2Cvk0deyfLg0wy5CfgOQ/ybhlEFi8m', NULL, '2020-08-09 13:26:58', '2020-08-09 13:26:58', 1, '2020-08-15 14:35:07', '86.125.101.32'),
(3, 'user', 'Committee Member', '11 user Road', 'Portstewart', 'BT55 7TU', '02870707070', '07707070707', 'member@app.com', NULL, '$2y$10$ElA3s2TZoamEQDR5/ymsu.9I/VgxT6tL3k5OZaB40obqdOMCyCRMW', NULL, '2020-08-09 13:26:59', '2020-08-09 13:26:59', 1, '2020-08-15 14:35:07', '90.101.4.583'),
(4, 'user', 'Author', '11 role_name Road', 'Portstewart', 'BT55 7TU', '02870707070', '07707070707', 'author@app.com', NULL, '$2y$10$UdCKnfuTwZOyyNuQN6Ex..PvAfbHVYr1xc2Q7CIoclwmMqVb7OT/6', NULL, '2020-08-03 13:26:59', '2020-08-03 13:26:59', 1, '2020-08-15 14:35:07', '91.184.1.849'),
(15, 'Test', 'Event Manager', '', '', '', '', '', 'harleymdev@gmail.com', NULL, '$2y$10$m/qHLxi6Tr6nUmhlvgpDL.yso32SJfRLVFcSD0MiYIGcrxV99SFnG', NULL, '2020-08-22 12:45:27', '2020-08-22 12:45:27', 1, '2020-08-22 13:45:27', ''),
(16, 'Harley', 'Mulholland', '1 Test Avenue', 'Testingville', 'TEST 1XG', '028212121212', '077212121212', 'harleym7000@gmail.com', NULL, '$2y$10$z6KO/MoSa/hftaObQGicS.DJuKmWENvr63Jg2.yxFl4G3hk63Ym3S', NULL, '2020-08-28 13:22:03', '2020-08-28 13:22:03', 0, '2020-08-28 14:22:03', ''),
(17, 'Test', 'One', '', '', '', '', '', 'test1@test.com', NULL, '$2y$10$vP26ZExpMlM22vnNOHMlq.2sbnQO66YVpb1Mo0ql.oxpQRUsKV7cS', NULL, '2020-09-07 21:05:36', '2020-09-07 21:05:36', 0, '2020-09-07 22:05:36', ''),
(18, 'Test', 'Two', '', '', '', '', '', 'test2@test.com', NULL, '$2y$10$O8hvZk4hKsHxuwYghp/ArOZWp43CW8vWhBldCiYXsILBJgHeXR0YO', NULL, '2020-09-07 21:06:02', '2020-09-07 21:06:02', 0, '2020-09-07 22:06:02', ''),
(20, 'Test', 'Three', '', '', '', '', '', 'test3@test.com', NULL, '$2y$10$9.tLOue4mkC3PkU7ul5hCOE.u.j7i.YLSzGao/EEz6lIPZOyVrWDK', NULL, '2020-09-07 21:06:42', '2020-09-07 21:06:42', 0, '2020-09-07 22:06:42', ''),
(34, 'Portstew', 'CA', '', '', '', '', '', '_mainaccount@portstewartca.org', NULL, '$2y$10$Zw9nr4DfQV2oGafb6OmiAOcMy0O6I/Q3T2Q5j9tb57ShKx/G6PRLq', NULL, '2020-09-13 14:10:21', '2020-09-29 09:24:08', 0, '2020-09-13 15:10:21', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_events`
--

CREATE TABLE `user_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_events`
--

INSERT INTO `user_events` (`id`, `user_id`, `event_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_event_registrations`
--

CREATE TABLE `user_event_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_event_registrations`
--

INSERT INTO `user_event_registrations` (`id`, `user_id`, `event_id`) VALUES
(2, 34, 2);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_visited` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `last_visited`) VALUES
(1, '127.0.0.1', '0000-00-00 00:00:00'),
(2, '127.0.0.1', '0000-00-00 00:00:00'),
(3, '127.0.0.1', '0000-00-00 00:00:00'),
(4, '127.0.0.1', '0000-00-00 00:00:00'),
(5, '127.0.0.1', '0000-00-00 00:00:00'),
(6, '127.0.0.1', '0000-00-00 00:00:00'),
(7, '127.0.0.1', '0000-00-00 00:00:00'),
(8, '127.0.0.1', '0000-00-00 00:00:00'),
(9, '127.0.0.1', '0000-00-00 00:00:00'),
(10, '127.0.0.1', '0000-00-00 00:00:00'),
(11, '127.0.0.1', '0000-00-00 00:00:00'),
(12, '127.0.0.1', '0000-00-00 00:00:00'),
(13, '127.0.0.1', '0000-00-00 00:00:00'),
(14, '127.0.0.1', '0000-00-00 00:00:00'),
(15, '127.0.0.1', '0000-00-00 00:00:00'),
(16, '127.0.0.1', '0000-00-00 00:00:00'),
(17, '127.0.0.1', '0000-00-00 00:00:00'),
(18, '127.0.0.1', '0000-00-00 00:00:00'),
(19, '127.0.0.1', '0000-00-00 00:00:00'),
(20, '127.0.0.1', '0000-00-00 00:00:00'),
(21, '127.0.0.1', '0000-00-00 00:00:00'),
(22, '127.0.0.1', '0000-00-00 00:00:00'),
(23, '127.0.0.1', '0000-00-00 00:00:00'),
(24, '127.0.0.1', '0000-00-00 00:00:00'),
(25, '127.0.0.1', '0000-00-00 00:00:00'),
(26, '127.0.0.1', '0000-00-00 00:00:00'),
(27, '127.0.0.1', '0000-00-00 00:00:00'),
(28, '127.0.0.1', '0000-00-00 00:00:00'),
(29, '127.0.0.1', '0000-00-00 00:00:00'),
(30, '127.0.0.1', '0000-00-00 00:00:00'),
(31, '127.0.0.1', '0000-00-00 00:00:00'),
(32, '127.0.0.1', '0000-00-00 00:00:00'),
(33, '127.0.0.1', '0000-00-00 00:00:00'),
(34, '127.0.0.1', '0000-00-00 00:00:00'),
(35, '127.0.0.1', '0000-00-00 00:00:00'),
(36, '127.0.0.1', '0000-00-00 00:00:00'),
(37, '127.0.0.1', '0000-00-00 00:00:00'),
(38, '127.0.0.1', '0000-00-00 00:00:00'),
(39, '127.0.0.1', '0000-00-00 00:00:00'),
(40, '127.0.0.1', '0000-00-00 00:00:00'),
(41, '127.0.0.1', '0000-00-00 00:00:00'),
(42, '127.0.0.1', '0000-00-00 00:00:00'),
(43, '127.0.0.1', '0000-00-00 00:00:00'),
(44, '127.0.0.1', '0000-00-00 00:00:00'),
(45, '127.0.0.1', '0000-00-00 00:00:00'),
(46, '127.0.0.1', '0000-00-00 00:00:00'),
(47, '127.0.0.1', '0000-00-00 00:00:00'),
(48, '127.0.0.1', '0000-00-00 00:00:00'),
(49, '127.0.0.1', '0000-00-00 00:00:00'),
(50, '127.0.0.1', '0000-00-00 00:00:00'),
(51, '127.0.0.1', '0000-00-00 00:00:00'),
(52, '127.0.0.1', '0000-00-00 00:00:00'),
(53, '127.0.0.1', '0000-00-00 00:00:00'),
(54, '127.0.0.1', '0000-00-00 00:00:00'),
(55, '127.0.0.1', '0000-00-00 00:00:00'),
(56, '127.0.0.1', '0000-00-00 00:00:00'),
(57, '127.0.0.1', '0000-00-00 00:00:00'),
(58, '127.0.0.1', '0000-00-00 00:00:00'),
(59, '127.0.0.1', '0000-00-00 00:00:00'),
(60, '127.0.0.1', '0000-00-00 00:00:00'),
(61, '127.0.0.1', '0000-00-00 00:00:00'),
(62, '127.0.0.1', '0000-00-00 00:00:00'),
(63, '127.0.0.1', '0000-00-00 00:00:00'),
(64, '127.0.0.1', '0000-00-00 00:00:00'),
(65, '127.0.0.1', '0000-00-00 00:00:00'),
(66, '127.0.0.1', '0000-00-00 00:00:00'),
(67, '127.0.0.1', '0000-00-00 00:00:00'),
(68, '127.0.0.1', '0000-00-00 00:00:00'),
(69, '127.0.0.1', '0000-00-00 00:00:00'),
(70, '127.0.0.1', '0000-00-00 00:00:00'),
(71, '127.0.0.1', '0000-00-00 00:00:00'),
(72, '127.0.0.1', '0000-00-00 00:00:00'),
(73, '127.0.0.1', '0000-00-00 00:00:00'),
(74, '127.0.0.1', '0000-00-00 00:00:00'),
(75, '127.0.0.1', '0000-00-00 00:00:00'),
(76, '127.0.0.1', '0000-00-00 00:00:00'),
(77, '127.0.0.1', '0000-00-00 00:00:00'),
(78, '127.0.0.1', '0000-00-00 00:00:00'),
(79, '127.0.0.1', '0000-00-00 00:00:00'),
(80, '127.0.0.1', '0000-00-00 00:00:00'),
(81, '127.0.0.1', '0000-00-00 00:00:00'),
(82, '127.0.0.1', '0000-00-00 00:00:00'),
(83, '127.0.0.1', '0000-00-00 00:00:00'),
(84, '127.0.0.1', '0000-00-00 00:00:00'),
(85, '86.147.1.101', '2020-08-15 19:10:26'),
(86, '91.432.2.183', '0000-00-00 00:00:00'),
(87, '86.147.1.101', '2020-08-15 19:10:26'),
(88, '91.432.2.183', '2020-08-15 19:10:26'),
(89, '127.0.0.1', '0000-00-00 00:00:00'),
(90, '127.0.0.1', '0000-00-00 00:00:00'),
(91, '127.0.0.1', '0000-00-00 00:00:00'),
(92, '127.0.0.1', '0000-00-00 00:00:00'),
(93, '127.0.0.1', '0000-00-00 00:00:00'),
(94, '127.0.0.1', '0000-00-00 00:00:00'),
(95, '127.0.0.1', '0000-00-00 00:00:00'),
(96, '127.0.0.1', '0000-00-00 00:00:00'),
(97, '127.0.0.1', '0000-00-00 00:00:00'),
(98, '127.0.0.1', '0000-00-00 00:00:00'),
(99, '127.0.0.1', '0000-00-00 00:00:00'),
(100, '127.0.0.1', '0000-00-00 00:00:00'),
(101, '127.0.0.1', '0000-00-00 00:00:00'),
(102, '127.0.0.1', '0000-00-00 00:00:00'),
(103, '127.0.0.1', '0000-00-00 00:00:00'),
(104, '127.0.0.1', '0000-00-00 00:00:00'),
(105, '127.0.0.1', '0000-00-00 00:00:00'),
(106, '127.0.0.1', '0000-00-00 00:00:00'),
(107, '127.0.0.1', '0000-00-00 00:00:00'),
(108, '127.0.0.1', '0000-00-00 00:00:00'),
(109, '127.0.0.1', '0000-00-00 00:00:00'),
(110, '127.0.0.1', '0000-00-00 00:00:00'),
(111, '127.0.0.1', '0000-00-00 00:00:00'),
(112, '127.0.0.1', '0000-00-00 00:00:00'),
(113, '127.0.0.1', '0000-00-00 00:00:00'),
(114, '127.0.0.1', '0000-00-00 00:00:00'),
(115, '127.0.0.1', '0000-00-00 00:00:00'),
(116, '127.0.0.1', '0000-00-00 00:00:00'),
(117, '127.0.0.1', '0000-00-00 00:00:00'),
(118, '127.0.0.1', '0000-00-00 00:00:00'),
(119, '127.0.0.1', '0000-00-00 00:00:00'),
(120, '127.0.0.1', '0000-00-00 00:00:00'),
(121, '127.0.0.1', '0000-00-00 00:00:00'),
(122, '127.0.0.1', '0000-00-00 00:00:00'),
(123, '127.0.0.1', '0000-00-00 00:00:00'),
(124, '127.0.0.1', '0000-00-00 00:00:00'),
(125, '127.0.0.1', '0000-00-00 00:00:00'),
(126, '127.0.0.1', '0000-00-00 00:00:00'),
(127, '127.0.0.1', '0000-00-00 00:00:00'),
(128, '127.0.0.1', '0000-00-00 00:00:00'),
(129, '127.0.0.1', '0000-00-00 00:00:00'),
(130, '127.0.0.1', '0000-00-00 00:00:00'),
(131, '127.0.0.1', '0000-00-00 00:00:00'),
(132, '127.0.0.1', '0000-00-00 00:00:00'),
(133, '127.0.0.1', '0000-00-00 00:00:00'),
(134, '127.0.0.1', '0000-00-00 00:00:00'),
(135, '127.0.0.1', '0000-00-00 00:00:00'),
(136, '127.0.0.1', '0000-00-00 00:00:00'),
(137, '127.0.0.1', '0000-00-00 00:00:00'),
(138, '127.0.0.1', '0000-00-00 00:00:00'),
(139, '127.0.0.1', '0000-00-00 00:00:00'),
(140, '127.0.0.1', '0000-00-00 00:00:00'),
(141, '127.0.0.1', '0000-00-00 00:00:00'),
(142, '127.0.0.1', '0000-00-00 00:00:00'),
(143, '127.0.0.1', '0000-00-00 00:00:00'),
(144, '127.0.0.1', '0000-00-00 00:00:00'),
(145, '127.0.0.1', '0000-00-00 00:00:00'),
(146, '127.0.0.1', '0000-00-00 00:00:00'),
(147, '127.0.0.1', '0000-00-00 00:00:00'),
(148, '127.0.0.1', '0000-00-00 00:00:00'),
(149, '127.0.0.1', '0000-00-00 00:00:00'),
(150, '127.0.0.1', '0000-00-00 00:00:00'),
(151, '127.0.0.1', '0000-00-00 00:00:00'),
(152, '127.0.0.1', '0000-00-00 00:00:00'),
(153, '127.0.0.1', '0000-00-00 00:00:00'),
(154, '127.0.0.1', '0000-00-00 00:00:00'),
(155, '127.0.0.1', '0000-00-00 00:00:00'),
(156, '127.0.0.1', '0000-00-00 00:00:00'),
(157, '86.148.24.106', '0000-00-00 00:00:00'),
(158, '86.148.24.106', '0000-00-00 00:00:00'),
(159, '86.148.24.106', '0000-00-00 00:00:00'),
(160, '86.148.24.106', '0000-00-00 00:00:00'),
(161, '86.148.24.106', '0000-00-00 00:00:00'),
(162, '86.148.24.106', '0000-00-00 00:00:00'),
(163, '86.148.24.106', '0000-00-00 00:00:00'),
(164, '86.148.24.106', '0000-00-00 00:00:00'),
(165, '45.63.19.185', '0000-00-00 00:00:00'),
(166, '199.167.30.187', '0000-00-00 00:00:00'),
(167, '86.148.24.106', '0000-00-00 00:00:00'),
(168, '86.148.24.106', '0000-00-00 00:00:00'),
(169, '86.148.24.106', '0000-00-00 00:00:00'),
(170, '2.236.112.207', '0000-00-00 00:00:00'),
(171, '2.236.112.207', '0000-00-00 00:00:00'),
(172, '2.236.112.207', '2020-09-07 12:32:34'),
(173, '216.55.138.235', '2020-09-07 13:22:33'),
(174, '206.225.80.193', '2020-09-07 13:22:36'),
(175, '206.225.80.193', '2020-09-07 13:22:37'),
(176, '31.13.115.23', '2020-09-07 14:01:01'),
(177, '31.13.115.1', '2020-09-07 14:01:01'),
(178, '31.13.115.7', '2020-09-07 14:01:08'),
(179, '81.101.175.225', '2020-09-07 14:01:25'),
(180, '81.101.175.225', '2020-09-07 14:02:37'),
(181, '86.148.24.106', '2020-09-07 18:48:45'),
(182, '86.148.24.106', '2020-09-07 22:35:55'),
(183, '86.148.24.106', '2020-09-07 23:03:21'),
(184, '86.148.24.106', '2020-09-07 23:09:19'),
(185, '86.148.24.106', '2020-09-07 23:22:05'),
(186, '86.148.24.106', '2020-09-07 23:45:21'),
(187, '86.148.24.106', '2020-09-07 23:47:33'),
(188, '86.148.24.106', '2020-09-07 23:47:46'),
(189, '86.148.24.106', '2020-09-07 23:49:02'),
(190, '86.148.24.106', '2020-09-07 23:51:09'),
(191, '86.148.24.106', '2020-09-07 23:54:18'),
(192, '86.148.24.106', '2020-09-07 23:54:23'),
(193, '86.148.24.106', '2020-09-07 23:59:43'),
(194, '86.148.24.106', '2020-09-08 00:06:09'),
(195, '86.148.24.106', '2020-09-08 09:34:33'),
(196, '86.148.24.106', '2020-09-08 09:59:40'),
(197, '86.148.24.106', '2020-09-08 20:11:00'),
(198, '86.148.24.106', '2020-09-08 21:57:30'),
(199, '86.148.24.106', '2020-09-08 21:57:49'),
(200, '86.148.24.106', '2020-09-09 18:51:08'),
(201, '86.148.24.106', '2020-09-09 21:42:09'),
(202, '86.148.24.106', '2020-09-09 23:37:00'),
(203, '86.148.24.106', '2020-09-10 01:32:55'),
(204, '86.148.24.106', '2020-09-10 23:47:50'),
(205, '86.148.24.106', '2020-09-10 23:48:46'),
(206, '86.148.24.106', '2020-09-10 23:48:53'),
(207, '86.148.24.106', '2020-09-10 23:48:56'),
(208, '86.148.24.106', '2020-09-10 23:49:09'),
(209, '86.148.24.106', '2020-09-10 23:49:10'),
(210, '86.148.24.106', '2020-09-10 23:50:02'),
(211, '86.148.24.106', '2020-09-10 23:50:33'),
(212, '86.148.24.106', '2020-09-10 23:50:36'),
(213, '86.148.24.106', '2020-09-10 23:51:28'),
(214, '86.148.24.106', '2020-09-10 23:53:30'),
(215, '86.148.24.106', '2020-09-10 23:53:31'),
(216, '86.148.24.106', '2020-09-10 23:53:32'),
(217, '86.148.24.106', '2020-09-10 23:53:33'),
(218, '86.148.24.106', '2020-09-10 23:53:35'),
(219, '86.148.24.106', '2020-09-10 23:53:36'),
(220, '86.148.24.106', '2020-09-10 23:53:37'),
(221, '86.148.24.106', '2020-09-10 23:53:38'),
(222, '86.148.24.106', '2020-09-10 23:53:39'),
(223, '86.148.24.106', '2020-09-10 23:53:43'),
(224, '86.148.24.106', '2020-09-10 23:53:43'),
(225, '86.148.24.106', '2020-09-10 23:54:07'),
(226, '86.148.24.106', '2020-09-10 23:54:12'),
(227, '86.148.24.106', '2020-09-10 23:54:13'),
(228, '86.148.24.106', '2020-09-10 23:54:43'),
(229, '86.148.24.106', '2020-09-10 23:54:49'),
(230, '86.148.24.106', '2020-09-10 23:56:10'),
(231, '86.148.24.106', '2020-09-10 23:56:14'),
(232, '86.148.24.106', '2020-09-10 23:56:33'),
(233, '86.148.24.106', '2020-09-10 23:56:38'),
(234, '86.148.24.106', '2020-09-10 23:56:48'),
(235, '86.148.24.106', '2020-09-10 23:56:51'),
(236, '86.148.24.106', '2020-09-10 23:57:19'),
(237, '86.148.24.106', '2020-09-10 23:59:47'),
(238, '86.148.24.106', '2020-09-11 00:01:46'),
(239, '86.148.24.106', '2020-09-11 00:01:50'),
(240, '86.148.24.106', '2020-09-11 01:00:19'),
(241, '86.148.24.106', '2020-09-11 01:01:02'),
(242, '86.148.24.106', '2020-09-11 01:01:20'),
(243, '86.148.24.106', '2020-09-11 01:01:51'),
(244, '86.148.24.106', '2020-09-11 01:04:21'),
(245, '86.148.24.106', '2020-09-11 01:04:36'),
(246, '86.148.24.106', '2020-09-11 01:07:55'),
(247, '86.148.24.106', '2020-09-11 01:09:40'),
(248, '86.148.24.106', '2020-09-11 01:17:58'),
(249, '86.148.24.106', '2020-09-11 01:22:46'),
(250, '86.148.24.106', '2020-09-11 01:23:49'),
(251, '138.246.253.15', '2020-09-11 01:24:05'),
(252, '86.148.24.106', '2020-09-11 01:25:43'),
(253, '86.148.24.106', '2020-09-11 01:27:21'),
(254, '86.148.24.106', '2020-09-11 01:28:46'),
(255, '86.148.24.106', '2020-09-11 01:29:08'),
(256, '86.148.24.106', '2020-09-11 01:33:10'),
(257, '86.148.24.106', '2020-09-11 01:33:24'),
(258, '86.148.24.106', '2020-09-11 01:33:55'),
(259, '86.148.24.106', '2020-09-11 01:33:57'),
(260, '86.148.24.106', '2020-09-11 01:33:58'),
(261, '86.148.24.106', '2020-09-11 01:34:01'),
(262, '86.148.24.106', '2020-09-11 01:34:29'),
(263, '86.148.24.106', '2020-09-11 01:34:44'),
(264, '86.148.24.106', '2020-09-11 01:38:19'),
(265, '86.148.24.106', '2020-09-11 01:39:00'),
(266, '86.148.24.106', '2020-09-11 01:40:03'),
(267, '86.148.24.106', '2020-09-11 01:40:21'),
(268, '86.148.24.106', '2020-09-11 01:41:39'),
(269, '86.148.24.106', '2020-09-11 01:41:55'),
(270, '86.148.24.106', '2020-09-11 01:44:04'),
(271, '86.148.24.106', '2020-09-11 01:47:06'),
(272, '86.148.24.106', '2020-09-11 01:48:33'),
(273, '86.148.24.106', '2020-09-11 01:49:24'),
(274, '86.148.24.106', '2020-09-11 01:51:36'),
(275, '86.148.24.106', '2020-09-11 01:51:53'),
(276, '86.148.24.106', '2020-09-11 01:51:56'),
(277, '86.148.24.106', '2020-09-11 01:52:35'),
(278, '86.148.24.106', '2020-09-11 01:53:29'),
(279, '86.148.24.106', '2020-09-11 01:54:38'),
(280, '31.13.103.8', '2020-09-11 01:58:58'),
(281, '31.13.103.10', '2020-09-11 01:58:59'),
(282, '86.148.24.106', '2020-09-11 01:59:12'),
(283, '146.199.79.225', '2020-09-11 02:00:09'),
(284, '146.199.79.225', '2020-09-11 02:00:16'),
(285, '86.148.24.106', '2020-09-11 02:02:34'),
(286, '86.148.24.106', '2020-09-11 02:03:56'),
(287, '86.148.24.106', '2020-09-11 02:11:26'),
(288, '86.148.24.106', '2020-09-11 02:14:57'),
(289, '146.199.79.225', '2020-09-11 02:15:40'),
(290, '146.199.79.225', '2020-09-11 02:15:51'),
(291, '86.148.24.106', '2020-09-11 09:51:00'),
(292, '86.173.176.156', '2020-09-11 10:08:52'),
(293, '86.148.24.106', '2020-09-11 10:16:44'),
(294, '86.148.24.106', '2020-09-11 10:16:55'),
(295, '86.148.24.106', '2020-09-11 10:16:56'),
(296, '86.148.24.106', '2020-09-11 10:17:00'),
(297, '86.148.24.106', '2020-09-11 10:24:35'),
(298, '86.148.24.106', '2020-09-11 10:25:27'),
(299, '86.148.24.106', '2020-09-11 10:45:33'),
(300, '90.249.183.38', '2020-09-11 11:04:34'),
(301, '86.148.24.106', '2020-09-11 11:05:06'),
(302, '90.201.216.56', '2020-09-11 11:05:43'),
(303, '78.105.21.197', '2020-09-11 11:05:50'),
(304, '86.182.119.151', '2020-09-11 11:05:56'),
(305, '90.201.216.56', '2020-09-11 11:05:58'),
(306, '86.148.24.106', '2020-09-11 11:10:19'),
(307, '86.161.237.76', '2020-09-11 14:31:25'),
(308, '86.161.237.76', '2020-09-11 14:34:48'),
(309, '86.173.176.156', '2020-09-11 15:40:51'),
(310, '213.205.202.53', '2020-09-11 16:58:36'),
(311, '86.148.24.106', '2020-09-11 22:12:11'),
(312, '86.148.24.106', '2020-09-11 23:28:24'),
(313, '86.148.24.106', '2020-09-11 23:57:08'),
(314, '86.173.176.156', '2020-09-12 10:32:51'),
(315, '86.141.247.114', '2020-09-12 14:39:14'),
(316, '92.14.240.130', '2020-09-12 15:38:00'),
(317, '92.14.240.130', '2020-09-12 15:38:20'),
(318, '92.14.240.130', '2020-09-12 15:39:02'),
(319, '86.141.247.114', '2020-09-12 16:56:21'),
(320, '86.141.247.114', '2020-09-12 16:56:48'),
(321, '86.141.247.114', '2020-09-12 16:57:07'),
(322, '86.141.247.114', '2020-09-12 16:57:43'),
(323, '86.141.247.114', '2020-09-12 19:16:31'),
(324, '127.0.0.1', '2020-09-12 22:38:29'),
(325, '127.0.0.1', '2020-09-12 22:42:17'),
(326, '127.0.0.1', '2020-09-12 22:56:43'),
(327, '127.0.0.1', '2020-09-12 22:57:45'),
(328, '127.0.0.1', '2020-09-12 22:58:08'),
(329, '127.0.0.1', '2020-09-12 23:02:36'),
(330, '127.0.0.1', '2020-09-12 23:33:40'),
(331, '127.0.0.1', '2020-09-12 23:37:16'),
(332, '127.0.0.1', '2020-09-13 00:22:13'),
(333, '127.0.0.1', '2020-09-13 00:22:16'),
(334, '127.0.0.1', '2020-09-13 16:12:04'),
(335, '127.0.0.1', '2020-09-13 18:38:56'),
(336, '127.0.0.1', '2020-09-13 19:59:10'),
(337, '127.0.0.1', '2020-09-13 20:56:15'),
(338, '127.0.0.1', '2020-09-13 21:16:37'),
(339, '127.0.0.1', '2020-09-21 12:19:09'),
(340, '127.0.0.1', '2020-09-21 12:24:00'),
(341, '127.0.0.1', '2020-09-21 13:08:28'),
(342, '127.0.0.1', '2020-09-21 14:07:18'),
(343, '127.0.0.1', '2020-09-21 16:05:18'),
(344, '127.0.0.1', '2020-09-22 12:30:29'),
(345, '127.0.0.1', '2020-09-22 12:33:59'),
(346, '127.0.0.1', '2020-09-22 12:35:28'),
(347, '127.0.0.1', '2020-09-22 12:35:47'),
(348, '127.0.0.1', '2020-09-22 12:35:49'),
(349, '127.0.0.1', '2020-09-22 12:36:25'),
(350, '127.0.0.1', '2020-09-22 12:36:27'),
(351, '127.0.0.1', '2020-09-22 12:37:26'),
(352, '127.0.0.1', '2020-09-22 12:37:28'),
(353, '127.0.0.1', '2020-09-22 12:37:58'),
(354, '127.0.0.1', '2020-09-22 12:38:01'),
(355, '127.0.0.1', '2020-09-22 12:41:20'),
(356, '127.0.0.1', '2020-09-22 12:41:52'),
(357, '127.0.0.1', '2020-09-22 12:41:54'),
(358, '127.0.0.1', '2020-09-22 12:42:12'),
(359, '127.0.0.1', '2020-09-22 12:42:14'),
(360, '127.0.0.1', '2020-09-22 12:42:32'),
(361, '127.0.0.1', '2020-09-22 12:42:33'),
(362, '127.0.0.1', '2020-09-22 12:42:48'),
(363, '127.0.0.1', '2020-09-22 12:42:51'),
(364, '127.0.0.1', '2020-09-22 12:43:00'),
(365, '127.0.0.1', '2020-09-22 12:43:06'),
(366, '127.0.0.1', '2020-09-22 12:43:37'),
(367, '127.0.0.1', '2020-09-22 12:43:48'),
(368, '127.0.0.1', '2020-09-22 12:43:52'),
(369, '127.0.0.1', '2020-09-22 12:44:05'),
(370, '127.0.0.1', '2020-09-22 12:44:07'),
(371, '127.0.0.1', '2020-09-22 12:44:26'),
(372, '127.0.0.1', '2020-09-22 12:44:28'),
(373, '127.0.0.1', '2020-09-22 12:44:51'),
(374, '127.0.0.1', '2020-09-22 12:44:52'),
(375, '127.0.0.1', '2020-09-22 12:46:10'),
(376, '127.0.0.1', '2020-09-22 12:46:12'),
(377, '127.0.0.1', '2020-09-22 12:46:51'),
(378, '127.0.0.1', '2020-09-22 12:46:53'),
(379, '127.0.0.1', '2020-09-22 12:46:55'),
(380, '127.0.0.1', '2020-09-22 12:47:09'),
(381, '127.0.0.1', '2020-09-22 12:47:11'),
(382, '127.0.0.1', '2020-09-22 12:47:41'),
(383, '127.0.0.1', '2020-09-22 12:47:42'),
(384, '127.0.0.1', '2020-09-22 12:47:43'),
(385, '127.0.0.1', '2020-09-22 12:47:45'),
(386, '127.0.0.1', '2020-09-22 12:47:54'),
(387, '127.0.0.1', '2020-09-22 12:47:56'),
(388, '127.0.0.1', '2020-09-22 12:47:58'),
(389, '127.0.0.1', '2020-09-22 12:48:00'),
(390, '127.0.0.1', '2020-09-22 12:48:17'),
(391, '127.0.0.1', '2020-09-22 12:48:40'),
(392, '127.0.0.1', '2020-09-22 12:48:44'),
(393, '127.0.0.1', '2020-09-22 14:28:24'),
(394, '127.0.0.1', '2020-09-22 14:28:40'),
(395, '127.0.0.1', '2020-09-22 14:28:58'),
(396, '127.0.0.1', '2020-09-22 14:29:15'),
(397, '127.0.0.1', '2020-09-22 14:29:27'),
(398, '127.0.0.1', '2020-09-22 14:29:38'),
(399, '127.0.0.1', '2020-09-22 14:29:49'),
(400, '127.0.0.1', '2020-09-22 14:30:18'),
(401, '127.0.0.1', '2020-09-22 14:30:20'),
(402, '127.0.0.1', '2020-09-22 14:31:05'),
(403, '127.0.0.1', '2020-09-22 14:31:07'),
(404, '127.0.0.1', '2020-09-22 14:31:51'),
(405, '127.0.0.1', '2020-09-22 14:32:06'),
(406, '127.0.0.1', '2020-09-22 14:32:09'),
(407, '127.0.0.1', '2020-09-22 14:32:25'),
(408, '127.0.0.1', '2020-09-22 14:32:26'),
(409, '127.0.0.1', '2020-09-22 14:32:34'),
(410, '127.0.0.1', '2020-09-22 14:32:39'),
(411, '127.0.0.1', '2020-09-22 14:32:56'),
(412, '127.0.0.1', '2020-09-22 14:33:11'),
(413, '127.0.0.1', '2020-09-22 14:33:18'),
(414, '127.0.0.1', '2020-09-22 14:33:21'),
(415, '127.0.0.1', '2020-09-22 14:33:23'),
(416, '127.0.0.1', '2020-09-22 14:34:17'),
(417, '127.0.0.1', '2020-09-22 14:35:16'),
(418, '127.0.0.1', '2020-09-22 14:35:51'),
(419, '127.0.0.1', '2020-09-22 14:36:03'),
(420, '127.0.0.1', '2020-09-22 14:37:05'),
(421, '127.0.0.1', '2020-09-22 14:37:07'),
(422, '127.0.0.1', '2020-09-22 14:37:22'),
(423, '127.0.0.1', '2020-09-22 14:37:25'),
(424, '127.0.0.1', '2020-09-22 14:37:39'),
(425, '127.0.0.1', '2020-09-22 17:02:13'),
(426, '127.0.0.1', '2020-09-22 17:02:16'),
(427, '127.0.0.1', '2020-09-22 17:02:18'),
(428, '127.0.0.1', '2020-09-22 17:02:39'),
(429, '127.0.0.1', '2020-09-22 17:02:41'),
(430, '127.0.0.1', '2020-09-22 17:02:44'),
(431, '127.0.0.1', '2020-09-22 17:02:46'),
(432, '127.0.0.1', '2020-09-22 17:03:04'),
(433, '127.0.0.1', '2020-09-22 17:03:36'),
(434, '127.0.0.1', '2020-09-22 17:05:47'),
(435, '127.0.0.1', '2020-09-22 17:06:06'),
(436, '127.0.0.1', '2020-09-22 17:06:33'),
(437, '127.0.0.1', '2020-09-22 17:07:08'),
(438, '127.0.0.1', '2020-09-22 17:07:10'),
(439, '127.0.0.1', '2020-09-22 17:07:11'),
(440, '127.0.0.1', '2020-09-22 17:07:26'),
(441, '127.0.0.1', '2020-09-22 17:07:27'),
(442, '127.0.0.1', '2020-09-22 17:07:29'),
(443, '127.0.0.1', '2020-09-22 17:07:42'),
(444, '127.0.0.1', '2020-09-22 17:07:46'),
(445, '127.0.0.1', '2020-09-22 17:07:59'),
(446, '127.0.0.1', '2020-09-22 17:08:14'),
(447, '127.0.0.1', '2020-09-22 17:08:16'),
(448, '127.0.0.1', '2020-09-22 17:08:40'),
(449, '127.0.0.1', '2020-09-22 17:08:42'),
(450, '127.0.0.1', '2020-09-22 17:09:26'),
(451, '127.0.0.1', '2020-09-22 17:09:28'),
(452, '127.0.0.1', '2020-09-22 17:09:30'),
(453, '127.0.0.1', '2020-09-22 17:09:49'),
(454, '127.0.0.1', '2020-09-22 17:09:50'),
(455, '127.0.0.1', '2020-09-22 17:09:52'),
(456, '127.0.0.1', '2020-09-22 17:10:14'),
(457, '127.0.0.1', '2020-09-22 17:11:03'),
(458, '127.0.0.1', '2020-09-22 17:11:16'),
(459, '127.0.0.1', '2020-09-22 17:12:04'),
(460, '127.0.0.1', '2020-09-22 17:12:22'),
(461, '127.0.0.1', '2020-09-22 17:12:24'),
(462, '127.0.0.1', '2020-09-22 17:12:45'),
(463, '127.0.0.1', '2020-09-22 17:12:46'),
(464, '127.0.0.1', '2020-09-22 17:13:01'),
(465, '127.0.0.1', '2020-09-22 17:13:28'),
(466, '127.0.0.1', '2020-09-22 17:14:49'),
(467, '127.0.0.1', '2020-09-22 17:15:04'),
(468, '127.0.0.1', '2020-09-22 17:15:17'),
(469, '127.0.0.1', '2020-09-22 17:15:28'),
(470, '127.0.0.1', '2020-09-22 17:15:42'),
(471, '127.0.0.1', '2020-09-22 17:16:40'),
(472, '127.0.0.1', '2020-09-22 17:16:41'),
(473, '127.0.0.1', '2020-09-22 17:16:43'),
(474, '127.0.0.1', '2020-09-22 17:16:56'),
(475, '127.0.0.1', '2020-09-22 17:16:58'),
(476, '127.0.0.1', '2020-09-22 17:17:40'),
(477, '127.0.0.1', '2020-09-22 17:17:54'),
(478, '127.0.0.1', '2020-09-22 17:18:06'),
(479, '127.0.0.1', '2020-09-22 17:18:20'),
(480, '127.0.0.1', '2020-09-22 17:18:39'),
(481, '127.0.0.1', '2020-09-22 17:18:52'),
(482, '127.0.0.1', '2020-09-24 12:06:30'),
(483, '127.0.0.1', '2020-09-24 15:47:15'),
(484, '127.0.0.1', '2020-09-24 15:47:46'),
(485, '127.0.0.1', '2020-09-24 15:48:11'),
(486, '127.0.0.1', '2020-09-24 15:48:35'),
(487, '127.0.0.1', '2020-09-24 16:59:37'),
(488, '127.0.0.1', '2020-09-28 19:43:03'),
(489, '127.0.0.1', '2020-09-28 20:42:03'),
(490, '127.0.0.1', '2020-09-28 20:42:23'),
(491, '127.0.0.1', '2020-09-28 20:44:04'),
(492, '127.0.0.1', '2020-09-28 20:44:20'),
(493, '127.0.0.1', '2020-09-28 20:44:48'),
(494, '127.0.0.1', '2020-09-28 20:45:06'),
(495, '127.0.0.1', '2020-09-28 20:45:10'),
(496, '127.0.0.1', '2020-09-28 20:45:41'),
(497, '127.0.0.1', '2020-09-28 20:50:05'),
(498, '127.0.0.1', '2020-09-28 20:50:17'),
(499, '127.0.0.1', '2020-09-28 20:50:25'),
(500, '127.0.0.1', '2020-09-28 20:59:04'),
(501, '127.0.0.1', '2020-09-28 20:59:27'),
(502, '127.0.0.1', '2020-09-28 21:00:42'),
(503, '127.0.0.1', '2020-09-28 21:01:13'),
(504, '127.0.0.1', '2020-09-28 21:01:37'),
(505, '127.0.0.1', '2020-09-28 21:01:49'),
(506, '127.0.0.1', '2020-09-28 21:08:51'),
(507, '127.0.0.1', '2020-09-28 21:10:02'),
(508, '127.0.0.1', '2020-09-29 10:44:04'),
(509, '127.0.0.1', '2020-09-29 11:25:22'),
(510, '127.0.0.1', '2020-09-29 11:56:21'),
(511, '127.0.0.1', '2020-09-29 12:03:47'),
(512, '127.0.0.1', '2020-09-29 12:04:06'),
(513, '127.0.0.1', '2020-09-29 12:04:21'),
(514, '127.0.0.1', '2020-09-29 12:04:35'),
(515, '127.0.0.1', '2020-09-29 12:07:03'),
(516, '127.0.0.1', '2020-09-29 12:07:30'),
(517, '127.0.0.1', '2020-09-29 15:26:21'),
(518, '127.0.0.1', '2020-09-29 15:27:04'),
(519, '127.0.0.1', '2020-09-29 15:28:11'),
(520, '127.0.0.1', '2020-09-29 15:28:33'),
(521, '127.0.0.1', '2020-09-29 15:29:01'),
(522, '127.0.0.1', '2020-09-29 15:29:31'),
(523, '127.0.0.1', '2020-09-29 15:30:18'),
(524, '127.0.0.1', '2020-09-29 15:31:33'),
(525, '127.0.0.1', '2020-09-29 15:32:09'),
(526, '127.0.0.1', '2020-09-29 15:32:32'),
(527, '127.0.0.1', '2020-09-29 15:33:13'),
(528, '127.0.0.1', '2020-09-29 15:34:35'),
(529, '127.0.0.1', '2020-09-29 15:35:46'),
(530, '127.0.0.1', '2020-10-01 18:12:06'),
(531, '127.0.0.1', '2020-10-01 20:55:40'),
(532, '127.0.0.1', '2020-10-01 20:55:44'),
(533, '127.0.0.1', '2020-10-01 21:01:12'),
(534, '127.0.0.1', '2020-10-01 21:03:11'),
(535, '127.0.0.1', '2020-10-01 21:03:25'),
(536, '127.0.0.1', '2020-10-01 21:03:35'),
(537, '127.0.0.1', '2020-10-01 21:03:42'),
(538, '127.0.0.1', '2020-10-01 21:03:50'),
(539, '127.0.0.1', '2020-10-01 21:04:02'),
(540, '127.0.0.1', '2020-10-01 21:04:11'),
(541, '127.0.0.1', '2020-10-01 21:04:17'),
(542, '127.0.0.1', '2020-10-01 21:33:37'),
(543, '127.0.0.1', '2020-10-01 21:37:00'),
(544, '127.0.0.1', '2020-10-01 21:37:44'),
(545, '127.0.0.1', '2020-10-01 21:38:50'),
(546, '127.0.0.1', '2020-10-01 21:41:08'),
(547, '127.0.0.1', '2020-10-01 21:42:04'),
(548, '127.0.0.1', '2020-10-01 21:43:36'),
(549, '127.0.0.1', '2020-10-01 21:44:23'),
(550, '127.0.0.1', '2020-10-01 21:45:28'),
(551, '127.0.0.1', '2020-10-01 21:45:55'),
(552, '127.0.0.1', '2020-10-01 21:46:31'),
(553, '127.0.0.1', '2020-10-01 21:47:14'),
(554, '127.0.0.1', '2020-10-01 22:59:27'),
(555, '127.0.0.1', '2020-10-01 22:59:33'),
(556, '127.0.0.1', '2020-10-01 22:59:37'),
(557, '127.0.0.1', '2020-10-01 22:59:44'),
(558, '127.0.0.1', '2020-10-01 22:59:46'),
(559, '127.0.0.1', '2020-10-01 23:00:25'),
(560, '127.0.0.1', '2020-10-01 23:00:26'),
(561, '127.0.0.1', '2020-10-01 23:00:28'),
(562, '127.0.0.1', '2020-10-01 23:00:30'),
(563, '127.0.0.1', '2020-10-01 23:00:36'),
(564, '127.0.0.1', '2020-10-01 23:00:37'),
(565, '127.0.0.1', '2020-10-01 23:00:58'),
(566, '127.0.0.1', '2020-10-01 23:00:59'),
(567, '127.0.0.1', '2020-10-01 23:01:15'),
(568, '127.0.0.1', '2020-10-01 23:01:16'),
(569, '127.0.0.1', '2020-10-01 23:02:07'),
(570, '127.0.0.1', '2020-10-01 23:02:09'),
(571, '127.0.0.1', '2020-10-01 23:02:18'),
(572, '127.0.0.1', '2020-10-01 23:02:19'),
(573, '127.0.0.1', '2020-10-01 23:02:47'),
(574, '127.0.0.1', '2020-10-01 23:02:48'),
(575, '127.0.0.1', '2020-10-01 23:02:56'),
(576, '127.0.0.1', '2020-10-01 23:03:04'),
(577, '127.0.0.1', '2020-10-01 23:03:18'),
(578, '127.0.0.1', '2020-10-01 23:04:04'),
(579, '127.0.0.1', '2020-10-01 23:04:56'),
(580, '127.0.0.1', '2020-10-01 23:05:04'),
(581, '127.0.0.1', '2020-10-01 23:05:17'),
(582, '127.0.0.1', '2020-10-01 23:05:48'),
(583, '127.0.0.1', '2020-10-01 23:06:09'),
(584, '127.0.0.1', '2020-10-01 23:26:31'),
(585, '127.0.0.1', '2020-10-01 23:26:46'),
(586, '127.0.0.1', '2020-10-01 23:27:50'),
(587, '127.0.0.1', '2020-10-01 23:27:55'),
(588, '127.0.0.1', '2020-10-01 23:28:39'),
(589, '127.0.0.1', '2020-10-01 23:28:42'),
(590, '127.0.0.1', '2020-10-01 23:28:47'),
(591, '127.0.0.1', '2020-10-01 23:29:24'),
(592, '127.0.0.1', '2020-10-01 23:29:28'),
(593, '127.0.0.1', '2020-10-01 23:30:18'),
(594, '127.0.0.1', '2020-10-01 23:30:25'),
(595, '127.0.0.1', '2020-10-01 23:30:46'),
(596, '127.0.0.1', '2020-10-01 23:30:51'),
(597, '127.0.0.1', '2020-10-01 23:32:13'),
(598, '127.0.0.1', '2020-10-01 23:32:19'),
(599, '127.0.0.1', '2020-10-01 23:33:12'),
(600, '127.0.0.1', '2020-10-01 23:33:25'),
(601, '127.0.0.1', '2020-10-01 23:33:27'),
(602, '127.0.0.1', '2020-10-01 23:34:10'),
(603, '127.0.0.1', '2020-10-01 23:35:37'),
(604, '127.0.0.1', '2020-10-01 23:35:49'),
(605, '127.0.0.1', '2020-10-01 23:36:26'),
(606, '127.0.0.1', '2020-10-01 23:36:38'),
(607, '127.0.0.1', '2020-10-01 23:37:29'),
(608, '127.0.0.1', '2020-10-01 23:37:32'),
(609, '127.0.0.1', '2020-10-01 23:38:22'),
(610, '127.0.0.1', '2020-10-01 23:38:27'),
(611, '127.0.0.1', '2020-10-01 23:38:37'),
(612, '127.0.0.1', '2020-10-01 23:38:38'),
(613, '127.0.0.1', '2020-10-01 23:38:58'),
(614, '127.0.0.1', '2020-10-01 23:38:59'),
(615, '127.0.0.1', '2020-10-01 23:39:04'),
(616, '127.0.0.1', '2020-10-01 23:39:05'),
(617, '127.0.0.1', '2020-10-01 23:39:10'),
(618, '127.0.0.1', '2020-10-01 23:39:12'),
(619, '127.0.0.1', '2020-10-01 23:39:21'),
(620, '127.0.0.1', '2020-10-01 23:39:23'),
(621, '127.0.0.1', '2020-10-01 23:40:16'),
(622, '127.0.0.1', '2020-10-01 23:40:17'),
(623, '127.0.0.1', '2020-10-01 23:40:25'),
(624, '127.0.0.1', '2020-10-01 23:40:27'),
(625, '127.0.0.1', '2020-10-01 23:40:33'),
(626, '127.0.0.1', '2020-10-01 23:40:35'),
(627, '127.0.0.1', '2020-10-01 23:40:35'),
(628, '127.0.0.1', '2020-10-01 23:40:36'),
(629, '127.0.0.1', '2020-10-01 23:40:40'),
(630, '127.0.0.1', '2020-10-01 23:40:42'),
(631, '127.0.0.1', '2020-10-01 23:41:21'),
(632, '127.0.0.1', '2020-10-01 23:41:22'),
(633, '127.0.0.1', '2020-10-01 23:41:28'),
(634, '127.0.0.1', '2020-10-01 23:41:29'),
(635, '127.0.0.1', '2020-10-01 23:41:34'),
(636, '127.0.0.1', '2020-10-01 23:41:35'),
(637, '127.0.0.1', '2020-10-01 23:41:40'),
(638, '127.0.0.1', '2020-10-01 23:41:41'),
(639, '127.0.0.1', '2020-10-01 23:42:05'),
(640, '127.0.0.1', '2020-10-01 23:42:06'),
(641, '127.0.0.1', '2020-10-01 23:42:12'),
(642, '127.0.0.1', '2020-10-01 23:42:13'),
(643, '127.0.0.1', '2020-10-01 23:42:18'),
(644, '127.0.0.1', '2020-10-01 23:42:19'),
(645, '127.0.0.1', '2020-10-01 23:42:25'),
(646, '127.0.0.1', '2020-10-01 23:42:26'),
(647, '127.0.0.1', '2020-10-01 23:42:31'),
(648, '127.0.0.1', '2020-10-01 23:42:33'),
(649, '127.0.0.1', '2020-10-01 23:45:01'),
(650, '127.0.0.1', '2020-10-01 23:45:02'),
(651, '127.0.0.1', '2020-10-01 23:45:47'),
(652, '127.0.0.1', '2020-10-01 23:45:48'),
(653, '127.0.0.1', '2020-10-01 23:46:52'),
(654, '127.0.0.1', '2020-10-01 23:46:54'),
(655, '127.0.0.1', '2020-10-01 23:50:07'),
(656, '127.0.0.1', '2020-10-01 23:50:09'),
(657, '127.0.0.1', '2020-10-01 23:50:16'),
(658, '127.0.0.1', '2020-10-01 23:50:18'),
(659, '127.0.0.1', '2020-10-01 23:50:23'),
(660, '127.0.0.1', '2020-10-01 23:50:25'),
(661, '127.0.0.1', '2020-10-01 23:51:03'),
(662, '127.0.0.1', '2020-10-01 23:51:05'),
(663, '127.0.0.1', '2020-10-01 23:51:07'),
(664, '127.0.0.1', '2020-10-01 23:51:08'),
(665, '127.0.0.1', '2020-10-02 00:06:08'),
(666, '127.0.0.1', '2020-10-02 00:06:09'),
(667, '127.0.0.1', '2020-10-02 00:07:36'),
(668, '127.0.0.1', '2020-10-02 00:07:49'),
(669, '127.0.0.1', '2020-10-02 00:08:24'),
(670, '127.0.0.1', '2020-10-02 00:10:23'),
(671, '127.0.0.1', '2020-10-02 00:10:30'),
(672, '127.0.0.1', '2020-10-02 00:11:08'),
(673, '127.0.0.1', '2020-10-02 00:11:17'),
(674, '127.0.0.1', '2020-10-02 00:14:06'),
(675, '127.0.0.1', '2020-10-02 00:14:07'),
(676, '127.0.0.1', '2020-10-02 00:14:50'),
(677, '127.0.0.1', '2020-10-02 00:14:51'),
(678, '127.0.0.1', '2020-10-02 00:20:23'),
(679, '127.0.0.1', '2020-10-02 00:20:24'),
(680, '127.0.0.1', '2020-10-02 00:21:08'),
(681, '127.0.0.1', '2020-10-02 00:22:31'),
(682, '127.0.0.1', '2020-10-02 00:22:41'),
(683, '127.0.0.1', '2020-10-02 00:24:24'),
(684, '127.0.0.1', '2020-10-02 00:24:25'),
(685, '127.0.0.1', '2020-10-02 00:25:13'),
(686, '127.0.0.1', '2020-10-02 00:25:14'),
(687, '127.0.0.1', '2020-10-02 00:32:26'),
(688, '127.0.0.1', '2020-10-02 00:32:27'),
(689, '127.0.0.1', '2020-10-02 00:32:33'),
(690, '127.0.0.1', '2020-10-02 00:32:34'),
(691, '127.0.0.1', '2020-10-02 00:33:08'),
(692, '127.0.0.1', '2020-10-02 00:33:10'),
(693, '127.0.0.1', '2020-10-02 00:33:11'),
(694, '127.0.0.1', '2020-10-02 00:33:12'),
(695, '127.0.0.1', '2020-10-02 00:33:16'),
(696, '127.0.0.1', '2020-10-02 00:33:17'),
(697, '127.0.0.1', '2020-10-02 00:33:22'),
(698, '127.0.0.1', '2020-10-02 00:33:23'),
(699, '127.0.0.1', '2020-10-02 00:34:23'),
(700, '127.0.0.1', '2020-10-02 00:34:47'),
(701, '127.0.0.1', '2020-10-02 00:34:48'),
(702, '127.0.0.1', '2020-10-02 00:35:28'),
(703, '127.0.0.1', '2020-10-02 00:35:30'),
(704, '127.0.0.1', '2020-10-02 00:36:23'),
(705, '127.0.0.1', '2020-10-02 00:36:24'),
(706, '127.0.0.1', '2020-10-02 00:38:21'),
(707, '127.0.0.1', '2020-10-02 00:38:23'),
(708, '127.0.0.1', '2020-10-02 00:38:46'),
(709, '127.0.0.1', '2020-10-02 00:38:47'),
(710, '127.0.0.1', '2020-10-02 00:38:52'),
(711, '127.0.0.1', '2020-10-02 00:38:53'),
(712, '127.0.0.1', '2020-10-02 00:39:00'),
(713, '127.0.0.1', '2020-10-02 00:39:01'),
(714, '127.0.0.1', '2020-10-02 00:44:29'),
(715, '127.0.0.1', '2020-10-02 00:44:30'),
(716, '127.0.0.1', '2020-10-02 00:44:37'),
(717, '127.0.0.1', '2020-10-02 00:44:38'),
(718, '127.0.0.1', '2020-10-02 00:44:43'),
(719, '127.0.0.1', '2020-10-02 00:44:44'),
(720, '127.0.0.1', '2020-10-02 00:47:14'),
(721, '127.0.0.1', '2020-10-02 00:47:15'),
(722, '127.0.0.1', '2020-10-02 00:47:19'),
(723, '127.0.0.1', '2020-10-02 00:47:21'),
(724, '127.0.0.1', '2020-10-02 00:47:24'),
(725, '127.0.0.1', '2020-10-02 00:47:25'),
(726, '127.0.0.1', '2020-10-02 00:47:29'),
(727, '127.0.0.1', '2020-10-02 00:47:31'),
(728, '127.0.0.1', '2020-10-02 00:47:58'),
(729, '127.0.0.1', '2020-10-02 00:47:59'),
(730, '127.0.0.1', '2020-10-02 00:48:03'),
(731, '127.0.0.1', '2020-10-02 00:48:05'),
(732, '127.0.0.1', '2020-10-02 00:48:09'),
(733, '127.0.0.1', '2020-10-02 00:48:10'),
(734, '127.0.0.1', '2020-10-02 00:48:15'),
(735, '127.0.0.1', '2020-10-02 00:48:17'),
(736, '127.0.0.1', '2020-10-02 00:50:17'),
(737, '127.0.0.1', '2020-10-02 00:50:18'),
(738, '127.0.0.1', '2020-10-02 00:52:03'),
(739, '127.0.0.1', '2020-10-02 00:52:04'),
(740, '127.0.0.1', '2020-10-02 00:58:55'),
(741, '127.0.0.1', '2020-10-02 00:58:56'),
(742, '127.0.0.1', '2020-10-02 00:59:00'),
(743, '127.0.0.1', '2020-10-02 00:59:01'),
(744, '127.0.0.1', '2020-10-02 00:59:11'),
(745, '127.0.0.1', '2020-10-02 00:59:12'),
(746, '127.0.0.1', '2020-10-02 01:02:46'),
(747, '127.0.0.1', '2020-10-02 01:02:47'),
(748, '127.0.0.1', '2020-10-02 01:02:53'),
(749, '127.0.0.1', '2020-10-02 01:02:54'),
(750, '127.0.0.1', '2020-10-02 01:03:14'),
(751, '127.0.0.1', '2020-10-02 01:03:16'),
(752, '127.0.0.1', '2020-10-02 01:04:37'),
(753, '127.0.0.1', '2020-10-02 01:04:38'),
(754, '127.0.0.1', '2020-10-02 01:04:43'),
(755, '127.0.0.1', '2020-10-02 01:04:44'),
(756, '127.0.0.1', '2020-10-02 12:37:32'),
(757, '127.0.0.1', '2020-10-02 12:51:04'),
(758, '127.0.0.1', '2020-10-02 13:09:07'),
(759, '127.0.0.1', '2020-10-02 13:09:13'),
(760, '127.0.0.1', '2020-10-02 13:13:55'),
(761, '127.0.0.1', '2020-10-02 14:15:09'),
(762, '127.0.0.1', '2020-10-02 14:36:36'),
(763, '127.0.0.1', '2020-10-02 14:37:04'),
(764, '127.0.0.1', '2020-10-02 14:39:27'),
(765, '127.0.0.1', '2020-10-02 14:39:31'),
(766, '127.0.0.1', '2020-10-02 16:48:53'),
(767, '127.0.0.1', '2020-10-02 18:06:01'),
(768, '127.0.0.1', '2020-10-02 18:07:40'),
(769, '127.0.0.1', '2020-10-02 18:08:09'),
(770, '127.0.0.1', '2020-10-02 18:08:09'),
(771, '127.0.0.1', '2020-10-02 18:09:31'),
(772, '127.0.0.1', '2020-10-02 18:09:56'),
(773, '127.0.0.1', '2020-10-02 18:10:16'),
(774, '127.0.0.1', '2020-10-02 18:10:26'),
(775, '127.0.0.1', '2020-10-02 18:10:41'),
(776, '127.0.0.1', '2020-10-02 18:33:50'),
(777, '127.0.0.1', '2020-10-02 18:34:09'),
(778, '127.0.0.1', '2020-10-02 18:54:34'),
(779, '127.0.0.1', '2020-10-02 18:58:17'),
(780, '127.0.0.1', '2020-10-02 19:01:52'),
(781, '127.0.0.1', '2020-10-02 19:02:35'),
(782, '127.0.0.1', '2020-10-02 19:02:40'),
(783, '127.0.0.1', '2020-10-02 22:44:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `causes`
--
ALTER TABLE `causes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cause_user`
--
ALTER TABLE `cause_user`
  ADD KEY `cause_id` (`cause_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_response`
--
ALTER TABLE `contact_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_event_registrations`
--
ALTER TABLE `guest_event_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
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
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_events`
--
ALTER TABLE `user_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_event_registrations`
--
ALTER TABLE `user_event_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `causes`
--
ALTER TABLE `causes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_response`
--
ALTER TABLE `contact_response`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest_event_registrations`
--
ALTER TABLE `guest_event_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subs`
--
ALTER TABLE `subs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_events`
--
ALTER TABLE `user_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_event_registrations`
--
ALTER TABLE `user_event_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=784;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cause_user`
--
ALTER TABLE `cause_user`
  ADD CONSTRAINT `cause_user_ibfk_1` FOREIGN KEY (`cause_id`) REFERENCES `causes` (`id`),
  ADD CONSTRAINT `cause_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `guest_event_registrations`
--
ALTER TABLE `guest_event_registrations`
  ADD CONSTRAINT `guest_event_registrations_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_events`
--
ALTER TABLE `user_events`
  ADD CONSTRAINT `user_events_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `user_events_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_event_registrations`
--
ALTER TABLE `user_event_registrations`
  ADD CONSTRAINT `user_event_registrations_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `user_event_registrations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
