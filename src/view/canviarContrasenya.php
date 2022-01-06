<!DOCTYPE html>
<html lang="ca">
    <head>
        <?php require "../src/view/util/head.php"; ?>
        <title>Change Password | <?php echo $titolAplicacio["titol"]; ?></title>
    </head>
    <body>
        <?php require "../src/view/util/menu.php"; ?>
        <form action="index.php?r=doCanviarContrasenya" method="POST" class="is-flex is-flex-direction-column is-justify-content-center m-6">
            <?php if (isset($error) && $error === "1") { ?>
                <div id="app">
                    <missatge-error tittle="Incorrect Current Password"></missatge-error>
                </div>
            <?php } elseif (isset($error) && $error === "2") { ?>
                <div id="app">
                    <missatge-error tittle="Password not verified correctly"></missatge-error>
                </div>
            <?php } elseif (isset($error) && $error === "3") { ?>
                <div id="app">
                    <missatge-error tittle="There is an empty field"></missatge-error>
                </div>
            <?php } ?>
            <input type="hidden" name="idUsuari" value="<?php echo $dadesUsuarilogat["id"]; ?>">
            <div class="field m-3">
                <label for="passAct" class="label">Current Password</label>
                <div class="control">
                    <input id="passAct" class="input" name="contrasenyaActual" type="password">
                </div>
            </div>
            <div class="field m-3">
                <label for="passNova1" class="label">New Password</label>
                <div class="control">
                    <input id="passNova1" class="input" name="contrasenyaNova1" type="password">
                </div>
            </div>
            <div class="field m-3">
                <label for="passNova2" class="label">Verify New Password</label>
                <div class="control">
                    <input id="passNova2" class="input" name="contrasenyaNova2" type="password">
                </div>
            </div>
            <button id="botoCanviarImage" class="button is-link m-6">Change Password <i class="fas fa-key ml-2"></i></button>
        </form>
        <?php require "../src/view/util/script.php"; ?>
    </body>
</html>