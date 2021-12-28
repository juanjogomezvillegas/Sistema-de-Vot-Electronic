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
include "../src/controller/elMeuPerfil.php";
include "../src/controller/admin.php";
include "../src/controller/resultats.php";
include "../src/controller/pactometre.php";
include "../src/controller/llistarUsuaris.php";
include "../src/controller/llistarCandidats.php";
include "../src/controller/docrearusuari.php";
include "../src/controller/doactualitzarusuari.php";
include "../src/controller/doesborrarusuari.php";
include "../src/controller/docrearcandidat.php";
include "../src/controller/doactualitzarcandidat.php";
include "../src/controller/doesborrarcandidat.php";
/*Inclou els middleware*/
include "../src/middleware/middleCentral.php";
include "../src/middleware/middleLogat.php";
include "../src/middleware/middleAdmin.php";
include "../src/middleware/middleManager.php";
include "../src/middleware/middleSupervisor.php";

$contenidor = new \Emeset\Contenidor($config, $rols, $options);
$app = new \Emeset\Emeset($contenidor);

$app->ruta("countUsuaris", "ctrlCountUsuaris", ["middleCentral", "middleLogat"]);
$app->ruta("countCandidats", "ctrlCountCandidats", ["middleCentral", "middleLogat"]);
$app->ruta("countVots", "ctrlCountVots", ["middleCentral", "middleLogat"]);
$app->ruta("actualitzarEscons", "ctrlActualitzarEscons", ["middleCentral", "middleLogat"]);
$app->ruta("obtenirDadesUsuari", "ctrlObtenirDadesUsuari", ["middleCentral", "middleLogat"]);
$app->ruta("obtenirDadesCandidat", "ctrlObtenirDadesCandidat", ["middleCentral", "middleLogat"]);

$app->ruta("", "ctrlPortada", ["middleCentral"]);
$app->ruta("votar", "ctrlVotar", ["middleCentral"]);
$app->ruta("login", "ctrlLogin", ["middleCentral"]);
$app->ruta("dologin", "ctrlDologin", ["middleCentral"]);
$app->ruta("logout", "ctrlLogout", ["middleCentral", "middleLogat"]);
$app->ruta("elMeuPerfil", "ctrlElMeuPerfil", ["middleCentral", "middleLogat"]);

$app->ruta("admin", "ctrlAdmin", ["middleCentral", "middleLogat"]);
$app->ruta("resultats", "ctrlResultats", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("pactometre", "ctrlPactometre", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("llistarUsuaris", "ctrlLlistarUsuaris", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("docrearusuari", "ctrlDocrearusuari", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("doactualitzarusuari", "ctrlDoactualitzarusuari", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("doesborrarusuari", "ctrlDoesborrarusuari", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("llistarCandidats", "ctrlLlistarCandidats", ["middleCentral", "middleLogat", "middleManager"]);
$app->ruta("docrearcandidat", "ctrlDocrearcandidat", ["middleCentral", "middleLogat", "middleManager"]);
$app->ruta("doactualitzarcandidat", "ctrlDoactualitzarcandidat", ["middleCentral", "middleLogat", "middleManager"]);
$app->ruta("doesborrarcandidat", "ctrlDoesborrarcandidat", ["middleCentral", "middleLogat", "middleManager"]);

$app->executa();
