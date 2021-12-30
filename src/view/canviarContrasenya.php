<!DOCTYPE html>
<html lang="ca">
    <head>
        <?php require "../src/view/util/head.php"; ?>
        <title>Canvia la Contrasenya | <?php echo $titolAplicacio["titol"]; ?></title>
    </head>
    <body>
        <?php require "../src/view/util/menu.php"; ?>
        <form action="index.php?r=doCanviarContrasenya" method="POST" class="is-flex is-flex-direction-column is-justify-content-center m-6">
            <?php if (isset($error) && $error === "1") { ?>
                <div id="app">
                    <missatge-error tittle="La Contrasenya Actual es Incorrecte"></missatge-error>
                </div>
            <?php } elseif (isset($error) && $error === "2") { ?>
                <div id="app">
                    <missatge-error tittle="La Contrasenya no s'ha verificat correctament"></missatge-error>
                </div>
            <?php } elseif (isset($error) && $error === "3") { ?>
                <div id="app">
                    <missatge-error tittle="Hi ha algun camp buit"></missatge-error>
                </div>
            <?php } ?>
            <input type="hidden" name="idUsuari" value="<?php echo $dadesUsuarilogat["id"]; ?>">
            <div class="field m-3">
                <label for="passAct" class="label">Contrasenya Actual</label>
                <div class="control">
                    <input id="passAct" class="input" name="contrasenyaActual" type="password">
                </div>
            </div>
            <div class="field m-3">
                <label for="passNova1" class="label">Contrasenya Nova</label>
                <div class="control">
                    <input id="passNova1" class="input" name="contrasenyaNova1" type="password">
                </div>
            </div>
            <div class="field m-3">
                <label for="passNova2" class="label">Verifica la Contrasenya Nova</label>
                <div class="control">
                    <input id="passNova2" class="input" name="contrasenyaNova2" type="password">
                </div>
            </div>
            <button id="botoCanviarImage" class="button is-link m-6">Canviar Contrasenya <i class="fas fa-key ml-2"></i></button>
        </form>
        <?php require "../src/view/util/script.php"; ?>
        <script src="js/elMeuPerfil.js"></script>
    </body>
</html>