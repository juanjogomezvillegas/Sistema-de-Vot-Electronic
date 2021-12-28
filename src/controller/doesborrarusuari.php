<?php

function ctrlDoesborrarusuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $idUsuari2 = $peticio->get(INPUT_POST, "idUsuari");

    $idUsuari = filter_var($idUsuari2, FILTER_SANITIZE_NUMBER_INT);

    $usuarisPDO->delete($idUsuari);

    $resposta->redirect("Location:index.php?r=llistarUsuaris&infoEsborrar=1");

    return $resposta;
}