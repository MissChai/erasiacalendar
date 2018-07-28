-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 27 Juillet 2018 à 20:02
-- Version du serveur :  5.6.30-1~bpo8+1
-- Version de PHP :  5.6.33-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `calendar_t0ka`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`id_event` int(11) NOT NULL,
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
  `id_location` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id_event`, `name_event`, `topic`, `begin_year`, `begin_month`, `begin_day`, `end_year`, `end_month`, `end_day`, `description`, `id_period`, `id_location`) VALUES
(3, 'Festival de Natsu', NULL, NULL, 6, 20, NULL, 6, 27, 'Fête célébrant l''été au pays de l''Air, où se réunissent de nombreux marchands pour former le plus grand marché de l''année et du pays. Semblable à une grande foire. On peut trouver de tout venant de partout, c''est l''occasion de faire des affaires et de rencontrer des voyageurs. De grands jeux et concours de toutes sortes sont organisés pendant quelques jours. ', 2, 12),
(4, 'Festival du Feu', NULL, NULL, 9, 20, NULL, 9, 27, 'Fête en l''honneur d''Entei. La capitale du pays du Feu accueille pendant quelques jours l''un de ses Pokémon emblèmes, afin qu''il bénisse les jeunes maîtres du Feu nés dans l''année et les bébés Pokémon du même type. Musiques entraînantes résonnent dans la cité, les costumes aux couleurs chaudes et brillantes sont de sortie. La fête dure deux jours et se poursuit dans la nuit.', 2, 13),
(5, 'Festival d''Hiver', NULL, NULL, 12, 20, NULL, 12, 27, 'Fête célébrant l''Hiver. Un grand défilé y est organisé ainsi que de nombreuses festivités. On peut trouver des vendeurs de costumes pour tous les goûts, toutes les tailles, et même pour les Pokémon. Ce Festival dure sept jours, au terme desquels Suicune apparaît s''il le juge réussi, symbole de chance et de bénédiction pour les maîtres de l''Eau.', 2, 14),
(6, 'Halloween', NULL, NULL, 10, 30, NULL, 11, 1, 'Fête traditionnelle dans laquelle on joue à se faire peur le temps d''une soirée. Diverses cérémonies sont organisées, on peut trouver partout de quoi s''amuser. ', 2, 1),
(7, 'Festival du Printemps', NULL, NULL, 3, 20, NULL, 3, 27, 'Fête célébrant le renouveau des saisons et de la vie au Printemps. Alors que les arbres bourgeonnent, les habitants décorent leurs villes de jeunes fleurs et Raikou visite la capitale de la Terre afin d''y bénir les amoureux et l''amour en général (familial, amical, de dresseur à Pokémon) en leur offrant des bouquets de fleurs. On dit que si les cerisiers sont en fleurs ce jour-là, un amour déclaré sous l''un d''eux sera éternel. ', 2, 15),
(8, 'Fête de la Lune – Saint Valentin', NULL, NULL, 2, 10, NULL, 2, 15, 'La Ville Lunaire est toujours en pleine effervescence, mais dans cette période particulière, la légende raconte que le croissant de Lune rose qui apparaît tous les ans serait en fait Cresselia dormant au milieu des étoiles. Profitant de ce mythe, les habitants de la ville organisent une grande fête d''une nuit en son honneur, en particulier pour les amoureux.', 2, 16),
(9, 'Rite de la paix', NULL, NULL, 12, 31, NULL, 12, 31, NULL, 2, 7),
(10, 'Rite de la Paix', NULL, NULL, 1, 1, NULL, 1, 1, NULL, 2, 7),
(11, 'Foire Marchande', NULL, NULL, 8, 24, NULL, 8, 31, 'Durant cette période, tous les marchands de Tenkei et d''Erasia sont conviés à la cité du Feu, afin de faire l''étalage de leurs produits. Que ce soit des armes, de la nourriture, des vêtements, des bijoux, ... Si vous cherchez quelque chose de particulier, il n''y a pas à douter que c''est ici que vous le trouverez !', 2, 9),
(12, 'Jours des Héros', NULL, NULL, 5, 1, NULL, 5, 4, 'Les habitants de Tenkei commémorent la bravoure des Héros s''étant sacrifiés lors de leur combat contre le Monstre. De nombreux spectacles ont lieu à travers les rues des cités, reprenant les grands événements de cet affrontement. Les festivités s''achèvent par une grande procession jusqu''au Sanctuaire des Tribus respectives, où la population fait une dernière prière collective.', 2, 19),
(13, 'Fête de la Fertilité', NULL, NULL, 3, 17, NULL, 3, 22, 'Équivalent midgardien de la Fête de la Lune et du Festival du Printemps. Les rues sont décorées avec des fleurs d''hiver et les habitants s''offrent les premières fleurs du printemps, tandis qu''une couronne de fleurs est posée sur les enfants nés de l''année passée. La Fête s''achève par un grand feu de joie, où l''on brûle toutes les coiffes de fleurs pour que Démétéros bénisse les enfants et la terre. Qui plus est, on dit qu''un couple jetant un collier de fleurs tissé ensemble dans le brasier verra son amour durer éternellement.', 2, 7),
(14, 'Jour de l''Aigle', NULL, NULL, 11, 11, NULL, 11, 13, 'Jour où les guerriers d''Aliphyr ayant complété leur formation à Linaëwen et réussi l''Épreuve de la Caverne obtiennent le rang de Chevaliers Ailés. Après une fête au sein de l''Académie Militaire de Linaëwen, un grand banquet est organisé au sein de la cité de l''Air, précédé par une cérémonie où le chef d''Aliphyr lui-même remet une plume aux nouveaux adoubés.', 2, 20),
(15, 'Sublimation', NULL, NULL, 1, 9, NULL, 1, 12, 'Deux fois par an, la sérénité d''Abyan se voit fortement chamboulée par cette fête. On se déguise, on chante, on mange, on danse... Tout ou presque est permis au sein de la cité pendant ces quelques jours, pour pallier le manque d''agitation habituel !', 2, 10),
(16, 'Sublimation', NULL, NULL, 7, 9, NULL, 7, 12, 'Deux fois par an, la sérénité d''Abyan se voit fortement chamboulée par cette fête. On se déguise, on chante, on mange, on danse... Tout ou presque est permis au sein de la cité pendant ces quelques jours, pour pallier le manque d''agitation habituel !', 2, 10),
(18, 'Danse des Lumières', NULL, NULL, 8, 1, NULL, 8, 7, 'Appelé « Hikari no Mai » dans la langue de Mizuhan, ce festival dédié aux défunts est un événement majeur dans la vie des habitants de la Nouvelle-Gilnéas. De grandes processions sont organisées un peu partout, pendant lesquelles chacun marche en tenant une lanterne symbolisant l''âme d''un disparu. Des veillées se tiennent également dans le village, au cours desquelles on prie tous ensemble pour le repos des victimes de la folie de Mewtwo et des Méga-Pokémon.', 2, 21),
(19, 'Carnaval', 'http://erasia-rpg.forum-actif.net/t3347-carnaval', 2016, 3, 20, 2016, 6, 26, 'Partout sur Érasia et Midgard, les premiers vents chauds réchauffent les cœurs et rassurent les habitants. L''hiver s''en va, laissant enfin sa place à la vie sous toutes ses incarnations. Les humains et les Pokémon sont heureux, et c''est l''occasion d''organiser la fête du Carnaval qui, selon les régions, se manifeste sous des formes très différentes...', 1, 1),
(20, 'Course', 'http://erasia-rpg.forum-actif.net/t3534-course-pokemon', 2016, 10, 9, 2016, 12, 31, 'Partout sur Érasia et Midgard, les gens se préparent à affronter l''hiver qui arrive. Mais au milieu des préparatifs, certains organisent des petites festivités pour se détendre avant de reprendre le dur labeur. À la Mélopée de la Nymphe, au Grand Large et dans les Cieux, des Courses de Pokémon proposent aux Dresseurs du monde entier de mettre à l''épreuve la vitesse de leurs animaux. Au même moment, un Concours se monte au Cosmo Canyon, où seuls les plus futés pourront tenter de décrocher un ruban.', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
`id_location` int(11) NOT NULL,
  `name_location` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

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
(16, 'Terros - Ville Lunaire'),
(19, 'Tenkei / Midgard - Abyan, Aliphyr, Torcan & Dyrinn'),
(20, 'Aliphyr & Linaëwen'),
(21, 'Mizuhan - Nouvelle-Gilnéas'),
(22, 'Tenkei / Midgard - Place d''Ivoire');

-- --------------------------------------------------------

--
-- Structure de la table `periods`
--

CREATE TABLE IF NOT EXISTS `periods` (
`id_period` int(11) NOT NULL,
  `name_period` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `periods`
--

INSERT INTO `periods` (`id_period`, `name_period`) VALUES
(1, 'none'),
(2, 'annual');

-- --------------------------------------------------------

--
-- Structure de la table `t_event`
--

CREATE TABLE IF NOT EXISTS `t_event` (
`evt_id` int(11) NOT NULL,
  `evt_name` varchar(255) NOT NULL,
  `evt_description` text,
  `evt_topic` varchar(255) DEFAULT NULL,
  `evt_is_annual` int(1) NOT NULL DEFAULT '1',
  `evt_begin_date` date NOT NULL,
  `evt_end_date` date NOT NULL,
  `loc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_event`
--

INSERT INTO `t_event` (`evt_id`, `evt_name`, `evt_description`, `evt_topic`, `evt_is_annual`, `evt_begin_date`, `evt_end_date`, `loc_id`) VALUES
(1, 'Festival de Natsu', 'Fête célébrant l''été au Pays de l''Air, où se réunissent de nombreux marchands pour former le plus grand marché de l''année et du pays. Semblable à une grande foire. On peut trouver de tout venant de partout, c''est l''occasion de faire des affaires et de rencontrer des voyageurs. De grands jeux et concours de toutes sortes sont organisés pendant quelques jours.', '', 1, '0000-06-20', '0000-06-27', 17),
(2, 'Festival du Feu', 'Fête en l''honneur d''Entei. La capitale du Pays du Feu accueille pendant quelques jours l''un de ses Pokémon emblèmes, afin qu''il bénisse les jeunes Maîtres du Feu nés dans l''année et les bébés Pokémon du même type. Musiques entraînantes résonnent dans la cité, les costumes aux couleurs chaudes et brillantes sont de sortie. La fête dure deux jours et se poursuit dans la nuit.', '', 1, '0000-09-20', '0000-09-27', 16),
(3, 'Festival d''Hiver', 'Fête célébrant l''Hiver. Un grand défilé y est organisé ainsi que de nombreuses festivités. On peut trouver des vendeurs de costumes pour tous les goûts, toutes les tailles, et même pour les Pokémon. Ce Festival dure sept jours, au terme desquels Suicune apparaît s''il le juge réussi, symbole de chance et de bénédiction pour les maîtres de l''Eau.', '', 1, '0000-12-20', '0000-12-27', 14),
(4, 'Halloween', 'Fête traditionnelle dans laquelle on joue à se faire peur le temps d''''une soirée. Diverses cérémonies sont organisées, on peut trouver partout de quoi s''amuser.', '', 1, '0000-10-30', '0000-11-01', 1),
(5, 'Festival du Printemps', 'Fête célébrant le renouveau des saisons et de la vie au Printemps. Alors que les arbres bourgeonnent, les habitants décorent leurs villes de jeunes fleurs et Raikou visite la capitale de la Terre afin d''y bénir les amoureux et l''amour en général (familial, amical, de dresseur à Pokémon) en leur offrant des bouquets de fleurs. On dit que si les cerisiers sont en fleurs ce jour-là, un amour déclaré sous l''un d''eux sera éternel.', '', 1, '0000-03-20', '0000-03-27', 12),
(6, 'Fête de la Lune – Saint Valentin', 'La Ville Lunaire est toujours en pleine effervescence, mais dans cette période particulière, la légende raconte que le croissant de Lune rose qui apparaît tous les ans serait en fait Cresselia dormant au milieu des étoiles. Profitant de ce mythe, les habitants de la ville organisent une grande fête d''une nuit en son honneur, en particulier pour les amoureux.', '', 1, '0000-02-10', '0000-02-15', 13),
(7, 'Rite de la paix', '', '', 1, '0000-12-31', '0000-01-01', 3),
(8, 'Foire Marchande', 'Durant cette période, tous les marchands de Midgard et d''Érasia sont conviés à la Cité du Feu, afin de faire l''étalage de leurs produits. Que ce soit des armes, de la nourriture, des vêtements, des bijoux... Si vous cherchez quelque chose de particulier, il n''y a pas à douter que c''est ici que vous le trouverez !', '', 1, '0000-08-24', '0000-08-31', 10),
(9, 'Jours des Héros', 'Les habitants de Midgard commémorent la bravoure des Héros s''étant sacrifiés lors de leur combat contre le Monstre. De nombreux spectacles ont lieu à travers les rues des cités, reprenant les grands événements de cet affrontement. Les festivités s''achèvent par une grande procession jusqu''au Sanctuaire des Tribus respectives, où la population fait une dernière prière collective.', '', 1, '0000-05-01', '0000-05-04', 18),
(10, 'Fête de la Fertilité', 'Équivalent midgardien de la Fête de la Lune et du Festival du Printemps. Les rues sont décorées avec des fleurs d''hiver et les habitants s''offrent les premières fleurs du printemps, tandis qu''une couronne de fleurs est posée sur les enfants nés de l''année passée. La fête s''achève par un grand feu de joie, où l''on brûle toutes les coiffes de fleurs pour que Démétéros bénisse les enfants et la terre. Qui plus est, on dit qu''un couple jetant un collier de fleurs tissé ensemble dans le brasier verra son amour durer éternellement.', '', 1, '0000-03-17', '0000-03-22', 3),
(11, 'Jour de l''Aigle', 'Jour où les Guerriers d''Aliphyr ayant complété leur formation à Linaëwen et réussi l''Épreuve de la Caverne obtiennent le rang de Chevaliers Ailés. Après une fête au sein de l''Académie Militaire de Linaëwen, un grand banquet est organisé au sein de la Cité de l''Air, précédé par une cérémonie où le chef d''Aliphyr lui-même remet une plume aux nouveaux adoubés.', '', 1, '0000-11-11', '0000-11-13', 19),
(12, 'Sublimation', 'Deux fois par an, la sérénité d''Abyan se voit fortement chamboulée par cette fête. On se déguise, on chante, on mange, on danse... Tout ou presque est permis au sein de la cité pendant ces quelques jours, pour pallier le manque d''agitation habituel !', '', 1, '0000-01-09', '0000-01-12', 8),
(13, 'Sublimation', 'Deux fois par an, la sérénité d''Abyan se voit fortement chamboulée par cette fête. On se déguise, on chante, on mange, on danse... Tout ou presque est permis au sein de la cité pendant ces quelques jours, pour pallier le manque d''agitation habituel !', '', 1, '0000-07-09', '0000-07-12', 8),
(14, 'Danse des Lumières', 'Appelé « Hikari no Mai » dans la langue de Mizuhan, ce festival dédié aux défunts est un événement majeur dans la vie des habitants de la Nouvelle-Gilnéas. De grandes processions sont organisées un peu partout, pendant lesquelles chacun marche en tenant une lanterne symbolisant l''âme d''un disparu. Des veillées se tiennent également dans le village, au cours desquelles on prie tous ensemble pour le repos des victimes de la folie de Mewtwo et des Méga-Pokémon.', '', 1, '0000-08-01', '0000-08-07', 15),
(15, 'Carnaval', 'Partout sur Érasia et Midgard, les premiers vents chauds réchauffent les cœurs et rassurent les habitants. L''hiver s''en va, laissant enfin sa place à la vie sous toutes ses incarnations. Les humains et les Pokémon sont heureux, et c''est l''occasion d''organiser la fête du Carnaval qui, selon les régions, se manifeste sous des formes très différentes...', 'http://erasia-rpg.forum-actif.net/t3347-carnaval', 0, '2016-03-20', '2016-06-26', 1),
(16, 'Course Pokémon', 'Partout sur Érasia et Midgard, les gens se préparent à affronter l''''hiver qui arrive. Mais au milieu des préparatifs, certains organisent des petites festivités pour se détendre avant de reprendre le dur labeur. À la Mélopée de la Nymphe, au Grand Large et dans les Cieux, des Courses de Pokémon proposent aux Dresseurs du monde entier de mettre à l''''épreuve la vitesse de leurs animaux. Au même moment, un Concours se monte au Cosmo Canyon, où seuls les plus futés pourront tenter de décrocher un ruban.', 'http://erasia-rpg.forum-actif.net/t3534-course-pokemon', 0, '2016-10-09', '2016-12-31', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_location`
--

