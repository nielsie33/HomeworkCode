-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2019 at 09:58 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dierenarts`
--

-- --------------------------------------------------------

--
-- Table structure for table `afspraken`
--

CREATE TABLE `afspraken` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `tijd` varchar(64) NOT NULL,
  `klant_id` int(11) NOT NULL,
  `huisdier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `afspraken`
--

INSERT INTO `afspraken` (`id`, `datum`, `tijd`, `klant_id`, `huisdier_id`) VALUES
(1, '0000-00-00', '15:00', 1, 1),
(2, '2019-06-09', '15:00', 1, 1),
(3, '2019-06-15', '16:00', 3, 3),
(4, '2019-06-15', '16:00', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `huisdieren`
--

CREATE TABLE `huisdieren` (
  `id` int(11) NOT NULL,
  `klant_id` int(11) NOT NULL,
  `soort` varchar(32) NOT NULL,
  `ras` varchar(32) NOT NULL,
  `naam` varchar(64) NOT NULL,
  `gebdatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `huisdieren`
--

INSERT INTO `huisdieren` (`id`, `klant_id`, `soort`, `ras`, `naam`, `gebdatum`) VALUES
(1, 1, 'Aap', 'Monkey', 'Dikke', '0000-00-00'),
(2, 1, 'Aap', 'Monkey', 'Dikke', '2019-06-14'),
(4, 3, 'Aap', 'Monkey', 'Dikke', '2019-06-14'),
(6, 2, 'Aap', 'Monkey', 'Dikke', '2019-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

CREATE TABLE `klanten` (
  `id` int(11) NOT NULL,
  `klantnaam` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `wachtwoord` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klanten`
--

INSERT INTO `klanten` (`id`, `klantnaam`, `email`, `wachtwoord`) VALUES
(1, 'Tycho', 'sasfsfd@gmail.com', '$2y$10$jCLm0mxlmylftqKMdLcGruM5EuwEeMzFNmTAOGW1SMa8N9ar.e.b2'),
(2, 'kljdshflkjadsf', 'asljdjas@gmail.com', '$2y$10$Hdj7T/dOJRuQGvX8xMAHcOE2dCXhH3BtXNDIXU0orbLnEDpMUiu8W'),
(3, 'asdasdasd', 'asdasdasd@gmail.com', '$2y$10$mGXycootUQeMfLc7fklfvO088zv8dJVq.d3FsjwfLyihq8OBUj2O6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afspraken`
--
ALTER TABLE `afspraken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `huisdieren`
--
ALTER TABLE `huisdieren`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afspraken`
--
ALTER TABLE `afspraken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `huisdieren`
--
ALTER TABLE `huisdieren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `klanten`
--
ALTER TABLE `klanten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
