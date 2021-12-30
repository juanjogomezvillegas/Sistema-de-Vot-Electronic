<!DOCTYPE html>
<html lang="ca" class="fonsDark">
    <head>
        <?php require "../src/view/util/head.php"; ?>
        <title>Gestió d'Usuaris | <?php echo $titolAplicacio["titol"]; ?></title>
    </head>
    <body class="fonsDark">
        <?php require "../src/view/util/menuadmin.php"; ?>
        <br>
        <div class="is-full mt-6 mb-2">
            <div class="mb-5 is-flex is-justify-content-center">
                <?php if (isset($errorCrear) && $errorCrear === "1") { ?>
                    <div id="app">
                        <missatge-error tittle="La Contrasenya no s'ha verificat correctament"></missatge-error>
                    </div>
                <?php } elseif ((isset($errorCrear) && $errorCrear === "2") || (isset($errorEditar) && $errorEditar === "1")) { ?>
                    <div id="app">
                        <missatge-error tittle="Hi ha algun camp buit"></missatge-error>
                    </div>
                <?php } elseif (isset($infoCrea) && $infoCrea === "1") { ?>
                    <div id="app">
                        <missatge-info tittle="L'Usuari s'ha creat correctament"></missatge-info>
                    </div>
                <?php } elseif (isset($infoEdita) && $infoEdita === "1") { ?>
                    <div id="app">
                        <missatge-info tittle="L'Usuari s'ha actualitzat correctament"></missatge-info>
                    </div>
                <?php } elseif (isset($infoEsborrar) && $infoEsborrar === "1") { ?>
                    <div id="app">
                        <missatge-info tittle="L'Usuari s'ha esborrat correctament"></missatge-info>
                    </div>
                <?php } ?>
            </div>
            <div class="is-flex is-justify-content-center mb-5">
                <button id="botoCrearUsuari" class="button is-danger">Crear Usuari <i class="fas fa-folder-plus ml-2"></i></button>
            </div>
            <div class="table-container is-flex is-justify-content-center">
                <table class="table is-narrow is-bordered is-striped is-hoverable">
                    <thead class="has-background-white-ter">
                        <tr>
                            <th>Icona</th>
                            <th>Username</th>
                            <th>Rol</th>
                            <th>Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuaris as $actual) { ?>
                            <tr>
                                <td class="has-text-centered"><img class="icon" src="<?php echo $actual["icona"]; ?>" alt="icona"></td>
                                <td><?php echo $actual["username"]; ?></td>
                                <td><?php echo $actual["rol"]; ?></td>
                                <td>
                                    <a class="has-text-link">
                                        <input type="hidden" name="usernameUsuari" value="<?php echo $actual["username"]; ?>">
                                        <i class="fas fa-edit editaUsuari"></i></a>
                                    <a class="has-text-danger">
                                        <input type="hidden" name="idUsuari" value="<?php echo $actual["id"]; ?>">
                                        <i class="fas fa-trash-alt borrarUsuari"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php require "../src/view/util/script.php"; ?>
        <script src="js/llistarUsuaris.js"></script>
    </body>

    <!-- Modal de Crear -->
    <div id="modalCrearUsuari" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="index.php?r=docrearusuari" method="POST">
                <header class="modal-card-head">
                    <p class="modal-card-title"><i class="fas fa-user-plus mr-2"></i> Crear un Usuari Nou</p>
                    <a id="btnCloseModal1" class="delete" aria-label="close"></a>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Nom d'Usuari</label>
                        <div class="control">
                            <input id="username" name="username" class="input" type="text" placeholder="Nom d'Usuari">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Contrasenya</label>
                        <div class="control is-flex">
                            <input id="password1" name="password1" class="input" type="password">
                            <input id="password2" name="password2" class="input" type="password">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Rol de l'Usuari</label>
                        <div class="control">
                            <div class="select">
                                <select id="rol" name="rolUsuari">
                                    <?php foreach ($rols as $actual) { ?>
                                        <option value="<?php echo $actual ?>"><?php echo $actual ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button type="submit" class="button is-info">Crear Usuari <i class="fas fa-folder-plus ml-2"></i></button>
                    <a class="button is-light" id="btnCancelaModal1">Cancel·la</a>
                </footer>
            </form>
        </div>
    </div>

    <!-- Modal de Modificar -->
    <div id="modalEditaUsuari" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="index.php?r=doactualitzarusuari" method="POST">
                <header class="modal-card-head">
                    <p id="headerModalEditaUsuari" class="modal-card-title"><i class="fas fa-exclamation-circle mr-2"></i> Usuari</p>
                    <a id="btnCloseModal2" class="delete" aria-label="close"></a>
                </header>
                <section id="cosFormEditaUsuari" class="modal-card-body">
                    <div class="field">
                        <label class="label">Nom d'Usuari</label>
                        <div class="control">
                            <input id="username" name="username" class="input" type="text" placeholder="Nom d'Usuari">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Rol de l'Usuari</label>
                        <div class="control">
                            <div class="select">
                                <select id="rol" name="rolUsuari">
                                    <?php foreach ($rols as $actual) { ?>
                                        <option value="<?php echo $actual ?>"><?php echo $actual ?></option>
                                    <?php } ?>
                                </select>
                            </div>
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
    <div id="modalBorrarUsuari" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="index.php?r=doesborrarusuari" method="POST">
                <header class="modal-card-head">
                    <p id="headerModalEsborrarUsuari" class="modal-card-title"><i class="fas fa-exclamation-circle mr-2"></i> Usuari</p>
                    <a id="btnCloseModal3" class="delete" aria-label="close"></a>
                </header>
                <section id="cosFormEsborrarUsuari" class="modal-card-body">
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button type="submit" class="button is-danger">Esborrar Usuari <i class="fas fa-trash-alt ml-2"></i></button>
                    <a class="button is-light" id="btnCancelaModal3">Cancel·la</a>
                </footer>
            </form>
        </div>
    </div>
</html>