-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2025 at 01:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurent`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `title`, `thumbnail`, `description`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 'Taste the best food in town', 'uploads/blog/20221202105425.jpg', '<p>Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>', 1, 1, '2022-12-02 04:54:26', '2022-12-02 04:54:26'),
(3, 7, 'Benefits of Dry Food', 'uploads/blog/20221202105534.jpg', '<p>At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>', 1, 1, '2022-12-02 04:55:34', '2022-12-02 04:55:34'),
(4, 8, 'Why do we need fruits for good health', 'uploads/blog/20221202105622.jpg', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>', 1, 1, '2022-12-02 04:56:22', '2022-12-02 04:56:22'),
(5, 9, 'Characteristics of healthy food', 'uploads/blog/20221202105714.jpg', '<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>', 1, 1, '2022-12-02 04:57:14', '2022-12-02 04:57:14'),
(6, 3, 'Chicken Fry recipe', 'uploads/blog/20221202105755.jpg', '<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>', 1, 1, '2022-12-02 04:57:55', '2022-12-02 04:57:55'),
(7, 3, 'This is a demo blog title', 'uploads/blog/20221204084900.jpg', '<p>At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>', 1, 1, '2022-12-04 02:49:00', '2022-12-04 02:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `bom`
--

CREATE TABLE `bom` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_item_id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bom_masters`
--

CREATE TABLE `bom_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_item_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Foreign key referencing menu_items table',
  `stock_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Foreign key referencing stock table',
  `uom_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Unit of Measure ID',
  `uom_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Unit of Measure Name',
  `used_qty` decimal(10,2) NOT NULL COMMENT 'Quantity used from stock',
  `used_cost` decimal(10,2) NOT NULL COMMENT 'Cost of used stock',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 => menu, 2 => blog',
  `parent_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `thumbnail`, `type`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Food', NULL, 1, NULL, 1, '2025-01-09 02:19:16', '2025-01-21 00:49:07'),
(12, 'Beverages', NULL, 1, NULL, 1, '2025-01-21 00:52:48', '2025-01-21 00:52:48'),
(13, 'Cakes', NULL, 1, NULL, 1, '2025-01-21 00:53:08', '2025-01-21 00:53:08'),
(14, 'Coffee', NULL, 1, NULL, 1, '2025-01-21 01:04:48', '2025-01-21 01:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sydney', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(2, 1, 'Newcastle', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(3, 1, 'Wollongong', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(4, 2, 'Melbourne', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(5, 2, 'Geelong', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(6, 2, 'Ballarat', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(7, 3, 'Brisbane', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(8, 3, 'Gold Coast', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(9, 3, 'Cairns', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(10, 4, 'Perth', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(11, 4, 'Fremantle', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(12, 4, 'Bunbury', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(13, 5, 'Adelaide', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(14, 5, 'Mount Gambier', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(15, 5, 'Port Augusta', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(16, 6, 'Hobart', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(17, 6, 'Launceston', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(18, 6, 'Devonport', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(19, 7, 'Canberra', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(20, 8, 'Darwin', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(21, 8, 'Alice Springs', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(22, 8, 'Katherine', '2025-01-16 05:29:49', '2025-01-16 05:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `companyname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_type` tinyint(4) NOT NULL COMMENT '1 => Sole Trader, 2 => Partnership, 3 => Limited Company, 4 => Limited Liability Partnership, 5 => Proprietary Limited Company',
  `caddr` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` bigint(20) UNSIGNED DEFAULT NULL,
  `dist` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` bigint(20) UNSIGNED DEFAULT NULL,
  `country` bigint(20) UNSIGNED DEFAULT NULL,
  `cmob` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cphone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registrationno` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinno` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `companyname`, `company_logo`, `contact_person_name`, `company_type`, `caddr`, `city`, `dist`, `pin`, `state`, `country`, `cmob`, `cphone`, `designation`, `registrationno`, `tinno`, `remarks`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Punjabi Palace Restaurant and Take Away', 'company_logos/tIjTUWCN5Voq6RsryNaYR7e7qyrjXp63OLLqAbT1.png', 'Sudip Babu', 1, '135, Melbourne Street, South Brisbane, QLD.', 7, 'Melbouren', '7544', 3, 1, '3846 3884', '1234567890', 'Manager', 'PPP12345', 'PS54321', 'New Restaurant', 1, '2025-01-17 06:49:53', '2025-01-20 01:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Australia', '2025-01-16 05:29:47', '2025-01-16 05:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `currency_master`
--

CREATE TABLE `currency_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_currency` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customization_options`
--

CREATE TABLE `customization_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_item_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dietary_attributes`
--

CREATE TABLE `dietary_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dietary_attributes`
--

