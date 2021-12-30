<?php

function ctrlDocrearcandidat($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $nomCandidat2 = $peticio->get(INPUT_POST, "nomCandidat");
    $lemaCampanya2 = $peticio->get(INPUT_POST, "lemaCampanya");

    $nomCandidat = trim(filter_var($nomCandidat2, FILTER_SANITIZE_STRING));
    $lemaCampanya = trim(filter_var($lemaCampanya2, FILTER_SANITIZE_STRING));

    if (!empty($nomCandidat) && !empty($lemaCampanya)) {
        $candidatsPDO->add($nomCandidat, $lemaCampanya);

        $resposta->redirect("Location:index.php?r=llistarCandidats&infoCrea=1");
    } else {
        $resposta->redirect("Location:index.php?r=llistarCandidats&errorCrear=1");
    }

    return $resposta;
}
