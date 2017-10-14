-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 26 Janvier 2014 à 10:43
-- Version du serveur: 5.5.9
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `events`
--

INSERT INTO `events` VALUES(1, 'Un monde en péril', 'http://erasia-rpg.forum-actif.net/t2385-event-un-monde-en-peril', 2013, 11, 8, 2014, 2, 15, 'C’est la panique sur Erasia !\r\n\r\nMewtwo, pour une raison inconnue, est devenu incontrôlable, et s’est mis en tête de tout détruire. Face à ses pouvoirs, qui apparaissent encore plus terribles que d’habitude, personne n’est en mesure de lui résister.\r\nMais ce n’est pas tout. Un peu partout sur Erasia, des créatures sont sujettes au même phénomène que le Dieu. ', 1, 1);
INSERT INTO `events` VALUES(3, 'Festival de Natsu', NULL, NULL, 6, 20, NULL, 6, 27, 'Fête célébrant l''été au pays de l''Air, où se réunissent de nombreux marchants pour former le plus grand marché de l''année et du pays. Semblable à une grande foire. On peut trouver de tout venant de partout, c''est l''occasion de faire des affaires et de rencontrer des voyageurs. De grands jeux et concours de toutes sortes sont organisés pendant quelques jours. ', 2, 12);
INSERT INTO `events` VALUES(4, 'Festival du Feu', NULL, NULL, 9, 20, NULL, 9, 27, 'Fête en l''honneur d''Entei. La capitale du pays du Feu accueille pendant quelques jours l''un de ses Pokémon emblèmes, afin qu''il bénisse les jeunes maîtres du Feu nés dans l''année et les bébés Pokémon du même type. Musiques entraînantes résonnent dans la cité, les costumes aux couleurs chaudes et brillantes sont de sortie. La fête dure deux jours et se poursuit dans la nuit.', 2, 13);
INSERT INTO `events` VALUES(5, 'Festival d''Hiver', NULL, NULL, 12, 20, NULL, 12, 27, 'Fête célébrant l''Hiver. Un grand défilé y est organisé ainsi que de nombreuses festivités. On peut trouver des vendeurs de costumes pour tous les goûts, toutes les tailles, et même pour les Pokémon. Ce Festival dure sept jours, au terme desquels Suicune apparaît s''il le juge réussi, symbole de chance et de bénédiction pour les maîtres de l''Eau.', 2, 14);
INSERT INTO `events` VALUES(6, 'Halloween', NULL, NULL, 10, 30, NULL, 11, 1, 'Fête traditionnelle dans laquelle on joue à se faire peur le temps d''une soirée. Diverses cérémonies sont organisées, on peut trouver partout de quoi s''amuser. ', 2, 1);
INSERT INTO `events` VALUES(7, 'Festival du Printemps', NULL, NULL, 3, 20, NULL, 3, 27, 'Fête célébrant le renouveau des saisons et de la vie au Printemps. Alors que les arbres bourgeonnent, les habitants décorent leurs villes de jeunes fleurs et Raikou visite la capitale de la Terre afin d''y bénir les amoureux et l''amour en général (familial, amical, de dresseur à Pokémon) en leur offrant des bouquets de fleurs. On dit que si les cerisiers sont en fleurs ce jour là, un amour déclaré sous l''un d''eux sera éternel. ', 2, 15);
INSERT INTO `events` VALUES(8, 'Fête de la Lune – Saint Valentin', NULL, NULL, 2, 10, NULL, 2, 15, 'La Ville Lunaire est toujours en pleine effervescence, mais dans cette période particulière, la légende raconte que le croissant de Lune rose qui apparaît tous les ans serait en fait Cresselia dormant au milieu des étoiles. Profitant de ce mythe, les habitants de la ville organisent une grande fête d''une nuit en son honneur, en particulier pour les amoureux.', 2, 16);
INSERT INTO `events` VALUES(9, 'Rite de la paix', NULL, NULL, 12, 31, NULL, 12, 31, NULL, 2, 7);
INSERT INTO `events` VALUES(10, 'Rite de la Paix', NULL, NULL, 1, 1, NULL, 1, 1, NULL, 2, 7);
INSERT INTO `events` VALUES(11, 'Foire Marchande', NULL, NULL, 8, 24, NULL, 8, 31, 'Durant cette période, tous les marchands de Tenkei et d''Erasia sont conviés à la cité du Feu, afin de faire l''étalage de leurs produits. Que ce soit des armes, de la nourriture, des vêtements, des bijoux, ... Si vous cherchez quelque chose de particulier, il n''y a pas à douter que c''est ici que vous le trouverez !', 2, 9);
INSERT INTO `events` VALUES(12, 'Jours des Héros', NULL, NULL, 5, 1, NULL, 5, 4, 'Les habitants de Tenkei commémorent la bravoure des Héros s''étant sacrifiés lors de leur combat contre le Monstre. De nombreux spectacles ont lieu à travers les rues des cités, reprenant les grands événements de cet affrontement. Les festivités s''achèvent par une grande procession jusqu''au Sanctuaire des Tribus respectives, où la population font une dernière prière collective.', 2, 19);
INSERT INTO `events` VALUES(13, 'Fête de la Fertilité', NULL, NULL, 3, 17, NULL, 3, 22, 'Equivalent midgardien de la Fête de la Lune et du Festival du Printemps. Les rues sont décorées avec des fleurs d''hiver et les habitants s''offrent les premières fleurs du printemps, tandis qu''une couronne de fleurs est posée sur les enfants nés de l''année passée. La Fête s''achève par un grand feu de joie, où l''on brûle toutes les coiffes de fleurs pour que Démétéros bénisse les enfants et la terre. Qui plus est, on dit qu''un couple jetant un collier de fleurs tissé ensemble dans le brasier verra son amour durer éternellement.', 2, 7);
INSERT INTO `events` VALUES(14, 'Jour de l''Aigle', NULL, NULL, 11, 11, NULL, 11, 13, 'Jour où les guerriers d''Aliphyr ayant complété leur formation à Linaëwen et réussi l''Epreuve de la Caverne obtiennent le rang de Chevaliers Ailés. Après une fête au sein de l''Académie Militaire de Linaëwen, un grand banquet est organisé au sein de la cité de l''Air, précédé par une cérémonie où le chef d''Aliphyr lui-même remet leur coiffe de plumes aux nouveaux adoubés.', 2, 20);
INSERT INTO `events` VALUES(15, 'Sublimation', NULL, NULL, 1, 9, NULL, 1, 12, 'Deux fois par an, la sérénité d''Abyan se voit fortement chamboulée par cette fête. On se déguise, on chante, on mange, on danse... Tout ou presque est permis au sein de la cité pendant ces quelques jours, pour pallier le manque d''agitation habituel !', 2, 10);
INSERT INTO `events` VALUES(16, 'Sublimation', NULL, NULL, 7, 9, NULL, 7, 12, 'Deux fois par an, la sérénité d''Abyan se voit fortement chamboulée par cette fête. On se déguise, on chante, on mange, on danse... Tout ou presque est permis au sein de la cité pendant ces quelques jours, pour pallier le manque d''agitation habituel !', 2, 10);

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

