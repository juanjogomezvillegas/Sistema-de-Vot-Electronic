<!DOCTYPE html>
<html lang="ca" class="fonsDark">
    <head>
        <?php include "../src/view/util/head.php"; ?>
        <title>Resultats | <?= $titolAplicacio["titol"]; ?></title>
    </head>
    <body class="fonsDark">
        <?php include "../src/view/util/menuadmin.php"; ?>
        <br>
        <div class="is-full mt-6 mb-2">
            <div class="is-flex is-justify-content-center mb-5">
                <a href="index.php?r=resultats" class="button is-danger mr-2">Refresca Dades <i class="fas fa-redo-alt ml-2"></i></a>
                <a href="index.php?r=pactometre" class="button is-danger ml-2">Pactometre <i class="fas fa-handshake ml-2"></i></a>
            </div>
            <div class="table-container is-flex is-justify-content-center">
                <table class="table">
                    <thead class="has-background-white-ter">
                        <tr>
                            <th>Icona</th>
                            <th>Candidat</th>
                            <th>Lema de Campanya</th>
                            <th>Vots Obtinguts</th>
                            <th>Escons Obtinguts</th>
                        </tr>
                    </thead>
                    <tbody id="tablaResultats">
                        <?php foreach ($candidats as $actual) { ?>
                            <tr>
                                <td><img class="icon" src="<?= $actual["icona"]; ?>" alt="icona"></td>
                                <td><?= $actual["nom"]; ?></td>
                                <td><?= $actual["lema_campanya"]; ?></td>
                                <td><?= $actual["vots"]; ?></td>
                                <td><?= $actual["escons"]; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot class="has-background-white-ter">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><?= $countVots["total"]; ?></th>
                            <th><?= $numEscons["numEscons"]; ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <?php include "../src/view/util/script.php"; ?>
    </body>
</html>