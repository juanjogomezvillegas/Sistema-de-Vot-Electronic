<!DOCTYPE html>
<html lang="ca">
    <head>
        <?php include "../src/view/util/head.php"; ?>
        <title>El Meu Perfil | <?= $titolAplicacio["titol"]; ?></title>
    </head>
    <body>
        <?php include "../src/view/util/menu.php"; ?>
        <div class="is-flex is-justify-content-center mt-6 mb-1">
            <figure class="image is-128x128">
                <img class="is-rounded" src="<?= $dadesUsuarilogat["icona"]; ?>">
            </figure>
        </div>
        <form action="index.php?r=canviarImatgePerfil" method="POST" class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center mt-1 mb-6" enctype="multipart/form-data">
            <button id="botoCanviarImage" class="button is-link">Canviar Imatge <i class="fas fa-camera ml-2"></i></button>
            <div id="file-js-example" class="file has-name mt-3 is-link">
                <label class="file-label">
                    <input class="file-input" type="file" name="imatgePerfil">
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
        </form>
        <br>
        <div class="is-full">
            <div class="table-container">
                <table class="table is-narrow is-bordered is-striped is-hoverable is-fullwidth">
                    <tr>
                        <th>Username</th>
                        <td><?= $dadesUsuarilogat["username"]; ?></td>
                    </tr>
                    <tr>
                        <th>Rol</th>
                        <td><?= $dadesUsuarilogat["rol"]; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php include "../src/view/util/script.php"; ?>
        <script src="js/elMeuPerfil.js"></script>
    </body>
</html>