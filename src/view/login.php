<!DOCTYPE html>
<html lang="ca">
    <head>
        <?php include "../src/view/util/head.php"; ?>
        <title>Inicia Sessió | <?= $titolAplicacio["titol"]; ?></title>
    </head>
    <body>
        <section class="hero is-link is-fullheight">
            <div class="hero-body">
                <div class="container">
                <div class="columns is-centered">
                    <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                    <form action="index.php?r=dologin" method="POST" class="box formlogin">
                        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                        <div class="field">
                            <a href="index.php"><img class="image" src="<?= $logoAplicacio["logo"]; ?>" alt="logo"></a>
                        </div>
                        <?php if (isset($error) && $error === "1") { ?>
                            <div id="app">
                                <missatge-error tittle="Usuari o Contrasenya Incorrectes"></missatge-error>
                            </div>
                        <?php } else if (isset($error) && $error === "2") { ?>
                            <div id="app">
                                <missatge-error tittle="Hi ha hagut algun error"></missatge-error>
                            </div>
                        <?php } else if (isset($error) && $error === "3") { ?>
                            <div id="app">
                                <missatge-error tittle="Accés Denegat"></missatge-error>
                            </div>
                        <?php } ?>
                        <div class="field">
                        <label for="inputUsername" class="label">Usuari</label>
                        <div class="control has-icons-left">
                            <input type="text" id="inputUsername" name="inputUsername" placeholder="Nom d'Usuari" class="input" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                            </span>
                        </div>
                        </div>
                        <div class="field">
                        <label for="inputPassword" class="label">Contrasenya</label>
                        <div class="control has-icons-left">
                            <input type="password" id="inputPassword" name="inputPassword" placeholder="Contrasenya" class="input" required>
                            <span class="icon is-small is-left">
                            <i class="fas fa-key"></i>
                            </span>
                        </div>
                        </div>
                        <div class="field">
                        <button class="button is-link is-large is-fullwidth">
                            Inicia Sessió
                        </button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <?php include "../src/view/util/script.php"; ?>
        <script src='https://www.google.com/recaptcha/api.js?render=6LdYiNAdAAAAAIV1eoknbB6PrfaRSpQXIdRT4uDv'></script>
        <script src="js/recaptcha.js"></script>
    </body>
</html>