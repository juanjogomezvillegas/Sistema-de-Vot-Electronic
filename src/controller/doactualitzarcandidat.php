<?php

function ctrlDoactualitzarcandidat($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $idCandidat2 = $peticio->get(INPUT_POST, "idCandidat");
    $nomCandidat2 = $peticio->get(INPUT_POST, "nomCandidat");
    $lemaCampanya2 = $peticio->get(INPUT_POST, "lemaCampanya");

    $idCandidat = filter_var($idCandidat2, FILTER_SANITIZE_NUMBER_INT);
    $nomCandidat = trim(filter_var($nomCandidat2, FILTER_SANITIZE_STRING));
    $lemaCampanya = trim(filter_var($lemaCampanya2, FILTER_SANITIZE_STRING));

    if (!empty($nomCandidat) && !empty($lemaCampanya)) {
        $candidatsPDO->update($idCandidat, $nomCandidat, $lemaCampanya);

        $resposta->redirect("Location:index.php?r=llistarCandidats&infoEdita=1");
    } else {
        $resposta->redirect("Location:index.php?r=llistarCandidats&errorEditar=1");
    }

    return $resposta;
}
