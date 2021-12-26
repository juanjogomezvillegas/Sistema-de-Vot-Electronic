<?php

function ctrlCountUsuaris($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $countUsuaris = $usuarisPDO->countRegistres();

    echo $countUsuaris["total"];

    return $resposta;
}

function ctrlCountCandidats($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $countCandidats = $candidatsPDO->countRegistres();

    echo $countCandidats["total"];

    return $resposta;
}

function ctrlCountVots($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $countVots = $candidatsPDO->countVots();

    echo $countVots["total"];

    return $resposta;
}

function ctrlActualitzarEscons($peticio, $resposta, $contenidor)
{
    $configPDO = $contenidor->configPDO();

    $numEscons = $peticio->get(INPUT_POST, "numEscons");

    $configPDO->updateNumEscons($numEscons);

    return $resposta;
}