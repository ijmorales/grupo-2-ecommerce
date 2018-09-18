<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Estilos -->
    <?php include_once("stylesheets.php") ?>

    <title>Login</title>
  </head>
  <body>
    <div class="main-container-login container flex-column justify-content-between">
      <?php include_once("header.php") ?>
      <div id="login">
        <h2 class="text-center text-black pt-5">Iniciar sesion</h3>
        <div id="login-row" class="row justify-content-center align-items-center">
          <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12">
              <form id="login-form" class="form" action="" method="post">
                <div class="form-group">
                  <label for="username" class="text-info">Nombre de usuario:</label><br>
                  <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                  <label for="password" class="text-info">Contraseña:</label><br>
                  <input type="text" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                  <label for="remember-me" class="text-info"><span>Recordarme</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                  <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                </div>
                <div id="register-link" class="text-right">
                  <a href="#" class="text-info">Registro</a>
                </form>
                <div class="forget">
                  <a class="#"href="#">Olvidó su contraseña?</a>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
        <?php include_once("footer.php") ?>
    </div>
  </body>
</html>
