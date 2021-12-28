<?php

function ctrlElMeuPerfil($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("elMeuPerfil.php");

    return $resposta;
}