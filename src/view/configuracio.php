<!DOCTYPE html>
<html lang="ca" class="fonsDark">
    <head>
        <?php include "../src/view/util/head.php"; ?>
        <title>Configuració | <?= $titolAplicacio["titol"]; ?></title>
    </head>
    <body class="fonsDark">
        <?php include "../src/view/util/menu.php"; ?>
        <br>
        <div class="is-full">
            <div class="is-full mr-6 ml-6 mb-4">
                <?php if (isset($error) && $error === "1") { ?>
                    <div id="app">
                        <missatge-error tittle="No has pujat cap imatge, o la imatge no està en el format .jpg o .png"></missatge-error>
                    </div>
                <?php } else if (isset($error) && $error === "2") { ?>
                    <div id="app">
                        <missatge-error tittle='El Camp "Títol" està buit'></missatge-error>
                    </div>
                <?php } ?>
                <form action="index.php?r=canviarTitolAplicacio" method="POST" class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-6 mb-6">
                    <div class="field m-3 mb-5">
                        <div class="control">
                            <input class="input itemAdmin" type="text" id="titolAplicacio" name="titolAplicacio" value="<?= $titolAplicacio["titol"]; ?>">
                        </div>
                    </div>
                    <button id="botoCanviarImage" class="button is-link">Canviar el Títol</button>
                </form>
            </div>
            <div class="columns is-variable mr-6 ml-6">
                <div class="column">
                    <img class="image is-rounded" src="<?= $logoAplicacio["logo"]; ?>">
                </div>
                <div class="column">
                    <form action="index.php?r=canviarImatgeAplicacio" method="POST" class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-6 mb-4" enctype="multipart/form-data">
                        <div id="file-js-example" class="file has-name mt-4 mb-6 is-link">
                            <label class="file-label">
                                <input class="file-input" type="file" name="imatgeAplicacio">
                                <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Puja una Imatge ...
                                </span>
                                </span>
                                <span class="file-name has-background-link-light">
                                    No has pujat cap imatge
                                </span>
                            </label>
                        </div>
                        <button id="botoCanviarImage" class="button is-link">Canviar Imatge <i class="fas fa-camera ml-2"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <?php include "../src/view/util/script.php"; ?>
        <script src="js/elMeuPerfil.js"></script>
    </body>
</html>