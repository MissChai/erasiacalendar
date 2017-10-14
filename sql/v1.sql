-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 17 Décembre 2013 à 19:59
-- Version du serveur: 5.5.25
-- Version de PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `calendar_t0ka`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `name_event` varchar(255) NOT NULL,
  `begin_year` int(11) DEFAULT NULL,
  `begin_month` int(11) DEFAULT NULL,
  `begin_day` int(11) DEFAULT NULL,
  `end_year` int(11) DEFAULT NULL,
  `end_month` int(11) DEFAULT NULL,
  `end_day` int(11) DEFAULT NULL,
  `description` text,
  `id_period` int(11) NOT NULL DEFAULT '1',
  `id_location` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id_event`, `name_event`, `begin_year`, `begin_month`, `begin_day`, `end_year`, `end_month`, `end_day`, `description`, `id_period`, `id_location`) VALUES
(1, 'Un monde en péril', 2013, 11, 8, 2014, 1, 20, 'C’est la panique sur Erasia !\r\n\r\nMewtwo, pour une raison inconnue, est devenu incontrôlable, et s’est mis en tête de tout détruire. Face à ses pouvoirs, qui apparaissent encore plus terribles que d’habitude, personne n’est en mesure de lui résister.\r\nMais ce n’est pas tout. Un peu partout sur Erasia, des créatures sont sujettes au même phénomène que le Dieu. ', 1, 1),
(2, 'Rite de la paix', NULL, 12, 31, NULL, 12, 31, NULL, 2, 7),
(3, 'Festival de Natsu', NULL, 6, 20, NULL, 6, 27, NULL, 2, 12);

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

CREATE TABLE `locations` (
  `id_location` int(11) NOT NULL AUTO_INCREMENT,
  `name_location` varchar(255) NOT NULL,
  PRIMARY KEY (`id_location`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `locations`
--

INSERT INTO `locations` (`id_location`, `name_location`) VALUES
(1, 'Tous'),
(2, 'Érasia'),
(3, 'Terros'),
(4, 'Mizuhan'),
(5, 'Flamen'),
(6, 'Nalcia'),
(7, 'Tenkei / Midgard'),
(8, 'Aliphyr'),
(9, 'Torcan'),
(10, 'Abyan'),
(11, 'Drinn'),
(12, 'Nalcia - Eternara');

-- --------------------------------------------------------

--
-- Structure de la table `periods`
--

CREATE TABLE `periods` (
  `id_period` int(11) NOT NULL AUTO_INCREMENT,
  `name_period` varchar(255) NOT NULL,
  PRIMARY KEY (`id_period`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `periods`
--

INSERT INTO `periods` (`id_period`, `name_period`) VALUES
(1, 'none'),
(2, 'annual');
