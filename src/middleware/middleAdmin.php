<?php

/**
 * Middleware que controla que l'usuari sigui Administrator
 * **/

/**
 * middleAdmin: controla que l'usuari sigui Administrator
 * **/
function middleAdmin($peticio, $resposta, $config, $next)
{
    $dadesUsuarilogat = $peticio->get("SESSION", "dadesUsuari");

    if ($dadesUsuarilogat["rol"] === "Administrator") {
        $resposta = nextMiddleware($peticio, $resposta, $config, $next);
    } else {
        $resposta->redirect("Location:index.php?r=admin");
    }

    return $resposta;
}
