<!DOCTYPE html>
<html lang="ca" class="fonsDark">
    <head>
        <?php require "../src/view/util/head.php"; ?>
        <title>Pactometer | <?php echo $titolAplicacio["titol"]; ?></title>
    </head>
    <body class="fonsDark">
        <?php require "../src/view/util/menuadmin.php"; ?>
        <div class="is-full mt-5 mb-1 mr-6 ml-6">
            <nav class="level">
                <div class="level-item has-text-centered">
                    <div>
                    <p class="heading is-size-4 has-text-success">Yes</p>
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
                    <p class="heading is-size-4 has-text-light">Abstention</p>
                    <p id="numVotsAbstencio" class="title is-2 has-text-light">0</p>
                    </div>
                </div>
            </nav>
            <br>
            <?php if ($countVots["total"] > 0) { ?>
            <div class="is-flex is-justify-content-center">
                <table class="table is-narrow is-bordered is-striped is-hoverable is-centered">
                    <thead class="has-background-white-ter">
                        <tr>
                            <th>Icon</th>
                            <th>Candidate</th>
                            <th>Ideology or Party</th>
                            <th>Seats</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tablaResultats">
                        <?php foreach ($candidats as $actual) { ?>
                            <?php if ($actual["escons"] > 0) { ?>
                            <tr>
                                <td style="background-color: <?php echo $actual["color"]; ?>;" class="has-text-centered"><img class="icon" src="<?php echo $actual["icona"]; ?>" alt="icona"></td>
                                <td><?php echo $actual["nom"]; ?></td>
                                <td class="has-text-centered"><?php echo $actual["ideologia"]; ?></td>
                                <td class="has-text-centered"><?php echo $actual["escons"]; ?></td>
                                <td>
                                    <div class="select is-rounded">
                                        <input type="hidden" name="idCandidat" value="<?php echo $actual["id"]; ?>">
                                        <?php if ($actual["posicio"] === "yes") { ?>
                                            <select class="SelectPosicio">
                                                <option value="yes" selected>Yes</option>
                                                <option value="no">No</option>
                                                <option value="abstention">Abstention</option>
                                            </select>
                                        <?php } else if ($actual["posicio"] === "no") { ?>
                                            <select class="SelectPosicio">
                                                <option value="yes">Yes</option>
                                                <option value="no" selected>No</option>
                                                <option value="abstention">Abstention</option>
                                            </select>
                                        <?php } else if ($actual["posicio"] === "abstention") { ?>
                                            <select class="SelectPosicio">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                                <option value="abstention" selected>Abstention</option>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="chart-container" style="width: 75%;">
                <canvas id="chart"></canvas>
            </div>
            <?php } else { ?>
                <div id="app">
                    <missatge-info tittle="The Pactometer is currently unavailable"></missatge-info>
                </div>
            <?php } ?>
        </div>
        <?php require "../src/view/util/script.php"; ?>
        <script src="js/pactometre.js"></script>
    </body>
</html>