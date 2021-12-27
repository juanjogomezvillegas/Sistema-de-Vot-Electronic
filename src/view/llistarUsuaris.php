<!DOCTYPE html>
<html lang="ca" class="fonsDark">
    <head>
        <?php include "../src/view/util/head.php"; ?>
        <title>Gestió d'Usuaris | <?= $titolAplicacio["titol"]; ?></title>
    </head>
    <body class="fonsDark">
        <?php include "../src/view/util/menuadmin.php"; ?>
        <br>
        <div class="is-full mt-6 mb-2">
            <div class="is-flex is-justify-content-center mb-5">
                <button id="botoCrearUsuari" class="button is-danger">Crear Usuari <i class="fas fa-folder-plus ml-2"></i></button>
            </div>
            <div class="table-container is-flex is-justify-content-center">
                <table class="table">
                    <thead class="has-background-white-ter">
                        <tr>
                            <th>Icona</th>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Rol</th>
                            <th>Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuaris as $actual) { ?>
                            <tr>
                                <td><img class="icon" src="<?= $actual["icona"]; ?>" alt="icona"></td>
                                <td><?= $actual["id"]; ?></td>
                                <td><?= $actual["username"]; ?></td>
                                <td><?= $actual["rol"]; ?></td>
                                <td>
                                    <a class="has-text-link">
                                        <input type="hidden" name="usernameUsuari" value="<?= $actual["username"]; ?>">
                                        <i class="fas fa-edit editaUsuari"></i></a>
                                    <a class="has-text-danger" href="index.php?r=esborrarUsuari&id=<?= $actual["id"] ?>"><i class="fas fa-trash-alt"></i></a>
                                </td>
                                <!-- href="index.php?r=editarUsuari&id=" -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php include "../src/view/util/script.php"; ?>
        <script src="js/llistarUsuaris.js"></script>
    </body>

    <!-- Modal de Crear -->
    <div id="modalCrearUsuari" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="index.php?r=docrearusuari" method="POST">
                <header class="modal-card-head">
                    <p class="modal-card-title"><i class="fas fa-user-plus mr-2"></i> Crear un Usuari Nou</p>
                    <a id="btnCloseModal" class="delete" aria-label="close"></a>
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
                                        <option value="<?= $actual ?>"><?= $actual ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button type="submit" class="button is-info">Crear Usuari <i class="fas fa-folder-plus ml-2"></i></button>
                    <a class="button is-light" id="btnCancelaModal">Cancel·la</a>
                </footer>
            </form>
        </div>
    </div>

    <!-- Modal de Modificar -->
    <div id="modalEditaUsuari" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="index.php?r=docrearusuari" method="POST">
                <header class="modal-card-head">
                    <p class="modal-card-title"><i class="fas fa-user-edit mr-2"></i> Actualitzar un Usuari</p>
                    <a id="btnCloseModal" class="delete" aria-label="close"></a>
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
                                        <option value="<?= $actual ?>"><?= $actual ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button type="submit" class="button is-info">Aplicar els Canvis <i class="fas fa-save ml-2"></i></button>
                    <a class="button is-light" id="btnCancelaModal">Cancel·la</a>
                </footer>
            </form>
        </div>
    </div>
</html>