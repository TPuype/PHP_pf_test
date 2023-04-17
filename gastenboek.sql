-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2022 at 12:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gastenboek`
--

-- --------------------------------------------------------

--
-- Table structure for table `berichten`
--

CREATE TABLE `berichten` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `boodschap` varchar(255) NOT NULL,
  `tijdstip` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berichten`
--

INSERT INTO `berichten` (`id`, `userId`, `boodschap`, `tijdstip`) VALUES
(7, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sapien sapien, rutrum viverra viverra sit amet, mattis sed risus. ', '2022-07-19 12:26:26'),
(8, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vitae nisi et turpis aliquet tempor. ', '2022-07-19 12:26:51'),
(9, 2, 'Lorem ipsum dolor sit amet. ', '2022-07-19 12:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `naam`, `email`, `wachtwoord`) VALUES
(1, 'Bobby', 'bobby.fischer@gmail.com', '$2y$10$QGRhfNuzYCkFlXUKPSh.9.vCljezZlFd5TctxtiELLLuM1WQ5kXR2'),
(2, 'Boris', 'Spasski01@hotmail.com', '$2y$10$6CeaRrbwr/9PPelZn8FOZOzulouUH0zDJM.QzVpGkr/FN8p7spHL.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berichten`
--
ALTER TABLE `berichten`
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
-- AUTO_INCREMENT for table `berichten`
--
ALTER TABLE `berichten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
