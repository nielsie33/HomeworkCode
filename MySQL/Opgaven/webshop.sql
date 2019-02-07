-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 mei 2018 om 10:31
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
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `album`
--

CREATE TABLE `album` (
  `ID` int(11) NOT NULL,
  `titel` varchar(22) NOT NULL,
  `artiest` varchar(15) NOT NULL,
  `genre` varchar(15) NOT NULL,
  `prijs` decimal(5,2) NOT NULL,
  `voorraad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `album`
--

INSERT INTO `album` (`ID`, `titel`, `artiest`, `genre`, `prijs`, `voorraad`) VALUES
(1, 'Cafe Atlantico', 'Cesaria Evora', 'World', '3.00', 100),
(2, 'Rumba Azul', 'Caetano Veloso', 'Latin', '4.90', 50),
(3, 'Survivor', 'Destiny\'s child', 'R&B', '3.00', 789),
(4, 'Oh Girl', 'The Chi-lites', 'Pop', '3.00', 2),
(5, 'Der Her ist mei getreu', 'Ton Koopman', 'Klassiek', '5.50', 30),
(6, 'Closing Time', 'Tom Waits', 'Rock', '3.00', 0),
(7, 'Irresistible', 'Celia Cruz', 'Latin', '3.50', 23),
(8, 'Marvin Gaye II', 'Marvin Gaye', 'R&B', '4.00', 154),
(9, 'Mi Sangre', 'Juanes', 'Latin', '3.90', 123),
(10, 'Greatest Hits 2', 'Queen', 'Rock', '3.00', 0),
(11, '3121', 'Prince', 'Rock', '3.45', 0),
(12, 'Antologia I', 'Paco de Lucia', 'World', '3.00', 320);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `item`
--

CREATE TABLE `item` (
  `ID` int(11) NOT NULL,
  `weborder_ID` int(11) NOT NULL,
  `klant_ID` int(11) NOT NULL,
  `album_ID` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `prijs_eenheid` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `item`
--

INSERT INTO `item` (`ID`, `weborder_ID`, `klant_ID`, `album_ID`, `aantal`, `prijs_eenheid`) VALUES
(1, 1, 1, 1, 1, '3.00'),
(2, 1, 1, 5, 2, '5.50'),
(3, 2, 5, 8, 1, '4.00'),
(4, 2, 5, 10, 2, '3.00'),
(5, 3, 3, 1, 1, '3.00'),
(6, 4, 2, 5, 1, '5.50'),
(7, 4, 2, 8, 1, '4.00'),
(8, 4, 2, 6, 1, '3.00'),
(9, 5, 6, 4, 2, '3.00'),
(10, 5, 6, 6, 1, '3.00'),
(11, 5, 6, 1, 1, '3.00'),
(12, 5, 6, 9, 1, '3.90'),
(13, 5, 6, 10, 3, '3.00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `ID` int(11) NOT NULL,
  `voornaam` varchar(15) NOT NULL,
  `achternaam` varchar(15) NOT NULL,
  `adres` varchar(22) NOT NULL,
  `postcode` varchar(11) NOT NULL,
  `woonplaats` varchar(15) NOT NULL,
  `email` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`ID`, `voornaam`, `achternaam`, `adres`, `postcode`, `woonplaats`, `email`) VALUES
(1, 'Dylan', 'Huisden', 'Middenweg 11', '1088VV', 'Amsterdam', 'dhuisden@roc.nl'),
(2, 'Nitin', 'Bosman', 'Leidseweg 22', '9900BB', 'Amsterdam', 'nbosman@roc.nl'),
(3, 'Joseph', 'Demirel', 'Leidseplein 33', '9988BB', 'Utrecht', 'josdem@hotmail.com'),
(4, 'Franco', 'Tasiyan', 'Kruislaan 444', '3300VV', 'Utrecht', 'frantas@wanadoo.nl'),
(5, 'Akash', 'Kabli', 'Galileiplantsoen 111', '1010RR', 'Amstelveen', 'aka@hetnet.nl'),
(6, 'Tamara', 'Kabli', 'Mozartstraat 22', '3388XX', 'Amsterdam', 'tamka@hotmail.com'),
(7, 'Arnold', 'Shaw', 'Kruislaan 1', '9876FF', 'Rotterdam', 'asha@roc.nl');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `weborder`
--

CREATE TABLE `weborder` (
  `ID` int(11) NOT NULL,
  `klant_ID` int(11) NOT NULL,
  `datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `weborder`
--

INSERT INTO `weborder` (`ID`, `klant_ID`, `datum`) VALUES
(1, 1, '2018-04-10 09:30:38'),
(2, 1, '2018-04-10 09:30:38'),
(3, 2, '2018-04-10 09:30:52'),
(4, 3, '2018-04-10 09:30:52'),
(5, 3, '2018-04-10 09:30:59');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `weborder`
--
ALTER TABLE `weborder`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `album`
--
ALTER TABLE `album`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT voor een tabel `item`
--
ALTER TABLE `item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `weborder`
--
ALTER TABLE `weborder`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
