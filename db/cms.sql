-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2021 at 10:09 AM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Entertainment'),
(2, 'Health'),
(3, 'Sports'),
(4, 'Social'),
(5, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` varchar(512) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tags` varchar(255) NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author`, `content`, `created_at`, `updated_at`, `tags`, `category_id`) VALUES
(1, 'Wordpress', 'Maria Naseem', 'Whenever you create a new Theme or Plugin you will always need to create custom data to test whether your plugin is working or not, and as Developers ourselves we had this problem quite alot.&lt;br /&gt;\r\n&lt;br /&gt;\r\nOur goal with this plugin is to fill this gap where you have problem with a good solution both for Developers and for Users of WordPress.&lt;br /&gt;\r\n&lt;br /&gt;\r\ngdcv.kj/blukyx', '2021-09-08 10:28:14', '2021-09-14 12:54:18', 'webcontent', 1),
(2, 'MUmmy', 'Muhammad Usman', 'Normally a WordPress developer will need to perform the task of filling up an empty theme with dummy content, and doing this manually can be really time consuming, the main reasons this plugin was create was to speed up this process.&lt;br /&gt;', '2021-09-08 10:28:20', '2021-09-14 11:16:14', 'DummyData', 4),
(3, ' Data', 'Muhammad Usman', 'Normally a WordPress developer will need to perform the task of filling up an empty theme with dummy content, and doing this manually can be really time consuming, the main reasons this plugin was create was to speed up this process.\r\n', '2021-09-08 10:28:20', '2021-09-08 10:28:20', 'DummyData', 2),
(5, 'chtiyvkukbnk', ' biu gchjvuy', 'hdxgfcgvhbjnkmsxdcfvgbhnj', '2021-09-15 12:07:30', '2021-09-15 12:07:30', '', 3),
(6, 'chtiyvkukbnk', ' biu gchjvuy', 'hdxgfcgvhbjnkmsxdcfvgbhnj', '2021-09-15 12:08:17', '2021-09-15 12:08:17', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `firstname`, `lastname`, `role`) VALUES
(2, 'user@gmail.com', 'asdf2021', 'Muhammad Usman', 'Muhammad', 'Usman', 'user'),
(3, 'admin@gmail.com', 'asdf2021', 'Maria Naseem', 'Maria', 'Naseem', 'admin'),
(4, 'admin1@gmail.com', 'asdf2021', 'Zeenat Usman', 'Zeenat', 'Usman', 'admin'),
(7, 'JAnDoe@gmail.com', 'asdf2021', 'Jan JAN', 'Jan', 'JAN', 'admin'),
(13, 'MAno@gmail.com', 'asdf2021', 'Mano Catou', 'Mano', 'Catou', 'user'),
(14, 'miss@gmail.com', 'asdf2021', ' JKL  MNO', ' JKL', ' MNO', 'user'),
(15, 'JAnDoe123@gmail.com', 'asdf2021', ' JKL  MNO', ' JKL', ' MNO', 'user'),
(23, 'adminsadasf@gmail.com', 'asdf2021', ' JKL  MNO', ' JKL', ' MNO', 'user'),
(24, 'admin@gmail.com', 'asdf2021', ' JKL  MNO', ' JKL', ' MNO', 'user'),
(25, 'marianaseem99@gmail.com', 'asdf2021', ' JKL  MNO', ' JKL', ' MNO', 'user'),
(26, 'abcdef@gmail.com', 'asdf2021', ' abc def', ' abc', 'def', 'admin'),
(27, 'abckjl@gmail.com', 'asdf2021', ' abc jkl', ' abc', 'jkl', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
