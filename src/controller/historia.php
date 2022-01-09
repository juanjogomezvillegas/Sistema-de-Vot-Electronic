<?php

function ctrlHistoria($peticio, $resposta, $contenidor)
{
    $historiaPDO = $contenidor->historiaPDO();

    $error2 = $peticio->get(INPUT_GET, "error");

    $error = trim(filter_var($error2, FILTER_SANITIZE_STRING));

    $llistatEvents = $historiaPDO->get();

    $resposta->set("llistatEvents", $llistatEvents);
    $resposta->set("error", $error);

    $resposta->SetTemplate("historia.php");

    return $resposta;
}

function ctrlDoCrearEvent($peticio, $resposta, $contenidor)
{
    $historiaPDO = $contenidor->historiaPDO();

    $dateEvent2 = $peticio->get(INPUT_POST, "dateEvent");
    $timeEvent2 = $peticio->get(INPUT_POST, "timeEvent");
    $nomEvent2 = $peticio->get(INPUT_POST, "nomEvent");
    $colorEvent2 = $peticio->get(INPUT_POST, "colorEvent");

    $dateEvent = trim(filter_var($dateEvent2, FILTER_SANITIZE_STRING));
    $timeEvent = trim(filter_var($timeEvent2, FILTER_SANITIZE_STRING));
    $nomEvent = trim(filter_var($nomEvent2, FILTER_SANITIZE_STRING));
    $colorEvent = trim(filter_var($colorEvent2, FILTER_SANITIZE_STRING));

    if (!empty($dateEvent) && !empty($timeEvent) && !empty($nomEvent) && !empty($colorEvent)) {
        $timestamp = "$dateEvent $timeEvent";

        $dateTime = new DateTime($timestamp);

        $historiaPDO->add($dateTime->format("Y-n-j h:m:s"), $nomEvent, $colorEvent);

        $resposta->redirect("Location:index.php?r=historia");
    } else {
        $resposta->redirect("Location:index.php?r=historia&error=1");
    }

    return $resposta;
}

function ctrlDoReiniciaHistoria($peticio, $resposta, $contenidor)
{
    $historiaPDO = $contenidor->historiaPDO();

    $historiaPDO->deleteAll();

    $resposta->redirect("Location:index.php?r=historia");

    return $resposta;
}

function ctrlDoEsborrarEvent($peticio, $resposta, $contenidor)
{
    $historiaPDO = $contenidor->historiaPDO();

    $idEvent2 = $peticio->get(INPUT_POST, "idEvent");

    $idEvent = filter_var($idEvent2, FILTER_SANITIZE_NUMBER_INT);

    $historiaPDO->delete($idEvent);

    $resposta->redirect("Location:index.php?r=historia");

    return $resposta;
}
