-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Mai 2021 um 17:16
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `security_demo`
--
CREATE DATABASE IF NOT EXISTS `security_demo` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `security_demo`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `studenten`
--

CREATE TABLE `studenten` (
  `ID` int(11) NOT NULL,
  `vorname` varchar(255) NOT NULL,
  `nachname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kursID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `studenten`
--

INSERT INTO `studenten` (`ID`, `vorname`, `nachname`, `email`, `kursID`) VALUES
(1, 'Louisette', 'Trasler', 'ltrasler0@deliciousdays.com', 0),
(2, 'Franz', 'Müller', 'fmul@ycombinator.com', 0),
(3, 'Stuart', 'Jackett', 'sjackett4@fc2.com', 0),
(4, 'Barbara', 'Grovier', 'bgrovier5@flickr.com', 0),
(5, 'Deborah', 'Waterhowse', 'dwaterhowse6@sitemeter.com', 0),
(6, 'Genny', 'Arundell', 'garundell7@spiegel.de', 0),
(7, 'Jose', 'Abdon', 'jabdon8@statcounter.com', 0),
(8, 'Joey', 'Lippitt', 'jlippitta@jimdo.com', 0),
(9, 'Sylvan', 'Alenichev', 'salenichevb@theatlantic.com', 0),
(10, 'Brigitte', 'Boyd', 'bboydc@adobe.com', 0),
(11, 'Lena', 'Waldmann', 'waldmannl@jimdo.com', 0),
(12, 'Susanna', 'Castellani', 'scastellanie@fema.gov', 1),
(13, 'Mohan', 'Bartolomieu', 'mbartolomieuf@seattletimes.com', 0),
(14, 'Cati', 'Losseljong', 'closseljongg@goodreads.com', 0),
(15, 'Marlon', 'Farlane', 'mfarlaneh@imdb.com', 0),
(16, 'Joana', 'Slograve', 'jslogravei@dion.ne.jp', 0),
(17, 'Peadar', 'Ferrier', 'pferrierj@zdnet.com', 0),
(18, 'Marie', 'Ethersey', 'metherseyk@shutterfly.com', 1),
(19, 'Moyra', 'Wingeat', 'mwingeatl@webs.com', 0),
(20, 'Inga', 'Dunsleve', 'idunslevem@google.de', 1),
(21, 'Billy', 'Ghirardi', 'bghirardin@last.fm', 1),
(22, 'Daniel', 'Kubal', 'dkubalo@facebook.com', 0),
(23, 'Lena', 'Di Giacomo', 'digiacomolena@kickstarter.com', 0),
(24, 'Gasparo', 'Fouch', 'gfouchq@irs.gov', 0),
(25, 'Kelcy', 'Climar', 'kclimarr@merriam-webster.com', 0),
(26, 'Manuel', 'Chartres', 'mchartress@bloglovin.com', 0),
(27, 'Oberon', 'Roddell', 'oroddellt@fc2.com', 0),
(28, 'Lena', 'Yushkin', 'lyushkiny@naver.com', 0),
(29, 'Lucilia', 'Crowne', 'lcrownez@home.pl', 1),
(30, 'Noemi', 'Woofendell', 'nwoofendell10@ow.ly', 0),
(31, 'Roxanne', 'Arstall', 'rarstall11@ycombinator.com', 1),
(32, 'Anna', 'Lugard', 'alugard12@mayoclinic.com', 0),
(33, 'Peter', 'Stare', 'pstare13@squarespace.com', 0),
(34, 'Ellen', 'Flanders', 'eflanders14@addtoany.com', 1),
(35, 'Chris', 'Sanches', 'csanches15@yahoo.com', 0),
(36, 'Miriam', 'Ossulton', 'mossulton16@cargocollective.com', 0),
(37, 'Hans', 'Simister', 'hsimister17@toplist.cz', 0),
(38, 'Alan', 'Howlett', 'ahowlett18@tuttocitta.it', 0),
(39, 'Sandro', 'Del Monte', 'sdelmonte19@tripadvisor.com', 0),
(40, 'Gina', 'Held', 'gheld1a@un.org', 0),
(41, 'Jonas', 'Eardley', 'jeardley1b@google.com.hk', 0),
(42, 'Rolli', 'Bauer', 'rbauer1c@list-manage.com', 0),
(43, 'Paola', 'Hatchette', 'phatchette1d@senate.gov', 0),
(44, 'Rollie', 'Burnhill', 'rburnhill1c@list-manage.com', 0),
(45, 'Paola', 'Hatchette', 'paola.hatchette@home.it', 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `studenten`
--
ALTER TABLE `studenten`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_kursID` (`kursID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `studenten`
--
ALTER TABLE `studenten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
