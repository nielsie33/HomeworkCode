-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 jun 2018 om 14:09
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
-- Database: `db_car_sales`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `car_data`
--

CREATE TABLE `car_data` (
  `id_auto` bigint(10) NOT NULL,
  `merk` varchar(32) NOT NULL,
  `model` varchar(32) NOT NULL,
  `bouwjaar` int(12) NOT NULL,
  `kleur` varchar(32) NOT NULL,
  `inkoopprijs` float(8,2) DEFAULT NULL,
  `fk_id_klant` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `car_data`
--

INSERT INTO `car_data` (`id_auto`, `merk`, `model`, `bouwjaar`, `kleur`, `inkoopprijs`, `fk_id_klant`) VALUES
(1, 'Ford', 'S-max', 2014, 'Metallic blauw', 15.20, 1),
(2, 'Opel', 'Astra', 2010, 'Diamond black', 6.99, 3),
(3, 'Mercedes', 'AMG E', 2015, 'Rood', 45.00, 1),
(4, 'Ford', 'Focus ST', 2013, 'Blauw metallic', 30.23, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant_contact`
--

CREATE TABLE `klant_contact` (
  `id_klant` bigint(10) NOT NULL,
  `voornaam` varchar(16) NOT NULL,
  `tv` varchar(12) NOT NULL,
  `achternaam` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefoon` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klant_contact`
--

INSERT INTO `klant_contact` (`id_klant`, `voornaam`, `tv`, `achternaam`, `email`, `telefoon`) VALUES
(1, 'Arnold', '', 'Verstraeten', 'av@gmail.com', '0612345678'),
(2, 'Bert', 'van', 'Zwolle', 'bvz@hotmail.com', '0115123456'),
(3, 'Jaap', '', 'Alterna', 'Jaap_alterna@me.com', '0678943212'),
(4, 'Jaap', 'van', 'Zweden', 'jvz@music.com', '0687654123'),
(5, 'Danielle', '', 'Kwartz', 'kwartz@rock.nl', '0660680844');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `car_data`
--
ALTER TABLE `car_data`
  ADD PRIMARY KEY (`id_auto`);

--
-- Indexen voor tabel `klant_contact`
--
ALTER TABLE `klant_contact`
  ADD PRIMARY KEY (`id_klant`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `car_data`
--
ALTER TABLE `car_data`
  MODIFY `id_auto` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `klant_contact`
--
ALTER TABLE `klant_contact`
  MODIFY `id_klant` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
