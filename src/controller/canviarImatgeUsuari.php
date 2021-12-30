<?php

function ctrlCanviarImatgeUsuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $dadesUsuarilogat = $peticio->get("SESSION", "dadesUsuari");
    $idUsuari2 = $peticio->get(INPUT_POST, "idUsuari");
    $imatge = $peticio->get("FILES", "imatgeUsuari");

    $idUsuari = filter_var($idUsuari2, FILTER_SANITIZE_NUMBER_INT);

    if (isset($imatge) && ($imatge["type"] === "image/jpeg" || $imatge["type"] === "image/png")) {
        $usuarisPDO->updateImatge($idUsuari, "img/usuaris/" . $imatge["name"]);

        move_uploaded_file($imatge["tmp_name"], "img/usuaris/" . $imatge["name"]);

        $resposta->redirect("Location:index.php?r=elMeuPerfil");
    } else {
        $resposta->redirect("Location:index.php?r=elMeuPerfil&error=1");
    }

    return $resposta;
}
