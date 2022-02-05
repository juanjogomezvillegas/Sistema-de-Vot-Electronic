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
            <div class="mb-5 is-flex is-justify-content-center">
                <?php if (isset($error) && $error === "1") { ?>
                    <div id="app">
                        <missatge-error tittle="There is an empty field"></missatge-error>
                    </div>
                <?php } ?>
            </div>
            <div class="is-flex is-justify-content-center mb-5">
                <?php if ($dadesUsuarilogat["rol"] === "Administrator" || $dadesUsuarilogat["rol"] === "Manager") { ?>
                    <button id="botoCrearEvent" class="button is-danger">Add Event <i class="fas fa-folder-plus ml-2"></i></button>
                    <button id="botoReiniciarDades" class="button is-danger ml-2 mr-2">Reset <i class="fas fa-redo-alt ml-2"></i></button>
                <?php } ?>
            </div>
            <div class="table-container is-flex is-justify-content-center">
                <table class="table is-narrow is-bordered is-striped is-hoverable">
                    <thead class="has-background-white-ter">
                        <tr>
                            <th>Date</th>
                            <th>Event</th>
                            <th>Government</th>
                            <?php if ($dadesUsuarilogat["rol"] === "Administrator" || $dadesUsuarilogat["rol"] === "Manager") { ?>
                                <th>Actions</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($llistatEvents as $actual) { ?>
                            <tr>
                                <td style="background-color: <?php echo $actual["color"]; ?>;"><?php echo $actual["data_event"]; ?></td>
                                <td style="background-color: <?php echo $actual["color"]; ?>;"><?php echo $actual["nom_event"]; ?></td>
                                <td style="background-color: <?php echo $actual["color"]; ?>;"><?php echo $actual["govern"]; ?></td>
                                <?php if ($dadesUsuarilogat["rol"] === "Administrator" || $dadesUsuarilogat["rol"] === "Manager") { ?>
                                    <td>
                                    <a class="has-text-link">
                                            <input type="hidden" name="idEvent" value="<?php echo $actual["id"]; ?>">
                                            <i class="fas fa-edit editarEvent"></i></a>
                                        <a class="has-text-danger">
                                            <input type="hidden" name="idEvent" value="<?php echo $actual["id"]; ?>">
                                            <i class="fas fa-trash-alt esborrarEvent"></i></a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php require "../src/view/util/script.php"; ?>
        <script src="js/historia.js"></script>
    </body>

    <!-- Modal de Crear Event -->
    <div id="modalCrearEvent" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="index.php?r=doCrearEvent" method="POST">
                <header class="modal-card-head">
                    <p class="modal-card-title"><i class="fas fa-file-medical mr-2"></i> Create a New Event</p>
                    <a id="btnCloseModal2" class="delete" aria-label="close"></a>
                </header>
                <section id="cosFormCrearEvent" class="modal-card-body">
                    <div class="field">
                        <label class="label">Event Date</label>
                        <div class="control">
                            <input id="dateEvent" name="dateEvent" class="input" type="date" value="<?php echo $datetime[0]; ?>">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Event Time</label>
                        <div class="control">
                            <input id="timeEvent" name="timeEvent" class="input" type="time" value="<?php echo $datetime[1]; ?>">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Event</label>
                        <div class="control">
                            <textarea class="textarea" name="nomEvent" placeholder="Event"><?php echo $ultimEvent["nom_event"]; ?></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Government</label>
                        <div class="control">
                            <input id="governEvent" name="governEvent" class="input" type="text" value="<?php echo $ultimEvent["govern"]; ?>">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Color</label>
                        <div class="control">
                            <input id="colorEvent" name="colorEvent" class="input" type="color" value="<?php echo $ultimEvent["color"]; ?>">
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button type="submit" class="button is-info">Create Event <i class="fas fa-folder-plus ml-2"></i></button>
                    <a class="button is-light" id="btnCancelaModal2">Cancel</a>
                </footer>
            </form>
        </div>
    </div>

    <!-- Modal de Esborrar Event -->
    <div id="modalEditarEvent" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="index.php?r=doEditarEvent" method="POST">
                <header class="modal-card-head">
                    <p id="titolEvent4" class="modal-card-title"><i class="fas fa-exclamation-circle mr-2"></i>Edit Event</p>
                    <a id="btnCloseModal4" class="delete" aria-label="close"></a>
                </header>
                <section id="cosFormEditarEvent" class="modal-card-body">
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button type="submit" class="button is-info">Save Changes</button>
                    <a class="button is-light" id="btnCancelaModal4">Cancel</a>
                </footer>
            </form>
        </div>
    </div>

    <!-- Modal de Esborrar Event -->
    <div id="modalEsborrarEvent" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="index.php?r=doEsborrarEvent" method="POST">
                <header class="modal-card-head">
                    <p class="modal-card-title"><i class="fas fa-exclamation-circle mr-2"></i> Warning!</p>
                    <a id="btnCloseModal3" class="delete" aria-label="close"></a>
                </header>
                <section id="cosFormEsborrarEvent" class="modal-card-body">
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button type="submit" class="button is-danger">Confirm</button>
                    <a class="button is-light" id="btnCancelaModal3">Cancel</a>
                </footer>
            </form>
        </div>
    </div>

    <!-- Modal de Confirmació -->
    <div id="modalReiniciarDades" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="index.php?r=doReiniciaHistoria" method="POST">
                <header class="modal-card-head">
                    <p class="modal-card-title"><i class="fas fa-exclamation-circle mr-2"></i> Warning!</p>
                    <a id="btnCloseModal" class="delete" aria-label="close"></a>
                </header>
                <section id="cosFormEsborrarEventAll" class="modal-card-body">
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