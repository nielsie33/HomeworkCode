-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 07:53 PM
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
-- Database: `eindopdracht`
--

-- --------------------------------------------------------

--
-- Table structure for table `klacht`
--

CREATE TABLE `klacht` (
  `ID` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `geboortedatum` varchar(11) NOT NULL,
  `postcode` varchar(11) NOT NULL,
  `naam` varchar(64) NOT NULL,
  `datum` datetime NOT NULL,
  `ID_klachtsoort` int(11) NOT NULL,
  `geslacht` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klacht`
--

INSERT INTO `klacht` (`ID`, `email`, `geboortedatum`, `postcode`, `naam`, `datum`, `ID_klachtsoort`, `geslacht`) VALUES
(1, 'xdxd@gmail.com', '1999-10-10', '1098 LX', 'John van den Berg', '2018-05-16 03:10:07', 1, 'M'),
(2, 'xdxdasdasd@gmail.com', '2010-03-30', '1098 LV', 'mijn naam', '2018-05-16 04:20:00', 3, 'V'),
(3, 'asdasd@gmail.com', '2010-03-31', '1999 BB', 'jonanana', '2018-05-15 13:21:14', 2, 'M'),
(4, 'sdfgjkhsdf@gmail.com', '1999-19-22', '2000 AA', 'jashdkjahsd', '2018-05-10 00:31:00', 3, 'V'),
(172, 'qjsdklfjsdk@gaskldj.nl', '1999-10-10', '1099 TT', 's;ldfksdl;', '2018-05-17 00:00:00', 1, 'M'),
(173, 'kjhasdjkhasd@gmail.com', '1999-10-10', '1099 TT', 'asjkldhasdjkd', '2018-05-17 19:00:00', 2, 'M'),
(174, '2jklashd@gmail.com', '1999-10-10', '1098 LX', 'asjkldha', '2018-05-17 19:04:44', 2, 'M'),
(182, '219188@student.scalda.nl', '1999-10-10', '2000 AA', 'Niels van Hamme', '2018-05-17 19:24:20', 3, 'V'),
(183, '219188@student.scalda.nl', '1999-10-10', '1098 LV', 'Niels van Hamme', '2018-05-17 19:24:39', 1, 'V'),
(184, '219188@student.scalda.nl', '1999-10-10', '1098 LX', 'Niels van Hamme', '2018-05-17 19:24:46', 2, 'M'),
(185, '219188@student.scalda.nl', '1999-10-10', '1098 XX', 'Niels van Hamme', '2018-05-17 19:24:59', 3, 'M'),
(186, '219188@student.scalda.nl', '1999-10-10', '1099 TT', 'Niels van Hamme', '2018-05-17 19:25:07', 1, 'V'),
(187, '219188@student.scalda.nl', '1999-10-10', '1999 BB', 'Niels van Hamme', '2018-05-17 19:25:15', 2, 'M'),
(188, '219188@student.scalda.nl', '1999-10-10', '2000 AA', 'Niels van Hamme', '2018-05-17 19:25:24', 3, 'M'),
(190, '219188@student.scalda.nl', '2001-03-21', '1999 BB', 'Niels van Hamme', '2018-05-17 19:27:13', 2, 'M'),
(191, '219188@student.scalda.nl', '2001-03-21', '1098 XX', 'Niels van Hamme', '2018-05-17 19:27:48', 2, 'M'),
(192, '219188@student.scalda.nl', '1999-10-10', '1099 TT', 'Niels van Hamme', '2018-05-17 19:31:14', 2, 'V'),
(193, '219188@student.scalda.nl', '2001-03-21', '1099 TT', 'Niels van Hamme', '2018-05-17 19:41:47', 2, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `klachtsoort`
--

CREATE TABLE `klachtsoort` (
  `ID` int(11) NOT NULL,
  `klachtsoort` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klachtsoort`
--

INSERT INTO `klachtsoort` (`ID`, `klachtsoort`) VALUES
(1, 'milieu'),
(2, 'veiligheid'),
(3, 'geluid');

-- --------------------------------------------------------

--
-- Table structure for table `postcode`
--

CREATE TABLE `postcode` (
  `ID` int(9) NOT NULL,
  `postcode` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postcode`
--

INSERT INTO `postcode` (`ID`, `postcode`) VALUES
(1, '1098LV'),
(2, '1098LX'),
(3, '1098XX'),
(4, '1099TT'),
(5, '1999BB'),
(6, '2000AA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klacht`
--
ALTER TABLE `klacht`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `klachtsoort`
--
ALTER TABLE `klachtsoort`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `postcode`
--
ALTER TABLE `postcode`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klacht`
--
ALTER TABLE `klacht`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `klachtsoort`
--
ALTER TABLE `klachtsoort`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `postcode`
--
ALTER TABLE `postcode`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
