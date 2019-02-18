-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 01:38 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `domain_checker_tool`
--

-- --------------------------------------------------------

--
-- Table structure for table `bad_words`
--

CREATE TABLE `bad_words` (
  `id` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `add_date` date DEFAULT NULL,
  `length` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bad_words`
--

INSERT INTO `bad_words` (`id`, `text`, `add_date`, `length`) VALUES
(20, 'dark angel', '2018-05-08', 10),
(24, 'dsfsd dsfdsf', '2018-05-08', 12),
(25, 'dsfds dsfdf', '2018-05-08', 11),
(26, 'sdf dsf', '2018-05-08', 7),
(27, 'hjgfk fdj', '2018-05-08', 9);

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE `domains` (
  `id` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `available` varchar(255) DEFAULT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`id`, `link`, `title`, `available`, `user`) VALUES
(1, 'www.facebook.com', 'UNKNOWN', 'NO', NULL),
(2, 'www.google.com', 'Google', 'NO', NULL),
(3, 'http://www.iori.com', 'iori', 'YES', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `package` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `snapshots`
--

CREATE TABLE `snapshots` (
  `id` int(11) NOT NULL,
  `domain` int(11) DEFAULT NULL,
  `snap_original_date` date DEFAULT NULL,
  `get_date` date DEFAULT NULL,
  `spam_score` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `snapshots`
--

INSERT INTO `snapshots` (`id`, `domain`, `snap_original_date`, `get_date`, `spam_score`, `user`) VALUES
(1, 1, '2018-01-01', '2018-05-10', 0, NULL),
(2, 1, '2018-01-02', '2018-05-10', 0, NULL),
(3, 1, '2018-01-03', '2018-05-10', 0, NULL),
(4, 1, '2018-01-04', '2018-05-10', 0, NULL),
(5, 1, '2018-01-05', '2018-05-10', 0, NULL),
(6, 1, '2018-01-06', '2018-05-10', 0, NULL),
(7, 1, '2018-01-07', '2018-05-10', 0, NULL),
(8, 1, '2018-01-08', '2018-05-10', 0, NULL),
(9, 1, '2018-01-09', '2018-05-10', 0, NULL),
(10, 1, '2018-01-10', '2018-05-10', 0, NULL),
(11, 2, '2018-01-01', '2018-05-10', 0, NULL),
(12, 2, '2018-01-02', '2018-05-10', 0, NULL),
(13, 2, '2018-01-03', '2018-05-10', 0, NULL),
(14, 2, '2018-01-04', '2018-05-10', 0, NULL),
(15, 2, '2018-01-05', '2018-05-10', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `city`, `state`, `zip_code`, `email`, `phone_number`, `credit`, `registration_date`, `type`, `password`) VALUES
(1, 'bader', 'iori', '08 hellsing house', 'california', 'california', '81400', 'bader.iori.2016@gmail.com', '', 500, '2018-05-10', 'user', '16f00412b648da4947e16562c6612841'),
(2, 'Bader', 'Iori', '02 hellsing house', 'California', 'California', '81400', 'iori.yagami@hotmail.com', '+212522010410', 0, '2018-05-10', 'user', '16f00412b648da4947e16562c6612841'),
(3, 'black', 'widow', '02 hellsing house', 'california', 'california', '81400', 'black@widow.com', '+212533552211', 0, '2018-05-11', 'user', '16f00412b648da4947e16562c6612841');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bad_words`
--
ALTER TABLE `bad_words`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_id` (`user`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `package` (`package`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snapshots`
--
ALTER TABLE `snapshots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domain` (`domain`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bad_words`
--
ALTER TABLE `bad_words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `domains`
--
ALTER TABLE `domains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `snapshots`
--
ALTER TABLE `snapshots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `domains`
--
ALTER TABLE `domains`
  ADD CONSTRAINT `fk_users_id` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`package`) REFERENCES `packages` (`id`);

--
-- Constraints for table `snapshots`
--
ALTER TABLE `snapshots`
  ADD CONSTRAINT `snapshots_ibfk_1` FOREIGN KEY (`domain`) REFERENCES `domains` (`id`),
  ADD CONSTRAINT `snapshots_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
