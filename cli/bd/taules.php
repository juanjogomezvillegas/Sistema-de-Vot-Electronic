<?php

/*Crea totes les taules a la base de dades que necessita l'aplicació per funcionar*/
$connexio->query("CREATE TABLE config (
    id INT AUTO_INCREMENT,
    numEscons INT NOT NULL DEFAULT 100,
    logo VARCHAR(200) NOT NULL DEFAULT 'img/bd/logo.png', 
    titol VARCHAR(200) NOT NULL DEFAULT 'Sistema de Vot Electronic', 
    PRIMARY KEY(id));");

$connexio->query("CREATE TABLE usuari (
    id INT AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL UNIQUE,
    contrasenya TEXT NOT NULL,
    rol VARCHAR(100) NOT NULL DEFAULT 'Supervisor',
    icona VARCHAR(200) NOT NULL DEFAULT 'img/usuaris/user.png',
    PRIMARY KEY(id));");

$connexio->query("CREATE TABLE candidat (
    id INT AUTO_INCREMENT,
    nom VARCHAR(200) NOT NULL,
    lema_campanya VARCHAR(200) NOT NULL,
    icona VARCHAR(200) NOT NULL DEFAULT 'img/candidats/user.png',
    vots INT NOT NULL DEFAULT 0,
    posicio VARCHAR(20) NOT NULL DEFAULT 'no',
    PRIMARY KEY(id));");
