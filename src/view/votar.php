<!DOCTYPE html>
<html lang="ca">
    <head>
        <?php include "../src/view/util/head.php"; ?>
        <title><?= $titolAplicacio["titol"]; ?></title>
    </head>
    <body>
        <div class="is-full">
            <div class="divVotar">
                <h1 class="is-flex is-justify-content-center title is-1 mb-6 has-text-dark">Has Votat !</h1>
                <h1 class="is-flex is-justify-content-center title is-1 mt-6 has-text-success"><i class="fas fa-check"></i></h1>
            </div>
        </div>
        <?php include "../src/view/util/script.php"; ?>
    </body>
</html>