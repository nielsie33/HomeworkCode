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
-- Tabelstructuur voor tabel `wp_tf_kaartjes`
--

CREATE TABLE `wp_tf_kaartjes` (
  `id_kaart` bigint(10) NOT NULL,
  `naam` varchar(64) NOT NULL,
  `kaartje` bigint(10) NOT NULL,
  `email` varchar(64) NOT NULL,
  `adres` varchar(64) NOT NULL,
  `woonplaats` varchar(64) NOT NULL,
  `postcode` varchar(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `wp_tf_kaartjes`
--

INSERT INTO `wp_tf_kaartjes` (`id_kaart`, `naam`, `kaartje`, `email`, `adres`, `woonplaats`, `postcode`, `datum`) VALUES
(32, 'SDFHJGFDSA', 1, 'DAasdfhjkjkhgfd', 'rghggfh', 'ghfghffgh', 'fgfg34', '2018-08-23'),
(34, 'niels van hamme', 3, 'schoolniels20@gmail.com', 'geulstraat 23', 'terneuzen', '4535CX', '2018-06-04'),
(35, 'niels van hamme', 1, 'schoolniels20@gmail.com', 'geulstraat 23', 'terneuzen', '4535CX', '2018-06-04'),
(36, 'aslda', 3, 'ajkshdjkash@gmail.com', 'kjashdjhk', 'kjashdkjha', '891237xd', '2018-06-04'),
(37, 'ikbenaap', 4, 'dikkelul@gmail.com', 'straat 34', 'Axel', '3499xx', '2018-06-06'),
(38, 'lhddsjhmdsk', 1, 'kaksjhd@gmail.com', 'jkhsdkjahsd', 'akjshdajskhd', '1239cx', '2018-06-06'),
(39, 'adsfsdf', 4, 'safsdf@gmail.com', 'khasdkha', 'kjahsdkjh', '1237xc', '2018-06-06'),
(40, 'test', 3, 'test@gmail.com', 'kaboemstraat 10', 'Terneuzen', '3828XD', '2018-06-06'),
(41, 'kajhsdkjahsd', 3, 'jksdhkjdh@gmail.com', 'jhasd', 'kjashdkjahsd', '1823xx', '2018-06-06'),
(42, 'ashaskjdh', 1, 'ajdh@gmail.com', 'kjahsdjkahd 10', 'kjahsdajskdh', '7717xc', '2018-06-06'),
(43, 'testen', 3, 'testen@gmail.com', 'teststraat 10', 'testplaats', '1111XD', '2018-06-06'),
(44, 'Jonny', 3, 'jonny@gmail.com', 'colestraat 11', 'cooleplek', '1234CC', '2018-06-06');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `wp_tf_kaartjes`
--
ALTER TABLE `wp_tf_kaartjes`
  ADD PRIMARY KEY (`id_kaart`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `wp_tf_kaartjes`
--
ALTER TABLE `wp_tf_kaartjes`
  MODIFY `id_kaart` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
