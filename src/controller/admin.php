<?php

function ctrlAdmin($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();
    $candidatsPDO = $contenidor->candidatsPDO();
    $configPDO = $contenidor->configPDO();

    $numEscons = $configPDO->getNumEscons();

    $resposta->set("numEscons", $numEscons);

    $resposta->SetTemplate("admin.php");

    return $resposta;
}