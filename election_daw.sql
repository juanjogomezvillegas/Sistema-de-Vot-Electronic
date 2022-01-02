-- Adminer 4.8.1 MySQL 5.5.5-10.5.11-MariaDB-1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `candidat`;
CREATE TABLE `candidat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `ideologia` varchar(200) NOT NULL,
  `lema_campanya` varchar(200) NOT NULL,
  `icona` varchar(200) NOT NULL DEFAULT 'img/candidats/user.png',
  `vots` int(11) NOT NULL DEFAULT 0,
  `posicio` varchar(20) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numEscons` int(11) NOT NULL DEFAULT 100,
  `logo` varchar(200) NOT NULL DEFAULT 'img/bd/logo.png',
  `titol` varchar(200) NOT NULL DEFAULT 'Sistema de Vot Electronic',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `config` (`id`, `numEscons`, `logo`, `titol`) VALUES
(1,	100,	'img/bd/logo.png',	'Sistema de Vot Electronic');

DROP TABLE IF EXISTS `usuari`;
CREATE TABLE `usuari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `contrasenya` text NOT NULL,
  `rol` varchar(100) NOT NULL DEFAULT 'Supervisor',
  `icona` varchar(200) NOT NULL DEFAULT 'img/usuaris/user.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuari` (`id`, `username`, `contrasenya`, `rol`, `icona`) VALUES
(1,	'admin',	'$2y$11$tQUb/V0aK7xxqe1hyDQxVOkVSiauRKjom7psWZwBWvrbkfYAaL5Zi',	'Administrator',	'img/usuaris/user.png'),
(2,	'manager',	'$2y$11$tQUb/V0aK7xxqe1hyDQxVOkVSiauRKjom7psWZwBWvrbkfYAaL5Zi',	'Manager',	'img/usuaris/user.png'),
(3,	'supervisor',	'$2y$11$tQUb/V0aK7xxqe1hyDQxVOkVSiauRKjom7psWZwBWvrbkfYAaL5Zi',	'Supervisor',	'img/usuaris/user.png');

-- 2022-01-02 10:33:11