INSERT INTO `dietary_attributes` (`id`, `attribute`, `description`, `created_at`, `updated_at`) VALUES
(1, 'DF', 'Dairy-Free', '2025-01-20 02:02:58', '2025-01-20 02:02:58'),
(2, 'GF', 'Gluten-Free', '2025-01-20 02:03:27', '2025-01-20 02:03:27'),
(3, 'Vegan', 'Vegan', '2025-01-20 02:03:57', '2025-01-20 02:03:57'),
(4, 'Spicy', 'Spicy', '2025-01-20 02:04:11', '2025-01-20 02:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `dietary_attributes_master`
--

CREATE TABLE `dietary_attributes_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dietary_labels`
--

CREATE TABLE `dietary_labels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_item_id` bigint(20) UNSIGNED NOT NULL,
  `dietary_attribute_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emailtemplate`
--

CREATE TABLE `emailtemplate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emailtemplate`
--

INSERT INTO `emailtemplate` (`id`, `template_title`, `short_description`, `content`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Forgot Password', 'Forgot Password Email Template', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n                <tbody>\n                <tr>\n                <td align=\"center\" valign=\"top\" bgcolor=\"#414A69\" style=\"padding-top:5px; padding-bottom:5px;\">\n                <table width=\"92%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n                <tr>\n                <td width=\"70\" align=\"left\" valign=\"top\" style=\"padding-bottom: 10px;\"><img src=\"u_logo\" width=\"150px\" height=\"80px\" alt=\"Logo\" /></td> \n                <td align=\"left\" valign=\"top\">\n                <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n                <tr>\n                <td align=\"right\" style=\"font-family:Arial, Verdana; font-size:12px; color:#FFFFFF; padding-top:22px;\"><b>u_sendOn</b></td>\n                </tr>\n                </table>\n                </td>\n                </tr>\n                </table>\n                </td>\n                </tr>\n                <tr>\n                <td align=\"center\" style=\"padding-top:20px; padding-bottom:20px;\" valign=\"top\">\n                <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"92%\">\n                <tbody>\n                <tr>\n                <td align=\"left\" style=\"font-family:Arial, Verdana; font-size:13px; color:#666666; line-height:15px; padding-bottom:10px;\" valign=\"top\">Hello u_name,<br />\n                <br />\n                Forgotten your password? Don&#39;t worry, Below is your new password.<br />\n                <br />\n                <b>New Password:</b> u_password<br />\n                <br />\n                If you have any question or encounter any problem while login, please contact our support team <a href=\"mailto:support_email\">support_email</a><br />\n                <br />\n                <br />\n                <span>Thanks,</span><br />\n                Support team <br />\n                </tr>\n                </tbody>\n                </table>\n                </td>\n                </tr>\n                <tr align=\"center\" valign=\"top\">\n                <td style=\"font-family:Arial, Verdana; font-size:13px; color:#666666; line-height:15px; border-top:1px solid #CCC; padding-top:20px; padding-bottom:20px;\">&copy; current_year All Rights Reserved</td>\n                </tr>\n                </tbody>\n               </table>', 'active', '2024-03-20 22:12:04', '2024-03-20 22:12:04', NULL),
(2, 'New User', 'New User Email Template', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n                <tbody>\n                    <tr>\n                    <td align=\"center\" valign=\"top\" bgcolor=\"#B79A6E\" style=\"padding-top:5px; padding-bottom:5px;\">\n                        <table width=\"92%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n                            <tr>\n                                <td width=\"70\" align=\"left\" valign=\"top\" style=\"padding-bottom: 10px;\"><img src=\"u_logo\" width=\"150px\" height=\"80px\" alt=\"Logo\" /></td> \n                                <td align=\"left\" valign=\"top\">\n                                    <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n                                        <tr>\n                                            <td align=\"right\" style=\"font-family:Arial, Verdana; font-size:12px; color:#FFFFFF; padding-top:22px;\"><b>u_sendOn</b></td>\n                                        </tr>\n                                    </table>\n                                </td>\n                            </tr>\n                        </table>\n                    </td>\n                </tr>\n                    <tr>\n                        <td align=\"center\" style=\"padding-top:20px; padding-bottom:20px;\" valign=\"top\">\n                        <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"92%\">\n                            <tbody>\n                <tr>\n                    <td align=\"left\" style=\"font-family:Arial, Verdana; font-size:13px; color:#666666; line-height:15px; padding-bottom:10px;\" valign=\"top\">\n                        Hello u_name,<br /><br />\n                        \n                        Welcome to Taxidermy!<br /><br />\n                        \n                        Thank you for joining our community. Below are your login credentials to access your account:<br /><br />\n                        \n                        <b>Site Login URL:</b> <a href=\"u_url\">u_url</a><br />\n                        <b>Email:</b> u_username<br />\n                        <b>Password:</b> u_password<br /><br />\n                        \n                        We aree excited to have you on board and hope you enjoy exploring our website. Should you have any questions or need assistance, feel free to reach out to our support team.<br /><br />\n                        \n                        Best regards,<br />\n                        Support Team\n                    </td>\n                </tr>\n            </tbody>\n            \n                        </table>\n                        </td>\n                    </tr>\n                    <tr align=\"center\" valign=\"top\">\n                        <td style=\"font-family:Arial, Verdana; font-size:13px; color:#666666; line-height:15px;  border-top:1px solid #CCC; padding-top:20px; padding-bottom:20px;\">&copy; current_year All Rights Reserved</td>\n                    </tr>\n                </tbody>\n            </table>', 'active', '2024-03-20 22:12:04', '2024-03-20 22:12:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cid` bigint(20) UNSIGNED NOT NULL,
  `empcode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathername` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joindate` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileno` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailid` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic` double(8,2) NOT NULL DEFAULT 0.00,
  `da` double(8,2) NOT NULL DEFAULT 0.00,
  `ta` double(8,2) NOT NULL DEFAULT 0.00,
  `hra` double(8,2) NOT NULL DEFAULT 0.00,
  `pf` double(8,2) NOT NULL DEFAULT 0.00,
  `netpay` double(8,2) NOT NULL DEFAULT 0.00,
  `dob` date DEFAULT NULL,
  `bank` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankb` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accno` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bacc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acct` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gross` double(8,2) NOT NULL DEFAULT 0.00,
  `intime` time DEFAULT NULL,
  `outtime` time DEFAULT NULL,
  `rfid` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fpid` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cl` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ml` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` int(11) NOT NULL DEFAULT 6 COMMENT '2-Manager | 3-Cashier | 4-Kitchen Manager | 5-Cook | 6-Waiter',
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `infotext` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(1) NOT NULL COMMENT '0 => photo, 1 => video',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `caption`, `thumbnail`, `video_link`, `type`, `created_at`, `updated_at`) VALUES
(2, 'Pizza Video', 'uploads/gallery/20221008140822.jpg', 'https://www.youtube.com/embed/dA0VGEbbw4g', 1, '2022-10-08 02:01:44', '2022-12-01 12:48:59'),
(3, 'Demo photo', 'uploads/gallery/20221201183353.jpg', '', 0, '2022-12-01 12:33:53', '2022-12-01 12:33:53'),
(4, 'Demo photo', 'uploads/gallery/20221201183419.jpg', '', 0, '2022-12-01 12:34:20', '2022-12-01 12:34:20'),
(5, 'Demo photo', 'uploads/gallery/20221201183435.jpg', '', 0, '2022-12-01 12:34:35', '2022-12-01 12:34:35'),
(6, 'Demo photo', 'uploads/gallery/20221201183454.jpg', '', 0, '2022-12-01 12:34:54', '2022-12-01 12:34:54'),
(7, 'Demo photo', 'uploads/gallery/20221201183513.jpg', '', 0, '2022-12-01 12:35:13', '2022-12-01 12:35:13'),
(8, 'Demo photo', 'uploads/gallery/20221201183529.jpg', '', 0, '2022-12-01 12:35:29', '2022-12-01 12:35:29'),
(9, 'Demo Video', 'uploads/gallery/20221201183615.jpg', 'https://www.youtube.com/embed/dA0VGEbbw4g', 1, '2022-12-01 12:36:15', '2022-12-01 12:49:49'),
(10, 'Demo Video', 'uploads/gallery/20221201183635.jpg', 'https://www.youtube.com/embed/dA0VGEbbw4g', 1, '2022-12-01 12:36:35', '2022-12-01 12:49:57'),
(11, 'Demo Video', 'uploads/gallery/20221201183656.jpg', 'https://www.youtube.com/embed/dA0VGEbbw4g', 1, '2022-12-01 12:36:56', '2022-12-01 12:50:08'),
(12, 'Demo Video', 'uploads/gallery/20221201183716.jpg', 'https://www.youtube.com/embed/dA0VGEbbw4g', 1, '2022-12-01 12:37:16', '2022-12-01 12:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `generals`
--

CREATE TABLE `generals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `story_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `story_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_choose_us` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generals`
--

INSERT INTO `generals` (`id`, `company_name`, `logo`, `story_title`, `story_description`, `why_choose_us`, `address`, `primary_phone`, `secondary_phone`, `email`, `facebook`, `twitter`, `instagram`, `delivery_fee`, `created_at`, `updated_at`) VALUES
(1, 'Hot Food', 'uploads/logo/20221211174521.png', 'Demo title', '<p>At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>', '<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. </p>', 'Road 57, New York City, USA<br>', '0177223344556', '0177223344557', 'hot@food.com', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.instagram.com/', '12', '2022-12-11 11:45:22', '2022-12-11 12:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_sales`
--

CREATE TABLE `ingredient_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_item_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Foreign key referencing menu_items table',
  `stock_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Foreign key referencing stock table',
  `bom_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Foreign key referencing bom_masters table',
  `used_qty` decimal(10,2) NOT NULL COMMENT 'Quantity of stock used for this menu item sale',
  `used_cost` decimal(10,2) NOT NULL COMMENT 'Cost of stock used for this menu item sale',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_category_id` bigint(20) UNSIGNED NOT NULL,
  `uom_id` bigint(20) UNSIGNED NOT NULL,
  `uom_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_code`, `item_name`, `item_category_id`, `uom_id`, `uom_name`, `created_at`, `updated_at`) VALUES
(1, 'IT_1', 'Chicken Breast', 11, 7, 'Pc', '2025-01-21 05:30:03', '2025-01-21 05:30:50'),
(2, 'IT_2', 'Onion', 16, 2, 'Gms', '2025-01-21 05:31:42', '2025-01-21 05:31:42'),
(3, 'IT_3', 'Salt', 9, 7, 'Pc', '2025-01-21 05:32:26', '2025-01-21 05:32:26'),
(4, 'IT_4', 'Mustord Oil', 9, 5, 'ML', '2025-01-21 05:32:58', '2025-01-21 05:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_category_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `item_category_name`, `item_category_desc`, `created_at`, `updated_at`) VALUES
(1, 'Aerated Drinks', NULL, '2025-01-21 05:00:29', '2025-01-21 05:00:29'),
(2, 'Beverages', NULL, '2025-01-21 05:00:47', '2025-01-21 05:00:47'),
(3, 'Cake', NULL, '2025-01-21 05:01:03', '2025-01-21 05:01:03'),
(4, 'Chocolate', NULL, '2025-01-21 05:01:17', '2025-01-21 05:01:17'),
(5, 'Coffee', NULL, '2025-01-21 05:01:29', '2025-01-21 05:01:29'),
(6, 'Dairy', NULL, '2025-01-21 05:01:43', '2025-01-21 05:01:43'),
(7, 'Eggs', NULL, '2025-01-21 05:01:57', '2025-01-21 05:01:57'),
(8, 'Fish', NULL, '2025-01-21 05:02:13', '2025-01-21 05:02:13'),
(9, 'Groceries', NULL, '2025-01-21 05:02:29', '2025-01-21 05:02:29'),
(10, 'Ice Cream', NULL, '2025-01-21 05:02:48', '2025-01-21 05:02:48'),
(11, 'Meat', NULL, '2025-01-21 05:03:02', '2025-01-21 05:03:02'),
(12, 'Pulses', NULL, '2025-01-21 05:03:24', '2025-01-21 05:03:24'),
(13, 'Sanitary Products', NULL, '2025-01-21 05:03:58', '2025-01-21 05:03:58'),
(14, 'Soda', NULL, '2025-01-21 05:04:14', '2025-01-21 05:04:14'),
(15, 'Tea', NULL, '2025-01-21 05:04:28', '2025-01-21 05:04:28'),
(16, 'Vegetables', 'vegetables', '2025-01-21 05:04:45', '2025-01-21 05:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `category_id`, `title`, `thumbnail`, `description`, `status`, `created_at`, `updated_at`) VALUES
(10, 11, 'Starters', NULL, 'Starter Menu', 1, '2025-01-09 04:03:40', '2025-01-21 01:12:59'),
(11, 11, 'Tandoori Starters', NULL, 'TANDOORI STARTERS', 1, '2025-01-09 04:04:11', '2025-01-21 01:13:19'),
(12, 11, 'Punjabi Palace Specials', NULL, 'Punjabi Palace Specials', 1, '2025-01-21 01:10:42', '2025-01-21 01:13:52'),
(13, 11, 'Chicken, Beef, Lamb or Vegetable', NULL, 'CHICKEN, BEEF, LAMB OR VEGETABLE', 1, '2025-01-21 01:14:48', '2025-01-21 01:14:48'),
(14, 11, 'Tandoori Main Dishes', NULL, 'TANDOORI MAIN DISHES', 1, '2025-01-21 01:15:29', '2025-01-21 01:15:29'),
(15, 11, 'Dry Vegetables', NULL, 'DRY VEGETABLES', 1, '2025-01-21 01:16:11', '2025-01-21 01:16:11'),
(16, 11, 'Bread', NULL, 'BREAD', 1, '2025-01-21 01:16:49', '2025-01-21 01:16:49'),
(17, 11, 'Kids Meals', NULL, 'KIDS MEALS', 1, '2025-01-21 01:17:30', '2025-01-21 01:17:30'),
(18, 11, 'Accompaniments', NULL, 'ACCOMPANIMENTS', 1, '2025-01-21 01:18:03', '2025-01-21 01:18:03'),
(19, 11, 'Deserts', NULL, 'DESSERTS', 1, '2025-01-21 01:18:29', '2025-01-21 01:18:29'),
(20, 12, 'Drinks', NULL, 'DRINKS', 1, '2025-01-21 01:19:00', '2025-01-21 01:19:00'),
(21, 12, 'Hot Drinks', NULL, 'HOT DRINKS', 1, '2025-01-21 01:19:46', '2025-01-21 01:19:46'),
(22, 12, 'Sparkling Wines', NULL, 'SPARKLING WINES', 1, '2025-01-21 01:20:43', '2025-01-21 01:20:43'),
(23, 12, 'White Wines', NULL, 'WHITE WINES', 1, '2025-01-21 01:21:38', '2025-01-21 01:21:38'),
(24, 12, 'Beer Selection', NULL, 'BEER SELECTION', 1, '2025-01-21 02:16:53', '2025-01-21 02:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `uom_id` bigint(20) UNSIGNED NOT NULL,
  `is_bom` tinyint(1) NOT NULL DEFAULT 0,
  `stock_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menu_type` enum('Dine_In','Takeaway','Both') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `description`, `price`, `qty`, `uom_id`, `is_bom`, `stock_id`, `menu_type`, `category_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(4, 'Onion Bhaji Pakora', 'Sliced onion fritter dipped in chickpea batter with spices & gently fried.', '9.95', '1', 1, 0, NULL, 'Dine_In', 11, 10, '2025-01-09 04:46:35', '2025-01-09 04:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item_txns`
--

CREATE TABLE `menu_item_txns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_item_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Foreign key referencing menu_items table',
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Order number associated with the transaction',
  `menu_item_stock_qty` decimal(10,2) NOT NULL COMMENT 'Quantity of menu items in stock',
  `stock_in_out` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 = In, 2 = Out',
  `stock_in_out_reason` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 = Normal stock in, 2 = Menu Item Sell, 3 = Purchase Return, 4 = Damaged, 5 = Expired',
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Additional remarks or notes for the transaction',
  `txn_date` date NOT NULL COMMENT 'Transaction date',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_30_111432_create_permission_tables', 1),
(6, '2022_10_01_055307_create_categories_table', 1),
(7, '2022_10_03_043825_create_menus_table', 2),
(8, '2022_10_03_153305_create_blogs_table', 3),
(9, '2022_10_04_080110_create_galleries_table', 4),
(10, '2022_10_30_130829_create_sliders_table', 5),
(11, '2022_11_18_165045_create_reserves_table', 6),
(12, '2022_12_11_082612_create_services_table', 7),
(13, '2022_12_11_162625_create_staff_table', 8),
(14, '2022_12_11_165033_create_generals_table', 9),
(15, '2022_12_17_220039_create_carts_table', 10),
(16, '2022_12_18_134440_create_orders_table', 11),
(17, '2022_12_18_135134_create_order_metas_table', 11),
(23, '2016_06_01_000001_create_oauth_auth_codes_table', 12),
(24, '2016_06_01_000002_create_oauth_access_tokens_table', 12),
(25, '2016_06_01_000003_create_oauth_refresh_tokens_table', 12),
(26, '2016_06_01_000004_create_oauth_clients_table', 12),
(27, '2016_06_01_000005_create_oauth_personal_access_clients_table', 12),
(28, '2025_01_06_103502_create_emailtemplate_table', 13),
(30, '2025_01_07_085442_alter_user_table', 14),
(44, '2025_01_08_090935_update_menus_and_orders_tables', 15),
(45, '2025_01_08_101157_create_order_items_table', 15),
(46, '2025_01_08_101227_create_customers_table', 15),
(47, '2025_01_08_101312_create_vendors_table', 15),
(48, '2025_01_08_101341_create_stock_table', 15),
(49, '2025_01_08_101407_create_bom_table', 15),
(50, '2025_01_08_101433_create_purchase_orders_table', 16),
(52, '2025_01_08_101552_create_currency_master_table', 17),
(53, '2025_01_08_115345_alter_category_add_status_parent_id', 18),
(54, '2025_01_09_061037_alter_stock_table_remove_vendor_id', 19),
(55, '2025_01_09_061606_alter_stock_table_addunitprice', 20),
(56, '2025_01_09_062249_create_stock_vendors_table', 21),
(57, '2025_01_09_070415_create_purchase_order_details_table', 22),
(58, '2025_01_09_112820_alter_currency_master_add_column', 23),
(59, '2025_01_09_113356_add_column_dietary_attributes_master', 24),
(60, '2025_01_14_053400_create_uoms_table', 25),
(61, '2025_01_14_060257_create_stock_item_categories_table', 26),
(62, '2025_01_14_060601_create_stock_items_table', 27),
(63, '2025_01_14_094607_alter_stock_table_add_column', 28),
(64, '2025_01_14_121033_create_bom_masters_table', 29),
(65, '2025_01_14_121147_create_menu_item_txns_table', 29),
(66, '2025_01_14_121250_create_ingredient_sales_table', 30),
(68, '2025_01_15_052149_delete_vendors_table', 31),
(69, '2025_01_15_053759_create_employees_table', 32),
(70, '2025_01_15_055400_alter_vendor_table_remove_columns', 33),
(71, '2025_01_15_055753_alter_table_vendors_add_columns', 34),
(73, '2025_01_15_061612_create_vendor_payments_table', 35),
(74, '2025_01_15_065727_change_order_table', 36),
(75, '2025_01_15_085242_add_column_orders_table', 37),
(76, '2025_01_15_101138_alter_order_items_table_remove_addcolumns', 38),
(77, '2025_01_15_111222_create_tables_table', 39),
(78, '2025_01_15_111500_create_order_table_booking_table', 40),
(79, '2025_01_15_122526_create_purchases_and_related_tables', 41),
(80, '2025_01_15_123308_create_table_purchase_returns', 42),
(81, '2025_01_16_095319_create_countries_table', 43),
(82, '2025_01_16_095648_create_states_table', 44),
(83, '2025_01_16_095743_create_cities_table', 45),
(84, '2025_01_17_055906_create_companies_table', 46),
(85, '2025_01_20_071014_create_dietary_attributes_table', 47),
(86, '2025_01_21_052603_alter_menu_items_add_column', 48),
(87, '2025_01_21_071010_create_submenus_table', 49),
(89, '2025_01_21_092505_rename_stock_items_and_categories_tables', 50),
(90, '2025_01_21_094944_drop_items_table', 51),
(91, '2025_01_21_095010_create_items_table', 52);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
('9de70cd2-5c57-4b45-a272-723d05ffcde9', NULL, 'Restaurent Personal Access Client', 'wU67X3hdgB7nKxWKoDNdIJ6kakhwlODohcOqNHDC', NULL, 'http://localhost', 1, 0, 0, '2025-01-06 04:16:21', '2025-01-06 04:16:21'),
('9de70cd2-93d8-4d17-a7d3-c96fc1a9cb69', NULL, 'Restaurent Password Grant Client', 'RY3JcEZOAc30XwWCRzkbzXlHv5KlssekZPB3rGD3', 'users', 'http://localhost', 0, 1, 0, '2025-01-06 04:16:21', '2025-01-06 04:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '9de70cd2-5c57-4b45-a272-723d05ffcde9', '2025-01-06 04:16:21', '2025-01-06 04:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_type` enum('Dine_In','Takeaway') COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_type` enum('Dine In','Take Away','Room Service') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Dine In',
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('NEW','Processing','Rejected','Closed','Cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NEW',
  `reason` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` int(11) NOT NULL COMMENT '1 => cash on delivery, 2 => paypal, 3 => card',
  `payment_status` int(11) NOT NULL COMMENT '0 => due, 1 => paid',
  `order_status` int(11) NOT NULL COMMENT '0 => pending, 1 => completed, 2 => canceled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `order_type`, `service_type`, `total_amount`, `status`, `reason`, `payment_method`, `payment_status`, `order_status`, `created_at`, `updated_at`) VALUES
(2, NULL, '2025-01-15 15:39:03', 'Dine_In', 'Dine In', '0.00', 'NEW', NULL, 1, 0, 0, '2022-12-18 18:16:01', '2022-12-18 18:16:01'),
(5, NULL, '2025-01-15 15:39:03', 'Dine_In', 'Dine In', '0.00', 'NEW', NULL, 3, 1, 0, '2022-12-20 00:25:18', '2022-12-20 00:25:22'),
(17, NULL, '2025-01-15 15:39:03', 'Dine_In', 'Dine In', '0.00', 'NEW', NULL, 2, 1, 1, '2022-12-20 20:36:57', '2022-12-21 03:36:15'),
(18, NULL, '2025-01-15 15:39:03', 'Dine_In', 'Dine In', '0.00', 'NEW', NULL, 3, 1, 0, '2022-12-21 04:13:16', '2022-12-21 04:13:20'),
(19, NULL, '2025-01-15 15:39:03', 'Dine_In', 'Dine In', '0.00', 'NEW', NULL, 3, 1, 0, '2022-12-21 09:14:42', '2022-12-21 09:14:46'),
(20, NULL, '2025-01-15 15:39:03', 'Dine_In', 'Dine In', '0.00', 'NEW', NULL, 1, 0, 0, '2025-01-06 00:07:28', '2025-01-06 00:07:28'),
(21, NULL, '2025-01-15 15:39:03', 'Dine_In', 'Dine In', '0.00', 'NEW', NULL, 3, 0, 0, '2025-01-06 00:38:55', '2025-01-06 00:38:55'),
(22, NULL, '2025-01-15 15:39:03', 'Dine_In', 'Dine In', '0.00', 'NEW', NULL, 1, 0, 0, '2025-01-06 00:39:08', '2025-01-06 00:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `menu_item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `special_requirement` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_status` enum('Added','Updated','Removed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Added',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_metas`
--

CREATE TABLE `order_metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_metas`
--

INSERT INTO `order_metas` (`id`, `order_id`, `menu_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2, 2, 4, '2', '12', '2022-12-18 18:16:01', '2022-12-18 18:16:01'),
(6, 4, 8, '2', '15', '2022-12-20 00:15:01', '2022-12-20 00:15:01'),
(7, 4, 4, '1', '12', '2022-12-20 00:15:01', '2022-12-20 00:15:01'),
(8, 5, 3, '1', '10', '2022-12-20 00:25:22', '2022-12-20 00:25:22'),
(21, 17, 8, '1', '15', '2022-12-20 20:36:57', '2022-12-20 20:36:57'),
(22, 17, 9, '1', '150', '2022-12-20 20:36:57', '2022-12-20 20:36:57'),
(23, 18, 9, '1', '150', '2022-12-21 04:13:16', '2022-12-21 04:13:16'),
(24, 19, 9, '2', '150', '2022-12-21 09:14:42', '2022-12-21 09:14:42'),
(25, 19, 5, '3', '18', '2022-12-21 09:14:42', '2022-12-21 09:14:42'),
(26, 20, 3, '2', '10', '2025-01-06 00:07:28', '2025-01-06 00:07:28'),
(27, 21, 7, '1', '18', '2025-01-06 00:38:55', '2025-01-06 00:38:55'),
(28, 22, 7, '1', '18', '2025-01-06 00:39:08', '2025-01-06 00:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_table_booking`
--

CREATE TABLE `order_table_booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `table_id` bigint(20) UNSIGNED NOT NULL,
  `booking_date` datetime NOT NULL,
  `adult_count` int(11) NOT NULL,
  `child_count` int(11) NOT NULL,
  `waiter_id` bigint(20) UNSIGNED DEFAULT NULL,
  `alternate_waiter` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'Boilerplate', '3d2a73038a8d9ef27baf313474c7c3c32277642261492021f3d3ddd630b365e1', '[\"*\"]', NULL, NULL, '2025-01-07 02:14:27', '2025-01-07 02:14:27'),
(2, 'App\\Models\\User', 2, 'Boilerplate', 'a71ff765fc5f41f4484c8eb77d1dade93e8557cea1dceb28a32d2ea38e14456e', '[\"*\"]', NULL, NULL, '2025-01-07 02:15:43', '2025-01-07 02:15:43'),
(3, 'App\\Models\\User', 2, 'Boilerplate', '4142c100e47da879c7d2499325cfebd9cdfa07dc0881119ba66d0cf651dc53b4', '[\"*\"]', NULL, NULL, '2025-01-07 02:16:04', '2025-01-07 02:16:04'),
(4, 'App\\Models\\User', 2, 'Boilerplate', 'd593c02bbf95a9e6fee8d136f4a4bb67b6b9093fc31a2109eb2ead32e7b7dec4', '[\"*\"]', NULL, NULL, '2025-01-07 02:28:40', '2025-01-07 02:28:40'),
(5, 'App\\Models\\User', 2, 'Boilerplate', '3da9621f712e8a92c0112532f9f2c32c20b93789b6fcf136b0e8deba3dc03f81', '[\"*\"]', NULL, NULL, '2025-01-07 04:20:45', '2025-01-07 04:20:45'),
(6, 'App\\Models\\User', 2, 'Boilerplate', '53dff537a81e3a0d09186c48433b85c954d57622b946d5ad6d9997d4ad32ce67', '[\"*\"]', NULL, NULL, '2025-01-07 04:22:19', '2025-01-07 04:22:19'),
(7, 'App\\Models\\User', 2, 'Boilerplate', 'b890146cbb1630c040b327c71544ac0be371444e6c48333da74329baaadcf85e', '[\"*\"]', NULL, NULL, '2025-01-07 04:22:28', '2025-01-07 04:22:28'),
(8, 'App\\Models\\User', 2, 'Boilerplate', '146694f1b70ce7587385d3b36812b17eabad0f928094a9bfb073960914378834', '[\"*\"]', NULL, NULL, '2025-01-07 04:27:28', '2025-01-07 04:27:28'),
(9, 'App\\Models\\User', 2, 'Boilerplate', '208bea56459f9e6e31ce88fa6ef308d37e1a0790068248171948991cdb0e0eb0', '[\"*\"]', NULL, NULL, '2025-01-07 04:43:02', '2025-01-07 04:43:02'),
(10, 'App\\Models\\User', 2, 'Qm9pbGVycGxhdGU=', 'f30af6e3d0e6ac02eb9019ba61530c1b738bcf94c8d67cf270304e9014125bfb', '[\"*\"]', NULL, NULL, '2025-01-07 04:44:17', '2025-01-07 04:44:17'),
(11, 'App\\Models\\User', 2, 'Qm9pbGVycGxhdGU=', '5e776da2520abb18383c079880c81fbc1a035cd21277692b59769be24a85665f', '[\"*\"]', NULL, NULL, '2025-01-07 05:00:20', '2025-01-07 05:00:20'),
(12, 'App\\Models\\User', 2, 'Qm9pbGVycGxhdGU=', '84319d934c4ef37597376a0db81d95d2e0a2b34ba8c1bff545b711a39f2f95d2', '[\"*\"]', NULL, NULL, '2025-01-07 05:02:32', '2025-01-07 05:02:32'),
(13, 'App\\Models\\User', 2, 'Qm9pbGVycGxhdGU=', '30fda4b00bf72f953c6f51065ebe4ba8b03f04129a64881df65689ddca9572d3', '[\"*\"]', NULL, NULL, '2025-01-07 22:46:10', '2025-01-07 22:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Foreign Key linking to the Vendors table',
  `order_date` datetime DEFAULT NULL COMMENT 'Date when the order was placed',
  `delivery_date` datetime DEFAULT NULL COMMENT 'Expected delivery date',
  `status` enum('Pending','Completed','Cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending' COMMENT 'Status of the purchase',
  `is_direct_purchase` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Whether this is a direct purchase',
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Path to the vendor invoice or related documents',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Foreign Key linking to the Purchase table',
  `stock_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Foreign Key linking to the Stock table',
  `quantity` decimal(12,2) NOT NULL DEFAULT 0.00 COMMENT 'Quantity ordered',
  `unit_price` decimal(12,2) NOT NULL DEFAULT 0.00 COMMENT 'Price per unit at the time of purchase',
  `total_price` decimal(12,2) NOT NULL DEFAULT 0.00 COMMENT 'Calculated as quantity * unit_price',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders_old`
--

CREATE TABLE `purchase_orders_old` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_order_id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_details`
--

CREATE TABLE `purchase_order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `status` enum('Pending','Completed','Cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `is_direct_purchase` tinyint(1) NOT NULL DEFAULT 0,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_items`
--

CREATE TABLE `purchase_order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_order_id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_returns`
--

CREATE TABLE `purchase_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Foreign Key linking to the Vendors table',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Foreign Key linking to the Users table',
  `stock_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Foreign Key linking to the Stock table',
  `rtid` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Return Transaction ID',
  `ret_date` date DEFAULT NULL COMMENT 'Date of the return',
  `credit_amt` decimal(12,2) NOT NULL DEFAULT 0.00 COMMENT 'Credit amount for the returned items',
  `qty_ok` decimal(12,2) NOT NULL DEFAULT 0.00 COMMENT 'Quantity accepted as okay',
  `qty_def` decimal(12,2) NOT NULL DEFAULT 0.00 COMMENT 'Quantity defective',
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Remarks about the return',
  `txn_time` datetime DEFAULT NULL COMMENT 'Transaction time',
  `info_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Additional information',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE `reserves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `people` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reserves`
--

INSERT INTO `reserves` (`id`, `date`, `time`, `people`, `name`, `email`, `phone`, `description`, `status`, `created_at`, `updated_at`) VALUES
(4, '12/22/2022', '12.30pm', '3', 'John', 'john@gmail.com', '01711223343', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.', 0, '2022-12-21 09:10:53', '2022-12-21 09:10:53'),
(5, '01/08/2025', '09.00pm', '2', 'Ravi Kumar', 'php.ravikr84@gmail.com', '07439272532', 'Book slot', 1, '2025-01-06 00:55:45', '2025-01-06 00:57:22'),
(6, '01/14/2025', '08.30pm', '4', 'Ravi Kumar', 'php.ravikr84@gmail.com', '07439272532', 'Makar Sakranti', 1, '2025-01-06 00:56:39', '2025-01-06 00:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-10-01 02:11:52', '2022-10-01 02:11:52'),
(2, 'user', 'web', '2022-10-01 02:11:52', '2022-10-01 02:11:52'),
(3, 'vendor', 'vendor', '2025-01-21 11:10:18', NULL),
(4, 'customer', 'customer', '2025-01-21 11:10:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `thumbnail`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Test service', 'uploads/service/20221221035015.jpg', '<p>At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>', '2022-12-21 06:50:15', '2022-12-21 06:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `thumbnail`, `created_at`, `updated_at`) VALUES
(2, 'Taste the best food in town', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt', 'uploads/slider/20221104104512.jpg', '2022-11-04 04:45:13', '2022-11-04 04:45:13'),
(3, 'We offer a variety of food', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt', 'uploads/slider/20221104104617.jpg', '2022-11-04 04:46:17', '2022-11-04 04:46:17'),
(4, 'We focus on the quality', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt', 'uploads/slider/20221104104745.jpg', '2022-11-04 04:47:46', '2022-11-04 04:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `designation`, `thumbnail`, `created_at`, `updated_at`) VALUES
(2, 'Scarlet White', 'Main chef', 'uploads/staffs/20221221035107.jpg', '2022-12-21 06:51:07', '2022-12-21 06:51:07'),
(3, 'Daniel', 'Manager', 'uploads/staffs/20221221035204.jpg', '2022-12-21 06:52:04', '2022-12-21 06:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'New South Wales', '2025-01-16 05:29:47', '2025-01-16 05:29:47'),
(2, 1, 'Victoria', '2025-01-16 05:29:47', '2025-01-16 05:29:47'),
(3, 1, 'Queensland', '2025-01-16 05:29:47', '2025-01-16 05:29:47'),
(4, 1, 'Western Australia', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(5, 1, 'South Australia', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(6, 1, 'Tasmania', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(7, 1, 'Australian Capital Territory', '2025-01-16 05:29:48', '2025-01-16 05:29:48'),
(8, 1, 'Northern Territory', '2025-01-16 05:29:48', '2025-01-16 05:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock_item_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `uom_id` bigint(20) UNSIGNED NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_qty` decimal(10,2) NOT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_vendors`
--

CREATE TABLE `stock_vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `priority` int(11) NOT NULL COMMENT '1 => High Priority',
  `is_active` int(11) NOT NULL COMMENT '0 => pending, 1 => active, 2 => canceled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submenus`
--

CREATE TABLE `submenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submenus`
--

INSERT INTO `submenus` (`id`, `menu_id`, `title`, `thumbnail`, `description`, `status`, `created_at`, `updated_at`) VALUES
(31, 24, 'Imported Beer', NULL, 'IMPORTED BEER', 1, '2025-01-21 03:29:35', '2025-01-21 03:29:35'),
(32, 24, 'Local Beer', NULL, 'LOCAL BEER', 1, '2025-01-21 03:29:35', '2025-01-21 03:29:35'),
(33, 24, 'Cider', NULL, 'CIDER', 1, '2025-01-21 03:29:35', '2025-01-21 03:29:35'),
(34, 24, 'Spirits', NULL, 'SPIRITS', 1, '2025-01-21 03:29:35', '2025-01-21 03:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seating_capacity` int(11) NOT NULL,
  `icon_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `table_no`, `seating_capacity`, `icon_image`, `created_at`, `updated_at`) VALUES
(1, 'A Rounded Corner #56', 6, 'icons/6jH0IlkjByB6vgARG8vBnRH1URZtwPhaL3hQW3V8.png', '2025-01-20 06:06:20', '2025-01-20 06:06:20'),
(2, 'Circle Table 439', 4, 'icons/34a5zOYEogjT1LDJZ26cCTtUeU4dcFEUB25ZARXP.png', '2025-01-20 06:10:12', '2025-01-20 06:10:26'),
(3, 'Table 332 Large', 2, 'icons/jjBCDuop58tPu2oy4hSjPduCiT1WXLA77IrsbpBc.png', '2025-01-20 06:11:33', '2025-01-20 06:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `uoms`
--

CREATE TABLE `uoms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uom_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uoms`
--

INSERT INTO `uoms` (`id`, `uom_name`, `uom_desc`, `created_at`, `updated_at`) VALUES
(1, 'Cup', 'Each Cup', '2025-01-20 05:30:28', '2025-01-21 03:46:42'),
(2, 'Gms', 'Grams', '2025-01-21 03:40:56', '2025-01-21 03:46:23'),
(3, 'Kg', 'In kg', '2025-01-21 03:45:00', '2025-01-21 03:45:00'),
(4, 'Liter', 'L', '2025-01-21 03:47:15', '2025-01-21 03:47:15'),
(5, 'ML', 'Millilitres', '2025-01-21 03:47:37', '2025-01-21 03:47:37'),
(6, 'Mug', 'Mug', '2025-01-21 03:47:55', '2025-01-21 03:47:55'),
(7, 'Pc', 'Per Piece', '2025-01-21 03:48:14', '2025-01-21 03:48:14'),
(8, 'Plate', 'Each Plate', '2025-01-21 03:48:35', '2025-01-21 03:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 => inactive, 1 => active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_id`, `contact_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'doe@gmail.com', NULL, '$2y$10$15OMzF6sdoHU736ltxysBuaPQFA45WnkqWD2.Kr1YWat65nNba6YG', NULL, NULL, NULL, 1, '2022-10-01 02:11:52', '2022-10-01 02:11:52'),
(2, 'David Mold', 'david@gmail.com', NULL, '$2y$10$AWb/FmeQaDL6.l5oG0qVSur79996O9gq/rGgi19igKK3m1.jguG0G', NULL, 2, '123456789', 1, '2022-10-01 02:11:52', '2022-10-01 02:11:52'),
(3, 'Mickel', 'mick@gmail.com', NULL, '$2y$10$tJpfl8kKbHjYTlFEEKRpYOcGG/8Mw5AMGWaiDu8A4GXBvqdgdE7ve', NULL, NULL, NULL, 1, '2022-11-04 04:58:50', '2022-11-04 04:58:50'),
(4, 'Arthur', 'arthur@gmail.com', NULL, '$2y$10$1xnBMGctVNNLLXGuqNiF0uUHTbU1p9GusVjQeKGAm4l3GiqFDzOOS', NULL, NULL, NULL, 1, '2022-12-21 09:08:47', '2022-12-21 09:08:47'),
(5, 'John Doe', 'vendor1@example.com', NULL, '$2y$10$lKYe7RbKeAdL1cOfxKp8XeSqcwVjljKU/8CjFcIlfm.Gm1S/XEi3y', NULL, 3, '+61 412 345 678', 1, '2025-01-21 06:12:36', '2025-01-21 06:12:36'),
(6, 'Jane Smith', 'vendor2@example.com', NULL, '$2y$10$lh1iIZ18GUHeCiVzhTL1feZ5ctBRcmekPI22/QkHKUUbTJa5Cpcs2', NULL, 3, '+61 412 987 654', 1, '2025-01-21 06:12:36', '2025-01-21 06:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) UNSIGNED DEFAULT NULL,
  `sname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saddr` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scity` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdist` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sstate` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scountry` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scperson` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scmob` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sphone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accholder` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accno` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankbranch` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `infotext` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `uid`, `sname`, `tax_number`, `saddr`, `scity`, `sdist`, `spin`, `sstate`, `scountry`, `scperson`, `scmob`, `sphone`, `cin`, `pan`, `email`, `accholder`, `accno`, `bankname`, `bankbranch`, `ifsc`, `remarks`, `infotext`, `created_at`, `updated_at`) VALUES
(1, 5, 'Vendor One', '123456789', '123 Main Street', 'Sydney', 'New South Wales', '2000', 'New South Wales', 'Australia', 'John Doe', '+61 412 345 678', '+61 2 9876 5432', 'CIN1234567', 'PAN123456', 'vendor1@example.com', 'John Doe', '123456789012', 'Commonwealth Bank', 'Sydney CBD', 'CBBSYXXX', 'First dummy Australian vendor', 'Information about Vendor One', '2025-01-21 06:12:12', '2025-01-21 06:12:12'),
(3, 6, 'Vendor Two', '987654321', '456 Park Avenue', 'Melbourne', 'Victoria', '3000', 'Victoria', 'Australia', 'Jane Smith', '+61 412 987 654', '+61 3 9345 6789', 'CIN7654321', 'PAN654321', 'vendor2@example.com', 'Jane Smith', '987654321098', 'Westpac Bank', 'Melbourne Central', 'WPACAU2S', 'Second dummy Australian vendor', 'Information about Vendor Two', '2025-01-21 06:12:36', '2025-01-21 06:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_payments`
--

CREATE TABLE `vendor_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) UNSIGNED DEFAULT NULL,
  `vid` bigint(20) UNSIGNED DEFAULT NULL,
  `prid` int(10) UNSIGNED NOT NULL COMMENT 'Purchase return ID',
  `sid` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pid` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rtid` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `netamt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paid_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `due_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paiddate` date DEFAULT NULL,
  `type` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'd => DEBITED FROM PURCHASE, c => CREDIT FROM PURCHASE RETURN',
  `ptype` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_due_payment` tinyint(1) NOT NULL DEFAULT 0,
  `prev_vendor_payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `infotext` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bom`
--
ALTER TABLE `bom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bom_menu_item_id_foreign` (`menu_item_id`),
  ADD KEY `bom_stock_id_foreign` (`stock_id`);

--
-- Indexes for table `bom_masters`
--
ALTER TABLE `bom_masters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bom_masters_menu_item_id_foreign` (`menu_item_id`),
  ADD KEY `bom_masters_stock_id_foreign` (`stock_id`),
  ADD KEY `bom_masters_uom_id_foreign` (`uom_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_city_foreign` (`city`),
  ADD KEY `companies_state_foreign` (`state`),
  ADD KEY `companies_country_foreign` (`country`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_master`
--
ALTER TABLE `currency_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `customization_options`
--
ALTER TABLE `customization_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customization_options_menu_item_id_foreign` (`menu_item_id`);

--
-- Indexes for table `dietary_attributes`
--
ALTER TABLE `dietary_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dietary_attributes_master`
--
ALTER TABLE `dietary_attributes_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dietary_attributes_master_name_unique` (`name`);

--
-- Indexes for table `dietary_labels`
--
ALTER TABLE `dietary_labels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dietary_labels_menu_item_id_foreign` (`menu_item_id`),
  ADD KEY `dietary_labels_dietary_attribute_id_foreign` (`dietary_attribute_id`);

--
-- Indexes for table `emailtemplate`
--
ALTER TABLE `emailtemplate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_cid_foreign` (`cid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generals`
--
ALTER TABLE `generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient_sales`
--
ALTER TABLE `ingredient_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredient_sales_menu_item_id_foreign` (`menu_item_id`),
  ADD KEY `ingredient_sales_stock_id_foreign` (`stock_id`),
  ADD KEY `ingredient_sales_bom_id_foreign` (`bom_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_item_category_id_foreign` (`item_category_id`),
  ADD KEY `items_uom_id_foreign` (`uom_id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menus_category_id` (`category_id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_category_id_foreign` (`category_id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `menu_item_txns`
--
ALTER TABLE `menu_item_txns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_item_txns_menu_item_id_foreign` (`menu_item_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_menu_item_id_foreign` (`menu_item_id`);

--
-- Indexes for table `order_metas`
--
ALTER TABLE `order_metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_table_booking`
--
ALTER TABLE `order_table_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_table_booking_order_id_foreign` (`order_id`),
  ADD KEY `order_table_booking_table_id_foreign` (`table_id`);

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
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_items_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `purchase_orders_old`
--
ALTER TABLE `purchase_orders_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_order_details_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_returns_vendor_id_foreign` (`vendor_id`),
  ADD KEY `purchase_returns_user_id_foreign` (`user_id`),
  ADD KEY `purchase_returns_stock_id_foreign` (`stock_id`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_stock_item_id_foreign` (`stock_item_id`),
  ADD KEY `stock_uom_id_foreign` (`uom_id`);

--
-- Indexes for table `stock_vendors`
--
ALTER TABLE `stock_vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_vendors_stock_id_foreign` (`stock_id`),
  ADD KEY `stock_vendors_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submenus_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tables_table_no_unique` (`table_no`);

--
-- Indexes for table `uoms`
--
ALTER TABLE `uoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendors_uid_foreign` (`uid`);

--
-- Indexes for table `vendor_payments`
--
ALTER TABLE `vendor_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_payments_uid_foreign` (`uid`),
  ADD KEY `vendor_payments_vid_foreign` (`vid`),
  ADD KEY `vendor_payments_prev_vendor_payment_id_foreign` (`prev_vendor_payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bom`
--
ALTER TABLE `bom`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bom_masters`
--
ALTER TABLE `bom_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currency_master`
--
ALTER TABLE `currency_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customization_options`
--
ALTER TABLE `customization_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dietary_attributes`
--
ALTER TABLE `dietary_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dietary_attributes_master`
--
ALTER TABLE `dietary_attributes_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dietary_labels`
--
ALTER TABLE `dietary_labels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emailtemplate`
--
ALTER TABLE `emailtemplate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `generals`
--
ALTER TABLE `generals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ingredient_sales`
--
ALTER TABLE `ingredient_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu_item_txns`
--
ALTER TABLE `menu_item_txns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_metas`
--
ALTER TABLE `order_metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_table_booking`
--
ALTER TABLE `order_table_booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_orders_old`
--
ALTER TABLE `purchase_orders_old`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserves`
--
ALTER TABLE `reserves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_vendors`
--
ALTER TABLE `stock_vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uoms`
--
ALTER TABLE `uoms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor_payments`
--
ALTER TABLE `vendor_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bom`
--
ALTER TABLE `bom`
  ADD CONSTRAINT `bom_menu_item_id_foreign` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bom_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bom_masters`
--
ALTER TABLE `bom_masters`
  ADD CONSTRAINT `bom_masters_menu_item_id_foreign` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bom_masters_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bom_masters_uom_id_foreign` FOREIGN KEY (`uom_id`) REFERENCES `uoms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `companies_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `companies_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customization_options`
--
ALTER TABLE `customization_options`
  ADD CONSTRAINT `customization_options_menu_item_id_foreign` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dietary_labels`
--
ALTER TABLE `dietary_labels`
  ADD CONSTRAINT `dietary_labels_dietary_attribute_id_foreign` FOREIGN KEY (`dietary_attribute_id`) REFERENCES `dietary_attributes_master` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dietary_labels_menu_item_id_foreign` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_cid_foreign` FOREIGN KEY (`cid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ingredient_sales`
--
ALTER TABLE `ingredient_sales`
  ADD CONSTRAINT `ingredient_sales_bom_id_foreign` FOREIGN KEY (`bom_id`) REFERENCES `bom_masters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ingredient_sales_menu_item_id_foreign` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ingredient_sales_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_item_category_id_foreign` FOREIGN KEY (`item_category_id`) REFERENCES `item_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_uom_id_foreign` FOREIGN KEY (`uom_id`) REFERENCES `uoms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `fk_menus_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menus_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_item_txns`
--
ALTER TABLE `menu_item_txns`
  ADD CONSTRAINT `menu_item_txns_menu_item_id_foreign` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_menu_item_id_foreign` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_table_booking`
--
ALTER TABLE `order_table_booking`
  ADD CONSTRAINT `order_table_booking_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_table_booking_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD CONSTRAINT `purchase_items_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_orders_old`
--
ALTER TABLE `purchase_orders_old`
  ADD CONSTRAINT `purchase_orders_purchase_order_id_foreign` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders_old` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_orders_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_order_details`
--
ALTER TABLE `purchase_order_details`
  ADD CONSTRAINT `purchase_order_details_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  ADD CONSTRAINT `purchase_returns_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_returns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_returns_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_stock_item_id_foreign` FOREIGN KEY (`stock_item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_uom_id_foreign` FOREIGN KEY (`uom_id`) REFERENCES `uoms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_vendors`
--
ALTER TABLE `stock_vendors`
  ADD CONSTRAINT `stock_vendors_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_vendors_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `submenus`
--
ALTER TABLE `submenus`
  ADD CONSTRAINT `submenus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_payments`
--
ALTER TABLE `vendor_payments`
  ADD CONSTRAINT `vendor_payments_prev_vendor_payment_id_foreign` FOREIGN KEY (`prev_vendor_payment_id`) REFERENCES `vendor_payments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `vendor_payments_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_payments_vid_foreign` FOREIGN KEY (`vid`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
