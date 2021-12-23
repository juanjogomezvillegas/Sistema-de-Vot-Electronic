<?php
/**
 * Middleware que controla l'aplicació
 * **/

/**
 * middleCentral: controla l'aplicació
 * **/
function middleCentral($peticio, $resposta, $config, $next)
{
    $logat2 = $peticio->get("SESSION", "logat");
    $dadesUsuarilogat = $peticio->get("SESSION", "dadesUsuari");

    $logat = filter_var($logat2, FILTER_VALIDATE_BOOLEAN);

    $resposta->set("logat", $logat);
    $resposta->set("dadesUsuarilogat", $dadesUsuarilogat);

    $resposta = nextMiddleware($peticio, $resposta, $config, $next);

    return $resposta;
}