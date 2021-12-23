<?php
/**
 * Middleware que controla si l'usuari està identificat
 * **/

/**
 * middleLogat: controla si l'usuari està identificat
 * **/
function middleLogat($peticio, $resposta, $config, $next)
{
    $logat2 = $peticio->get("SESSION", "logat");

    $logat = filter_var($logat2, FILTER_VALIDATE_BOOLEAN);

    if ($logat) {
        $resposta = nextMiddleware($peticio, $resposta, $config, $next);
    } else {
        $resposta->redirect("Location:index.php?r=login");
    }

    return $resposta;
}