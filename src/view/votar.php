<!DOCTYPE html>
<html lang="ca">
    <head>
        <?php require "../src/view/util/head.php"; ?>
        <title><?php echo $titolAplicacio["titol"]; ?></title>
    </head>
    <body>
        <div class="is-full">
            <div class="divVotar">
                <h1 class="is-flex is-justify-content-center title is-1 mb-6 has-text-dark">I have Voted!</h1>
                <h1 class="is-flex is-justify-content-center title is-1 mt-6 has-text-success"><i class="fas fa-check"></i></h1>
            </div>
        </div>
        <?php require "../src/view/util/script.php"; ?>
    </body>
</html>