<?php

function ctrlDocrearusuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $username2 = $peticio->get(INPUT_POST, "username");
    $password12 = $peticio->get(INPUT_POST, "password1");
    $password22 = $peticio->get(INPUT_POST, "password2");
    $rolUsuari2 = $peticio->get(INPUT_POST, "rolUsuari");

    $username = trim(filter_var($username2, FILTER_SANITIZE_STRING));
    $password1 = trim(filter_var($password12, FILTER_SANITIZE_STRING));
    $password2 = trim(filter_var($password22, FILTER_SANITIZE_STRING));
    $rolUsuari = trim(filter_var($rolUsuari2, FILTER_SANITIZE_STRING));

    if (!empty($username) && !empty($password1) && !empty($password2) && !empty($rolUsuari)) {
        if ($password1 === $password2) {
            $usuarisPDO->add($username, $password1, $rolUsuari, $contenidor->options());

            $resposta->redirect("Location:index.php?r=llistarUsuaris&infoCrea=1");
        } else {
            $resposta->redirect("Location:index.php?r=llistarUsuaris&errorCrear=1");
        }
    } else {
        $resposta->redirect("Location:index.php?r=llistarUsuaris&errorCrear=2");
    }

    return $resposta;
}
