<?php
/**
 * Middleware que controla que l'usuari sigui Administrator o Manager
 * **/

/**
 * middleManager: controla que l'usuari sigui Administrator o Manager
 * **/
function middleManager($peticio, $resposta, $config, $next)
{
    $dadesUsuarilogat = $peticio->get("SESSION", "dadesUsuari");

    if ($dadesUsuarilogat["rol"] === "Administrator" || $dadesUsuarilogat["rol"] === "Manager") {
        $resposta = nextMiddleware($peticio, $resposta, $config, $next);
    } else {
        $resposta->redirect("Location:index.php?r=admin");
    }

    return $resposta;
}