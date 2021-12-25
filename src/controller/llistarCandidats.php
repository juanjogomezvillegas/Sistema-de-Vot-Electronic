<?php

function ctrlLlistarCandidats($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $candidats = $candidatsPDO->llistat();

    $resposta->set("candidats", $candidats);

    $resposta->SetTemplate("llistarCandidats.php");

    return $resposta;
}