CREATE TABLE IF NOT EXISTS `t_location` (
`loc_id` int(11) NOT NULL,
  `loc_continent` varchar(255) NOT NULL,
  `loc_country` varchar(255) DEFAULT NULL,
  `loc_place` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_location`
--

INSERT INTO `t_location` (`loc_id`, `loc_continent`, `loc_country`, `loc_place`) VALUES
(1, 'Monde', '', ''),
(2, 'Érasia', '', ''),
(3, 'Midgard', '', ''),
(4, 'Érasia', 'Terros', ''),
(5, 'Érasia', 'Mizuhan', ''),
(6, 'Érasia', 'Flamen', ''),
(7, 'Érasia', 'Nalcia', ''),
(8, 'Midgard', 'Abyan', ''),
(9, 'Midgard', 'Aliphyr', ''),
(10, 'Midgard', 'Torcan', ''),
(11, 'Midgard', 'Dyrinn', ''),
(12, 'Érasia', 'Terros', 'Cité de Seian'),
(13, 'Érasia', 'Terros', 'Ville Lunaire'),
(14, 'Érasia', 'Mizuhan', 'Cité Arkan'),
(15, 'Érasia', 'Mizuhan', 'Nouvelle-Gilnéas'),
(16, 'Érasia', 'Flamen', 'Omatsu'),
(17, 'Érasia', 'Nalcia', 'Éternara'),
(18, 'Midgard', '', 'Abyan, Aliphyr, Torcan &amp; Dyrinn'),
(19, 'Midgard', 'Aliphyr', 'Aliphyr &amp; Linaëwen'),
(20, 'Midgard', '', 'Place d''Ivoire');

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
`usr_id` int(11) NOT NULL,
  `usr_username` varchar(255) NOT NULL,
  `usr_password` varchar(255) NOT NULL,
  `usr_role` varchar(255) NOT NULL DEFAULT 'ROLE_USER'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_user`
--

INSERT INTO `t_user` (`usr_id`, `usr_username`, `usr_password`, `usr_role`) VALUES
(1, 'Erasia', 'Erasia01', 'ROLE_USER');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id_event`);

--
-- Index pour la table `locations`
--
ALTER TABLE `locations`
 ADD PRIMARY KEY (`id_location`);

--
-- Index pour la table `periods`
--
ALTER TABLE `periods`
 ADD PRIMARY KEY (`id_period`);

--
-- Index pour la table `t_event`
--
ALTER TABLE `t_event`
 ADD PRIMARY KEY (`evt_id`), ADD KEY `fk_evt_loc` (`loc_id`);

--
-- Index pour la table `t_location`
--
ALTER TABLE `t_location`
 ADD PRIMARY KEY (`loc_id`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
 ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `locations`
--
ALTER TABLE `locations`
MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `periods`
--
ALTER TABLE `periods`
MODIFY `id_period` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `t_event`
--
ALTER TABLE `t_event`
MODIFY `evt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `t_location`
--
ALTER TABLE `t_location`
MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_event`
--
ALTER TABLE `t_event`
ADD CONSTRAINT `fk_evt_loc` FOREIGN KEY (`loc_id`) REFERENCES `t_location` (`loc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
