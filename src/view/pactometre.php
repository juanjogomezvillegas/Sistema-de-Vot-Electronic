<!DOCTYPE html>
<html lang="ca" class="fonsDark">
    <head>
        <?php include "../src/view/util/head.php"; ?>
        <title>Pactometre | <?= $titolAplicacio["titol"]; ?></title>
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
                            <th></th>
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
                                <td>
                                    <div class="select is-rounded">
                                        <select>
                                            <?php if ($actual["posicio"] === "si") { ?>
                                                <option value="si" selected>Sí</option>
                                            <?php } else { ?>
                                                <option value="si">Sí</option>
                                            <?php } ?>
                                            <?php if ($actual["posicio"] === "no") { ?>
                                                <option value="no" selected>No</option>
                                            <?php } else { ?>
                                                <option value="no">No</option>
                                            <?php } ?>
                                            <?php if ($actual["posicio"] === "abstencio") { ?>
                                                <option value="abstencio" selected>Abstenció</option>
                                            <?php } else { ?>
                                                <option value="abstencio">Abstenció</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </td>
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
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <?php include "../src/view/util/script.php"; ?>
    </body>
</html>