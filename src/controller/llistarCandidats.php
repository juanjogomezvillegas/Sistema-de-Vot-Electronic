<?php

function ctrlLlistarCandidats($peticio, $resposta, $contenidor)
{
    $candidatsPDO = $contenidor->candidatsPDO();

    $infoCrea2 = $peticio->get(INPUT_GET, "infoCrea");
    $infoEdita2 = $peticio->get(INPUT_GET, "infoEdita");
    $infoEsborrar2 = $peticio->get(INPUT_GET, "infoEsborrar");
    $errorCrear2 = $peticio->get(INPUT_GET, "errorCrear");
    $errorEditar2 = $peticio->get(INPUT_GET, "errorEditar");

    $infoCrea = trim(filter_var($infoCrea2, FILTER_SANITIZE_STRING));
    $infoEdita = trim(filter_var($infoEdita2, FILTER_SANITIZE_STRING));
    $infoEsborrar = trim(filter_var($infoEsborrar2, FILTER_SANITIZE_STRING));
    $errorCrear = trim(filter_var($errorCrear2, FILTER_SANITIZE_STRING));
    $errorEditar = trim(filter_var($errorEditar2, FILTER_SANITIZE_STRING));

    $candidats = $candidatsPDO->llistat();

    $resposta->set("candidats", $candidats);
    $resposta->set("usuaris", $usuaris);
    $resposta->set("infoCrea", $infoCrea);
    $resposta->set("infoEdita", $infoEdita);
    $resposta->set("infoEsborrar", $infoEsborrar);
    $resposta->set("errorCrear", $errorCrear);
    $resposta->set("errorEditar", $errorEditar);

    $resposta->SetTemplate("llistarCandidats.php");

    return $resposta;
}