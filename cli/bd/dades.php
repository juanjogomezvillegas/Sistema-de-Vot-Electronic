<?php
/*Afageix dades per defecte a la taula "config" de la base de dades*/
$sql = $connexio->prepare("INSERT INTO config VALUES  (:id,:numEscons,:logo,:titol)");
$sql->execute([":id" => 1,":numEscons" => 100,':logo' => 'img/bd/logo.png',':titol' => 'Sistema de Vot Electronic']);

/*Afageix dades per defecte a la taula "usuari" de la base de dades*/
$usuaris = $usuaris = [
    ["id" => 1,"user" => "admin","pass" => '$2y$11$tQUb/V0aK7xxqe1hyDQxVOkVSiauRKjom7psWZwBWvrbkfYAaL5Zi',"tipus" => "Administrator"],
    ["id" => 2,"user" => "manager","pass" => '$2y$11$tQUb/V0aK7xxqe1hyDQxVOkVSiauRKjom7psWZwBWvrbkfYAaL5Zi',"tipus" => "Manager"],
    ["id" => 3,"user" => "supervisor","pass" => '$2y$11$tQUb/V0aK7xxqe1hyDQxVOkVSiauRKjom7psWZwBWvrbkfYAaL5Zi',"tipus" => "Supervisor"]
];

foreach ($usuaris as $actual) {
    $sql = $connexio->prepare("INSERT INTO usuari (id,username,contrasenya,rol) VALUES  (:id,:user,:pass,:rol)");
    $sql->execute([":id" => $actual["id"],":user" => $actual["user"],":pass" => $actual["pass"],":rol" => $actual["tipus"]]);
}