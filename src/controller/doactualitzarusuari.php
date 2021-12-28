<?php

function ctrlDoactualitzarusuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $idUsuari2 = $peticio->get(INPUT_POST, "idUsuari");
    $username2 = $peticio->get(INPUT_POST, "username");
    $rolUsuari2 = $peticio->get(INPUT_POST, "rolUsuari");

    $idUsuari = filter_var($idUsuari2, FILTER_SANITIZE_NUMBER_INT);
    $username = trim(filter_var($username2, FILTER_SANITIZE_STRING));
    $rolUsuari = trim(filter_var($rolUsuari2, FILTER_SANITIZE_STRING));

    if (!empty($username) && !empty($rolUsuari)) {
        $usuarisPDO->update($idUsuari, $username, $rolUsuari);

        $resposta->redirect("Location:index.php?r=llistarUsuaris&infoEdita=1");
    } else {
        $resposta->redirect("Location:index.php?r=llistarUsuaris&errorEditar=1");
    }

    return $resposta;
}