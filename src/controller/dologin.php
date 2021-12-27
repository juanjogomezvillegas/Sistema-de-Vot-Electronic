<?php

function ctrlDologin($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuari2 = $peticio->get(INPUT_POST, "inputUsername");
    $password2 = $peticio->get(INPUT_POST, "inputPassword");

    $usuari = trim(filter_var($usuari2, FILTER_SANITIZE_STRING));
    $password = trim(filter_var($password2, FILTER_SANITIZE_STRING));

    $error = false;
    if (!isset($usuari)) {
        $error = true;
    } else {
        $resposta->setCookie("usuariLogat", $usuari, strtotime("+1 month"));
    }
    if (!isset($password)) {
        $error = true;
    }

    if (!$error) {
        $logat = $usuarisPDO->isLogin($usuari, $password, $contenidor->options());
        if ($logat) {
            $dadesUsuari = $usuarisPDO->get($usuari);

            $resposta->setSession("logat", $logat);
            $resposta->setSession("dadesUsuari", $dadesUsuari);

            $resposta->redirect("Location:index.php?r=admin");
        } else {
            $resposta->redirect("Location:index.php?r=login&error=1");
        }
    } else {
        $resposta->redirect("Location:index.php?r=login&error=1");
    }

    return $resposta;
}