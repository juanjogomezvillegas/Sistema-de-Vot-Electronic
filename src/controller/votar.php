<?php

function ctrlVotar($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $idCandidat2 = $peticio->get("INPUT_REQUEST", "id");

    $idCandidat = filter_var($idCandidat2, FILTER_SANITIZE_NUMBER_INT);

    $candidatsPDO->sumaVots($idCandidat);

    $resposta->SetTemplate("votar.php");

    return $resposta;
}
