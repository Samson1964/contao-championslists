-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.3
-- Erstellungszeit: 13. Dezember 2014 um 11:57
-- Server Version: 5.6.19
-- PHP-Version: 4.4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `db107305_40`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mm_meisterlisten_auswahl`
--

CREATE TABLE `mm_meisterlisten_auswahl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `sorting` int(10) unsigned NOT NULL DEFAULT '0',
  `tstamp` int(10) unsigned NOT NULL DEFAULT '0',
  `titel` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Daten für Tabelle `mm_meisterlisten_auswahl`
--

INSERT INTO `mm_meisterlisten_auswahl` (`id`, `pid`, `sorting`, `tstamp`, `titel`, `alias`) VALUES
(1, 0, 0, 1408687190, 'Offene Deutsche Frauen-Meisterschaften seit 1990', 'offene-deutsche-frauen-meisterschaften-seit-1990'),
(2, 0, 256, 1408687179, 'Offene BRD-Frauen-Meisterschaften 1971 bis 1988', 'offene-brd-frauen-meisterschaften-1971-bis-1988'),
(3, 0, 512, 1408681298, 'Deutsche Meisterschaften seit 1991', 'deutsche-meisterschaften-seit-1991'),
(4, 0, 768, 1408681343, 'BRD-Meisterschaften 1947 bis 1989', 'brd-meisterschaften-1947-bis-1989'),
(5, 0, 1024, 1408681511, 'Internationale BRD-Meisterschaften 1971 bis 1983', 'internationale-brd-meisterschaften-1971-bis-1983'),
(6, 0, 1280, 1408681543, 'DDR-Meisterschaften 1948 bis 1990', 'ddr-meisterschaften-1948-bis-1990'),
(7, 0, 1536, 1408687166, 'Deutsche Frauen-Meisterschaften seit 1991', 'deutsche-frauen-meisterschaften-seit-1991'),
(8, 0, 1792, 1408687210, 'BRD-Frauen-Meisterschaften 1955 bis 1989', 'brd-frauen-meisterschaften-1955-bis-1989'),
(9, 0, 2048, 1408687246, 'DDR-Frauen-Meisterschaften 1948 bis 1990', 'ddr-frauen-meisterschaften-1948-bis-1990'),
(10, 0, 2304, 1408687271, 'Gesamtdeutsche Frauen-Meisterschaften 1947 bis 1953', 'gesamtdeutsche-frauen-meisterschaften-1947-bis-1953'),
(11, 0, 2560, 1408687293, 'Kongresse des Großdeutschen Schachbundes 1939 bis 1943 &#40;Frauen&#41;', 'kongresse-des-grossdeutschen-schachbundes-1939-bis-1943-frauen'),
(12, 0, 2816, 1408720850, 'Gesamtdeutsche Meisterschaften 1947 bis 1953', 'gesamtdeutsche-meisterschaften-1947-bis-1953'),
(13, 0, 3072, 1408720868, 'Meisterschaften von Deutschland 1933 bis 1943', 'meisterschaften-von-deutschland-1933-bis-1943'),
(14, 0, 3328, 1408720882, 'Kongresse des Deutschen Schachbundes 1920 bis 1932', 'kongresse-des-deutschen-schachbundes-1920-bis-1932'),
(15, 0, 3584, 1408720894, 'Kongresse des Deutschen Schachbundes 1879 bis 1914', 'kongresse-des-deutschen-schachbundes-1879-bis-1914'),
(16, 0, 3840, 1408794317, 'Deutsche Frauen-Blitz-Einzelmeisterschaften seit 1991', 'deutsche-frauen-blitz-einzelmeisterschaften-seit-1991'),
(17, 0, 4096, 1408794357, 'BRD-Frauen-Blitz-Einzelmeisterschaften 1947 bis 1990', 'brd-frauen-blitz-einzelmeisterschaften-1947-bis-1990'),
(18, 0, 4352, 1408794389, 'DDR-Frauen-Blitz-Einzelmeisterschaften 1969 bis 1990', 'ddr-frauen-blitz-einzelmeisterschaften-1969-bis-1990'),
(19, 0, 4608, 1408794690, 'Deutsche Frauen-Schnellschach-Einzelmeisterschaften seit 1991', 'deutsche-frauen-schnellschach-einzelmeisterschaften-seit-1991'),
(20, 0, 4864, 1408794861, 'Deutsche Schnellschach-Einzelmeisterschaften seit 1990', 'deutsche-schnellschach-einzelmeisterschaften-seit-1990'),
(21, 0, 5120, 1408794960, 'DDR-Schnellschachmeisterschaften', 'ddr-schnellschachmeisterschaften'),
(22, 0, 5376, 1408795073, 'Deutsche Blitz-Einzelmeisterschaften seit 1991', 'deutsche-blitz-einzelmeisterschaften-seit-1991'),
(23, 0, 5632, 1408795102, 'BRD-Blitz-Einzelmeisterschaften 1947 bis 1990', 'brd-blitz-einzelmeisterschaften-1947-bis-1990'),
(24, 0, 5888, 1408795139, 'DDR-Blitz-Einzelmeisterschaften 1947 bis 1990', 'ddr-blitz-einzelmeisterschaften-1947-bis-1990'),
(25, 0, 6144, 1408795577, 'Deutsche Pokal-Einzelmeisterschaften seit 1991', 'deutsche-pokal-einzelmeisterschaften-seit-1991'),
(26, 0, 6400, 1408795614, 'BRD-Pokal-Einzelmeisterschaften', 'brd-pokal-einzelmeisterschaften'),
(27, 0, 6656, 1410104799, 'Senioren - Deutsche Einzelmeisterschaft', 'senioren-deutsche-einzelmeisterschaft'),
(28, 0, 6656, 1414074685, 'Senioren - Deutsche Schnellschachmeisterschaft', 'senioren-deutsche-schnellschachmeisterschaft'),
(29, 0, 6656, 1414074726, 'Senioren - Deutsche Blitzschachmeisterschaft', 'senioren-deutsche-blitzschachmeisterschaft'),
(30, 0, 6656, 1414074777, 'Senioren - Mannschaftsmeisterschaft der Landesverbände', 'senioren-mannschaftsmeisterschaft-der-landesverbaende');
