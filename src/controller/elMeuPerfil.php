<?php

function ctrlElMeuPerfil($peticio, $resposta, $contenidor)
{
    $error2 = $peticio->get(INPUT_GET, "error");

    $error = trim(filter_var($error2, FILTER_SANITIZE_STRING));

    $resposta->set("error", $error);

    $resposta->SetTemplate("elMeuPerfil.php");

    return $resposta;
}
