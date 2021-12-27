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

/*Afageix dades per defecte a la taula "candidat" de la base de dades*/
$candidats = $candidats = [
    ["id" => 1,"nom" => "Dani Prados","lema" => "Pel Canvi"],
    ["id" => 2,"nom" => "Xavier Vallejo","lema" => "Distancia, Mans, Mascareta i Ventilació"],
    ["id" => 3,"nom" => "Josep Maria Serrainat","lema" => "Fem que siguem claus"],
    ["id" => 4,"nom" => "Angel Bosch","lema" => "Soc Necessari"],
    ["id" => 5,"nom" => "Josep Maria Tolsa","lema" => "Si vols solucions, vota solucions"],
    ["id" => 6,"nom" => "Albert Ibiza","lema" => "Anem a Més"],
    ["id" => 7,"nom" => "Juaquim Rubio","lema" => "Amb el teu vot, es possible"],
    ["id" => 8,"nom" => "David Valles","lema" => "Rebel·lat!"],
    ["id" => 9,"nom" => "Josep Antoni Sanchez","lema" => "Amb Il·lusió!"],
    ["id" => 10,"nom" => "Albert Sabria","lema" => "Si t'ho penses, Albert Sabria"],
    ["id" => 11,"nom" => "Genis de Tuero","lema" => "Tornarem més forts"],
    ["id" => 12,"nom" => "Jesus Picornell","lema" => "Solucions?"],
];

foreach ($candidats as $actual) {
    $sql = $connexio->prepare("INSERT INTO candidat (id,nom,lema_campanya) VALUES  (:id,:nom,:lema)");
    $sql->execute([":id" => $actual["id"],":nom" => $actual["nom"],":lema" => $actual["lema"]]);
}