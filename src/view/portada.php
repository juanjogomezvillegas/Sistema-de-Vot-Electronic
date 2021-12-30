<!DOCTYPE html>
<html lang="ca">
    <head>
        <?php require "../src/view/util/head.php"; ?>
        <title><?php echo $titolAplicacio["titol"]; ?></title>
    </head>
    <body>
        <?php require "../src/view/util/menu.php"; ?>
        <br>
        <div class="is-full">
            <div class="columns is-multiline is-variable is-centered">
                <?php foreach ($llistatCandidats as $actual) { ?>
                    <div class="card column is-one-quarter m-2">
                    <a href="index.php?r=votar&id=<?php echo $actual["id"]; ?>">
                        <header class="card-header">
                            <figure class="image is-48x48">
                                <img src="<?php echo $actual["icona"]; ?>" alt="<?php echo $actual["nom"]; ?>">
                            </figure>
                            <p class="card-header-title">
                                <?php echo $actual["nom"]; ?>
                            </p>
                        </header>
                        </a>
                        <div class="card-content">
                            <div class="content">
                                <?php echo $actual["lema_campanya"]; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php require "../src/view/util/script.php"; ?>
    </body>
</html>