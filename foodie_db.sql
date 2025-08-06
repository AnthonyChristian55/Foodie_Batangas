-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 07:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodie_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodie_admin`
--

CREATE TABLE `foodie_admin` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foodie_admin`
--

INSERT INTO `foodie_admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$lCVSsMs4Yq04rV5saj5UcO1q3VF9xZjPgN.ydWLb6fcAs/2xBhB8i', '2024-07-14 14:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `foodie_otherinfo`
--

CREATE TABLE `foodie_otherinfo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `birthday` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `favorite_food` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foodie_otherinfo`
--

INSERT INTO `foodie_otherinfo` (`id`, `user_id`, `birthday`, `age`, `province`, `gender`, `favorite_food`) VALUES
(1, 7, '1996-01-01', 20, 'Batangas', 'Male', 'Fried Chicken');

-- --------------------------------------------------------

--
-- Table structure for table `foodie_posts`
--

CREATE TABLE `foodie_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image_path` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT 0,
  `approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foodie_posts`
--

INSERT INTO `foodie_posts` (`id`, `user_id`, `content`, `created_at`, `updated_at`, `image_path`, `rating`, `approved`) VALUES
(18, 7, 'Great Lomi!', '2024-07-18 17:18:00', '2024-07-18 17:18:43', 'uploads/lomi.jpg', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `foodie_users`
--

CREATE TABLE `foodie_users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foodie_users`
--

INSERT INTO `foodie_users` (`id`, `fullname`, `username`, `pw`, `email`, `profile_pic`) VALUES
(7, 'Anthony Christian Rosales', 'anthony_user', '$2y$10$3982PF8n0QUc6lO6.rfR3uUVsrhfISiX4/hcdKqPLm.Ga0xpHmlEu', 'anthonychristian@gmail.com', 'uploads/stock1.jpg'),
(8, 'Mike Ross', 'mike_user', '$2y$10$KZrNgeEkSFyet18dQzDAM.vKcvnnEODFbyvnSZ.mucsF/9KWU6xa.', 'mikeross@gmail.com', 'uploads/mike.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foodie_admin`
--
ALTER TABLE `foodie_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `foodie_otherinfo`
--
ALTER TABLE `foodie_otherinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `foodie_posts`
--
ALTER TABLE `foodie_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `foodie_users`
--
ALTER TABLE `foodie_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foodie_admin`
--
ALTER TABLE `foodie_admin`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `foodie_otherinfo`
--
ALTER TABLE `foodie_otherinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `foodie_posts`
--
ALTER TABLE `foodie_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `foodie_users`
--
ALTER TABLE `foodie_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foodie_otherinfo`
--
ALTER TABLE `foodie_otherinfo`
  ADD CONSTRAINT `foodie_otherinfo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `foodie_users` (`id`);

--
-- Constraints for table `foodie_posts`
--
ALTER TABLE `foodie_posts`
  ADD CONSTRAINT `foodie_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `foodie_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
