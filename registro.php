<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Estilos -->
    <?php include_once("stylesheets.php")?>
    <title>Registro</title>
  </head>
  <!-- Comienzo del formulario -->
  <body>
      <div class="main-container-registro  flex-column container">
        <header class="main-header">
          <nav class="navbar navbar-dark main-navbar navbar-expand-md">
            <a class="navbar-brand" href="home.html">
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
                    <ion-icon name="logo-twitter" size="large"></ion-icon>
                  </li>
                  <li>
                    <ion-icon name="logo-instagram" size="large"></ion-icon>
                  </li>
                  <li>
                    <ion-icon name="logo-facebook" size="large"></ion-icon>
                  </li>
                </ul>
              </span>
          </div>
              <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown nav-cuenta">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Cuenta
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="login.html">Login</a>
                  <a class="dropdown-item" href="registro.html">Registro</a>
                </div>
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
        <div class="container form-container">
            <form action="action_page.php">
              <div class="flex-container">
              <h1>Alta de usuario</h1>
              <p>Complete con sus datos para crear un usuario</p>
              <hr>
              <div class="form-group">
                <label for="nombre"><b>Nombre</b></label>
                <input class="form-control" type="text" placeholder="Ingrese su nombre" name="nombre" required>
              </div>

              <div class="form-grup">
              <label for="apellido"><b>Apellido</b></label>
              <input class="form-control" type="text" placeholder="Ingrese su apellido" name="apellido" required>
              </div>

              <div class="form-group">
                <label for="email"><b>Email</b></label>
                <input class="form-control" type="text" placeholder="Ingrese su email" name="email" required>
              </div>

              <div class="form-group">
                <label for="psw"><b>Password</b></label>
                <input class="form-control" type="password" placeholder="Ingrese su password" name="psw" required>
              </div>

              <div class="form-group">
                <label for="psw-repetir"><b>Repetir Password</b></label>
                <input class="form-control" type="password" placeholder="Repita su password" name="psw-repeat" required>
              </div>
              <hr>
              <p>Al ingresar sus datos usted acepta nuestros <a href="#">Términos y condiciones de privacidad</a>.</p>
              <button type="submit" class="registrobtn">Crear Cuenta</button>
            </div>

            <div class="container signin">
              <p class="ya-tiene-cuenta">Ya tiene una cuenta? <a href="#">Login</a>.</p>
            </div>
          </form>
        </div>
        <?php include_once("footer.php") ?>
      </div>

  </body>
</html>
