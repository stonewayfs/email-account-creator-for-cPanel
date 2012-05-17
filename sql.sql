-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 17 mei 2012 om 12:21
-- Serverversie: 5.5.22
-- PHP-Versie: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `email`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `confirm`
--

CREATE TABLE IF NOT EXISTS `confirm` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `email` text NOT NULL,
  `confid` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `user` text NOT NULL,
  `ip` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
