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
-- Database: `boekhandel`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_blancos` (IN `aantal` INT)  BEGIN
DECLARE controlvar INT DEFAULT 0;
WHILE controlvar < aantal DO
INSERT INTO boeken VALUES("", "", "", "",0,0);
SET controlvar = controlvar + 1;
END WHILE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_checkparams` (INOUT `param1` VARCHAR(5), INOUT `param2` INT, OUT `melding` VARCHAR(50))  BEGIN
IF param1 = "" OR param2 = ""
THEN
SET melding = "Foutmelding: er zijn een of meer input-errors";
ELSE
SET melding = "Er zijn geen input-errors";
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_maxprijs` (INOUT `maxprijs` FLOAT, OUT `antwoord` VARCHAR(255))  BEGIN
SELECT MAX(prijs) INTO maxprijs FROM boeken;
SELECT CONCAT("De maximale prijs voor een boek is: ", maxprijs) INTO antwoord;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_minprijs` (INOUT `minprijs` FLOAT)  BEGIN
SELECT MIN(prijs) INTO minprijs FROM boeken;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_nieuweboek` (`isbn` VARCHAR(17), `titel` VARCHAR(22), `auteur` VARCHAR(15), `prijs` DECIMAL(5,2), `voorraad` INT(11))  BEGIN
INSERT INTO boeken(isbn, titel, auteur, prijs, voorraad)
VALUES(isbn, titel, auteur, prijs, voorraad);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_nieuwevoorraad` (IN `nieuwevoorraad` INT)  BEGIN
DECLARE dezeid INT(5);
DECLARE dezevoorraad INT(11);
DECLARE finish INT DEFAULT 0;
DECLARE cursor1 CURSOR FOR SELECT id,voorraad FROM boeken;
DECLARE continue HANDLER FOR NOT FOUND SET finish = 1;
OPEN cursor1;
WHILE NOT finish DO
FETCH cursor1 INTO dezeid, dezevoorraad;
IF dezevoorraad < 300 THEN
UPDATE boeken 
SET voorraad = nieuwevoorraad
WHERE id = dezeid;
END IF;
END WHILE;
CLOSE cursor1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_setvoorraad` (IN `code` INT)  BEGIN
CASE code 
WHEN 0 THEN
UPDATE boeken SET voorraad = 0;
WHEN 1 THEN
UPDATE boeken SET voorraad = 100;
WHEN 2 THEN
UPDATE boeken SET voorraad = 200;
ELSE
UPDATE boeken SET voorraad = 300;
END CASE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_verwijderblancos` ()  BEGIN
DECLARE dezeid INT(5);
DECLARE dezetitel VARCHAR(22);
DECLARE finish INT DEFAULT 0;
DECLARE cursor1 CURSOR FOR SELECT id,titel FROM boeken;
DECLARE continue HANDLER FOR NOT FOUND SET finish = 1;
OPEN cursor1;
WHILE NOT finish DO
FETCH cursor1 INTO dezeid, dezetitel;
IF dezetitel = "" THEN
DELETE FROM boeken WHERE id = dezeid;
END IF;
END WHILE;
CLOSE cursor1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_voorraad` (INOUT `totaal` FLOAT)  BEGIN
SELECT SUM(voorraad) INTO totaal FROM boeken;
END$$

--
-- Functies
--
CREATE DEFINER=`root`@`localhost` FUNCTION `func_prijskorting` (`dezeisbn` VARCHAR(17), `procent` FLOAT) RETURNS INT(11) BEGIN
    	DECLARE korting FLOAT;
        DECLARE dezeprijs FLOAT;
        
        SELECT prijs INTO dezeprijs
        FROM boeken
        WHERE isbn = dezeisbn;
        SET korting = dezeprijs * (procent / 100);
        UPDATE boeken SET prijs = dezeprijs - korting
        WHERE isbn = dezeisbn;
        RETURN(1);
     END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `func_prijsverlaging` (`overdeprijs` FLOAT, `procent` FLOAT) RETURNS INT(11) BEGIN
    	DECLARE verlaging FLOAT;
        DECLARE dezeprijs FLOAT;
        
        SELECT prijs INTO dezeprijs
        FROM boeken
        WHERE prijs = overdeprijs;
        SET verlaging = dezeprijs * (procent / 100);
        UPDATE boeken SET prijs = dezeprijs - verlaging
        WHERE prijs > dezeprijs;
        RETURN(1);
     END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `boeken`
--

CREATE TABLE `boeken` (
  `id` mediumint(9) NOT NULL,
  `isbn` varchar(17) DEFAULT NULL,
  `titel` varchar(22) DEFAULT NULL,
  `auteur` varchar(15) DEFAULT NULL,
  `prijs` decimal(5,2) DEFAULT '0.00',
  `voorraad` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `boeken`
--

INSERT INTO `boeken` (`id`, `isbn`, `titel`, `auteur`, `prijs`, `voorraad`) VALUES
(1, '978 90 395 2781 3', 'Basis Javascript', 'R.W.Castaneda', '40.41', 300),
(2, '978 90 395 2781 4', 'Basis PHP', 'B. Desmet', '53.00', 300),
(3, '978 90 395 2781 5', 'Basis MySQL', 'Q.Q. Marquez', '26.00', 300),
(7, '978 90 395 2781 6', 'Basis CSS', 'R.W. Castaneda', '39.99', 500);

--
-- Triggers `boeken`
--
DELIMITER $$
CREATE TRIGGER `trigger_alert` BEFORE UPDATE ON `boeken` FOR EACH ROW BEGIN
IF NEW.voorraad <=10 THEN
SET NEW.voorraad = 100;
ELSEIF NEW.voorraad >= 500 THEN
SET NEW.voorraad = 1000;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structuur voor view `boekenview`
-- (Zie onder voor de actuele view)
--
CREATE TABLE `boekenview` (
`id` mediumint(9)
,`isbn` varchar(17)
,`titel` varchar(22)
,`auteur` varchar(15)
,`prijs` decimal(5,2)
,`voorraad` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structuur voor view `view_oordeel`
-- (Zie onder voor de actuele view)
--
CREATE TABLE `view_oordeel` (
`id` mediumint(9)
,`isbn` varchar(17)
,`titel` varchar(22)
,`auteur` varchar(15)
,`prijs` decimal(5,2)
,`voorraad` int(11)
);

-- --------------------------------------------------------

--
-- Structuur voor de view `boekenview`
--
DROP TABLE IF EXISTS `boekenview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `boekenview`  AS  select `boeken`.`id` AS `id`,`boeken`.`isbn` AS `isbn`,`boeken`.`titel` AS `titel`,`boeken`.`auteur` AS `auteur`,`boeken`.`prijs` AS `prijs`,`boeken`.`voorraad` AS `voorraad` from `boeken` ;

-- --------------------------------------------------------

--
-- Structuur voor de view `view_oordeel`
--
DROP TABLE IF EXISTS `view_oordeel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_oordeel`  AS  select `boeken`.`id` AS `id`,`boeken`.`isbn` AS `isbn`,`boeken`.`titel` AS `titel`,`boeken`.`auteur` AS `auteur`,`boeken`.`prijs` AS `prijs`,`boeken`.`voorraad` AS `voorraad` from `boeken` where (`boeken`.`prijs` < 30) ;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `boeken`
--
ALTER TABLE `boeken`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `boeken`
--
ALTER TABLE `boeken`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
