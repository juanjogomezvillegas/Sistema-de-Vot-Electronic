<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

/*Inclou el fitxer config.php*/
include "../src/config.php";
/*Inclou els controladors*/
include "../src/controller/ajaxServer.php";
include "../src/controller/portada.php";
include "../src/controller/votar.php";
include "../src/controller/login.php";
include "../src/controller/dologin.php";
include "../src/controller/logout.php";
include "../src/controller/admin.php";
/*Inclou els middleware*/
include "../src/middleware/middleCentral.php";
include "../src/middleware/middleLogat.php";

$contenidor = new \Emeset\Contenidor($config, $rols, $options);
$app = new \Emeset\Emeset($contenidor);

$app->ruta("countUsuaris", "ctrlCountUsuaris", ["middleCentral", "middleLogat"]);
$app->ruta("countCandidats", "ctrlCountCandidats", ["middleCentral", "middleLogat"]);
$app->ruta("countVots", "ctrlCountVots", ["middleCentral", "middleLogat"]);

$app->ruta("", "ctrlPortada", ["middleCentral"]);
$app->ruta("votar", "ctrlVotar", ["middleCentral"]);
$app->ruta("login", "ctrlLogin", ["middleCentral"]);
$app->ruta("dologin", "ctrlDologin", ["middleCentral"]);
$app->ruta("logout", "ctrlLogout", ["middleCentral", "middleLogat"]);
$app->ruta("admin", "ctrlAdmin", ["middleCentral", "middleLogat"]);

$app->executa();



