<?php

function ctrlLlistarUsuaris($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuaris = $usuarisPDO->llistat();

    $resposta->set("usuaris", $usuaris);

    $resposta->SetTemplate("llistarUsuaris.php");

    return $resposta;
}