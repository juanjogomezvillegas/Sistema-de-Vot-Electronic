<?php

function ctrlResultats($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $candidats = $candidatsPDO->resultats();

    $countVots = $candidatsPDO->countVots();

    $resposta->set("candidats", $candidats);
    $resposta->set("countVots", $countVots);

    $resposta->SetTemplate("resultats.php");

    return $resposta;
}