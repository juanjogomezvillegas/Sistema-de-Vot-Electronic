<?php

function ctrlPactometre($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();
    $configPDO = $contenidor->configPDO();

    $candidats = $candidatsPDO->resultats();

    $countVots = $candidatsPDO->countVots();

    $resposta->set("candidats", $candidats);
    $resposta->set("countVots", $countVots);

    $resposta->SetTemplate("pactometre.php");

    return $resposta;
}
