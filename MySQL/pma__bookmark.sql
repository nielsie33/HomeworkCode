-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 mei 2018 om 10:32
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
-- Database: `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

--
-- Gegevens worden geëxporteerd voor tabel `pma__bookmark`
--

INSERT INTO `pma__bookmark` (`id`, `dbase`, `user`, `label`, `query`) VALUES
(1, 'webshop', 'root', 'opgave 05', 'SELECT * FROM weborder'),
(2, 'webshop', 'root', 'opgave 06', 'SELECT artiest, titel, genre\r\nFROM album'),
(3, 'webshop', 'root', 'opgave 07', 'SELECT voornaam, achternaam, adres\r\nFROM klant'),
(4, 'webshop', 'root', 'opgave 08', 'SELECT artiest, titel, genre, prijs\r\nFROM album\r\nORDER BY artiest ASC'),
(5, 'webshop', 'root', 'opgave 09', 'SELECT * FROM album\r\nORDER BY titel ASC'),
(7, 'webshop', 'root', 'opgave 11', 'SELECT * FROM album WHERE genre = \"Latin\"'),
(8, 'webshop', 'root', 'opgave 10', 'SELECT *\r\nFROM klant\r\nWHERE woonplaats = \"Amsterdam\"'),
(9, 'webshop', 'root', 'opgave 12', 'SELECT * FROM album WHERE prijs BETWEEN 3.00 AND 4.00'),
(11, 'webshop', 'root', 'opgave 13', 'SELECT * FROM weborder \r\nWHERE (datum BETWEEN \'2018-01-01 09:30:30\' AND \'2018-09-29 10:15:55\')'),
(12, 'webshop', 'root', 'opgave 14', 'SELECT * FROM album WHERE prijs BETWEEN 3.00 AND 4.00\r\nLIMIT 5'),
(13, 'webshop', 'root', 'opgave 15', 'SELECT * FROM weborder LIMIT 3'),
(14, 'webshop', 'root', 'opgave 16', 'SELECT DISTINCT weborder_ID\r\nFROM item'),
(15, 'webshop', 'root', 'opgave 17', 'SELECT DISTINCT album_ID\r\nFROM item'),
(16, 'webshop', 'root', 'opgave 18', 'SELECT * FROM album WHERE artiest LIKE \"%to%\";'),
(17, 'webshop', 'root', 'opgave 19', 'SELECT * FROM album WHERE titel LIKE \"%Girl%\";'),
(19, 'webshop', 'root', 'opgave 20', 'SELECT klant.voornaam, weborder.klant_ID\r\nFROM klant\r\nINNER JOIN weborder\r\nON klant.ID = weborder.klant_ID'),
(21, 'webshop', 'root', 'opgave 21', 'SELECT album.artiest, album.titel, item.aantal\r\nFROM album\r\nINNER JOIN item\r\nON album.ID = item.aantal\r\nWHERE titel = \"Cafe Atlantico\"'),
(22, 'webshop', 'root', 'opgave 22', 'SELECT klant.voornaam, klant.achternaam, weborder.ID, weborder.datum\r\nFROM klant\r\nLEFT OUTER JOIN weborder\r\nON klant.ID = weborder.klant_ID'),
(24, 'webshop', 'root', 'opgave 23', 'SELECT album.titel, item.weborder_ID, item.aantal\r\nFROM album\r\nLEFT OUTER JOIN item\r\nON album.ID = item.album_ID'),
(25, 'webshop', 'root', 'opgave 24', 'SELECT klant.voornaam, klant.email, album.titel, album.artiest, item.weborder_ID, item.aantal\r\nFROM klant\r\nINNER JOIN (weborder\r\nINNER JOIN (item\r\nINNER JOIN album ON album.ID = item.album_ID)\r\nON weborder.ID = item.weborder_ID)\r\nON klant.ID = weborder.klant_ID\r\nWHERE album.titel = \"Cafe Atlantico\"'),
(27, 'schiphol', 'root', 'lab03 stap 1', 'SELECT *\r\nFROM klacht\r\nLEFT OUTER JOIN klachtsoort\r\nON klacht.ID_klachtsoort = klachtsoort.ID'),
(28, 'schiphol', 'root', 'lab03 stap 2', 'SELECT *\r\nFROM klacht\r\nINNER JOIN klachtsoort\r\nON klacht.ID = klachtsoort.ID\r\nWHERE klacht.ID = 1'),
(29, 'webshop', 'root', 'opgave 25', 'UPDATE klant\r\nSET adres = \"Galileiplantsoen 111\", postcode = \"1010RR\"\r\nWHERE klant.ID = 5;'),
(30, 'webshop', 'root', 'opgave 26', 'INSERT INTO klant\r\n(voornaam,achternaam,adres,postcode,woonplaats,email)\r\nVALUES (\"Lex\", \"Camilla\", \"Hagabakka 24\", \"4656RR\", \"Utrecht\", \"lecam@wanadoo.nl\")'),
(31, 'webshop', 'root', 'opgave 27', 'DELETE FROM klant WHERE klant.voornaam = \"Lex\"'),
(32, 'webshop', 'root', 'opgave 28', 'SELECT album.titel, COUNT(weborder_ID) \r\nFROM album \r\nINNER JOIN item \r\nON album.ID = item.album_ID\r\nGROUP BY item.album_ID'),
(33, 'webshop', 'root', 'opgave 29', 'SELECT MIN(prijs)\r\nFROM album'),
(34, 'webshop', 'root', 'opgave 30', 'SELECT MAX(prijs)\r\nFROM album'),
(35, 'webshop', 'root', 'opgave 31', 'SELECT SUM(aantal)\r\nFROM item'),
(36, 'webshop', 'root', 'opgave 32', 'SELECT SUM(voorraad)\r\nFROM album'),
(37, 'schiphol', 'root', 'lab04 stap 1', 'SELECT COUNT(ID)\r\nFROM klacht\r\nWHERE datum > \"2018-04-12 18:00:00\"'),
(38, 'schiphol', 'root', 'lab04 stap 2', 'SELECT COUNT(ID)\r\nFROM klacht \r\nWHERE (datum BETWEEN \'2018-04-12 8:00:00\' AND \'2018-04-12 12:00:00\')'),
(40, 'testing', 'root', 'opgave 33', 'CREATE DATABASE testing'),
(41, 'testing', 'root', 'opgave 34', 'CREATE TABLE tabelA\r\n(naam VARCHAR(22), leeftijd INT(2))'),
(42, 'testing', 'root', 'opgave 35', 'INSERT INTO tabela (naam, leeftijd) \r\nVALUES (\'Jozef\', \'20\'), (\'Jasper\', \'19\');'),
(43, 'testing', 'root', 'opgave 36', 'SELECT * \r\nFROM tabela'),
(44, 'testing', 'root', 'opgave 37', 'DROP TABLE tabela'),
(45, 'testing', 'root', 'opgave 38', 'DROP DATABASE testing'),
(46, 'administratie', 'root', 'opgave 39', 'CREATE DATABASE administratie'),
(47, 'administratie', 'root', 'opgave 40', 'CREATE TABLE leerling\r\n(ID INT(9), achternaam VARCHAR(15), voornaam VARCHAR(15), leeftijd INT(2), adres VARCHAR(15), postcode VARCHAR(6), woonplaats VARCHAR(15), telefoonnummer VARCHAR(10), email VARCHAR(15), opleiding VARCHAR(15))'),
(48, 'administratie', 'root', 'opgave 41', 'INSERT INTO leerling (ID, achternaam, voornaam, leeftijd, adres, postcode, woonplaats, telefoonnummer, email, opleiding) \r\nVALUES (\'1\', \'Huisden\', \'Dylan\', \'18\', \'Middenweg 11\', \'1008VV\', \'Amsterdam\', \'0204445555\', \'dhuisden@rovca.nl\', \'ict\'), \r\n(\'2\', \'Bosman\', \'Nitin\', \'17\', \'Leidseweg 22\', \'9900BB\', \'Amsterdam\', \'0209994444\', \'nbosman@hotmail.com\', \'ict\');'),
(49, 'administratie', 'root', 'lab05 stap 2', 'DROP DATABASE administratie'),
(50, 'administratie', 'root', 'opgave 42', 'ALTER TABLE leerling\r\nRENAME student'),
(51, 'administratie', 'root', 'opgave 43', 'ALTER TABLE student\r\nMODIFY COLUMN postcode VARCHAR(10)'),
(52, 'administratie', 'root', 'opgave 44', 'ALTER TABLE student\r\nMODIFY COLUMN postcode VARCHAR(6),\r\nMODIFY COLUMN email VARCHAR(30)'),
(53, 'administratie', 'root', 'opgave 45', 'ALTER TABLE student\r\nADD COLUMN testkolom VARCHAR(10)'),
(54, 'administratie', 'root', 'opgave 46', 'ALTER TABLE student DROP COLUMN testkolom'),
(55, 'administratie', 'root', 'opgave 47', 'ALTER TABLE student\r\nADD COLUMN klas VARCHAR(4)'),
(56, 'administratie', 'root', 'opgave 48', 'UPDATE student SET klas = \'AO88\' WHERE student.ID = 1;\r\nUPDATE student SET klas = \'AO99\' WHERE student.ID = 2;'),
(57, 'administratie', 'root', 'opgave 49', 'ALTER TABLE student\r\nCHANGE COLUMN woonplaats stad VARCHAR(30)'),
(58, 'administratie', 'root', 'opgave 50', 'ALTER TABLE student ADD PRIMARY KEY(email);'),
(59, 'administratie', 'root', 'opgave 51', 'ALTER TABLE student DROP PRIMARY KEY;\r\nALTER TABLE student ADD PRIMARY KEY(ID);\r\nALTER TABLE student MODIFY COLUMN ID INT(9) NOT NULL AUTO_INCREMENT'),
(60, 'schiphol', 'root', 'lab06 stap 2', 'ALTER TABLE postcode MODIFY COLUMN ID INT(9) NOT NULL AUTO_INCREMENT'),
(61, 'schiphol', 'root', 'lab06 stap 1', 'ALTER TABLE `postcode` ADD `ID` INT(9) NOT NULL FIRST;'),
(62, 'schiphol', 'root', 'lab06', 'ALTER TABLE postcode ADD ID INT(9) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (ID);'),
(63, 'webshop', 'root', 'opgave 52', 'SELECT CONCAT_WS(\":\", \"Naam\", \"Adres\", \"Woonplaats\");'),
(64, 'webshop', 'root', 'opgave 53', 'SELECT CONCAT(\"Hoogste prijs is\", MAX(album.prijs))\r\nFROM album'),
(65, 'webshop', 'root', 'opgave 54', 'SELECT CHAR_LENGTH(voornaam) FROM klant\r\nWHERE ID = 5'),
(67, 'webshop', 'root', 'opgave 56', 'SELECT titel, CONCAT(\"$\", FORMAT(prijs, 2))\r\nFROM album\r\nWHERE ID = 1;'),
(68, 'webshop', 'root', 'opgave 57', 'SELECT INSERT(\"Drievoud\",1,4,\"vier\");'),
(69, 'webshop', 'root', 'opgave 58', 'SELECT ID, INSTR(artiest, \"Cesaria\")\r\nFROM album\r\nWHERE INSTR(artiest, \"Cesaria\");'),
(70, 'webshop', 'root', 'opgave 59', 'SELECT titel\r\nFROM album\r\nWHERE LEFT(artiest, 1) = \"p\";'),
(71, 'webshop', 'root', 'opgave 60', 'SELECT ID, LOCATE(\"time\", titel)\r\nFROM album\r\nWHERE LOCATE(\"time\", titel);'),
(73, 'webshop', 'root', 'opgave 55', 'SELECT ID, CONCAT(voornaam, achternaam), FIND_IN_SET(\"Akash\", voornaam)\r\nFROM klant'),
(74, 'webshop', 'root', 'opgave 61', 'SELECT LOWER(\"NAAM, ADRES, WOONPLAATS\");'),
(75, 'webshop', 'root', 'opgave 62', 'SET @STR = LPAD(\"1234\",6, \" \");\r\nSELECT @STR'),
(76, 'webshop', 'root', 'opgave 63', 'SELECT LTRIM(\"   1234\");'),
(77, 'webshop', 'root', 'opgave 64', 'SELECT POSITION(\"voud\" IN \"honderdvoud\");'),
(78, 'webshop', 'root', 'opgave 65', 'SELECT REPLACE(\"januari 3 t/m januari 7\", \"januari\", \"februari\");'),
(79, 'webshop', 'root', 'opgave 66', 'SELECT REVERSE(\"1234567890\");'),
(80, 'webshop', 'root', 'opgave 67', 'SELECT RIGHT(\"1234567890\",3);'),
(81, 'webshop', 'root', 'opgave 68', 'SELECT RPAD(\"1234\",6, \"--\");'),
(82, 'webshop', 'root', 'opgave 69', 'SELECT RTRIM(\"1234    \");'),
(83, 'webshop', 'root', 'opgave 70', 'SELECT voornaam, SPACE(3), achternaam FROM klant WHERE ID = 1;'),
(84, 'webshop', 'root', 'opgave 71', 'SELECT DATE(\"2018-04-10\")\r\nFROM weborder\r\nWHERE ID = 1;'),
(85, 'webshop', 'root', 'opgave 72', 'SELECT DATEDIFF(\"2018-04-10\", CURDATE());'),
(86, 'webshop', 'root', 'opgave 73', 'SELECT DAYNAME(CURDATE()), DAYOFMONTH(CURDATE()), MONTHNAME(CURDATE()), YEAR(CURDATE());'),
(87, 'webshop', 'root', 'opgave 74', 'SELECT LAST_DAY(CURDATE());'),
(89, 'webshop', 'root', 'opgave 75', 'SELECT SUBTIME(\"00:00:00\", CURTIME());'),
(90, 'webshop', 'root', 'opgave 76', 'SELECT HOUR(CURTIME()), MINUTE(CURTIME()), SECOND(CURTIME());'),
(91, 'webshop', 'root', 'opgave 77', 'SELECT ADDDATE(CURDATE(), 2), ADDTIME(CURTIME(), \"02:00:00\");'),
(93, 'schiphol', 'root', 'lab07', 'SET @tekst = \"De database-administrator (DBA)\r\nis verantwoordelijk voor het ontwerpen,\r\nde implementatie en het onderhoud van de databases binnen een organisatie.\r\nDe rol van de DBA is het monitoren en verbeteren van de database performance en veiligheid.\";\r\nSELECT @tekst;\r\nSELECT REPLACE(@tekst, \"DBA\", \"dba\");\r\nSELECT CHAR_LENGTH(@tekst);\r\nSELECT INSERT(@tekst,241,242,\" EINDE.\");'),
(94, 'boekhandel', 'root', 'opgave 78', 'CREATE TABLE boeken(\r\n    id MEDIUMINT NOT NULL AUTO_INCREMENT,\r\n    isbn varchar(17),\r\n    titel varchar(22),\r\n    auteur varchar(15),\r\n    prijs decimal(5,2) DEFAULT \"0.00\",\r\n    voorraad int(11) DEFAULT \"0\",\r\n    PRIMARY KEY (id)\r\n    );'),
(95, 'boekhandel', 'root', 'opgave 78-2', 'INSERT INTO boeken (isbn, titel, auteur, prijs, voorraad)\r\nVALUES\r\n(\"978 90 395 2781 3\", \"Basis Javascript\", \"R.W.Castaneda\", 44.90, 50),\r\n(\"978 90 395 2781 4\", \"Basis PHP\", \"B. Desmet\", 53.00, 78),\r\n(\"978 90 395 2781 5\", \"Basis MySQL\", \"Q.Q. Marquez\", 26.00, 200);'),
(96, 'boekhandel', 'root', 'opgave 79', 'CREATE PROCEDURE\r\nproc_voorraad(INOUT totaal FLOAT)\r\nBEGIN\r\nSELECT SUM(voorraad) INTO totaal FROM boeken;\r\nEND;\r\n//\r\n'),
(100, 'boekhandel', 'root', 'opgave 80-2', 'SET @antwoord = \"\";\r\nCALL proc_maxprijs(@maxprijs,@antwoord);\r\nSELECT @antwoord;'),
(101, 'boekhandel', 'root', 'opgave 80', 'CREATE PROCEDURE\r\nproc_maxprijs(INOUT maxprijs FLOAT, OUT antwoord VARCHAR(255))\r\nBEGIN\r\nSELECT MAX(prijs) INTO maxprijs FROM boeken;\r\nSELECT CONCAT(\"De maximale prijs voor een boek is: \", maxprijs) INTO antwoord;\r\nEND;\r\n//'),
(106, 'boekhandel', 'root', 'opgave 81', 'CREATE PROCEDURE\r\nproc_minprijs(INOUT minprijs FLOAT)\r\nBEGIN\r\nSELECT MIN(prijs) INTO minprijs FROM boeken;\r\nEND;\r\n//'),
(107, 'boekhandel', 'root', 'opgave 81-2', 'SET @minprijs = 0.0;\r\nCALL proc_minprijs(@minprijs);\r\nSELECT FORMAT(@minprijs,2);'),
(108, 'boekhandel', 'root', 'opgave 82', 'SHOW CREATE PROCEDURE proc_maxprijs;'),
(109, 'boekhandel', 'root', 'opgave 83', 'SHOW CREATE PROCEDURE proc_voorraad;'),
(110, 'boekhandel', 'root', 'opgave 84', 'CREATE PROCEDURE\r\nproc_checkparams(INOUT param1 VARCHAR(5), INOUT param2 INT, OUT melding VARCHAR(50))\r\nSQL SECURITY DEFINER\r\nBEGIN\r\nIF param1 = \"\" OR param2 = \"\"\r\nTHEN\r\nSET melding = \"Foutmelding: er zijn een of meer input-errors\";\r\nELSE\r\nSET melding = \"Er zijn geen input-errors\";\r\nEND IF;\r\nEND //'),
(111, 'boekhandel', 'root', 'opgave 84-1', 'SET @param1 = \"\";\r\nSET @param2 = 0;\r\nset @melding = \"\";\r\nCALL proc_checkparams(@param1,@param2,@melding);\r\nSELECT @melding;'),
(112, 'boekhandel', 'root', 'opgave 84-2', 'SET @param1 = \"10000\";\r\nSET @param2 = 0;\r\nset @melding = \"\";\r\nCALL proc_checkparams(@param1,@param2,@melding);\r\nSELECT @melding;'),
(113, 'boekhandel', 'root', 'opgave 84-3', 'SET @param1 = \"10000\";\r\nSET @param2 = 9;\r\nset @melding = \"\";\r\nCALL proc_checkparams(@param1,@param2,@melding);\r\nSELECT @melding;'),
(114, 'boekhandel', 'root', 'opgave 85', 'CREATE PROCEDURE proc_setvoorraad(IN code INT)\r\nBEGIN\r\nCASE code \r\nWHEN 0 THEN\r\nUPDATE boeken SET voorraad = 0;\r\nWHEN 1 THEN\r\nUPDATE boeken SET voorraad = 100;\r\nWHEN 2 THEN\r\nUPDATE boeken SET voorraad = 200;\r\nELSE\r\nUPDATE boeken SET voorraad = 300;\r\nEND CASE;\r\nEND; //'),
(115, 'boekhandel', 'root', 'opgave 85-1', 'SET @code = 0;\r\nCALL proc_setvoorraad(@code);\r\nSELECT * FROM boeken;'),
(116, 'boekhandel', 'root', 'opgave 86', 'SET @code = 55;\r\nCALL proc_setvoorraad(@code);\r\nSELECT * FROM boeken;'),
(117, 'boekhandel', 'root', 'opgave 87', 'CREATE PROCEDURE proc_blancos(IN aantal INT)\r\nBEGIN\r\nDECLARE controlvar INT DEFAULT 0;\r\nWHILE controlvar < aantal DO\r\nINSERT INTO boeken VALUES(\"\", \"\", \"\", \"\",0,0);\r\nSET controlvar = controlvar + 1;\r\nEND WHILE;\r\nEND;//'),
(118, 'boekhandel', 'root', 'opgave 87-2', 'CALL proc_blancos(3);\r\nSELECT * FROM boeken;'),
(119, 'boekhandel', 'root', 'opgave 88', 'CREATE PROCEDURE\r\nproc_nieuweboek(isbn VARCHAR(17), titel VARCHAR(22), auteur VARCHAR(15), prijs DECIMAL(5,2), voorraad INT(11))\r\nBEGIN\r\nINSERT INTO boeken(isbn, titel, auteur, prijs, voorraad)\r\nVALUES(isbn, titel, auteur, prijs, voorraad);\r\nEND;\r\n//'),
(120, 'boekhandel', 'root', 'opgave 88-2', 'SET @isbn = \"978 90 395 2781 6\";\r\nSET @titel = \"Basis CSS\";\r\nSET @auteur = \"R.W. Castaneda\";\r\nSET @prijs = 39.99;\r\nSET @voorraad = 200;\r\nCALL proc_nieuweboek(@isbn,@titel,@auteur,@prijs,@voorraad);\r\nSELECT * FROM boeken;'),
(125, 'schiphol', 'root', 'lab08', 'CREATE PROCEDURE proc_klachten()\r\nBEGIN\r\nSELECT datum AS \'Datum\', postcode AS \'Postcode\', klachtsoort AS \'Klacht\'\r\nFROM klacht,klachtsoort\r\nWHERE ID_klachtsoort = klachtsoort.ID\r\nORDER BY ID_klachtsoort;\r\nEND;//'),
(126, 'schiphol', 'root', 'lab08-2', 'CALL proc_klachten();'),
(127, 'boekhandel', 'root', 'opgave89', 'CREATE PROCEDURE proc_verwijderblancos()\r\nBEGIN\r\nDECLARE dezeid INT(5);\r\nDECLARE dezetitel VARCHAR(22);\r\nDECLARE finish INT DEFAULT 0;\r\nDECLARE cursor1 CURSOR FOR SELECT id,titel FROM boeken;\r\nDECLARE continue HANDLER FOR NOT FOUND SET finish = 1;\r\nOPEN cursor1;\r\nWHILE NOT finish DO\r\nFETCH cursor1 INTO dezeid, dezetitel;\r\nIF dezetitel = \"\" THEN\r\nDELETE FROM boeken WHERE id = dezeid;\r\nEND IF;\r\nEND WHILE;\r\nCLOSE cursor1;\r\nEND//'),
(129, 'boekhandel', 'root', 'opgave89-2', 'CALL proc_verwijderblancos();\r\nSELECT * FROM boeken;'),
(130, 'boekhandel', 'root', 'opgave90', 'CREATE PROCEDURE proc_nieuwevoorraad(IN nieuwevoorraad INT)\r\nBEGIN\r\nDECLARE dezeid INT(5);\r\nDECLARE dezevoorraad INT(11);\r\nDECLARE finish INT DEFAULT 0;\r\nDECLARE cursor1 CURSOR FOR SELECT id,voorraad FROM boeken;\r\nDECLARE continue HANDLER FOR NOT FOUND SET finish = 1;\r\nOPEN cursor1;\r\nWHILE NOT finish DO\r\nFETCH cursor1 INTO dezeid, dezevoorraad;\r\nIF dezevoorraad < 300 THEN\r\nUPDATE boeken \r\nSET voorraad = nieuwevoorraad\r\nWHERE id = dezeid;\r\nEND IF;\r\nEND WHILE;\r\nCLOSE cursor1;\r\nEND//'),
(131, 'boekhandel', 'root', 'opgave90-2', 'call proc_nieuwevoorraad(500);\r\nSELECT * FROM boeken'),
(132, 'boekhandel', 'root', 'opgave91', 'CREATE FUNCTION func_prijskorting(\r\n    dezeisbn VARCHAR(17),\r\n    procent FLOAT)\r\n    RETURNS INT\r\n    DETERMINISTIC\r\n    BEGIN\r\n    	DECLARE korting FLOAT;\r\n        DECLARE dezeprijs FLOAT;\r\n        \r\n        SELECT prijs INTO dezeprijs\r\n        FROM boeken\r\n        WHERE isbn = dezeisbn;\r\n        SET korting = dezeprijs * (procent / 100);\r\n        UPDATE boeken SET prijs = dezeprijs - korting\r\n        WHERE isbn = dezeisbn;\r\n        RETURN(1);\r\n     END//'),
(133, 'boekhandel', 'root', 'opgave91-2', 'SELECT func_prijskorting(\"978 90 395 2781 3\", 10);\r\nSELECT * FROM boeken;'),
(134, 'boekhandel', 'root', 'opgave92', 'CREATE FUNCTION func_prijsverlaging(\r\n    overdeprijs FLOAT,\r\n    procent FLOAT)\r\n    RETURNS INT\r\n    DETERMINISTIC\r\n    BEGIN\r\n    	DECLARE verlaging FLOAT;\r\n        DECLARE dezeprijs FLOAT;\r\n        \r\n        SELECT prijs INTO dezeprijs\r\n        FROM boeken\r\n        WHERE prijs = overdeprijs;\r\n        SET verlaging = dezeprijs * (procent / 100);\r\n        UPDATE boeken SET prijs = dezeprijs - verlaging\r\n        WHERE prijs > dezeprijs;\r\n        RETURN(1);\r\n     END//'),
(135, 'boekhandel', 'root', 'opgave92-1', 'SELECT func_prijsverlaging(40, 10); \r\nSELECT * FROM boeken;'),
(136, 'boekhandel', 'root', 'opgave93', 'CREATE VIEW boekenview AS SELECT * FROM boeken;'),
(137, 'boekhandel', 'root', 'opgave93-1', 'SELECT * FROM boekenview;'),
(138, 'boekhandel', 'root', 'opgave94', 'CREATE view view_oordeel AS SELECT * FROM boeken WHERE prijs < 30;'),
(139, 'boekhandel', 'root', 'opgave94-1', 'SELECT * FROM view_oordeel;'),
(140, 'boekhandel', 'root', 'opgave95', 'CREATE TRIGGER trigger_alert\r\nBEFORE UPDATE ON boeken\r\nFOR EACH ROW\r\nBEGIN\r\nIF NEW.voorraad <=10 THEN\r\nSET NEW.voorraad = 100;\r\nELSEIF NEW.voorraad >= 500 THEN\r\nSET NEW.voorraad = 1000;\r\nEND IF;\r\nEND//');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
