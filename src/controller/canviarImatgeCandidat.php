<?php

function ctrlCanviarImatgeCandidat($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $idCandidat2 = $peticio->get(INPUT_POST, "idCandidat");
    $imatge = $peticio->get("FILES", "imatgeCandidat");

    $idCandidat = filter_var($idCandidat2, FILTER_SANITIZE_NUMBER_INT);
    
    if (isset($imatge) && ($imatge["type"] === "image/jpeg" || $imatge["type"] === "image/png")) {
        $candidatsPDO->updateImatge($idCandidat, "img/candidats/".$imatge["name"]);

        move_uploaded_file($imatge["tmp_name"], "img/candidats/".$imatge["name"]);
    
        $resposta->redirect("Location:index.php?r=llistarCandidats");
    } else {
        $resposta->redirect("Location:index.php?r=llistarCandidats&errorImatge=1");
    }

    return $resposta;
}