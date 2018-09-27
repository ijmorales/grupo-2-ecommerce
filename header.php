<?php
require_once("funciones.php");
$usuario = "";
if(estaLogueado()){
  $usuario = traerUsuarioLogueado();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <header class="main-header">
      <nav class="navbar navbar-dark main-navbar navbar-expand-md">
        <a class="navbar-brand" href="home.php">
          <img src="img/logo.png" alt="" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

          <!-- Contenido que en mobile se colapsa. -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="links-utiles">
          <span class="links-extra">
            <ul>
              <li>
                <a href="#">Quienes somos</a>
              </li>
              <li>
                <p>|</p>
              </li>
              <li>
                <a href="#">Servicio Tecnico</a>
              </li>
              <li>
                <p>|</p>
              </li>
              <li>
                <a href="#">Monitoreo</a>
              </li>
            </ul>
          </span>
          <span class="llamenos">
            <p>Llamenos 0800-888-6666</p>
          </span>
          <span class="header-rrss">
            <ul>
              <li>
                <a href="https://twitter.com/"><ion-icon name="logo-twitter" size="large"></ion-icon></a>
              </li>
              <li>
                <a href="https://instagram.com/"><ion-icon name="logo-instagram" size="large"></ion-icon></a>
              </li>
              <li>
                <a href="https://facebook.com/"><ion-icon name="logo-facebook" size="large"></ion-icon></a>
              </li>
            </ul>
          </span>
      </div>
          <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown nav-cuenta">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Cuenta
            </a>
            <?php if($usuario): ?>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="mi-cuenta.php">Mi Cuenta</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            <?php else: ?>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="login.php">Login</a>
                <a class="dropdown-item" href="registro.php">Registro</a>
              </div>
            <?php endif; ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Kits alarmas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Camaras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Anti incendios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Accesorios</a>
          </li>
      </ul>
        </div>
      </nav>
    </header>
  </body>
</html>
