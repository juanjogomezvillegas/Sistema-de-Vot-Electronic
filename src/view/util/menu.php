<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php">
      <img class="image logoNavbar" src="<?php echo $logoAplicacio["logo"]; ?>">
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
        <a class="navbar-item" href="index.php?r=admin">
          <span class="icon mr-1"><i class="fas fa-tachometer-alt"></i></span> Panell d'Administració 
        </a>
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
              <figure class="image">
                <img class="is-rounded ml-2" src="<?php echo $dadesUsuarilogat["icona"]; ?>" alt="icona">
              </figure>
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