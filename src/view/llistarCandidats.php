<!DOCTYPE html>
<html lang="ca" class="fonsDark">
    <head>
        <?php include "../src/view/util/head.php"; ?>
        <title>Gestió de Candidats | <?= $titolAplicacio["titol"]; ?></title>
    </head>
    <body class="fonsDark">
        <?php include "../src/view/util/menuadmin.php"; ?>
        <br>
        <div class="is-full mt-6 mb-2">
            <div class="is-flex is-justify-content-center mb-5">
                <button id="botoCrearCandidat" class="button is-danger">Crear Candidat <i class="fas fa-folder-plus ml-2"></i></button>
            </div>
            <div class="table-container is-flex is-justify-content-center">
                <table class="table">
                    <thead class="has-background-white-ter">
                        <tr>
                            <th>Icona</th>
                            <th>Nom i Cognoms</th>
                            <th>Lema de Campanya</th>
                            <th>Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($candidats as $actual) { ?>
                            <tr>
                                <td><img class="icon" src="<?= $actual["icona"]; ?>" alt="icona"></td>
                                <td><?= $actual["nom"]; ?></td>
                                <td><?= $actual["lema_campanya"]; ?></td>
                                <td>
                                    <a class="has-text-link">
                                        <input type="hidden" name="idCandidat1" value="<?= $actual["id"]; ?>">
                                        <i class="fas fa-edit editaCandidat"></i></a>
                                    <a class="has-text-danger">
                                        <input type="hidden" name="idCandidat2" value="<?= $actual["id"]; ?>">
                                        <i class="fas fa-trash-alt esborrarCandidat"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php include "../src/view/util/script.php"; ?>
        <script src="js/llestarCandidat.js"></script>
    </body>

    <!-- Modal de Crear -->
    <div id="modalCrearCandidat" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="index.php?r=docrearcandidat" method="POST">
                <header class="modal-card-head">
                    <p class="modal-card-title"><i class="fas fa-user-plus mr-2"></i> Crear un Candidat Nou</p>
                    <a id="btnCloseModal1" class="delete" aria-label="close"></a>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Nom i Cognoms</label>
                        <div class="control">
                            <input id="nomCandidat" name="nomCandidat" class="input" type="text" placeholder="Nom i Cognoms">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Lema de Campanya</label>
                        <div class="control">
                            <input id="lemaCampanya" name="lemaCampanya" class="input" type="text" placeholder="Lema de Campanya">
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button type="submit" class="button is-info">Crear Candidat <i class="fas fa-folder-plus ml-2"></i></button>
                    <a class="button is-light" id="btnCancelaModal1">Cancel·la</a>
                </footer>
            </form>
        </div>
    </div>

    <!-- Modal de Modificar -->
    <div id="modalEditarCandidat" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="index.php?r=doactualitzarcandidat" method="POST">
                <header class="modal-card-head">
                    <p id="headerModalEditaCandidat" class="modal-card-title"><i class="fas fa-user-edit mr-2"></i> Candidat</p>
                    <a id="btnCloseModal2" class="delete" aria-label="close"></a>
                </header>
                <section id="cosFormEditaCandidat" class="modal-card-body">
                    <div class="field">
                        <label class="label">Nom i Cognoms</label>
                        <div class="control">
                            <input id="nomCandidat" name="nomCandidat" class="input" type="text" placeholder="Nom i Cognoms">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Lema de Campanya</label>
                        <div class="control">
                            <input id="lemaCampanya" name="lemaCampanya" class="input" type="text" placeholder="Lema de Campanya">
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button type="submit" class="button is-info">Desar els Canvis <i class="fas fa-save ml-2"></i></button>
                    <a class="button is-light" id="btnCancelaModal2">Cancel·la</a>
                </footer>
            </form>
        </div>
    </div>

    <!-- Modal de Esborrar -->
    <div id="modalEsborrarCandidat" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="index.php?r=doactualitzarcandidat" method="POST">
                <header class="modal-card-head">
                    <p id="headerModalEsborrarCandidat" class="modal-card-title"><i class="fas fa-exclamation-circle mr-2"></i> Candidat</p>
                    <a id="btnCloseModal3" class="delete" aria-label="close"></a>
                </header>
                <section id="cosFormEsborrarCandidat" class="modal-card-body">
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button type="submit" class="button is-info">Esborrar Candidat <i class="fas fa-trash-alt ml-2"></i></button>
                    <a class="button is-light" id="btnCancelaModal3">Cancel·la</a>
                </footer>
            </form>
        </div>
    </div>
</html>