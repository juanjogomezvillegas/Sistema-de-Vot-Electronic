<!DOCTYPE html>
<html lang="ca" class="fonsDark">
    <head>
        <?php require "../src/view/util/head.php"; ?>
        <title>Results | <?php echo $titolAplicacio["titol"]; ?></title>
    </head>
    <body class="fonsDark">
        <?php require "../src/view/util/menuadmin.php"; ?>
        <br>
        <div class="is-full mt-6 mb-2">
            <div class="is-flex is-justify-content-center mb-5">
                <a href="index.php?r=resultats" class="button is-danger mr-2">Refresh <i class="fas fa-redo-alt ml-2"></i></a>
                <?php if ($dadesUsuarilogat["rol"] === "Administrator" || $dadesUsuarilogat["rol"] === "Manager") { ?>
                    <a id="botoReiniciarDades" class="button is-danger ml-2 mr-2">Reset <i class="fas fa-redo-alt ml-2"></i></a>
                <?php } ?>
                <a href="index.php?r=pactometre" class="button is-danger ml-2">Pactometer <i class="fas fa-handshake ml-2"></i></a>
            </div>
            <div class="table-container is-flex is-justify-content-center">
                <?php if (count($candidats) > 0) { ?>
                <table class="table is-narrow is-bordered is-striped is-hoverable">
                    <thead class="has-background-white-ter">
                        <tr>
                            <th>Icon</th>
                            <th>Candidate</th>
                            <th>Ideology or Party</th>
                            <th>Campaign</th>
                            <th>Votes</th>
                            <th>Seats</th>
                        </tr>
                    </thead>
                    <tbody id="tablaResultats">
                        <?php foreach ($candidats as $actual) { ?>
                            <tr>
                                <td style="background-color: <?php echo $actual["color"]; ?>;" class="has-text-centered"><img class="icon" src="<?php echo $actual["icona"]; ?>" alt="icona"></td>
                                <td><?php echo $actual["nom"]; ?></td>
                                <td><?php echo $actual["ideologia"]; ?></td>
                                <td><?php echo $actual["lema_campanya"]; ?></td>
                                <td class="has-text-centered"><?php echo $actual["vots"]; ?></td>
                                <td class="has-text-centered"><?php echo $actual["escons"]; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot class="has-background-white-ter">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="has-text-centered"><?php echo $countVots["total"]; ?></th>
                            <th class="has-text-centered"><?php echo $numEscons["numEscons"]; ?></th>
                        </tr>
                    </tfoot>
                </table>
                <?php } else { ?>
                    <div id="app">
                        <missatge-info tittle="Results are not available at this time"></missatge-info>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php require "../src/view/util/script.php"; ?>
        <script src="js/resultats.js"></script>
    </body>

    <!-- Modal de Confirmació -->
    <div id="modalReiniciarDades" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="index.php?r=doReiniciaResultat" method="POST">
                <header class="modal-card-head">
                    <p class="modal-card-title"><i class="fas fa-exclamation-circle mr-2"></i> Warning!</p>
                    <a id="btnCloseModal" class="delete" aria-label="close"></a>
                </header>
                <section id="cosFormEsborrarUsuari" class="modal-card-body">
                    Are you sure you want to continue?
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button type="submit" class="button is-danger">Confirm</button>
                    <a class="button is-light" id="btnCancelaModal">Cancel</a>
                </footer>
            </form>
        </div>
    </div>
</html>