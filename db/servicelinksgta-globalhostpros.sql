-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2025 at 10:46 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servicelinksgta-globalhostpros`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `content`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(2, '5 Common Plumbing Problems You Should Never Ignore', '5-common-plumbing-problems-you-should-never-ignore', '<p data-start=\"296\" data-end=\"482\" style=\"outline: none; margin-bottom: 20px; color: rgb(101, 107, 118); font-family: Archivo, sans-serif;\">Plumbing issues may seem minor at first, but they can quickly escalate into costly repairs if left unattended. Here are five common plumbing problems that homeowners should never ignore:</p><h3 data-start=\"484\" data-end=\"511\" style=\"outline: none; margin-bottom: 0px; font-weight: 700; color: rgb(36, 43, 58); font-size: 28px; font-family: Archivo, sans-serif;\">1.&nbsp;<span data-start=\"491\" data-end=\"511\" style=\"outline: none;\">Dripping Faucets</span></h3><p data-start=\"512\" data-end=\"620\" style=\"outline: none; margin-bottom: 20px; color: rgb(101, 107, 118); font-family: Archivo, sans-serif;\">That constant drip isn\'t just annoying—it can waste gallons of water over time and increase your water bill.</p><h3 data-start=\"622\" data-end=\"644\" style=\"outline: none; margin-bottom: 0px; font-weight: 700; color: rgb(36, 43, 58); font-size: 28px; font-family: Archivo, sans-serif;\">2.&nbsp;<span data-start=\"629\" data-end=\"644\" style=\"outline: none;\">Slow Drains</span></h3><p data-start=\"645\" data-end=\"764\" style=\"outline: none; margin-bottom: 20px; color: rgb(101, 107, 118); font-family: Archivo, sans-serif;\">A slow drain often signals a clog forming deep inside your pipes. Ignoring it can lead to full blockage or pipe damage.</p><h3 data-start=\"766\" data-end=\"795\" style=\"outline: none; margin-bottom: 0px; font-weight: 700; color: rgb(36, 43, 58); font-size: 28px; font-family: Archivo, sans-serif;\">3.&nbsp;<span data-start=\"773\" data-end=\"795\" style=\"outline: none;\">Low Water Pressure</span></h3><p data-start=\"796\" data-end=\"903\" style=\"outline: none; margin-bottom: 20px; color: rgb(101, 107, 118); font-family: Archivo, sans-serif;\">Inconsistent water pressure may indicate hidden leaks, corroded pipes, or mineral buildup in your fixtures.</p><h3 data-start=\"905\" data-end=\"931\" style=\"outline: none; margin-bottom: 0px; font-weight: 700; color: rgb(36, 43, 58); font-size: 28px; font-family: Archivo, sans-serif;\">4.&nbsp;<span data-start=\"912\" data-end=\"931\" style=\"outline: none;\">Running Toilets</span></h3><p data-start=\"932\" data-end=\"1044\" style=\"outline: none; margin-bottom: 20px; color: rgb(101, 107, 118); font-family: Archivo, sans-serif;\">A running toilet can waste up to 200 gallons of water per day. It\'s usually an easy fix, so don’t delay repairs.</p><h3 data-start=\"1046\" data-end=\"1076\" style=\"outline: none; margin-bottom: 0px; font-weight: 700; color: rgb(36, 43, 58); font-size: 28px; font-family: Archivo, sans-serif;\">5.&nbsp;<span data-start=\"1053\" data-end=\"1076\" style=\"outline: none;\">Water Heater Issues</span></h3><p data-start=\"1077\" data-end=\"1185\" style=\"outline: none; margin-bottom: 20px; color: rgb(101, 107, 118); font-family: Archivo, sans-serif;\">If your shower suddenly runs cold or the water smells metallic, your heater may need service or replacement.</p><p data-start=\"1187\" data-end=\"1285\" style=\"outline: none; margin-bottom: 20px; color: rgb(101, 107, 118); font-family: Archivo, sans-serif;\">👉&nbsp;<em data-start=\"1190\" data-end=\"1285\" style=\"outline: none;\">Need quick plumbing help? Book a certified plumber through our platform in just a few clicks.</em></p>', 'uploads/blog/1758740570-68d4405ace3e9.jpg', 1, '2025-09-24 13:55:59', '2025-09-24 14:02:50'),
(3, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br></span></p><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><ul><li style=\"margin: 0px; padding: 0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li><li style=\"margin: 0px; padding: 0px;\">Donec quis orci efficitur, suscipit odio sit amet, laoreet massa.</li><li style=\"margin: 0px; padding: 0px;\">Phasellus id augue auctor, maximus felis eget, accumsan nibh.</li><li style=\"margin: 0px; padding: 0px;\">Nam quis tortor porta, porta diam aliquam, egestas lorem.</li><li style=\"margin: 0px; padding: 0px;\">Maecenas sit amet justo ut est bibendum feugiat.</li><li style=\"margin: 0px; padding: 0px;\">Nam luctus purus id finibus hendrerit.</li></ul><ul><li style=\"margin: 0px; padding: 0px;\">Phasellus feugiat lectus a arcu mollis efficitur.</li><li style=\"margin: 0px; padding: 0px;\">In ut ex semper nulla varius placerat ut sed tellus.</li><li style=\"margin: 0px; padding: 0px;\">In nec quam nec ipsum condimentum sodales.</li></ul><ul><li style=\"margin: 0px; padding: 0px;\">Suspendisse nec massa vitae eros vehicula euismod vel et risus.</li><li style=\"margin: 0px; padding: 0px;\">Sed posuere turpis vel malesuada viverra.</li></ul></ul>', 'uploads/blog/1758741802_5ed9911a-6ac5-486c-9ecd-16c75fb10f76_1754009178.jpg', 1, '2025-09-24 14:23:22', '2025-09-24 14:23:22'),
(4, 'What is Lorem Ipsum?????', 'what-is-lorem-ipsum', '<p><span style=\"font-weight: bolder; margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br></span></p><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><ul><li style=\"margin: 0px; padding: 0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li><li style=\"margin: 0px; padding: 0px;\">Donec quis orci efficitur, suscipit odio sit amet, laoreet massa.</li><li style=\"margin: 0px; padding: 0px;\">Phasellus id augue auctor, maximus felis eget, accumsan nibh.</li><li style=\"margin: 0px; padding: 0px;\">Nam quis tortor porta, porta diam aliquam, egestas lorem.</li><li style=\"margin: 0px; padding: 0px;\">Maecenas sit amet justo ut est bibendum feugiat.</li><li style=\"margin: 0px; padding: 0px;\">Nam luctus purus id finibus hendrerit.</li></ul><ul><li style=\"margin: 0px; padding: 0px;\">Phasellus feugiat lectus a arcu mollis efficitur.</li><li style=\"margin: 0px; padding: 0px;\">In ut ex semper nulla varius placerat ut sed tellus.</li><li style=\"margin: 0px; padding: 0px;\">In nec quam nec ipsum condimentum sodales.</li></ul><ul><li style=\"margin: 0px; padding: 0px;\">Suspendisse nec massa vitae eros vehicula euismod vel et risus.</li><li style=\"margin: 0px; padding: 0px;\">Sed posuere turpis vel malesuada viverra.</li></ul></ul>', 'uploads/blog/1758741870_754eec98-c816-4e56-b55e-45a074d2e6cd_1754009153.jpg', 1, '2025-09-24 14:24:30', '2025-09-24 14:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `lead_price` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '5',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `lead_price`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(6, 'General Plumbing', 'general-plumbing', NULL, '20', 1, 0, '2025-09-03 19:32:37', '2025-09-10 15:57:04'),
(7, 'Bathroom Plumbing', 'bathroom-plumbing', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(8, 'Emergency Plumbing', 'emergency-plumbing', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(9, 'Kitchen Plumbing', 'kitchen-plumbing', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(10, 'Drain & Sewer', 'drain-sewer', '', '10', 1, 1, '2025-09-03 19:32:37', '2025-09-10 15:36:17'),
(11, 'Water Heater', 'water-heater', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(12, 'Water Filtration & Softening', 'water-filtration-softening', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(13, 'Outdoor Plumbing', 'outdoor-plumbing', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(14, 'Commercial Plumbing', 'commercial-plumbing', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(15, 'Toilet & Faucet', 'toilet-faucet', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(16, 'Gas Line', 'gas-line', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(17, 'Leak Detection & Repair', 'leak-detection-repair', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(18, 'Frozen Pipe Services', 'frozen-pipe-services', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(19, 'Backflow Preven', 'backflow-preven', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(20, 'Sump Pump', 'sump-pump', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(21, 'Renovation Plumbing', 'renovation-plumbing', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(22, 'Trenchless Pipe Repair', 'trenchless-pipe-repair', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(23, 'Hydro Jetting', 'hydro-jetting', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(24, 'Boiler', 'boiler', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(25, 'Smart Plumbing Installations', 'smart-plumbing-installations', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37'),
(26, 'Plumbing Maintenance Plan', 'plumbing-maintenance-plan', '', '10', 1, 0, '2025-09-03 19:32:37', '2025-09-03 19:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int NOT NULL,
  `name` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `phone_number` varchar(155) NOT NULL,
  `message` text NOT NULL,
  `is_view` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone_number`, `message`, `is_view`, `created_at`, `updated_at`) VALUES
