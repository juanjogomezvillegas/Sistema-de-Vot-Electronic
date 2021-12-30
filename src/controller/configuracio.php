<?php

function ctrlConfiguracio($peticio, $resposta, $contenidor)
{
    $error2 = $peticio->get(INPUT_GET, "error");

    $error = trim(filter_var($error2, FILTER_SANITIZE_STRING));

    $resposta->set("error", $error);

    $resposta->SetTemplate("configuracio.php");

    return $resposta;
}

function ctrlCanviarTitolAplicacio($peticio, $resposta, $contenidor)
{
    $configPDO = $contenidor->configPDO();

    $titolAplicacio = $peticio->get(INPUT_POST, "titolAplicacio");

    if (!empty($titolAplicacio)) {
        $configPDO->updateTitol($titolAplicacio);

        $resposta->redirect("Location:index.php?r=configuracio");
    } else {
        $resposta->redirect("Location:index.php?r=configuracio&error=2");
    }

    return $resposta;
}

function ctrlCanviarImatgeAplicacio($peticio, $resposta, $contenidor)
{
    $configPDO = $contenidor->configPDO();

    $imatge = $peticio->get("FILES", "imatgeAplicacio");

    if (isset($imatge) && ($imatge["type"] === "image/jpeg" || $imatge["type"] === "image/png")) {
        $configPDO->updateLogo("img/bd/" . $imatge["name"]);

        move_uploaded_file($imatge["tmp_name"], "img/bd/" . $imatge["name"]);

        $resposta->redirect("Location:index.php?r=configuracio");
    } else {
        $resposta->redirect("Location:index.php?r=configuracio&error=1");
    }

    return $resposta;
}
