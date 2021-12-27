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
                                    <a class="has-text-link" href="index.php?r=editarUsuari&id=<?= $actual["id"] ?>"><i class="fas fa-edit"></i></a>
                                    <a class="has-text-danger" href="index.php?r=esborrarUsuari&id=<?= $actual["id"] ?>"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php include "../src/view/util/script.php"; ?>
        <script src="js/llistarUsuaris.js"></script>
    </body>

    <div id="modalCrearUsuari" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="index.php?r=docrearusuari" method="POST">
                <header class="modal-card-head">
                    <p class="modal-card-title"><i class="fas fa-user-plus mr-2"></i> Crear un Usuari Nou</p>
                    <a id="btnCloseModal" class="delete" aria-label="close"></a>
                </header>
                <section class="modal-card-body">
                    <div class="control">
                        <input id="username" name="username" class="input" type="text" placeholder="Nom d'Usuari">
                    </div>
                    <div class="select">
                        <select id="rol" name="rolUsuari" placeholder="Rol d'Usuari">
                            <?php foreach ($rols as $actual) { ?>
                                <option value="<?= $actual ?>"><?= $actual ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button type="submit" class="button is-link">Crear Usuari <i class="fas fa-folder-plus ml-2"></i></button>
                    <a class="button is-danger" id="btnCancelaModal">Cancel·la</a>
                </footer>
            </form>
        </div>
    </div>
</html>