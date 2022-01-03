<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php?r=admin">
      <img class="image logoNavbar is-rounded" src="<?php echo $logoAplicacio["logo"]; ?>">
    </a>

    <a id="btnNavbarBasicExample" role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <?php if ($logat) { ?>
        <a class="navbar-item" href="index.php">
            <span class="icon mr-1"><i class="fas fa-globe"></i></span> Web
        </a>
        <a class="navbar-item" href="index.php?r=resultats">
            <span class="icon mr-1"><i class="fas fa-poll"></i></span> Resultats
        </a>
        <a class="navbar-item" href="index.php?r=pactometre">
            <span class="icon mr-1"><i class="fas fa-handshake"></i></span> Pactometre
        </a>
            <?php if ($dadesUsuarilogat["rol"] === "Administrator") { ?>
        <a class="navbar-item" href="index.php?r=llistarUsuaris">
            <span class="icon mr-1"><i class="fas fa-users"></i></span> Gestió d'Usuaris
        </a>
            <?php } ?>
            <?php if ($dadesUsuarilogat["rol"] === "Administrator" || $dadesUsuarilogat["rol"] === "Manager") { ?>
        <a class="navbar-item" href="index.php?r=llistarCandidats">
            <span class="icon mr-1"><i class="fas fa-person-booth"></i></span> Gestió de Candidats
        </a>
            <?php } ?>
      <?php } ?>
    </div>

    <div class="navbar-end">
        <?php if (!$logat) { ?>
            <a class="navbar-item" href="index.php?r=login">
                <span class="icon mr-1"><i class="fas fa-sign-in-alt"></i></span> Inicia Sessió
            </a>
        <?php } else { ?>
            <?php if ($dadesUsuarilogat["rol"] === "Administrator") { ?>
          <a class="navbar-item" href="index.php?r=configuracio">
              <span class="icon"><i class="fas fa-cog"></i></span>
          </a>
            <?php } ?>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              <?php echo $dadesUsuarilogat["username"]; ?>
              <img class="image is-rounded ml-2" src="<?php echo $dadesUsuarilogat["icona"]; ?>" alt="icona">
            </a>

            <div class="navbar-dropdown is-right">
              <a class="navbar-item" href="index.php?r=elMeuPerfil">
                <span class="icon mr-1"><i class="fas fa-user"></i></span> El Meu Perfil
              </a>
              </a>
              <hr class="navbar-divider">
              <a class="navbar-item" href="index.php?r=logout">
                <span class="icon mr-1"><i class="fas fa-sign-out-alt"></i></span> Tanca Sessió
              </a>
            </div>
          </div>
        <?php } ?>
    </div>

    </div>
  </div>
</nav>