(1, 'Indigo Cole', 'sacikari@mailinator.com', '+1 (334) 535-6871', 'Quo expedita sint eda', 0, '2025-09-24 12:32:24', '2025-09-24 12:32:24'),
(3, 'Keith Roy', 'wogur@mailinator.com', '+1 (259) 683-5241', 'Tempora repudiandae', 1, '2025-09-24 12:33:21', '2025-09-24 12:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int NOT NULL,
  `user_id` bigint NOT NULL,
  `category_id` bigint NOT NULL,
  `sub_category_id` bigint DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `job_files` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` enum('pending','active','completed','cancelled') NOT NULL DEFAULT 'pending',
  `is_active` tinyint NOT NULL DEFAULT '0',
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `category_id`, `sub_category_id`, `title`, `property_type`, `priority`, `job_files`, `description`, `postal_code`, `city`, `country`, `status`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 2, 6, NULL, 'Looking for General Plumbing services for my Office in Toronto', 'Office', 'To be discussed', '[\"uploads\\/job\\/files\\/1757700173_68c4604d1e76c.jpg\"]', 'We are looking for a reliable General Plumber for our office. The job includes installation, repair, and maintenance of plumbing systems, fixing leaks, pipes, and fixtures, and handling emergency plumbing issues when needed. Candidate should have basic plumbing experience, good problem-solving skills, and be physically fit to handle the work. Interested persons can contact us at [Your Phone/Email].', 'M5V3L9', 'Toronto', 'Canada', 'pending', 1, 0, '2025-09-12 22:06:14', '2025-09-12 22:06:14'),
(2, 2, 7, NULL, 'Looking for Bathroom Plumbing services for my Apartment building in Edmonton', 'Apartment building', 'Urgent', '[]', 'We are looking for a reliable General Plumber for our office. The job includes installation, repair, and maintenance of plumbing systems, fixing leaks, pipes, and fixtures, and handling emergency plumbing issues when needed. Candidate should have basic plumbing experience, good problem-solving skills, and be physically fit to handle the work', 'T5J3N5', 'Edmonton', 'Canada', 'pending', 1, 0, '2025-09-12 22:14:00', '2025-09-12 22:14:00'),
(3, 41, 7, NULL, 'Looking for Bathroom Plumbing services for my Apartment building in Edmonton', 'Apartment building', 'Urgent', '[]', 'We are looking for a reliable General Plumber for our office. The job includes installation, repair, and maintenance of plumbing systems, fixing leaks, pipes, and fixtures, and handling emergency plumbing issues when needed. Candidate should have basic plumbing experience, good problem-solving skills, and be physically fit to handle the work', 'T5J3N5', 'Edmonton', 'Canada', 'pending', 1, 0, '2025-09-12 22:14:07', '2025-09-12 22:14:07'),
(4, 2, 7, NULL, 'Looking for Bathroom Plumbing services for my Apartment building in Edmonton', 'Apartment building', 'Urgent', '[]', 'We are looking for a reliable General Plumber for our office. The job includes installation, repair, and maintenance of plumbing systems, fixing leaks, pipes, and fixtures, and handling emergency plumbing issues when needed. Candidate should have basic plumbing experience, good problem-solving skills, and be physically fit to handle the work', 'T5J3N5', 'Edmonton', 'Canada', 'pending', 1, 0, '2025-09-12 22:14:37', '2025-09-12 22:14:37'),
(10, 42, 9, 11, 'Looking for Kitchen Plumbing services for my Apartment building in Toronto', 'Apartment building', 'Urgent', '[]', 'bjkkjbnk', 'M5V3L9', 'Toronto', 'Canada', 'pending', 1, 0, '2025-09-24 17:22:17', '2025-09-24 17:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `line_distances`
--

CREATE TABLE `line_distances` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `line_distances`
--

INSERT INTO `line_distances` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(8, 'I don\'t know', 1, '2025-09-03 13:42:08', '2025-09-03 13:42:08'),
(9, 'More than 100m', 1, '2025-09-03 13:42:28', '2025-09-03 13:42:28'),
(10, '50 - 100 m', 1, '2025-09-03 13:42:41', '2025-09-03 13:42:41'),
(11, '10 - 50 m', 1, '2025-09-03 13:45:11', '2025-09-03 13:45:11'),
(12, 'Less than 10m', 1, '2025-09-03 13:45:21', '2025-09-03 13:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `user_id` bigint NOT NULL,
  `receiver_id` bigint NOT NULL,
  `body` longtext NOT NULL,
  `read` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `receiver_id`, `body`, `read`, `created_at`, `updated_at`) VALUES
(1, 2, 34, 'hello', 0, '2025-09-22 15:19:08', '2025-09-22 15:19:08'),
(2, 2, 34, 'hello', 0, '2025-09-22 15:19:10', '2025-09-22 15:19:10'),
(3, 34, 2, 'asd', 0, '2025-09-22 15:19:51', '2025-09-22 15:19:51'),
(4, 34, 2, 'hello', 0, '2025-09-22 15:27:54', '2025-09-22 15:27:54'),
(5, 34, 2, 'hello', 0, '2025-09-22 15:28:33', '2025-09-22 15:28:33'),
(6, 34, 2, 'hello', 0, '2025-09-22 15:29:03', '2025-09-22 15:29:03'),
(7, 34, 2, 'sdfsd', 0, '2025-09-22 15:31:47', '2025-09-22 15:31:47'),
(8, 34, 2, 'asdasd', 0, '2025-09-22 15:32:19', '2025-09-22 15:32:19'),
(9, 34, 2, 'sdas', 0, '2025-09-22 15:32:58', '2025-09-22 15:32:58'),
(10, 34, 2, 'sadsa', 0, '2025-09-22 15:33:08', '2025-09-22 15:33:08'),
(11, 34, 2, 'asdasasda', 0, '2025-09-22 15:34:29', '2025-09-22 15:34:29'),
(12, 34, 2, 'asdasasdaasda', 0, '2025-09-22 15:34:42', '2025-09-22 15:34:42'),
(13, 34, 2, 'asdsa', 0, '2025-09-22 15:36:16', '2025-09-22 15:36:16'),
(14, 34, 2, 'asdas', 0, '2025-09-22 15:47:17', '2025-09-22 15:47:17'),
(15, 2, 34, 'asdas', 0, '2025-09-22 15:47:20', '2025-09-22 15:47:20'),
(16, 2, 34, 'new', 0, '2025-09-22 15:48:35', '2025-09-22 15:48:35'),
(17, 2, 34, 'new', 0, '2025-09-22 15:48:50', '2025-09-22 15:48:50'),
(18, 2, 34, 'aasdas', 0, '2025-09-22 15:50:41', '2025-09-22 15:50:41'),
(19, 2, 34, 'sss', 0, '2025-09-22 15:51:19', '2025-09-22 15:51:19'),
(20, 2, 34, 'sss', 0, '2025-09-22 15:51:58', '2025-09-22 15:51:58'),
(21, 2, 34, 'hey', 0, '2025-09-22 15:53:10', '2025-09-22 15:53:10'),
(22, 34, 2, 'hello', 0, '2025-09-22 15:54:47', '2025-09-22 15:54:47'),
(23, 34, 2, 'hey', 0, '2025-09-22 15:55:44', '2025-09-22 15:55:44'),
(24, 2, 34, 'hello', 0, '2025-09-22 16:01:00', '2025-09-22 16:01:00'),
(25, 34, 2, 'hey', 0, '2025-09-22 16:01:06', '2025-09-22 16:01:06'),
(26, 2, 34, 'this is first chat for client', 0, '2025-09-22 16:02:17', '2025-09-22 16:02:17'),
(27, 34, 2, 'this is second chat for provider', 0, '2025-09-22 16:02:34', '2025-09-22 16:02:34'),
(28, 34, 2, 'hello', 0, '2025-09-22 16:04:42', '2025-09-22 16:04:42'),
(29, 34, 2, 'hello', 0, '2025-09-22 16:06:39', '2025-09-22 16:06:39'),
(30, 34, 2, 'test new', 0, '2025-09-22 16:07:29', '2025-09-22 16:07:29'),
(31, 34, 2, 'test new two', 0, '2025-09-22 16:07:39', '2025-09-22 16:07:39'),
(32, 34, 2, '51321', 0, '2025-09-22 16:09:03', '2025-09-22 16:09:03'),
(33, 2, 34, 'jvjh', 0, '2025-09-22 16:11:31', '2025-09-22 16:11:31'),
(34, 2, 34, 'jvjh', 0, '2025-09-22 16:11:31', '2025-09-22 16:11:31'),
(35, 2, 34, '1223', 0, '2025-09-22 16:11:38', '2025-09-22 16:11:38'),
(36, 34, 2, 'test test', 0, '2025-09-22 16:14:54', '2025-09-22 16:14:54'),
(37, 34, 2, 'asd', 0, '2025-09-22 16:15:15', '2025-09-22 16:15:15'),
(38, 2, 34, 'asdas', 0, '2025-09-22 16:15:48', '2025-09-22 16:15:48'),
(39, 2, 34, 'asdas', 0, '2025-09-22 16:16:10', '2025-09-22 16:16:10'),
(40, 34, 2, 'hello', 0, '2025-09-22 16:19:03', '2025-09-22 16:19:03'),
(41, 34, 2, 'asda', 0, '2025-09-22 16:20:07', '2025-09-22 16:20:07'),
(42, 2, 34, 'asda', 0, '2025-09-22 16:24:03', '2025-09-22 16:24:03'),
(43, 2, 34, 'asdas', 0, '2025-09-22 16:27:29', '2025-09-22 16:27:29'),
(44, 2, 34, 'hello', 0, '2025-09-22 16:28:45', '2025-09-22 16:28:45'),
(45, 2, 34, 'hello', 0, '2025-09-22 16:29:08', '2025-09-22 16:29:08'),
(46, 2, 34, 'hello', 0, '2025-09-22 16:29:28', '2025-09-22 16:29:28'),
(47, 2, 34, 'hello', 0, '2025-09-22 16:45:58', '2025-09-22 16:45:58'),
(48, 34, 2, 'hey', 0, '2025-09-22 16:46:04', '2025-09-22 16:46:04'),
(49, 34, 2, 'asd', 0, '2025-09-22 17:21:17', '2025-09-22 17:21:17'),
(50, 34, 2, 'test test test', 0, '2025-09-22 17:24:25', '2025-09-22 17:24:25'),
(51, 34, 2, 'hello  test 123', 0, '2025-09-22 17:29:01', '2025-09-22 17:29:01'),
(52, 2, 34, 'hey', 0, '2025-09-22 17:29:22', '2025-09-22 17:29:22'),
(53, 34, 2, 'now back to top', 0, '2025-09-22 17:29:34', '2025-09-22 17:29:34'),
(54, 2, 34, 'ok now sending', 0, '2025-09-22 17:29:43', '2025-09-22 17:29:43'),
(55, 2, 34, 'send attemp 2', 0, '2025-09-22 17:30:54', '2025-09-22 17:30:54'),
(56, 2, 34, 'hello', 0, '2025-09-22 17:31:12', '2025-09-22 17:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postal_codes`
--

CREATE TABLE `postal_codes` (
  `id` int NOT NULL,
  `postal_code` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `is_active` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `postal_codes`
--

INSERT INTO `postal_codes` (`id`, `postal_code`, `city`, `state`, `country`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'A0A 0A0', 'St. John\'s', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:05:57', '2025-09-24 00:05:57'),
(2, 'A1A 1A1', 'St. John\'s', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:05:57', '2025-09-24 00:05:57'),
(3, 'A2A 2A2', 'Gander', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:05:57', '2025-09-24 00:05:57'),
(4, 'A3A 3A3', 'Corner Brook', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:05:57', '2025-09-24 00:05:57'),
(5, 'A4A 4A4', 'Grand Falls-Windsor', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:05:57', '2025-09-24 00:05:57'),
(6, 'A5A 5A5', 'Stephenville', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:05:57', '2025-09-24 00:05:57'),
(7, 'A6A 6A6', 'Bay Roberts', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:05:57', '2025-09-24 00:05:57'),
(8, 'A7A 7A7', 'Clarenville', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:05:57', '2025-09-24 00:05:57'),
(9, 'A8A 8A8', 'Deer Lake', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:05:57', '2025-09-24 00:05:57'),
(10, 'A9A 9A9', 'Happy Valley-Goose Bay', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:05:57', '2025-09-24 00:05:57'),
(11, 'A0A 0A0', 'St. John\'s', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(12, 'A1A 1A1', 'St. John\'s', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(13, 'A2A 2A2', 'Gander', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(14, 'A3A 3A3', 'Corner Brook', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(15, 'A4A 4A4', 'Grand Falls-Windsor', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(16, 'A5A 5A5', 'Stephenville', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(17, 'A6A 6A6', 'Bay Roberts', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(18, 'A7A 7A7', 'Clarenville', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(19, 'A8A 8A8', 'Deer Lake', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(20, 'A9A 9A9', 'Happy Valley-Goose Bay', 'Newfoundland and Labrador', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(21, 'B0A 0A0', 'Antigonish', 'Nova Scotia', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(22, 'B1A 1A1', 'Sydney', 'Nova Scotia', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(23, 'B2A 2A2', 'New Glasgow', 'Nova Scotia', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(24, 'B3A 3A3', 'Truro', 'Nova Scotia', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(25, 'B4A 4A4', 'Bridgewater', 'Nova Scotia', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(26, 'B5A 5A5', 'Yarmouth', 'Nova Scotia', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(27, 'B6A 6A6', 'Amherst', 'Nova Scotia', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(28, 'B7A 7A7', 'Stellarton', 'Nova Scotia', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(29, 'B8A 8A8', 'Glace Bay', 'Nova Scotia', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(30, 'B9A 9A9', 'North Sydney', 'Nova Scotia', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(31, 'C0A 0A0', 'Charlottetown', 'Prince Edward Island', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(32, 'C1A 1A1', 'Charlottetown', 'Prince Edward Island', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(33, 'C2A 2A2', 'Summerside', 'Prince Edward Island', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(34, 'C3A 3A3', 'Montague', 'Prince Edward Island', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(35, 'C4A 4A4', 'Souris', 'Prince Edward Island', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(36, 'C5A 5A5', 'Georgetown', 'Prince Edward Island', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(37, 'C6A 6A6', 'Kensington', 'Prince Edward Island', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(38, 'C7A 7A7', 'Cornwall', 'Prince Edward Island', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(39, 'C8A 8A8', 'Alberton', 'Prince Edward Island', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(40, 'C9A 9A9', 'Borden-Carleton', 'Prince Edward Island', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(41, 'E0A 0A0', 'Bathurst', 'New Brunswick', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(42, 'E1A 1A1', 'Moncton', 'New Brunswick', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(43, 'E2A 2A2', 'Saint John', 'New Brunswick', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(44, 'E3A 3A3', 'Fredericton', 'New Brunswick', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(45, 'E4A 4A4', 'Oromocto', 'New Brunswick', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(46, 'E5A 5A5', 'Sussex', 'New Brunswick', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(47, 'E6A 6A6', 'Woodstock', 'New Brunswick', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(48, 'E7A 7A7', 'Perth-Andover', 'New Brunswick', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(49, 'E8A 8A8', 'Campbellton', 'New Brunswick', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(50, 'E9A 9A9', 'Dalhousie', 'New Brunswick', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(51, 'G0A 0A0', 'Quebec City', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(52, 'G1A 0A0', 'Quebec City', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(53, 'G2A 0A0', 'Quebec City', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(54, 'G3A 0A0', 'Quebec City', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(55, 'G4A 0A0', 'Quebec City', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(56, 'G5A 0A0', 'Quebec City', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(57, 'G6A 0A0', 'Quebec City', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(58, 'G7A 0A0', 'Quebec City', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(59, 'G8A 0A0', 'Quebec City', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(60, 'G9A 0A0', 'Quebec City', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(61, 'H0A 0A0', 'Montreal', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(62, 'H1A 0A0', 'Montreal', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(63, 'H2A 0A0', 'Montreal', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(64, 'H3A 0A0', 'Montreal', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(65, 'H4A 0A0', 'Montreal', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(66, 'H5A 0A0', 'Montreal', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(67, 'H6A 0A0', 'Montreal', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(68, 'H7A 0A0', 'Montreal', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(69, 'H8A 0A0', 'Montreal', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(70, 'H9A 0A0', 'Montreal', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(71, 'M5V3L9', 'Quebec City', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(72, 'J1A 0A0', 'Sherbrooke', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(73, 'J2A 0A0', 'Sherbrooke', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(74, 'J3A 0A0', 'Sherbrooke', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(75, 'J4A 0A0', 'Sherbrooke', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(76, 'J5A 0A0', 'Sherbrooke', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(77, 'J6A 0A0', 'Sherbrooke', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(78, 'J7A 0A0', 'Sherbrooke', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(79, 'J8A 0A0', 'Sherbrooke', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(80, 'J9A 0A0', 'Sherbrooke', 'Quebec', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(81, 'K0A 0A0', 'Ottawa', 'Ontario', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48'),
(82, 'K1A 0A0', 'Ottawa', 'Ontario', 'Canada', 1, '2025-09-24 00:07:48', '2025-09-24 00:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(12, 'Within a couple of months', 1, '2025-09-03 13:24:41', '2025-09-03 13:24:41'),
(13, 'Within 1 month', 1, '2025-09-03 13:24:54', '2025-09-03 13:24:54'),
(14, 'Within 2 weeks', 1, '2025-09-03 13:25:08', '2025-09-03 13:25:08'),
(15, 'To be discussed', 1, '2025-09-03 13:25:18', '2025-09-03 13:25:18'),
(16, 'Urgent', 1, '2025-09-03 13:25:32', '2025-09-03 13:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(16, 'Apartment building', 1, '2025-09-03 13:22:59', '2025-09-03 13:22:59'),
(17, 'Office', 1, '2025-09-03 13:23:23', '2025-09-03 13:23:23'),
(18, 'Condo', 1, '2025-09-03 13:23:34', '2025-09-03 13:23:34'),
(19, 'Townhouse', 1, '2025-09-03 13:23:47', '2025-09-03 13:23:47'),
(20, 'Semi-detached house', 1, '2025-09-03 13:23:57', '2025-09-03 13:23:57'),
(21, 'Detached house', 1, '2025-09-03 13:24:08', '2025-09-03 13:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `provider_client`
--

CREATE TABLE `provider_client` (
  `id` int NOT NULL,
  `provider_id` bigint NOT NULL,
  `client_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `provider_client`
--

INSERT INTO `provider_client` (`id`, `provider_id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 34, 2, '2025-09-18 17:18:31', '2025-09-18 17:18:55'),
(2, 34, 41, '2025-09-18 19:37:17', '2025-09-18 19:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `provider_leads`
--

CREATE TABLE `provider_leads` (
  `id` int NOT NULL,
  `provider_id` bigint NOT NULL,
  `job_id` bigint NOT NULL,
  `client_id` bigint NOT NULL,
  `purchase_type` enum('subscription','pay_per_lead') DEFAULT NULL,
  `purchase_at` timestamp NULL DEFAULT NULL,
  `purchase_price` decimal(10,0) DEFAULT NULL,
  `stripe_payment_intent_id` varchar(255) DEFAULT NULL,
  `stripe_checkout_session_id` varchar(255) DEFAULT NULL,
  `stripe_payment_method` varchar(255) DEFAULT NULL,
  `payment_status` enum('pending','paid','failed','refunded') DEFAULT 'pending',
  `lead_status` enum('pending','purchased','viewed','contacted','cancelled') DEFAULT 'pending',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `provider_leads`
--

INSERT INTO `provider_leads` (`id`, `provider_id`, `job_id`, `client_id`, `purchase_type`, `purchase_at`, `purchase_price`, `stripe_payment_intent_id`, `stripe_checkout_session_id`, `stripe_payment_method`, `payment_status`, `lead_status`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 34, 5, 2, 'subscription', '2025-09-18 12:17:20', '0', NULL, NULL, NULL, 'pending', 'pending', 1, 0, '2025-09-18 12:17:20', '2025-09-18 12:17:20'),
(2, 34, 3, 41, 'subscription', '2025-09-18 14:37:17', '0', NULL, NULL, NULL, 'pending', 'pending', 1, 0, '2025-09-18 14:37:17', '2025-09-18 14:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int NOT NULL,
  `email` varchar(155) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(3, 'test@test.com', '2025-09-24 17:43:14', '2025-09-24 17:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_packages`
--

CREATE TABLE `subscription_packages` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `billing_cycle` enum('monthly','yearly') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'monthly',
  `connects` int DEFAULT NULL,
  `features` json DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_packages`
--

INSERT INTO `subscription_packages` (`id`, `name`, `description`, `price`, `billing_cycle`, `connects`, `features`, `is_featured`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Basic Plan', 'this is plan description', '100.00', 'monthly', 5, '[\"This is first feature\", \"This is Second feature\", \"This is third feature\"]', 0, 1, 0, '2025-09-10 13:15:18', '2025-09-10 18:31:30'),
(2, 'Premium Plan', 'This is plan Description', '200.00', 'monthly', 10, '[\"This is first feature\", \"This is Second feature\", \"This is Third feature\"]', 1, 1, 0, '2025-09-10 13:18:18', '2025-09-10 13:22:14'),
(3, 'Gold Plan', 'This is gold plan description', '300.00', 'monthly', 100, '[\"This is first feature\", \"This is Second feature\", \"This is Third feature\"]', 1, 1, 0, '2025-09-10 13:25:00', '2025-09-10 18:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `description`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(8, 9, 'Sink Installation & Repair', 'sink-installation-repair', 'Sink Installation & Repair', 1, 0, '2025-09-05 12:08:40', '2025-09-10 15:32:05'),
(9, 9, 'Faucet/Tap Installation & Repair', 'faucettap-installation-repair', 'Faucet/Tap Installation & Repair', 1, 0, '2025-09-05 12:09:03', '2025-09-05 12:09:03'),
(10, 9, 'Garbage Disposal Installation/Repair', 'garbage-disposal-installationrepair', 'Garbage Disposal Installation/Repair', 1, 1, '2025-09-05 12:09:29', '2025-09-10 15:36:06'),
(11, 9, 'Dishwasher Installation & Plumbing', 'dishwasher-installation-plumbing', 'Dishwasher Installation & Plumbing', 1, 1, '2025-09-05 12:09:58', '2025-09-10 15:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int NOT NULL,
  `user_id` bigint NOT NULL,
  `subject` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `attachments` varchar(255) NOT NULL,
  `status` enum('pending','hold','complete','open') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `subject`, `priority`, `message`, `attachments`, `status`, `created_at`, `updated_at`) VALUES
(21, 34, 'Test First Ticket', 'medium', 'this is ticket message', '\"[\\\"uploads\\\\\\/tickets\\\\\\/1758748653_68d45fed2253f.jpg\\\"]\"', 'complete', '2025-09-24 16:17:33', '2025-09-24 16:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('admin','provider','client') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '0',
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_type`, `email_verified_at`, `password`, `remember_token`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', 'admin', NULL, '$2y$12$nHrbqukSc2tTT1BrFWffxOA7L2p.2aCLYMLxasOcX1j9aLbZID0ga', NULL, 1, 0, '2025-09-01 23:14:41', '2025-09-01 23:14:41'),
(2, 'Russell Gomez', 'client@client.com', 'client', NULL, '$2y$12$crdqYF8i86D7Qr.C.5TFLOS5olpZu.Iz1jRM0XX9zrSOKjNZlszlG', NULL, 1, 0, '2025-09-02 12:58:05', '2025-09-05 19:10:12'),
(34, 'duhuw', 'provider@provider.com', 'provider', NULL, '$2y$12$crdqYF8i86D7Qr.C.5TFLOS5olpZu.Iz1jRM0XX9zrSOKjNZlszlG', NULL, 1, 0, '2025-09-10 12:55:52', '2025-09-10 15:11:26'),
(37, 'Roof Traders', 'provider@free.com', 'provider', NULL, '$2y$12$crdqYF8i86D7Qr.C.5TFLOS5olpZu.Iz1jRM0XX9zrSOKjNZlszlG', NULL, 1, 0, '2025-09-11 23:45:56', '2025-09-11 23:46:28'),
(41, 'Zorita Leblanc', 'nasaxaje@mailinator.com', 'client', NULL, '$2y$12$aJG2SR.XCoy31c9oAXnfl.fK4igZco2lBugp1J6J3IefOCyfVFrOS', NULL, 1, 0, '2025-09-12 22:06:14', '2025-09-12 22:06:14'),
(42, 'Adele Bean', 'zixybud@mailinator.com', 'client', NULL, '$2y$12$3BXjbsY9RUTbKvAdaDQh1OzAyOWcUqwmT03oU.//Vov9/H3JMNTs2', NULL, 0, 0, '2025-09-24 17:22:17', '2025-09-24 17:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `bio` text,
  `gender` varchar(100) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postal_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `business_license` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `government_doc` varchar(255) DEFAULT NULL,
  `accept_terms` tinyint DEFAULT NULL,
  `is_verified` tinyint NOT NULL DEFAULT '0',
  `verification_code` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `first_name`, `last_name`, `username`, `avatar`, `bio`, `gender`, `dob`, `phone`, `address`, `country`, `state`, `city`, `postal_code`, `company_name`, `business_license`, `government_doc`, `accept_terms`, `is_verified`, `verification_code`, `created_at`, `updated_at`) VALUES
(1, 2, 'Russell', 'Gomez', NULL, 'uploads/user/profile/1758753015_68d470f7ccca0.jpg', 'Sed sint sint modi o', 'female', '1994-11-09', '+1 (528) 485-5578', 'Deserunt ducimus qu', 'In officia consequat', 'Dolorem voluptas deb', 'Id voluptatibus comm', 'Ullamco enim iste qu', NULL, 'uploads/user/doc/1757112591_68bb690f3b909.jpg', 'uploads/user/doc/1757112701_68bb697da749f.jpg', NULL, 0, NULL, '2025-09-02 12:58:05', '2025-09-24 17:30:15'),
(30, 34, 'duhuw', 'Ayala', NULL, NULL, 'This is my bio', 'male', '2016-02-09', '0300000000', 'test Address', 'us', 'alaska', 'hanes', '151515', 'Franklin Mcbride Inc', 'uploads/user/doc/1758752020_68d46d1493569.jpg', 'uploads/user/doc/1758752020_68d46d14939f9.jpg', 1, 0, 'email-verified', '2025-09-10 12:55:52', '2025-09-24 17:13:40'),
(33, 37, 'Roof', 'Traders', NULL, NULL, NULL, NULL, NULL, '981465065198', NULL, NULL, NULL, NULL, NULL, 'Roof Traders', 'uploads/user/doc/1757619956_68c326f484295.jpg', 'uploads/user/doc/1757619956_68c326f488324.jpg', 1, 0, 'email-verified', '2025-09-11 23:45:56', '2025-09-11 23:46:28'),
(37, 41, 'Zorita', 'Leblanc', NULL, NULL, NULL, NULL, NULL, '8751984965', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2025-09-12 22:06:14', '2025-09-12 22:14:00'),
(38, 42, 'Adele', 'Bean', NULL, NULL, NULL, NULL, NULL, '464614894', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2025-09-24 17:22:17', '2025-09-24 17:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` int NOT NULL,
  `user_id` bigint NOT NULL,
  `subscription_package_id` bigint NOT NULL,
  `stripe_checkout_session_id` varchar(255) NOT NULL,
  `stripe_payment_intent_id` varchar(255) NOT NULL,
  `stripe_payment_method` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `renewed_at` date DEFAULT NULL,
  `cancelled_at` date DEFAULT NULL,
  `payment_status` enum('pending','paid','failed','refunded') NOT NULL DEFAULT 'pending',
  `subscription_status` enum('active','expired','cancelled','upcoming') NOT NULL DEFAULT 'upcoming',
  `remaining_connects` decimal(10,0) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  `currency` varchar(20) NOT NULL DEFAULT 'usd',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_subscriptions`
--

INSERT INTO `user_subscriptions` (`id`, `user_id`, `subscription_package_id`, `stripe_checkout_session_id`, `stripe_payment_intent_id`, `stripe_payment_method`, `start_date`, `end_date`, `renewed_at`, `cancelled_at`, `payment_status`, `subscription_status`, `remaining_connects`, `price`, `currency`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 34, 1, 'cs_test_a1vJAQRUnZxrLnjWeettJE8gZQgXmqGDyInmDwCFwVUggeuW66b9gUlSQL', 'pi_3S8lSAGfnb89HY8o1yfAwaOt', 'subscription', '2025-09-18', '2025-10-18', NULL, NULL, 'paid', 'active', '3', '100', 'usd', 1, 0, '2025-09-18 12:17:11', '2025-09-18 14:37:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line_distances`
--
ALTER TABLE `line_distances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `postal_codes`
--
ALTER TABLE `postal_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider_client`
--
ALTER TABLE `provider_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider_leads`
--
ALTER TABLE `provider_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_packages`
--
ALTER TABLE `subscription_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_sub_categories_category` (`category_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `line_distances`
--
ALTER TABLE `line_distances`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postal_codes`
--
ALTER TABLE `postal_codes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `provider_client`
--
ALTER TABLE `provider_client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `provider_leads`
--
ALTER TABLE `provider_leads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscription_packages`
--
ALTER TABLE `subscription_packages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `fk_sub_categories_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
