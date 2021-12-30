<?php

function ctrlDoCanviarContrasenya($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $dadesUsuarilogat = $peticio->get("SESSION", "dadesUsuari");
    $idUsuari2 = $peticio->get(INPUT_POST, "idUsuari");
    $contrasenyaActual2 = $peticio->get(INPUT_POST, "contrasenyaActual");
    $contrasenyaNova12 = $peticio->get(INPUT_POST, "contrasenyaNova1");
    $contrasenyaNova22 = $peticio->get(INPUT_POST, "contrasenyaNova2");

    $idUsuari = filter_var($idUsuari2, FILTER_SANITIZE_NUMBER_INT);
    $contrasenyaActual = trim(filter_var($contrasenyaActual2, FILTER_SANITIZE_STRING));
    $contrasenyaNova1 = trim(filter_var($contrasenyaNova12, FILTER_SANITIZE_STRING));
    $contrasenyaNova2 = trim(filter_var($contrasenyaNova22, FILTER_SANITIZE_STRING));

    if (!empty($contrasenyaActual) || !empty($contrasenyaNova1) || !empty($contrasenyaNova2)) {
        if ($contrasenyaNova1 === $contrasenyaNova2) {
            $login = $usuarisPDO->isLogin($dadesUsuarilogat["username"], $contrasenyaActual, $contenidor->options());

            if ($login) {
                $hash = password_hash($contrasenyaNova1, PASSWORD_DEFAULT, $contenidor->options());

                $usuarisPDO->updatePassword($idUsuari, $hash);

                $resposta->redirect("Location:index.php?r=logout");
            } else {
                $resposta->redirect("Location:index.php?r=canviarContrasenya&error=1");
            }
        } else {
            $resposta->redirect("Location:index.php?r=canviarContrasenya&error=2");
        }
    } else {
        $resposta->redirect("Location:index.php?r=canviarContrasenya&error=3");
    }

    return $resposta;
}
