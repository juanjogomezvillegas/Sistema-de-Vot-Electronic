<?php
/**
 * Middleware que controla l'aplicació
 * **/

/**
 * middleCentral: controla l'aplicació
 * **/
function middleCentral($peticio, $resposta, $config, $next)
{
    $configPDO = $config->configPDO();

    $logat2 = $peticio->get("SESSION", "logat");
    $dadesUsuarilogat = $peticio->get("SESSION", "dadesUsuari");

    $logat = filter_var($logat2, FILTER_VALIDATE_BOOLEAN);

    $logoAplicacio = $configPDO->getLogo();

    $titolAplicacio = $configPDO->getTitol();

    $resposta->set("logat", $logat);
    $resposta->set("dadesUsuarilogat", $dadesUsuarilogat);
    $resposta->set("logoAplicacio", $logoAplicacio);
    $resposta->set("titolAplicacio", $titolAplicacio);
    $resposta->set("rols", $config->rols);

    $resposta = nextMiddleware($peticio, $resposta, $config, $next);

    return $resposta;
}