<?php
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
    ["id" => 1,"dni" => "74382891V","nom" => "Dani Prados","lema" => "Pel Canvi"],
    ["id" => 2,"dni" => "96769454J","nom" => "Xavier Vallejo","lema" => "Distancia, Mans, Mascareta i Ventilació"],
    ["id" => 3,"dni" => "54070914F","nom" => "Josep Maria Serrainat","lema" => "Fem que siguem claus"],
    ["id" => 4,"dni" => "63104244H","nom" => "Angel Bosch","lema" => "Soc Necessari"],
    ["id" => 5,"dni" => "63681355J","nom" => "Josep Maria Tolsa","lema" => "Si vols solucions, vota solucions"],
    ["id" => 6,"dni" => "42189903Z","nom" => "Albert Ibiza","lema" => "Anem a Més"],
    ["id" => 7,"dni" => "12069477C","nom" => "Juaquim Rubio","lema" => "Amb el teu vot, es possible"],
    ["id" => 8,"dni" => "64982182Y","nom" => "David Valles","lema" => "Rebel·lat!"],
    ["id" => 9,"dni" => "43125844Q","nom" => "Josep Antoni Sanchez","lema" => "Amb Il·lusió!"],
    ["id" => 10,"dni" => "80448519Q","nom" => "Albert Sabria","lema" => "Si t'ho penses, Albert Sabria"],
    ["id" => 11,"dni" => "58282078D","nom" => "Genis de Tuero","lema" => "Tornarem més forts"],
    ["id" => 12,"dni" => "63195738H","nom" => "Jesus Picornell","lema" => "Solucions?"],
];

foreach ($candidats as $actual) {
    $sql = $connexio->prepare("INSERT INTO candidat (id,dni,nom,lema_campanya) VALUES  (:id,:dni,:nom,:lema)");
    $sql->execute([":id" => $actual["id"],":dni" => $actual["dni"],":nom" => $actual["nom"],":lema" => $actual["lema"]]);
}