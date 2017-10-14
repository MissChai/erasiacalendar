-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 20 Décembre 2013 à 15:36
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
  `topic` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id_event`, `name_event`, `topic`, `begin_year`, `begin_month`, `begin_day`, `end_year`, `end_month`, `end_day`, `description`, `id_period`, `id_location`) VALUES
(1, 'Un monde en péril', 'http://erasia-rpg.forum-actif.net/t2385-event-un-monde-en-peril', 2013, 11, 8, 2014, 1, 20, 'C’est la panique sur Erasia !\r\n\r\nMewtwo, pour une raison inconnue, est devenu incontrôlable, et s’est mis en tête de tout détruire. Face à ses pouvoirs, qui apparaissent encore plus terribles que d’habitude, personne n’est en mesure de lui résister.\r\nMais ce n’est pas tout. Un peu partout sur Erasia, des créatures sont sujettes au même phénomène que le Dieu. ', 1, 1),
(2, 'Rite de la paix', NULL, NULL, 12, 31, NULL, 1, 1, NULL, 2, 7),
(3, 'Festival de Natsu', NULL, NULL, 6, 20, NULL, 6, 27, 'Fête célébrant l''été au pays de l''Air, où se réunissent de nombreux marchants pour former le plus grand marché de l''année et du pays. Semblable à une grande foire. On peut trouver de tout venant de partout, c''est l''occasion de faire des affaires et de rencontrer des voyageurs. De grands jeux et concours de toutes sortes sont organisés pendant quelques jours. ', 2, 12),
(4, 'Festival du Feu', NULL, NULL, 9, 20, NULL, 9, 27, 'Fête en l''honneur d''Entei. La capitale du pays du Feu accueille pendant quelques jours l''un de ses Pokémon emblèmes, afin qu''il bénisse les jeunes maîtres du Feu nés dans l''année et les bébés Pokémon du même type. Musiques entraînantes résonnent dans la cité, les costumes aux couleurs chaudes et brillantes sont de sortie. La fête dure deux jours et se poursuit dans la nuit.', 2, 13),
(5, 'Festival d''Hiver', NULL, NULL, 12, 20, NULL, 12, 27, 'Fête célébrant l''Hiver. Un grand défilé y est organisé ainsi que de nombreuses festivités. On peut trouver des vendeurs de costumes pour tous les goûts, toutes les tailles, et même pour les Pokémon. Ce Festival dure sept jours, au terme desquels Suicune apparaît s''il le juge réussi, symbole de chance et de bénédiction pour les maîtres de l''Eau.', 2, 14),
(6, 'Halloween', NULL, NULL, 10, 30, NULL, 11, 1, 'Fête traditionnelle dans laquelle on joue à se faire peur le temps d''une soirée. Diverses cérémonies sont organisées, on peut trouver partout de quoi s''amuser. ', 2, 1),
(7, 'Festival du Printemps', NULL, NULL, 3, 20, NULL, 3, 27, 'Fête célébrant le renouveau des saisons et de la vie au Printemps. Alors que les arbres bourgeonnent, les habitants décorent leurs villes de jeunes fleurs et Raikou visite la capitale de la Terre afin d''y bénir les amoureux et l''amour en général (familial, amical, de dresseur à Pokémon) en leur offrant des bouquets de fleurs. On dit que si les cerisiers sont en fleurs ce jour là, un amour déclaré sous l''un d''eux sera éternel. ', 2, 15),
(8, 'Fête de la Lune – Saint Valentin', NULL, NULL, 2, 10, NULL, 2, 15, 'La Ville Lunaire est toujours en pleine effervescence, mais dans cette période particulière, la légende raconte que le croissant de Lune rose qui apparaît tous les ans serait en fait Cresselia dormant au milieu des étoiles. Profitant de ce mythe, les habitants de la ville organisent une grande fête d''une nuit en son honneur, en particulier pour les amoureux.', 2, 16);

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

CREATE TABLE `locations` (
  `id_location` int(11) NOT NULL AUTO_INCREMENT,
  `name_location` varchar(255) NOT NULL,
  PRIMARY KEY (`id_location`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `locations`
--

INSERT INTO `locations` (`id_location`, `name_location`) VALUES
(1, 'Partout dans le monde...'),
(2, 'Érasia'),
(3, 'Terros'),
(4, 'Mizuhan'),
(5, 'Flamen'),
(6, 'Nalcia'),
(7, 'Tenkei / Midgard'),
(8, 'Aliphyr'),
(9, 'Torcan'),
(10, 'Abyan'),
(11, 'Dyrinn'),
(12, 'Nalcia - Eternara'),
(13, 'Flamen - Omatsu'),
(14, 'Mizuhan - Cité Arkan'),
(15, 'Terros - Cité de Seian'),
(16, 'Terros - Ville Lunaire');

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
