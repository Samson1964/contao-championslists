-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.3
-- Erstellungszeit: 13. Dezember 2014 um 11:58
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
-- Tabellenstruktur für Tabelle `mm_meisterliste3`
--

CREATE TABLE `mm_meisterliste3` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `sorting` int(10) unsigned NOT NULL DEFAULT '0',
  `tstamp` int(10) unsigned NOT NULL DEFAULT '0',
  `seniorenmeister` varchar(255) NOT NULL DEFAULT '',
  `nummer` int(10) DEFAULT NULL,
  `jahr` varchar(255) NOT NULL DEFAULT '',
  `ort` varchar(255) NOT NULL DEFAULT '',
  `frauenmeister` varchar(255) NOT NULL DEFAULT '',
  `nestorenmeister` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `mm_meisterliste3`
--

INSERT INTO `mm_meisterliste3` (`id`, `pid`, `sorting`, `tstamp`, `seniorenmeister`, `nummer`, `jahr`, `ort`, `frauenmeister`, `nestorenmeister`) VALUES
(2, 0, 0, 1414082617, 'Juri Boidman', 26, '2014', 'Bad Neuenahr', 'Liubov Orlova', 'Jefim Rotstein');
