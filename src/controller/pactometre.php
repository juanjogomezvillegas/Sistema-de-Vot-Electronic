<?php

function ctrlPactometre($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();
    $configPDO = $contenidor->configPDO();

    $candidats = $candidatsPDO->resultats();

    $countVots = $candidatsPDO->countVots();

    $numEscons = $configPDO->getNumEscons();

    $resposta->set("candidats", $candidats);
    $resposta->set("countVots", $countVots);
    $resposta->set("numEscons", $numEscons);

    $resposta->SetTemplate("pactometre.php");

    return $resposta;
}