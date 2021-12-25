<!DOCTYPE html>
<html lang="ca" class="fonsDark">
    <head>
        <?php include "../src/view/util/head.php"; ?>
        <title>Sistema de Vot Electronic</title>
    </head>
    <body class="fonsDark">
        <?php include "../src/view/util/menuadmin.php"; ?>
        <br>
        <div class="is-full mt-6 mb-2">
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
                    <tbody>
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
                    <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><?= $countVots["total"]; ?></th>
                        <th></th>
                    </tfoot>
                </table>
            </div>
        </div>
    </body>
</html>