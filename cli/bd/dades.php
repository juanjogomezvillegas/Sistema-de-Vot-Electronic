<?php

/*Afageix dades per defecte a la taula "config" de la base de dades*/
$sql = $connexio->prepare("INSERT INTO config VALUES (:id,:numEscons,:logo,:titol)");
$sql->execute([":id" => 1,":numEscons" => 100,':logo' => 'img/bd/logo.png',':titol' => 'Sistema de Vot Electronic']);

/*Afageix dades per defecte a la taula "usuari" de la base de dades*/
$usuaris = $usuaris = [
    ["user" => "admin","pass" => '$2y$11$tQUb/V0aK7xxqe1hyDQxVOkVSiauRKjom7psWZwBWvrbkfYAaL5Zi',"type" => "Administrator"],
    ["user" => "manager","pass" => '$2y$11$tQUb/V0aK7xxqe1hyDQxVOkVSiauRKjom7psWZwBWvrbkfYAaL5Zi',"type" => "Manager"],
    ["user" => "supervisor","pass" => '$2y$11$tQUb/V0aK7xxqe1hyDQxVOkVSiauRKjom7psWZwBWvrbkfYAaL5Zi',"type" => "Supervisor"]
];

foreach ($usuaris as $actual) {
    $sql = $connexio->prepare("INSERT INTO usuari (username,contrasenya,rol) VALUES  (:user,:pass,:rol)");
    $sql->execute([":user" => $actual["user"],":pass" => $actual["pass"],":rol" => $actual["type"]]);
}
