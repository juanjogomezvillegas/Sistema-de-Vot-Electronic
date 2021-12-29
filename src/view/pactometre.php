<!DOCTYPE html>
<html lang="ca" class="fonsDark">
    <head>
        <?php include "../src/view/util/head.php"; ?>
        <title>Pactometre | <?= $titolAplicacio["titol"]; ?></title>
    </head>
    <body class="fonsDark">
        <?php include "../src/view/util/menuadmin.php"; ?>
        <div class="is-full mt-5 mb-1 mr-6 ml-6">
            <nav class="level">
                <div class="level-item has-text-centered">
                    <div>
                    <p class="heading is-size-4 has-text-success">Sí</p>
                    <p id="numVotsSi" class="title is-2 has-text-success">0</p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div>
                    <p class="heading is-size-4 has-text-danger">No</p>
                    <p id="numVotsNo" class="title is-2 has-text-danger">0</p>
                    </div>
                </div>
                <div class="level-item has-text-centered">
                    <div>
                    <p class="heading is-size-4 has-text-light">Abstenció</p>
                    <p id="numVotsAbstencio" class="title is-2 has-text-light">0</p>
                    </div>
                </div>
            </nav>
            <br>
            <div class="is-flex is-justify-content-center">
                <table class="table is-narrow is-bordered is-striped is-hoverable is-centered">
                    <thead class="has-background-white-ter">
                        <tr>
                            <th>Icona</th>
                            <th>Candidat</th>
                            <th>Vots Obtinguts</th>
                            <th>Escons Obtinguts</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tablaResultats">
                        <?php foreach ($candidats as $actual) { ?>
                            <tr>
                                <td class="has-text-centered"><img class="icon" src="<?= $actual["icona"]; ?>" alt="icona"></td>
                                <td><?= $actual["nom"]; ?></td>
                                <td class="has-text-centered"><?= $actual["vots"]; ?></td>
                                <td class="has-text-centered"><?= $actual["escons"]; ?></td>
                                <td>
                                    <div class="select is-rounded">
                                        <input type="hidden" name="idCandidat" value="<?= $actual["id"]; ?>">
                                        <select class="SelectPosicio">
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
                            <th class="has-text-centered"><?= $countVots["total"]; ?></th>
                            <th class="has-text-centered"><?= $numEscons["numEscons"]; ?></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <?php include "../src/view/util/script.php"; ?>
        <script src="js/pactometre.js"></script>
    </body>
</html>