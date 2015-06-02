CREATE TABLE `membres` (
	`id_membre` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`nom` varchar(45) NOT NULL,
	`prenom` varchar(45) NOT NULL,
	`email` varchar(75) NOT NULL,
	`mot_passe` varchar(45) NOT NULL,
	`pays` varchar(45) NOT NULL,
	`ville` varchar(45) NOT NULL,	
	`detail` varchar(250) NOT NULL,
	`detail` int(10) NOT NULL,
	
	PRIMARY KEY (`id_membre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `annonces` (
	`id_annonce` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`titre` varchar(45) NOT NULL,
	`typ` varchar(300) NOT NULL,
	`genre` varchar(30) NOT NULL,
	`variete` varchar(30) NOT NULL,
	`prix` varchar(30) NOT NULL,
	`id_membre` int(11) NOT NULL,

	
	PRIMARY KEY (`id_annonce`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE  `photo_profil` (
	`id_photo` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
	`membre_id` INT(11) UNSIGNED NOT NULL ,
	`nom` VARCHAR(45) NOT NULL ,
	PRIMARY KEY (`id_photo`)
) TYPE = MYISAM ;