<!DOCTYPE html>
<html lang="ca" class="fonsDark">
    <head>
        <?php require "../src/view/util/head.php"; ?>
        <title>Configuration | <?php echo $titolAplicacio["titol"]; ?></title>
    </head>
    <body class="fonsDark">
        <?php require "../src/view/util/menuadmin.php"; ?>
        <br>
        <div class="is-full">
            <div class="is-full mr-6 ml-6 mb-4">
                <?php if (isset($error) && $error === "1") { ?>
                    <div id="app">
                        <missatge-error tittle="You have not uploaded any images, or the image is not in .jpg or .png format"></missatge-error>
                    </div>
                <?php } ?>
                <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-6 mb-6">
                    <div class="field m-3 mb-5">
                        <label class="label has-text-light">Change Title</label>
                        <div class="control">
                            <input class="input itemAdmin" type="text" id="titolAplicacio" name="titolAplicacio" value="<?php echo $titolAplicacio["titol"]; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns is-variable mr-6 ml-6">
                <div class="column">
                    <img class="image is-rounded" src="<?php echo $logoAplicacio["logo"]; ?>">
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
                                    Upload Image ...
                                </span>
                                </span>
                                <span class="file-name has-background-link-light">
                                    You have not uploaded any images
                                </span>
                            </label>
                        </div>
                        <button id="botoCanviarImage" class="button is-link">Change Image <i class="fas fa-camera ml-2"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <?php require "../src/view/util/script.php"; ?>
        <script src="js/configuracio.js"></script>
        <script src="js/showFitxerPujat.js"></script>
    </body>
</html>