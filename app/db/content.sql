INSERT INTO `t_user` (`usr_id`, `usr_username`, `usr_password`, `usr_role`) VALUES
(1, 'Erasia', 'Erasia01', 'ROLE_USER');

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
(20, 'Midgard', '', 'Place d\'Ivoire');

INSERT INTO `t_event` (`evt_id`, `evt_name`, `evt_description`, `evt_topic`, `evt_is_annual`, `evt_begin_date`, `evt_end_date`, `loc_id`) VALUES
(1, 'Festival de Natsu', 'Fête célébrant l\'été au Pays de l\'Air, où se réunissent de nombreux marchands pour former le plus grand marché de l\'année et du pays. Semblable à une grande foire. On peut trouver de tout venant de partout, c\'est l\'occasion de faire des affaires et de rencontrer des voyageurs. De grands jeux et concours de toutes sortes sont organisés pendant quelques jours.', '', 1, '0000-06-20', '0000-06-27', 17),
(2, 'Festival du Feu', 'Fête en l\'honneur d\'Entei. La capitale du Pays du Feu accueille pendant quelques jours l\'un de ses Pokémon emblèmes, afin qu\'il bénisse les jeunes Maîtres du Feu nés dans l\'année et les bébés Pokémon du même type. Musiques entraînantes résonnent dans la cité, les costumes aux couleurs chaudes et brillantes sont de sortie. La fête dure deux jours et se poursuit dans la nuit.', '', 1, '0000-09-20', '0000-09-27', 16),
(3, 'Festival d\'Hiver', 'Fête célébrant l\'Hiver. Un grand défilé y est organisé ainsi que de nombreuses festivités. On peut trouver des vendeurs de costumes pour tous les goûts, toutes les tailles, et même pour les Pokémon. Ce Festival dure sept jours, au terme desquels Suicune apparaît s\'il le juge réussi, symbole de chance et de bénédiction pour les maîtres de l\'Eau.', '', 1, '0000-12-20', '0000-12-27', 14),
(4, 'Halloween', 'Fête traditionnelle dans laquelle on joue à se faire peur le temps d\'\'une soirée. Diverses cérémonies sont organisées, on peut trouver partout de quoi s\'amuser.', '', 1, '0000-10-30', '0000-11-01', 1),
(5, 'Festival du Printemps', 'Fête célébrant le renouveau des saisons et de la vie au Printemps. Alors que les arbres bourgeonnent, les habitants décorent leurs villes de jeunes fleurs et Raikou visite la capitale de la Terre afin d\'y bénir les amoureux et l\'amour en général (familial, amical, de dresseur à Pokémon) en leur offrant des bouquets de fleurs. On dit que si les cerisiers sont en fleurs ce jour-là, un amour déclaré sous l\'un d\'eux sera éternel.', '', 1, '0000-03-20', '0000-03-27', 12),
(6, 'Fête de la Lune – Saint Valentin', 'La Ville Lunaire est toujours en pleine effervescence, mais dans cette période particulière, la légende raconte que le croissant de Lune rose qui apparaît tous les ans serait en fait Cresselia dormant au milieu des étoiles. Profitant de ce mythe, les habitants de la ville organisent une grande fête d\'une nuit en son honneur, en particulier pour les amoureux.', '', 1, '0000-02-10', '0000-02-15', 13),
(7, 'Rite de la paix', '', '', 1, '0000-12-31', '0000-01-01', 3),
(8, 'Foire Marchande', 'Durant cette période, tous les marchands de Midgard et d\'Érasia sont conviés à la Cité du Feu, afin de faire l\'étalage de leurs produits. Que ce soit des armes, de la nourriture, des vêtements, des bijoux... Si vous cherchez quelque chose de particulier, il n\'y a pas à douter que c\'\'est ici que vous le trouverez !', '', 1, '0000-08-24', '0000-08-31', 10),
(9, 'Jours des Héros', 'Les habitants de Midgard commémorent la bravoure des Héros s\'étant sacrifiés lors de leur combat contre le Monstre. De nombreux spectacles ont lieu à travers les rues des cités, reprenant les grands événements de cet affrontement. Les festivités s\'achèvent par une grande procession jusqu\'au Sanctuaire des Tribus respectives, où la population fait une dernière prière collective.', '', 1, '0000-05-01', '0000-05-04', 18),
(10, 'Fête de la Fertilité', 'Équivalent midgardien de la Fête de la Lune et du Festival du Printemps. Les rues sont décorées avec des fleurs d\'hiver et les habitants s\'offrent les premières fleurs du printemps, tandis qu\'une couronne de fleurs est posée sur les enfants nés de l\'année passée. La fête s\'achève par un grand feu de joie, où l\'on brûle toutes les coiffes de fleurs pour que Démétéros bénisse les enfants et la terre. Qui plus est, on dit qu\'un couple jetant un collier de fleurs tissé ensemble dans le brasier verra son amour durer éternellement.', '', 1, '0000-03-17', '0000-03-22', 3),
(11, 'Jour de l\'Aigle', 'Jour où les Guerriers d\'Aliphyr ayant complété leur formation à Linaëwen et réussi l\'Épreuve de la Caverne obtiennent le rang de Chevaliers Ailés. Après une fête au sein de l\'Académie Militaire de Linaëwen, un grand banquet est organisé au sein de la Cité de l\'Air, précédé par une cérémonie où le chef d\'Aliphyr lui-même remet une plume aux nouveaux adoubés.', '', 1, '0000-11-11', '0000-11-13', 19),
(12, 'Sublimation', 'Deux fois par an, la sérénité d\'Abyan se voit fortement chamboulée par cette fête. On se déguise, on chante, on mange, on danse... Tout ou presque est permis au sein de la cité pendant ces quelques jours, pour pallier le manque d\'agitation habituel !', '', 1, '0000-01-09', '0000-01-12', 8),
(13, 'Sublimation', 'Deux fois par an, la sérénité d\'Abyan se voit fortement chamboulée par cette fête. On se déguise, on chante, on mange, on danse... Tout ou presque est permis au sein de la cité pendant ces quelques jours, pour pallier le manque d\'agitation habituel !', '', 1, '0000-07-09', '0000-07-12', 8),
(14, 'Danse des Lumières', 'Appelé « Hikari no Mai » dans la langue de Mizuhan, ce festival dédié aux défunts est un événement majeur dans la vie des habitants de la Nouvelle-Gilnéas. De grandes processions sont organisées un peu partout, pendant lesquelles chacun marche en tenant une lanterne symbolisant l\'âme d\'un disparu. Des veillées se tiennent également dans le village, au cours desquelles on prie tous ensemble pour le repos des victimes de la folie de Mewtwo et des Méga-Pokémon.', '', 1, '0000-08-01', '0000-08-07', 15),
(15, 'Carnaval', 'Partout sur Érasia et Midgard, les premiers vents chauds réchauffent les cœurs et rassurent les habitants. L\'hiver s\'en va, laissant enfin sa place à la vie sous toutes ses incarnations. Les humains et les Pokémon sont heureux, et c\'est l\'occasion d\'organiser la fête du Carnaval qui, selon les régions, se manifeste sous des formes très différentes...', 'http://erasia-rpg.forum-actif.net/t3347-carnaval', 0, '2016-03-20', '2016-06-26', 1),
(16, 'Course Pokémon', 'Partout sur Érasia et Midgard, les gens se préparent à affronter l\'\'hiver qui arrive. Mais au milieu des préparatifs, certains organisent des petites festivités pour se détendre avant de reprendre le dur labeur. À la Mélopée de la Nymphe, au Grand Large et dans les Cieux, des Courses de Pokémon proposent aux Dresseurs du monde entier de mettre à l\'\'épreuve la vitesse de leurs animaux. Au même moment, un Concours se monte au Cosmo Canyon, où seuls les plus futés pourront tenter de décrocher un ruban.', 'http://erasia-rpg.forum-actif.net/t3534-course-pokemon', 0, '2016-10-09', '2016-12-31', 1);