CREATE TABLE `locations` (
  `id_location` int(11) NOT NULL AUTO_INCREMENT,
  `name_location` varchar(255) NOT NULL,
  PRIMARY KEY (`id_location`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `locations`
--

INSERT INTO `locations` VALUES(1, 'Partout dans le monde...');
INSERT INTO `locations` VALUES(2, 'Érasia');
INSERT INTO `locations` VALUES(3, 'Terros');
INSERT INTO `locations` VALUES(4, 'Mizuhan');
INSERT INTO `locations` VALUES(5, 'Flamen');
INSERT INTO `locations` VALUES(6, 'Nalcia');
INSERT INTO `locations` VALUES(7, 'Tenkei / Midgard');
INSERT INTO `locations` VALUES(8, 'Aliphyr');
INSERT INTO `locations` VALUES(9, 'Torcan');
INSERT INTO `locations` VALUES(10, 'Abyan');
INSERT INTO `locations` VALUES(11, 'Dyrinn');
INSERT INTO `locations` VALUES(12, 'Nalcia - Eternara');
INSERT INTO `locations` VALUES(13, 'Flamen - Omatsu');
INSERT INTO `locations` VALUES(14, 'Mizuhan - Cité Arkan');
INSERT INTO `locations` VALUES(15, 'Terros - Cité de Seian');
INSERT INTO `locations` VALUES(16, 'Terros - Ville Lunaire');
INSERT INTO `locations` VALUES(19, 'Tenkei / Midgard - Abyan, Aliphyr, Torcan & Dyrinn');
INSERT INTO `locations` VALUES(20, 'Aliphyr & Linaëwen');

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

INSERT INTO `periods` VALUES(1, 'none');
INSERT INTO `periods` VALUES(2, 'annual');
