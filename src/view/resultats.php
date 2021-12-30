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
                <?php if ($dadesUsuarilogat["rol"] === "Administrator" || $dadesUsuarilogat["rol"] === "Manager") { ?>
                    <a id="botoReiniciarDades" class="button is-danger ml-2 mr-2">Reiniciar Dades <i class="fas fa-redo-alt ml-2"></i></a>
                <?php } ?>
                <a href="index.php?r=pactometre" class="button is-danger ml-2">Pactometre <i class="fas fa-handshake ml-2"></i></a>
            </div>
            <div class="table-container is-flex is-justify-content-center">
                <?php if (count($candidats) > 0) { ?>
                <table class="table is-narrow is-bordered is-striped is-hoverable">
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
                                <td class="has-text-centered"><img class="icon" src="<?= $actual["icona"]; ?>" alt="icona"></td>
                                <td><?= $actual["nom"]; ?></td>
                                <td><?= $actual["lema_campanya"]; ?></td>
                                <td class="has-text-centered"><?= $actual["vots"]; ?></td>
                                <td class="has-text-centered"><?= $actual["escons"]; ?></td>
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
                        </tr>
                    </tfoot>
                </table>
                <?php } else { ?>
                    <div id="app">
                        <missatge-info tittle="Els Resultats no estàn disponibles en Aquest Moment"></missatge-info>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php include "../src/view/util/script.php"; ?>
        <script src="js/resultats.js"></script>
    </body>

    <!-- Modal de Confirmació -->
    <div id="modalReiniciarDades" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="index.php?r=doReiniciaResultat" method="POST">
                <header class="modal-card-head">
                    <p class="modal-card-title"><i class="fas fa-exclamation-circle mr-2"></i> Estàs Segur que vols Continuar?</p>
                    <a id="btnCloseModal" class="delete" aria-label="close"></a>
                </header>
                <section id="cosFormEsborrarUsuari" class="modal-card-body">
                    Si continues eliminares tots els vots emesos fins ara.
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button type="submit" class="button is-danger">Acceptar</button>
                    <a class="button is-light" id="btnCancelaModal">Cancel·lar</a>
                </footer>
            </form>
        </div>
    </div>
</html>