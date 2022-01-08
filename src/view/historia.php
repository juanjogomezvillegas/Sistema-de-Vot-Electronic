<!DOCTYPE html>
<html lang="ca" class="fonsDark">
    <head>
        <?php require "../src/view/util/head.php"; ?>
        <title>History | <?php echo $titolAplicacio["titol"]; ?></title>
    </head>
    <body class="fonsDark">
        <?php require "../src/view/util/menuadmin.php"; ?>
        <br>
        <div class="is-full mt-6 mb-2">
            <div class="is-flex is-justify-content-center mb-5">
                <?php if ($dadesUsuarilogat["rol"] === "Administrator" || $dadesUsuarilogat["rol"] === "Manager") { ?>
                    <button id="botoCrearEvent" class="button is-danger">Add Event <i class="fas fa-folder-plus ml-2"></i></button>
                    <button id="botoReiniciarDades" class="button is-danger ml-2 mr-2">Reset <i class="fas fa-redo-alt ml-2"></i></button>
                <?php } ?>
            </div>
            <div class="table-container is-flex is-justify-content-center">
                <table class="table is-narrow is-bordered is-striped is-hoverable">
                    <tbody>
                        <?php foreach ($llistatEvents as $actual) { ?>
                            <tr>
                                <td><?php echo $actual["data_event"]; ?></td>
                                <td><?php echo $actual["nom_event"]; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php require "../src/view/util/script.php"; ?>
        <script src="js/historia.js"></script>
    </body>

    <!-- Modal de Confirmació -->
    <div id="modalReiniciarDades" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="index.php?r=doReiniciaHistoria" method="POST">
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