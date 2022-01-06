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
            <?php if (isset($error) && $error === "1") { ?>
                <div id="app">
                    <missatge-error tittle="Hi ha hagut algun error"></missatge-error>
                </div>
            <?php } ?>
            <?php if (count($llistatCandidats) > 0) { ?>
            <div class="columns is-multiline is-variable is-centered">
                <?php foreach ($llistatCandidats as $actual) { ?>
                    <div class="card column is-one-quarter m-2">
                        <form action="index.php?r=votar&id=<?php echo $actual["id"]; ?>" method="POST">
                            <header class="card-header">
                                <figure class="image is-48x48">
                                    <img src="<?php echo $actual["icona"]; ?>" alt="<?php echo $actual["nom"]; ?>">
                                </figure>
                                <p class="card-header-title">
                                    <?php echo $actual["nom"]; ?>
                                </p>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    <?php echo $actual["lema_campanya"]; ?>
                                </div>
                                <div class="is-flex is-justify-content-center is-align-items-center">
                                    <button id="botoVotarCandidat" class="button is-dark">Vote <i class="fas fa-paper-plane ml-2"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php } ?>
            </div>
            <?php } else { ?>
                <div id="app" class="mr-6 ml-6">
                    <missatge-info tittle="There are currently no candidates available"></missatge-info>
                </div>
            <?php } ?>
        </div>
        <?php require "../src/view/util/script.php"; ?>
    </body>
</html>