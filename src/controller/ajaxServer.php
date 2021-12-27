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

    $numEscons2 = $peticio->get(INPUT_POST, "numEscons");

    $numEscons = trim(filter_var($numEscons2, FILTER_SANITIZE_STRING));

    $configPDO->updateNumEscons($numEscons);

    return $resposta;
}

function ctrlActualitzarUsuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $nomUsuari2 = $peticio->get(INPUT_POST, "nomUsuari");

    $nomUsuari = trim(filter_var($nomUsuari2, FILTER_SANITIZE_STRING));

    $dadesUsuari = $usuarisPDO->get($nomUsuari);

    echo json_encode($dadesUsuari);

    return $resposta;
}