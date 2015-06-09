CREATE TABLE `membres` (
	`id_membre` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`nom` varchar(45) NOT NULL,
	`prenom` varchar(45) NOT NULL,
	`email` varchar(75) NOT NULL,
	`mot_passe` varchar(45) NOT NULL,
	`pays` varchar(45) NOT NULL,
	`ville` varchar(45) NOT NULL,	
	`detail` varchar(250) NOT NULL,
	`description` int(10) NOT NULL,
	
	PRIMARY KEY (`id_membre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE ‘region’ (
		`id_region` int(11) NOT NULL AUTO_INCREMENT,
		`nom_region` varchar(30)  NOT NULL,
		
		PRIMARY KEY (`id_region`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO `region` VALUES (1,'Alsace');
INSERT INTO `region` VALUES (2,'Aquitaine');
INSERT INTO `region` VALUES (3,'Auvergne');
INSERT INTO `region` VALUES (4,'Basse-Normandie');
INSERT INTO `region` VALUES (5,'Bourgogne');
INSERT INTO `region` VALUES (6,'Bretagne');
INSERT INTO `region` VALUES (7,'Centre');
INSERT INTO `region` VALUES (8,'Champagne-Ardenne');
INSERT INTO `region` VALUES (9,'Corse');
INSERT INTO `region` VALUES (10,'Franche-Comté');
INSERT INTO `region` VALUES (11,'Haute-Normandie');
INSERT INTO `region` VALUES (12,'Île-de-France');
INSERT INTO `region` VALUES (13,'Languedoc-roussillon');
INSERT INTO `region` VALUES (14,'Limousin');
INSERT INTO `region` VALUES (15,'Lorraine');
INSERT INTO `region` VALUES (16,'Midi-¨Pyrénnées');
INSERT INTO `region` VALUES (17,'Nord-Pas-de-Calais');
INSERT INTO `region` VALUES (18,'Pays-de-la-Loire');
INSERT INTO `region` VALUES (19,'Picardie');
INSERT INTO `region` VALUES (20,'Poitou-Charentes');
INSERT INTO `region` VALUES (21,'Provence-Alpes-Côte d\'Azur');
INSERT INTO `region` VALUES (22,'Rhône-Alpes');

CREATE TABLE messages (
	id int(11) NOT NULL auto_increment,
	id_expediteur int(11) NOT NULL default '0',
	id_destinataire int(11) NOT NULL default '0',
	reception int(11) NOT NULL default '0',
	date datetime NOT NULL default '0000-00-00 00:00:00',
	titre text NOT NULL,
	message text NOT NULL,
	PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE `annonces` (
	`id_annonce` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`titre` varchar(45) NOT NULL,
	`typ` varchar(30) NOT NULL,
	`genre` varchar(30) NOT NULL,
	`variete` varchar(30) NOT NULL,
	`Description` varchar(30) NOT NULL,
	`prix` varchar(30) NOT NULL,
	`id_membre` int(11) NOT NULL,

	
	PRIMARY KEY (`id_annonce`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `listes` (
	
	`id_liste` int(11) unsigned NOT NULL AUTO_INCREMENT,

	`typ` varchar(45) NOT NULL,

	`genre` varchar(30) NOT NULL,

	`variete` varchar(30) NOT NULL,

	`description` varchar(300) NOT NULL,

	

	
	PRIMARY KEY (`id_liste`)
) 
ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



INSERT INTO `listes` VALUES (1, 'légume' , 'Carottes', 'Originales' , 'Se déguste cuite ou crue. Délicieuses en salade, cuites avec une viande, en Bouillon');

INSERT INTO `listes` VALUES (1, 'légume' , 'Carottes', 'Vertes' , 'Délicieuses en salade, servies en apéritif avec une sauce dressing');

INSERT INTO `listes` VALUES (1, 'légume' , 'Carottes', 'Jaunes' , 'Délicieuses en salade, servies en apéritif avec une sauce dressing');

INSERT INTO `listes` VALUES (2, 'légume' , 'Carottes', 'Noires' , 'Délicieuses en salade, servies en apéritif avec une sauce dressing');

INSERT INTO `listes` VALUES (3, 'légume' , 'Haricots', 'Verts' , 'Se déguste cuit; peut-être mis en salade ou accompagné d'une viande ou poisson');

INSERT INTO `listes` VALUES (4, 'légume' , 'Haricots', 'Blancs' , 'Les haricots se cuisinent en plat de légume, en plat composé avec ou sans viande, ou en soupe');

INSERT INTO `listes` VALUES (5, 'légume' , 'Haricots', 'Rouges' , 'Les haricots se cuisinent en plat de légume, en plat composé avec ou sans viande, ou en soupe ');

INSERT INTO `listes` VALUES (6, 'légume' , 'Tomates', 'Rouges' , 'La tomate peut se consommer soit crue, soit cuite. Cuite, la tomate se prépare de diverses manières: sautée, farcie, en sauce… ');

INSERT INTO `listes` VALUES (7, 'légume' , 'Tomates', 'Noires' , 'Délicieuses en salade, servies en apéritif avec une sauce dressing');
INSERT INTO `listes` VALUES (7, 'légume' , 'Tomates', 'Cerise' , 'Délicieuses en salade, servies en apéritif avec une sauce dressing');

INSERT INTO `listes` VALUES (8, 'légume' , 'Celeri', 'Branche ' , ' Cru ou cuit, émincé, en bâtonnets ou en dés, le céleri-branche est un légume aussi facile à préparer qu’à cuisiner.');
INSERT INTO `listes` VALUES (9, 'légume' , 'Celeri', 'rave' , 'Ce légume peut s’accommoder de très nombreuses manières, aussi bien en salade, qu’en gratin, ou encore en soupe.');

INSERT INTO `listes` VALUES (10, 'légume', 'Pomme de terre', 'nouvelle' ,'Les pommes de terre nouvelles sont les pommes de terre récoltées alors qu’elles sont encore très jeunes, avant que leur sucre se soit transformé en amidon. Elles sont petites avec une peau fine et leur chair est douce et crémeuse lorsque cuite.', 'Les pommes de terre nouvelles sont meilleures rôties ou bouillies que frites');

INSERT INTO `listes` VALUES (12, 'légume', 'Panai', 'Légume racine de la famille de la carotte, le panais est un légume oublié à l'agréable saveur sucrée riche en folates et en vitamine C, qui apporte fibres et antioxydants.' , 'On peut le râper pour donner une touche originale aux salades
Tranché finement et revenu à la poêle avec un peu de matière grasse, c'est un régal
Râpé avec pommes de terre ou carottes, on peut en faire de délicieuses galettes à faire revenir dans un peu d'huile
Il a sa place dans les soupes, le pot-au-feu, avec les autres légumes du couscous...
La purée de panais est un délice. Il faut l'y mélanger pour moitié avec des pommes de terre pour atténuer sa saveur un peu forte ');

INSERT INTO `listes` VALUES (13, 'fruit' , 'Pomme' , 'royal gala', 'Les pommes Gala sont plutôt petites. Rouge orangé à rayures verticales, elles résistent bien aux chocs bien qu'elles aient une peau très fine. La Gala est une pomme très sucrée, faiblement acide avec une petite pointe d’amertume ; ferme et juteuse, très croquante, la gala est tonique.',  '', 'La variété a été créée en Nouvelle-Zélande ');

INSERT INTO `listes` VALUES (13, 'fruit' , 'Pomme' , 'Fuji', ' ');

INSERT INTO `listes` VALUES (14, 'fruit' , 'Pomme' , 'granit', ' ');

INSERT INTO `listes` VALUES (15, 'fruit' , 'Banane' , '', ' ');

INSERT INTO `listes` VALUES (16, 'fruit' , 'Ananas' , ' ', ' ');

INSERT INTO `listes` VALUES (17, 'fruit' , 'Pêche' , 'Blanche', ' ');

INSERT INTO `listes` VALUES (18, 'fruit' , 'Pêche' , 'Plate', ' ');

INSERT INTO `listes` VALUES (19, 'fruit' , 'Abricot' , ' ', ' ');

INSERT INTO `listes` VALUES (20, 'fruit' , 'Abricot' , '', ' ');

INSERT INTO `listes` VALUES (21, 'fruit' , 'Melon' , 'Vert ', 'Se mange en entrée, accompagné de porto et de jambon de parme, se déguste en apéritif. Très bon ingrédient pour une salade de fruit');

INSERT INTO `listes` VALUES (21, 'fruit' , 'Melon' , 'Originals ', 'Se mange en entrée, accompagné de porto et de jambon de parme, se déguste en apéritif. Très bon ingrédient pour une salade de fruit');

INSERT INTO `listes` VALUES (22, 'fruit' , 'Pastèque' , ' ', 'Se mange nature en dessert ou en salade de fruit');