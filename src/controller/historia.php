<?php

function ctrlHistoria($peticio, $resposta, $contenidor)
{
    $historiaPDO = $contenidor->historiaPDO();

    $llistatEvents = $historiaPDO->get();

    $resposta->set("llistatEvents", $llistatEvents);

    $resposta->SetTemplate("historia.php");

    return $resposta;
}
