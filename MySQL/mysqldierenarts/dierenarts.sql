-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 jun 2019 om 21:12
-- Serverversie: 10.1.31-MariaDB
-- PHP-versie: 7.2.3

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
-- Tabelstructuur voor tabel `afspraken`
--

CREATE TABLE `afspraken` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `tijd` varchar(64) NOT NULL,
  `klant_id` int(11) NOT NULL,
  `huisdier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `huisdieren`
--

CREATE TABLE `huisdieren` (
  `id` int(11) NOT NULL,
  `klant_id` int(11) NOT NULL,
  `soort` varchar(32) NOT NULL,
  `ras` varchar(32) NOT NULL,
  `naam` varchar(64) NOT NULL,
  `gebdatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `id` int(11) NOT NULL,
  `klantnaam` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `wachtwoord` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`id`, `klantnaam`, `email`, `wachtwoord`) VALUES
(1, 'Test', 'testemail@gmail.com', '$2y$10$lrrPPXfntWemK3vtovsvMuR9HkI5.vmzbdqfYX7mKcekixZ8VltZ6'),
(2, 'Admin', 'admin@gmail.com', '$2y$10$Hw09hNwgLo2geNuFfKpwPOmfemoMqXhNttYBTi5LMML3icw/0yYSe');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `afspraken`
--
ALTER TABLE `afspraken`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `huisdieren`
--
ALTER TABLE `huisdieren`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `afspraken`
--
ALTER TABLE `afspraken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `huisdieren`
--
ALTER TABLE `huisdieren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
