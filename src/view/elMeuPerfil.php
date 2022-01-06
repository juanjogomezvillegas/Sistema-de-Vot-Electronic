<!DOCTYPE html>
<html lang="ca">
    <head>
        <?php require "../src/view/util/head.php"; ?>
        <title>Your Profile | <?php echo $titolAplicacio["titol"]; ?></title>
    </head>
    <body>
        <?php require "../src/view/util/menu.php"; ?>
        <div class="is-flex is-justify-content-center mt-6 mb-1">
            <figure class="image is-128x128">
                <img class="is-rounded" src="<?php echo $dadesUsuarilogat["icona"]; ?>">
            </figure>
        </div>
        <form action="index.php?r=canviarImatgeUsuari" method="POST" class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-1 mb-4" enctype="multipart/form-data">
            <?php if (isset($error) && $error === "1") { ?>
                <div id="app">
                    <missatge-error tittle="You have not uploaded any images, or the image is not in .jpg or .png format"></missatge-error>
                </div>
            <?php } ?>
            <button id="botoCanviarImage" class="button is-link">Change Image <i class="fas fa-camera ml-2"></i></button>
            <input type="hidden" name="idUsuari" value="<?php echo $dadesUsuarilogat["id"]; ?>">
            <div id="file-js-example" class="file has-name mt-3 is-link">
                <label class="file-label">
                    <input class="file-input" type="file" name="imatgeUsuari">
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
        </form>
        <div class="is-full">
            <div class="table-container ml-6 mr-6">
                <p class="title is-2 ">Basic Information</p>
                <table class="table is-narrow is-bordered is-hoverable is-fullwidth">
                    <tr>
                        <th class="has-background-white-ter">Username</th>
                        <td><?php echo $dadesUsuarilogat["username"]; ?></td>
                    </tr>
                    <tr>
                        <th class="has-background-white-ter">Role</th>
                        <td><?php echo $dadesUsuarilogat["rol"]; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-4">
            <a href="index.php?r=canviarContrasenya" id="botoCanviarImage" class="button is-link">Change Password <i class="fas fa-key ml-2"></i></a>
        </div>
        <?php require "../src/view/util/script.php"; ?>
        <script src="js/showFitxerPujat.js"></script>
    </body>
</html>