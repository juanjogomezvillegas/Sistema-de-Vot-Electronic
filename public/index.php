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

error_reporting(E_ERROR | E_WARNING | E_PARSE);

/*Inclou el fitxer config.php*/
require_once "../src/config.php";
/*Inclou els controladors*/
require_once "../src/controller/ajaxServer.php";
require_once "../src/controller/portada.php";
require_once "../src/controller/votar.php";
require_once "../src/controller/login.php";
require_once "../src/controller/dologin.php";
require_once "../src/controller/logout.php";
require_once "../src/controller/elMeuPerfil.php";
require_once "../src/controller/canviarContrasenya.php";
require_once "../src/controller/doCanviarContrasenya.php";
require_once "../src/controller/canviarImatgeUsuari.php";
require_once "../src/controller/canviarImatgeCandidat.php";
require_once "../src/controller/configuracio.php";
require_once "../src/controller/admin.php";
require_once "../src/controller/resultats.php";
require_once "../src/controller/doReiniciaResultat.php";
require_once "../src/controller/pactometre.php";
require_once "../src/controller/llistarUsuaris.php";
require_once "../src/controller/llistarCandidats.php";
require_once "../src/controller/docrearusuari.php";
require_once "../src/controller/doactualitzarusuari.php";
require_once "../src/controller/doesborrarusuari.php";
require_once "../src/controller/docrearcandidat.php";
require_once "../src/controller/doactualitzarcandidat.php";
require_once "../src/controller/doesborrarcandidat.php";
require_once "../src/controller/historia.php";
/*Inclou els middleware*/
require_once "../src/middleware/middleCentral.php";
require_once "../src/middleware/middleLogat.php";
require_once "../src/middleware/middleAdmin.php";
require_once "../src/middleware/middleManager.php";
require_once "../src/middleware/middleSupervisor.php";

$contenidor = new \Emeset\Contenidor($config, $rols, $options);
$app = new \Emeset\Emeset($contenidor);

$app->ruta("countUsuaris", "ctrlCountUsuaris", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("countCandidats", "ctrlCountCandidats", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("countVots", "ctrlCountVots", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("actualitzarEscons", "ctrlActualitzarEscons", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("obtenirDadesUsuari", "ctrlObtenirDadesUsuari", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("obtenirDadesCandidat", "ctrlObtenirDadesCandidat", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("numVotsSi", "ctrlNumVotsSi", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("numVotsNo", "ctrlNumVotsNo", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("numVotsAbstencio", "ctrlNumVotsAbstencio", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("actualitzarPosicio", "ctrlActualitzarPosicio", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("sumaVots", "ctrlSumaVots", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("restaVots", "ctrlRestaVots", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("obtenirResultat", "ctrlObtenirResultat", ["middleCentral", "middleLogat", "middleSupervisor"]);

$app->ruta("", "ctrlPortada", ["middleCentral"]);
$app->ruta("votar", "ctrlVotar", ["middleCentral"]);
$app->ruta("login", "ctrlLogin", ["middleCentral"]);
$app->ruta("dologin", "ctrlDologin", ["middleCentral"]);
$app->ruta("logout", "ctrlLogout", ["middleCentral", "middleLogat"]);
$app->ruta("elMeuPerfil", "ctrlElMeuPerfil", ["middleCentral", "middleLogat"]);
$app->ruta("canviarContrasenya", "ctrlCanviarContrasenya", ["middleCentral", "middleLogat"]);
$app->ruta("doCanviarContrasenya", "ctrlDoCanviarContrasenya", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("canviarImatgeUsuari", "ctrlCanviarImatgeUsuari", ["middleCentral", "middleLogat"]);
$app->ruta("canviarImatgeCandidat", "ctrlCanviarImatgeCandidat", ["middleCentral", "middleLogat"]);

$app->ruta("configuracio", "ctrlConfiguracio", ["middleCentral", "middleLogat"]);
$app->ruta("canviarTitolAplicacio", "ctrlCanviarTitolAplicacio", ["middleCentral", "middleLogat"]);
$app->ruta("canviarImatgeAplicacio", "ctrlCanviarImatgeAplicacio", ["middleCentral", "middleLogat"]);
$app->ruta("admin", "ctrlAdmin", ["middleCentral", "middleLogat"]);
$app->ruta("resultats", "ctrlResultats", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("doReiniciaResultat", "ctrlDoReiniciaResultat", ["middleCentral", "middleLogat", "middleManager"]);
$app->ruta("pactometre", "ctrlPactometre", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("llistarUsuaris", "ctrlLlistarUsuaris", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("docrearusuari", "ctrlDocrearusuari", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("doactualitzarusuari", "ctrlDoactualitzarusuari", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("doesborrarusuari", "ctrlDoesborrarusuari", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("llistarCandidats", "ctrlLlistarCandidats", ["middleCentral", "middleLogat", "middleManager"]);
$app->ruta("docrearcandidat", "ctrlDocrearcandidat", ["middleCentral", "middleLogat", "middleManager"]);
$app->ruta("doactualitzarcandidat", "ctrlDoactualitzarcandidat", ["middleCentral", "middleLogat", "middleManager"]);
$app->ruta("doesborrarcandidat", "ctrlDoesborrarcandidat", ["middleCentral", "middleLogat", "middleManager"]);
$app->ruta("historia", "ctrlHistoria", ["middleCentral", "middleLogat", "middleSupervisor"]);
$app->ruta("doCrearEvent", "ctrlDoCrearEvent", ["middleCentral", "middleLogat", "middleManager"]);
$app->ruta("doReiniciaHistoria", "ctrlDoReiniciaHistoria", ["middleCentral", "middleLogat", "middleManager"]);
$app->ruta("doEsborrarEvent", "ctrlDoEsborrarEvent", ["middleCentral", "middleLogat", "middleManager"]);

$app->executa();
