-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 10, 2021 at 06:07 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
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
-- Database: `CMS`
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
  `tags` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author`, `content`, `created_at`, `updated_at`, `tags`, `category_id`) VALUES
(1, 'Wordpress', 'Maria Naseem', 'WordPress is a free and open-source content management system written in PHP and paired with a MySQL or MariaDB database. Features include a plugin architecture and a template system, referred to within WordPress as Themes.', '2021-09-08 10:28:14', '2021-11-10 07:54:44', 'webcontent,framework', 4),
(2, 'MUmmy', 'Muhammad Usman', 'Normally a WordPress developer will need to perform the task of filling up an empty theme with dummy content, and doing this manually can be really time consuming, the main reasons this plugin was create was to speed up this process.&lt;br /&gt;', '2021-09-08 10:28:20', '2021-09-14 11:16:14', 'Webcontent', 4),
(3, ' Data', 'Muhammad Usman', 'Normally a WordPress developer will need to perform the task of filling up an empty theme with dummy content, and doing this manually can be really time consuming, the main reasons this plugin was create was to speed up this process.\r\n', '2021-09-08 10:28:20', '2021-09-08 10:28:20', 'framework', 2),
(5, 'zeenu', 'Maria Naseem', 'Zeenu I love you!', '2021-09-15 12:07:30', '2021-10-28 12:51:16', 'Entertainment', 5),
(7, 'abc', 'Maria Naseem', 'Entertainment is a form of activity that holds the attention and interest of an audience, or gives pleasure and delight. It can be an idea or a task, but is more likely to be one of\r\n', '2021-11-10 07:22:12', '2021-11-10 07:22:12', 'Entertainment,Fun', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `post_id` varchar(255) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `post_id`, `tag_name`) VALUES
(1, '5,7', 'Entertainment'),
(2, '1,2', 'Webcontent'),
(3, '1,3', 'framework'),
(4, '7', 'Fun');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `firstname`, `lastname`, `role`) VALUES
(3, 'admin@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', 'Maria Naseem', 'Maria', 'Naseem', 'admin'),
(4, 'admin1@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', 'Zeenat Usman', 'Zeenat', 'Usman', 'admin'),
(7, 'JAnDoe@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', 'Jan JAN', 'Jan', 'JAN', 'admin'),
(13, 'MAno@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', 'Mano Catou', 'Mano', 'Catou', 'user'),
(14, 'miss@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', ' JKL  MNO', ' JKL', ' MNO', 'user'),
(15, 'JAnDoe123@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', ' JKL  MNO', ' JKL', ' MNO', 'user'),
(23, 'adminsadasf@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', ' JKL  MNO', ' JKL', ' MNO', 'user'),
(24, 'admin@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', ' JKL  MNO', ' JKL', ' MNO', 'user'),
(25, 'marianaseem99@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', ' JKL  MNO', ' JKL', ' MNO', 'user'),
(26, 'abcdef@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', ' abc def', ' abc', 'def', 'admin'),
(27, 'abckjl@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', ' abc jkl', ' abc', 'jkl', 'admin');

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
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;