<!DOCTYPE html>
<html lang="ca">
    <head>
        <?php include "../src/view/util/head.php"; ?>
        <title>Sistema de Vot Electronic</title>
    </head>
    <body>
        <?php include "../src/view/util/menu.php"; ?>
        <br>
        <div class="is-full">
            <div class="columns is-multiline is-variable is-centered">
                <?php foreach ($llistatCandidats as $actual) { ?>
                    <div class="card column is-one-quarter m-2">
                    <a href="index.php?r=votar&id=<?= $actual["id"]; ?>">
                        <header class="card-header">
                            <figure class="image is-48x48">
                                <img src="<?= $actual["icona"]; ?>" alt="<?= $actual["nom"]; ?>">
                            </figure>
                            <p class="card-header-title">
                                <?= $actual["nom"]; ?>
                            </p>
                        </header>
                        </a>
                        <div class="card-content">
                            <div class="content">
                                <?= $actual["lema_campanya"]; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </body>
</html>