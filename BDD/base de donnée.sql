CREATE TABLE `membres` (
	`id_membre` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`nom` varchar(45) NOT NULL,
	`prenom` varchar(45) NOT NULL,
	`email` varchar(75) NOT NULL,
	`mot_passe` varchar(45) NOT NULL,
	`pays` varchar(45) NOT NULL,
	`ville` varchar(45) NOT NULL,	
	`detail` varchar(250) NOT NULL,
	
	PRIMARY KEY (`id_membre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE  `photo_profil` (
	`id_photo` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
	`membre_id` INT(11) UNSIGNED NOT NULL ,
	`nom` VARCHAR(45) NOT NULL ,
	PRIMARY KEY (`id_photo`)
) TYPE = MYISAM ;