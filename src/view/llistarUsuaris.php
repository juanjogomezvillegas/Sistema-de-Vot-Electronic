<!DOCTYPE html>
<html lang="ca" class="fonsDark">
    <head>
        <?php include "../src/view/util/head.php"; ?>
        <title>Sistema de Vot Electronic</title>
    </head>
    <body class="fonsDark">
        <?php include "../src/view/util/menuadmin.php"; ?>
        <br>
        <div class="is-full mt-6 mb-2">
            <div class="is-flex is-justify-content-center mb-5">
                <a href="index.php?r=crearUsuari" class="button is-danger">Crear Usuari <i class="fas fa-folder-plus ml-2"></i></a>
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
    </body>
</html>