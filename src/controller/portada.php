<?php

function ctrlPortada($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $error2 = $peticio->get(INPUT_GET, "error");

    $error = trim(filter_var($error2, FILTER_SANITIZE_STRING));

    $llistatCandidats = $candidatsPDO->llistat();

    $resposta->set("llistatCandidats", $llistatCandidats);
    $resposta->set("error", $error);

    $resposta->SetTemplate("portada.php");

    return $resposta;
}
