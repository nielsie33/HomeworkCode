-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 mei 2018 om 10:30
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `administratie`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `student`
--

CREATE TABLE `student` (
  `ID` int(9) NOT NULL,
  `achternaam` varchar(15) DEFAULT NULL,
  `voornaam` varchar(15) DEFAULT NULL,
  `leeftijd` int(2) DEFAULT NULL,
  `adres` varchar(15) DEFAULT NULL,
  `postcode` varchar(6) DEFAULT NULL,
  `stad` varchar(30) DEFAULT NULL,
  `telefoonnummer` varchar(10) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `opleiding` varchar(15) DEFAULT NULL,
  `klas` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `student`
--

INSERT INTO `student` (`ID`, `achternaam`, `voornaam`, `leeftijd`, `adres`, `postcode`, `stad`, `telefoonnummer`, `email`, `opleiding`, `klas`) VALUES
(1, 'Huisden', 'Dylan', 18, 'Middenweg 11', '1008VV', 'Amsterdam', '0204445555', 'dhuisden@rovca.nl', 'ict', 'AO88'),
(2, 'Bosman', 'Nitin', 17, 'Leidseweg 22', '9900BB', 'Amsterdam', '0209994444', 'nbosman@hotmail.com', 'ict', 'AO99');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
