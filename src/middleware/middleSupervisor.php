<?php
/**
 * Middleware que controla que l'usuari sigui Administrator, Manager o Supervisor
 * **/

/**
 * middleSupervisor: controla que l'usuari sigui Administrator, Manager o Supervisor
 * **/
function middleSupervisor($peticio, $resposta, $config, $next)
{
    $dadesUsuarilogat = $peticio->get("SESSION", "dadesUsuari");

    if ($dadesUsuarilogat["rol"] === "Administrator" || $dadesUsuarilogat["rol"] === "Manager" || $dadesUsuarilogat["rol"] === "Supervisor") {
        $resposta = nextMiddleware($peticio, $resposta, $config, $next);
    } else {
        $resposta->redirect("Location:index.php?r=admin");
    }

    return $resposta;
}