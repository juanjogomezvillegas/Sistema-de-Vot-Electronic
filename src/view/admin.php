<!DOCTYPE html>
<html lang="ca" class="fonsDark">
    <head>
        <?php include "../src/view/util/head.php"; ?>
        <title>Panell d'Administració | <?= $titolAplicacio["titol"]; ?></title>
    </head>
    <body class="fonsDark">
        <?php include "../src/view/util/menuadmin.php"; ?>
        <br>
        <div class="field is-flex is-justify-content-start">
            <p class="control has-icons-left">
                <input class="input itemAdmin is-size-6" type="text" id="tempsRefresc" value="10">
                <span class="icon is-small is-left is-size-6">
                <i class="fas fa-sync"></i>
                </span>
            </p>
        </div>
        <?php if ($dadesUsuarilogat["rol"] === "Administrator" || $dadesUsuarilogat["rol"] === "Manager") { ?>
            <div class="field is-flex is-justify-content-start">
                <p class="control has-icons-left">
                    <input class="input itemAdmin is-size-6" type="text" id="numEscons" value="<?= $numEscons["numEscons"]; ?>">
                    <span class="icon is-small is-left is-size-6">
                    <i class="fas fa-chair"></i>
                    </span>
                </p>
            </div>
        <?php } ?>
        <br>
        <div class="is-full mt-6">
            <div class="columns is-variable">
                <div id="itemAdminVots" class="itemAdmin is-clickable column m-4 is-flex is-justify-content-center is-align-items-center">
                    <p class="mr-5 is-variable"><span class="icon"><i class="fas fa-poll is-size-1"></i></span></p>
                    <p class="mr-2 is-size-2 is-variable">Vots</p>
                    <p id="itemAdminVotsNum" class="is-size-2">0</p>
                </div>
                <?php if ($dadesUsuarilogat["rol"] === "Administrator") { ?>
                    <div id="itemAdminUsuari" class="itemAdmin is-clickable column m-4 is-flex is-justify-content-center is-align-items-center">
                        <p class="mr-5 is-variable"><span class="icon"><i class="fas fa-users is-size-1"></i></span></p>
                        <p class="mr-2 is-size-2 is-variable">Usuaris</p>
                        <p id="itemAdminUsuariNum" class="is-size-2">0</p>
                    </div>
                <?php } else if ($dadesUsuarilogat["rol"] === "Manager") { ?>
                    <div class="itemAdmin column m-4 is-flex is-justify-content-center is-align-items-center">
                        <p class="mr-5 is-variable"><span class="icon"><i class="fas fa-users is-size-1"></i></span></p>
                        <p class="mr-2 is-size-2 is-variable">Usuaris</p>
                        <p id="itemAdminUsuariNum" class="is-size-2">0</p>
                    </div>
                <?php } ?>
                <?php if ($dadesUsuarilogat["rol"] === "Administrator" || $dadesUsuarilogat["rol"] === "Manager") { ?>
                    <div id="itemAdminCandidat" class="itemAdmin is-clickable column m-4 is-flex is-justify-content-center is-align-items-center">
                        <p class="mr-5 is-variable"><span class="icon"><i class="fas fa-person-booth is-size-1"></i></span></p>
                        <p class="mr-2 is-size-2 is-variable">Candidats</p>
                        <p id="itemAdminCandidatNum" class="is-size-2">0</p>
                    </div>
                <?php } else { ?>
                    <div class="itemAdmin column m-4 is-flex is-justify-content-center is-align-items-center">
                        <p class="mr-5 is-variable"><span class="icon"><i class="fas fa-person-booth is-size-1"></i></span></p>
                        <p class="mr-2 is-size-2 is-variable">Candidats</p>
                        <p id="itemAdminCandidatNum" class="is-size-2">0</p>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php include "../src/view/util/script.php"; ?>
        <script src="js/admin.js"></script>
    </body>
</html>