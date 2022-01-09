<?php

/**
 * Gestor de Vot Electronic
 *
 * @author: Juan José Gómez Villegas
 *
 * Permet crear, gestionar i esborrar candidats i usuaris, votar als candidats i gestionar els resultats.
 * Per provar com funcionar podeu executar php -S localhost:8000 a la carpeta public.
 * I amb el navegador visitar la url http://192.168.0.10:8000/
 **/

$config = array();
$rols = array();
$options = ['cost' => 11];

/*Configuració de les dades per fer la connexió a la base de dades*/
$config["user"] = "election_daw";
$config["pass"] = "1234";
$config["dbname"] = "election_daw";
$config["host"] = "localhost";

/*Configuració dels rols de l'aplicació*/
array_push($rols, "Administrator", "Manager", "Supervisor");

/*Inclou els models*/
require_once "../src/emeset/Contenidor.php";
require_once "../src/emeset/Emeset.php";
require_once "../src/emeset/Middleware.php";
require_once "../src/emeset/ruters/RuterParam.php";
require_once "../src/emeset/http/peticio.php";
require_once "../src/emeset/http/resposta.php";

require_once "../src/models/connexio.php";
require_once "../src/models/modelPDO.php";
require_once "../src/models/usuarisPDO.php";
require_once "../src/models/candidatsPDO.php";
require_once "../src/models/pactometrePDO.php";
require_once "../src/models/historiaPDO.php";
require_once "../src/models/configPDO.php";
