<?php

function ctrlAdmin($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();
    $candidatsPDO = $contenidor->candidatsPDO();

    $resposta->SetTemplate("admin.php");

    return $resposta;
}