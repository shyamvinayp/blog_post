-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2022 at 05:44 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_post`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@test.com', '891Zud7lPkMd5aL6EWJxjYcwaQI6oDWzbT3EnrDoDQ0K1kLnxPf0uqVkRODhBOnN', '2021-06-09 12:05:26'),
('admin@test.com', '29HtyFI9FANHBIoiaYJ9hnCuKgNGXAFNrKXOdzU500LuBcHwsA47dzUH9IPfTaRJ', '2021-06-09 12:06:54'),
('admin@test.com', 'XYYLda5Bn3I53aH6ALy0wtZ9NUxVsEb23POdN9iIL8szk15nvlk29WCHGDJZuhux', '2021-06-09 12:11:26'),
('admin@test.com', 'mWlJa7ADRlZtJPpv70QtmV1EWTSNJXXE9b6S705YdZrPol4UoTmCHluaJ17H8ZY8', '2021-06-09 12:11:46'),
('admin@test.com', 'OljzcvrIqe8I2Izh5aNRSy3Ab3NcydGsDy32VEJdNfaLAXFdxS2QTJnaFUaZj6Ko', '2021-06-09 12:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(3, 'test new post title updt', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', '2022-05-16 16:12:56', '2022-05-16 16:50:58'),
(4, 'fdsfdsaf', 'fdsfdsafdsf', '2022-05-16 16:14:23', '2022-05-16 16:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_user_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `fname` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `lname` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `state` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `zip` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_user_id`, `name`, `email`, `password`, `fname`, `lname`, `address`, `phone`, `country_id`, `city`, `state`, `zip`, `type`, `status`, `created_at`, `updated_at`, `remember_token`) VALUES
(13, NULL, 'shyam', 'shyam@test.com', '$2y$10$KyCM8psQt4ABrLhQWwu/c.LfxCP1CQp6jqE9xXI88eoeKMcYvhUre', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '2021-10-26 18:08:43', '2022-03-19 20:33:05', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
