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

CREATE TABLE �region� (
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
INSERT INTO `region` VALUES (10,'Franche-Comt�');
INSERT INTO `region` VALUES (11,'Haute-Normandie');
INSERT INTO `region` VALUES (12,'�le-de-France');
INSERT INTO `region` VALUES (13,'Languedoc-roussillon');
INSERT INTO `region` VALUES (14,'Limousin');
INSERT INTO `region` VALUES (15,'Lorraine');
INSERT INTO `region` VALUES (16,'Midi-�Pyr�nn�es');
INSERT INTO `region` VALUES (17,'Nord-Pas-de-Calais');
INSERT INTO `region` VALUES (18,'Pays-de-la-Loire');
INSERT INTO `region` VALUES (19,'Picardie');
INSERT INTO `region` VALUES (20,'Poitou-Charentes');
INSERT INTO `region` VALUES (21,'Provence-Alpes-C�te d\'Azur');
INSERT INTO `region` VALUES (22,'Rh�ne-Alpes');

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



INSERT INTO `listes` VALUES (1, 'l�gume' , 'Carottes', 'Originales' , 'Se d�guste cuite ou crue. D�licieuses en salade, cuites avec une viande, en Bouillon');

INSERT INTO `listes` VALUES (1, 'l�gume' , 'Carottes', 'Vertes' , 'D�licieuses en salade, servies en ap�ritif avec une sauce dressing');

INSERT INTO `listes` VALUES (1, 'l�gume' , 'Carottes', 'Jaunes' , 'D�licieuses en salade, servies en ap�ritif avec une sauce dressing');

INSERT INTO `listes` VALUES (2, 'l�gume' , 'Carottes', 'Noires' , 'D�licieuses en salade, servies en ap�ritif avec une sauce dressing');

INSERT INTO `listes` VALUES (3, 'l�gume' , 'Haricots', 'Verts' , 'Se d�guste cuit; peut-�tre mis en salade ou accompagn� d'une viande ou poisson');

INSERT INTO `listes` VALUES (4, 'l�gume' , 'Haricots', 'Blancs' , 'Les haricots se cuisinent en plat de l�gume, en plat compos� avec ou sans viande, ou en soupe');

INSERT INTO `listes` VALUES (5, 'l�gume' , 'Haricots', 'Rouges' , 'Les haricots se cuisinent en plat de l�gume, en plat compos� avec ou sans viande, ou en soupe ');

INSERT INTO `listes` VALUES (6, 'l�gume' , 'Tomates', 'Rouges' , 'La tomate peut se consommer soit crue, soit cuite. Cuite, la tomate se pr�pare de diverses mani�res: saut�e, farcie, en sauce� ');

INSERT INTO `listes` VALUES (7, 'l�gume' , 'Tomates', 'Noires' , 'D�licieuses en salade, servies en ap�ritif avec une sauce dressing');
INSERT INTO `listes` VALUES (7, 'l�gume' , 'Tomates', 'Cerise' , 'D�licieuses en salade, servies en ap�ritif avec une sauce dressing');

INSERT INTO `listes` VALUES (8, 'l�gume' , 'Celeri', 'Branche ' , ' Cru ou cuit, �minc�, en b�tonnets ou en d�s, le c�leri-branche est un l�gume aussi facile � pr�parer qu�� cuisiner.');
INSERT INTO `listes` VALUES (9, 'l�gume' , 'Celeri', 'rave' , 'Ce l�gume peut s�accommoder de tr�s nombreuses mani�res, aussi bien en salade, qu�en gratin, ou encore en soupe.');

INSERT INTO `listes` VALUES (10, 'l�gume', 'Pomme de terre', 'nouvelle' ,'Les pommes de terre nouvelles sont les pommes de terre r�colt�es alors qu�elles sont encore tr�s jeunes, avant que leur sucre se soit transform� en amidon. Elles sont petites avec une peau fine et leur chair est douce et cr�meuse lorsque cuite.', 'Les pommes de terre nouvelles sont meilleures r�ties ou bouillies que frites');

INSERT INTO `listes` VALUES (12, 'l�gume', 'Panai', 'L�gume racine de la famille de la carotte, le panais est un l�gume oubli� � l'agr�able saveur sucr�e riche en folates et en vitamine C, qui apporte fibres et antioxydants.' , 'On peut le r�per pour donner une touche originale aux salades
Tranch� finement et revenu � la po�le avec un peu de mati�re grasse, c'est un r�gal
R�p� avec pommes de terre ou carottes, on peut en faire de d�licieuses galettes � faire revenir dans un peu d'huile
Il a sa place dans les soupes, le pot-au-feu, avec les autres l�gumes du couscous...
La pur�e de panais est un d�lice. Il faut l'y m�langer pour moiti� avec des pommes de terre pour att�nuer sa saveur un peu forte ');

INSERT INTO `listes` VALUES (13, 'fruit' , 'Pomme' , 'royal gala', 'Les pommes Gala sont plut�t petites. Rouge orang� � rayures verticales, elles r�sistent bien aux chocs bien qu'elles aient une peau tr�s fine. La Gala est une pomme tr�s sucr�e, faiblement acide avec une petite pointe d�amertume ; ferme et juteuse, tr�s croquante, la gala est tonique.',  '', 'La vari�t� a �t� cr��e en Nouvelle-Z�lande ');

INSERT INTO `listes` VALUES (13, 'fruit' , 'Pomme' , 'Fuji', ' ');

INSERT INTO `listes` VALUES (14, 'fruit' , 'Pomme' , 'granit', ' ');

INSERT INTO `listes` VALUES (15, 'fruit' , 'Banane' , '', ' ');

INSERT INTO `listes` VALUES (16, 'fruit' , 'Ananas' , ' ', ' ');

INSERT INTO `listes` VALUES (17, 'fruit' , 'P�che' , 'Blanche', ' ');

INSERT INTO `listes` VALUES (18, 'fruit' , 'P�che' , 'Plate', ' ');

INSERT INTO `listes` VALUES (19, 'fruit' , 'Abricot' , ' ', ' ');

INSERT INTO `listes` VALUES (20, 'fruit' , 'Abricot' , '', ' ');

INSERT INTO `listes` VALUES (21, 'fruit' , 'Melon' , 'Vert ', 'Se mange en entr�e, accompagn� de porto et de jambon de parme, se d�guste en ap�ritif. Tr�s bon ingr�dient pour une salade de fruit');

INSERT INTO `listes` VALUES (21, 'fruit' , 'Melon' , 'Originals ', 'Se mange en entr�e, accompagn� de porto et de jambon de parme, se d�guste en ap�ritif. Tr�s bon ingr�dient pour une salade de fruit');

INSERT INTO `listes` VALUES (22, 'fruit' , 'Past�que' , ' ', 'Se mange nature en dessert ou en salade de fruit');