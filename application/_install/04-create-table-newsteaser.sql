-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Okt 2014 um 14:35
-- Server Version: 5.6.20
-- PHP-Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `mjs-2014`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `newsteaser`
--

CREATE TABLE IF NOT EXISTS `newsteaser` (
`newsteaserid` int(11) NOT NULL,
  `currentversion` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `published` timestamp NULL DEFAULT NULL,
  `newsid` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `newsteaser`
--

INSERT INTO `newsteaser` (`newsteaserid`, `currentversion`, `userid`, `published`, `newsid`) VALUES
(1, 2, 123, '2014-10-14 05:00:00', NULL),
(2, 1, 123, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newsteaser`
--
ALTER TABLE `newsteaser`
 ADD PRIMARY KEY (`newsteaserid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsteaser`
--
ALTER TABLE `newsteaser`
MODIFY `newsteaserid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
