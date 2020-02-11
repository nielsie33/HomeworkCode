-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 jun 2018 om 14:04
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
-- Database: `monkeybusiness`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `wp_tf_kaartjes_aanmaak`
--

CREATE TABLE `wp_tf_kaartjes_aanmaak` (
  `id_kaartje` bigint(10) NOT NULL,
  `kaartjenaam` varchar(32) NOT NULL,
  `beschrijving` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `wp_tf_kaartjes_aanmaak`
--

INSERT INTO `wp_tf_kaartjes_aanmaak` (`id_kaartje`, `kaartjenaam`, `beschrijving`) VALUES
(1, 'sdffddfssdf', 'Helpt tekst test eventasdsad'),
(3, 'Dierentuin Emmen', '20 euro voor 8 uur'),
(4, 'ik ben stoer', 'safsfsdfsdfasdf');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `wp_tf_kaartjes_aanmaak`
--
ALTER TABLE `wp_tf_kaartjes_aanmaak`
  ADD PRIMARY KEY (`id_kaartje`),
  ADD UNIQUE KEY `name` (`kaartjenaam`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `wp_tf_kaartjes_aanmaak`
--
ALTER TABLE `wp_tf_kaartjes_aanmaak`
  MODIFY `id_kaartje` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
