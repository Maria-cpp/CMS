-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2021 at 03:21 PM
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
(5, 'Food'),
(9, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` varchar(512) NOT NULL,
  `image_URL` varchar(255) NOT NULL DEFAULT './src/images/welcome.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tags` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author`, `content`, `image_URL`, `created_at`, `updated_at`, `tags`, `category_id`) VALUES
(1, 'Wordpress', 'Maria Naseem', 'WordPress is a free and open-source content management system written in PHP and paired with a MySQL or MariaDB database. Features include a plugin architecture and a template system, referred to within WordPress as Themes.', './src/images/wordpress.png', '2021-09-08 10:28:14', '2021-11-10 07:54:44', 'webcontent,framework', 9),
(5, 'ZEENU', 'Maria Naseem', 'Zeenu I love you!', './src/images/zeenu.png', '2021-09-15 12:07:30', '2021-10-28 12:51:16', 'Entertainment', 1),
(7, 'Entrtainment', 'Maria Naseem', 'Entertainment is a form of activity that holds the attention and interest of an audience, or gives pleasure and delight. It can be an idea or a task, but is more likely to be one of\r\n', './src/images/entertainment.png', '2021-11-10 07:22:12', '2021-11-10 07:22:12', 'Entertainment,Fun', 1),
(11, 'Postman', 'Maria Naseem', 'Postman is an API platform for building and using APIs. Postman simplifies each step of the API lifecycle and streamlines collaboration so you can create better APIs—faster.', './src/images/postman.png', '2021-11-12 12:39:32', '2021-11-12 12:39:32', 'postman', 9),
(12, 'Nginx', 'Maria Naseem', 'By default the file is named nginx. conf and for NGINX Plus is placed in the /etc/nginx directory. (For NGINX Open Source , the location depends on the package system used to install NGINX and the operating system. It is typically one of /usr/local/nginx/conf, /etc/nginx, or /usr/local/etc/nginx.)', './src/images/NGINX-logo.png', '2021-11-12 12:41:21', '2021-11-12 12:41:21', 'nginx', 9),
(13, 'Moralis', 'Maria Naseem', 'Moralis is a leading web development platform that offers everything that the user needs to create, host, and grow great dApps in one place. ... It is the quickest method to create and deploy decentralised applications (dApps) on Elrond, Ethereum, BSC, Solana, and Polygon (more coming).', './src/images/moralis.png', '2021-11-15 06:07:37', '2021-11-15 10:58:28', 'Technology,Tools,Blockchain,Fun', 9),
(14, 'Github', 'Maria Naseem', 'GitHub, Inc. is a provider of Internet hosting for software development and version control using Git. It offers the distributed version control and source code management functionality of Git, plus its own features.', './src/images/GitHub-Mark.png', '2021-11-15 11:08:29', '2021-11-15 11:27:42', 'Technology,Tools', 9),
(19, '', 'Maria Naseem', '', './src/images/welcome.jpg', '2021-11-23 09:44:38', '2021-11-23 09:44:38', '', 1),
(20, 'image upload', 'Maria Naseem', 'zxdbiugvbjh gt ufg ilugt', './src/images/welcome.jpg', '2021-11-23 09:49:58', '2021-11-23 09:49:59', 'images', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `post_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `post_id`, `tag_name`) VALUES
(1, '5,7', 'Entertainment'),
(2, '1', 'Webcontent'),
(3, '1,3', 'framework'),
(4, '7,13', 'Fun'),
(5, '13,14', 'Technology'),
(7, '13,14,18', 'Tools'),
(8, '13', 'Blockchain'),
(13, '19', ''),
(14, '20', 'images');

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
(7, 'JAnDoe@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', 'Jan Doe', 'Jan', 'JAN', 'admin'),
(13, 'MAno@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', 'Mano Catou', 'Mano', 'Catou', 'user'),
(14, 'miss@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', 'Miss Maria', ' JKL', ' MNO', 'user'),
(15, 'JAnDoe123@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', 'Jan Doe', ' JKL', ' MNO', 'user'),
(23, 'adminsadasf@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', 'Asif Ali', ' JKL', ' MNO', 'user'),
(25, 'marianaseem99@gmail.com', '$2y$10$C0w1zLRCdVUT/d90FlD1ROqlDmhnfXeuYT2mQRI/NHPJZk7LYVk72', 'Maria Usman', ' JKL', ' MNO', 'user');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
