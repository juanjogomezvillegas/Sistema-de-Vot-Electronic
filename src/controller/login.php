<?php

function ctrlLogin($peticio, $resposta, $contenidor)
{
    $usuari2 = $peticio->get(INPUT_COOKIE, "usuariLogat");

    $usuari = trim(filter_var($usuari2, FILTER_SANITIZE_STRING));

    $resposta->set("usuari", $usuari);

    $resposta->SetTemplate("login.php");

    return $resposta;
}