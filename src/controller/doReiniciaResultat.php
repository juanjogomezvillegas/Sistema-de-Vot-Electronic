<?php

function ctrlDoReiniciaResultat($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $candidatsPDO->reiniciarResultats();

    $resposta->redirect("Location:index.php?r=resultats");

    return $resposta;
}
