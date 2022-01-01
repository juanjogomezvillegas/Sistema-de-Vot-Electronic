<?php

function ctrlVotar($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();
    $candidatsPDO = $contenidor->candidatsPDO();

    $idCandidat2 = $peticio->get("INPUT_REQUEST", "id");
    $recaptcha_response = $peticio->get(INPUT_POST, "recaptcha_response");

    $idCandidat = filter_var($idCandidat2, FILTER_SANITIZE_NUMBER_INT);

    $recaptcha = $usuarisPDO->recaptcha($recaptcha_response);

    if ($recaptcha->score >= 0.7) {
        $candidatsPDO->votar($idCandidat);

        $resposta->SetTemplate("votar.php");
    } else {
        $resposta->redirect("Location:index.php?error=1");
    }

    return $resposta;
}
