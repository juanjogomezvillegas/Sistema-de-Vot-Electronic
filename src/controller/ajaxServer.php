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

function ctrlObtenirDadesUsuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $nomUsuari2 = $peticio->get(INPUT_POST, "nomUsuari");

    $nomUsuari = trim(filter_var($nomUsuari2, FILTER_SANITIZE_STRING));

    $dadesUsuari = $usuarisPDO->get($nomUsuari);

    echo json_encode($dadesUsuari);

    return $resposta;
}

function ctrlObtenirDadesCandidat($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $idCandidat2 = $peticio->get(INPUT_POST, "idCandidat");

    $idCandidat = filter_var($idCandidat2, FILTER_SANITIZE_NUMBER_INT);

    $dadesCandidat = $candidatsPDO->get($idCandidat);

    echo json_encode($dadesCandidat);

    return $resposta;
}

function ctrlNumVotsSi($peticio, $resposta, $contenidor)
{
    $pactometrePDO = $contenidor->pactometrePDO();

    $count = $pactometrePDO->get("yes");

    echo $count["total"];

    return $resposta;
}

function ctrlNumVotsNo($peticio, $resposta, $contenidor)
{
    $pactometrePDO = $contenidor->pactometrePDO();

    $count = $pactometrePDO->get("no");

    echo $count["total"];

    return $resposta;
}

function ctrlNumVotsAbstencio($peticio, $resposta, $contenidor)
{
    $pactometrePDO = $contenidor->pactometrePDO();

    $count = $pactometrePDO->get("abstention");

    echo $count["total"];

    return $resposta;
}

function ctrlActualitzarPosicio($peticio, $resposta, $contenidor)
{
    $pactometrePDO = $contenidor->pactometrePDO();

    $idCandidat2 = $peticio->get(INPUT_POST, "idCandidat");
    $posicioNova2 = $peticio->get(INPUT_POST, "posicioNova");

    $idCandidat = filter_var($idCandidat2, FILTER_SANITIZE_NUMBER_INT);
    $posicioNova = trim(filter_var($posicioNova2, FILTER_SANITIZE_STRING));

    $count = $pactometrePDO->updatePosicio($idCandidat, $posicioNova);

    return $resposta;
}

function ctrlObtenirResultatsGrafic($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $candidats = $candidatsPDO->resultats();

    echo json_encode($candidats);

    return $resposta;
}

function ctrlSumaVots($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $idCandidat2 = $peticio->get(INPUT_POST, "idCandidat");

    $idCandidat = filter_var($idCandidat2, FILTER_SANITIZE_NUMBER_INT);

    $candidatsPDO->sumaVots($idCandidat);

    return $resposta;
}

function ctrlRestaVots($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $idCandidat2 = $peticio->get(INPUT_POST, "idCandidat");

    $idCandidat = filter_var($idCandidat2, FILTER_SANITIZE_NUMBER_INT);

    $candidatsPDO->restaVots($idCandidat);

    return $resposta;
}

function ctrlObtenirResultat($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $candidats = $candidatsPDO->resultats();

    echo json_encode($candidats);

    return $resposta;
}

function ctrlObtenirDadesEvent($peticio, $resposta, $contenidor)
{
    $historiaPDO = $contenidor->historiaPDO();

    $idEvent2 = $peticio->get(INPUT_POST, "idEvent");

    $idEvent = filter_var($idEvent2, FILTER_SANITIZE_NUMBER_INT);

    $dadesEvent = $historiaPDO->getEvent($idEvent);

    echo json_encode($dadesEvent);

    return $resposta;
}
