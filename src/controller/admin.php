<?php

function ctrlAdmin($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();
    $candidatsPDO = $contenidor->candidatsPDO();

    $countUsuaris = $usuarisPDO->countRegistres();
    $countCandidats = $candidatsPDO->countRegistres();
    $countVots = $candidatsPDO->countVots();

    $resposta->set("countUsuaris", $countUsuaris);
    $resposta->set("countCandidats", $countCandidats);
    $resposta->set("countVots", $countVots);

    $resposta->SetTemplate("admin.php");

    return $resposta;
}