<?php

function ctrlLogin($peticio, $resposta, $contenidor)
{
    $usuari2 = $peticio->get(INPUT_COOKIE, "usuariLogat");
    $error2 = $peticio->get(INPUT_GET, "error");

    $usuari = trim(filter_var($usuari2, FILTER_SANITIZE_STRING));
    $error = trim(filter_var($error2, FILTER_SANITIZE_STRING));

    $resposta->set("usuari", $usuari);
    $resposta->set("error", $error);

    $resposta->SetTemplate("login.php");

    return $resposta;
}
