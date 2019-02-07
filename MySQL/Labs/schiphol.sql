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
-- Database: `schiphol`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_klachten` ()  BEGIN
SELECT datum AS 'Datum', postcode AS 'Postcode', klachtsoort AS 'Klacht'
FROM klacht,klachtsoort
WHERE ID_klachtsoort = klachtsoort.ID
ORDER BY ID_klachtsoort;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `ID` int(11) NOT NULL,
  `naam` varchar(22) NOT NULL,
  `postcode` varchar(11) NOT NULL,
  `geslacht` varchar(6) NOT NULL,
  `geboortedatum` varchar(11) NOT NULL,
  `email` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`ID`, `naam`, `postcode`, `geslacht`, `geboortedatum`, `email`) VALUES
(1, 'John van den Berg', '1098LV', 'M', '1984-10-07', 'jvdb@live.nl'),
(2, 'Celia Hayna', '1999BB', 'V', '1986-05-24', 'ch@gmail.com'),
(3, 'Justin Boom', '2000AA', 'M', '1991-05-03', 'jv@live.nl'),
(4, 'Roemer Gallo', '1999BB', 'M', '1085-05-31', 'rg@hotmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klacht`
--

CREATE TABLE `klacht` (
  `ID` int(11) NOT NULL,
  `ID_gebruiker` int(11) NOT NULL,
  `ID_klachtsoort` int(11) NOT NULL,
  `postcode` varchar(11) NOT NULL,
  `datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klacht`
--

INSERT INTO `klacht` (`ID`, `ID_gebruiker`, `ID_klachtsoort`, `postcode`, `datum`) VALUES
(1, 1, 1, '1098LV', '2018-04-12 11:06:34'),
(2, 2, 2, '1999BB', '2018-04-12 11:06:34'),
(3, 3, 3, '2000AA', '2018-04-12 11:07:38'),
(4, 3, 3, '1999BB', '2018-04-12 11:07:38'),
(5, 3, 3, '1666JJ', '2018-04-12 20:29:53'),
(6, 3, 3, '1111AA', '2018-04-12 20:42:23');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klachtsoort`
--

CREATE TABLE `klachtsoort` (
  `ID` int(11) NOT NULL,
  `klachtsoort` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klachtsoort`
--

INSERT INTO `klachtsoort` (`ID`, `klachtsoort`) VALUES
(1, 'milieu'),
(2, 'veiligheid'),
(3, 'geluid');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `postcode`
--

CREATE TABLE `postcode` (
  `ID` int(9) NOT NULL,
  `postcode` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `postcode`
--

INSERT INTO `postcode` (`ID`, `postcode`) VALUES
(1, '1098LV'),
(2, '1098LX'),
(3, '1098XX'),
(4, '1099TT'),
(5, '1999BB'),
(6, '2000AA');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `klacht`
--
ALTER TABLE `klacht`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `klachtsoort`
--
ALTER TABLE `klachtsoort`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `postcode`
--
ALTER TABLE `postcode`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `klacht`
--
ALTER TABLE `klacht`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `klachtsoort`
--
ALTER TABLE `klachtsoort`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `postcode`
--
ALTER TABLE `postcode`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
