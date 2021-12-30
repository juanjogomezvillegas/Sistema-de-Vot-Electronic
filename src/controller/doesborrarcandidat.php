<?php

function ctrlDoesborrarcandidat($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $idCandidat2 = $peticio->get(INPUT_POST, "idCandidat");

    $idCandidat = filter_var($idCandidat2, FILTER_SANITIZE_NUMBER_INT);

    $candidatsPDO->delete($idCandidat);

    $resposta->redirect("Location:index.php?r=llistarCandidats&infoEsborrar=1");

    return $resposta;
}
