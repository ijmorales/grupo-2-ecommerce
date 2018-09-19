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
        <?php include_once("header.php") ?>
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
