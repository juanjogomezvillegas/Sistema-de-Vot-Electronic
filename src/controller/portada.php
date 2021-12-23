<?php

function ctrlPortada($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $llistatCandidats = $candidatsPDO->llistat();

    $resposta->set("llistatCandidats", $llistatCandidats);

    $resposta->SetTemplate("portada.php");

    return $resposta;
}