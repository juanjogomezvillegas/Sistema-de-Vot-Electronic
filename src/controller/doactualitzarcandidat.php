<?php

function ctrlDoactualitzarcandidat($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $idCandidat2 = $peticio->get(INPUT_POST, "idCandidat");
    $nomCandidat2 = $peticio->get(INPUT_POST, "nomCandidat");
    $lemaCampanya2 = $peticio->get(INPUT_POST, "lemaCampanya");
    $ideologia2 = $peticio->get(INPUT_POST, "ideologia");
    $colorCandidat2 = $peticio->get(INPUT_POST, "colorCandidat");

    $idCandidat = filter_var($idCandidat2, FILTER_SANITIZE_NUMBER_INT);
    $nomCandidat = trim(filter_var($nomCandidat2, FILTER_SANITIZE_STRING));
    $lemaCampanya = trim(filter_var($lemaCampanya2, FILTER_SANITIZE_STRING));
    $ideologia = trim(filter_var($ideologia2, FILTER_SANITIZE_STRING));
    $colorCandidat = trim(filter_var($colorCandidat2, FILTER_SANITIZE_STRING));

    if (!empty($nomCandidat) && !empty($lemaCampanya) && !empty($ideologia) && !empty($colorCandidat)) {
        $candidatsPDO->update($idCandidat, $nomCandidat, $lemaCampanya, $ideologia, $colorCandidat);

        $resposta->redirect("Location:index.php?r=llistarCandidats&infoEdita=1");
    } else {
        $resposta->redirect("Location:index.php?r=llistarCandidats&errorEditar=1");
    }

    return $resposta;
}
