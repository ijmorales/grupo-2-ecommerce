<?php
  require_once("./funciones.php");
  if($_POST){

    if(isset($_POST["remember-me"]) == "on"){
      cookieEmail();
    }


    $errores = verificarLogin($_POST);
    echo "<pre>";
    var_dump($_POST);exit;
    if(empty($errores)){
      loguear($_POST["email"]);
      header("Location:home.php");exit;
    }
  }
?>

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
                  <label for="email" class="text-info">Email:</label><br>
                  <?php if(isset($errores["email"])): ?>
                    <input type="email" name="email" id="email" class="form-control is-invalid">
                    <div class="invalid-feedback">
                      <?=$errores["email"]?>
                    </div>
                  <?php else: ?>
                    <input type="email" name="email" id="email" class="form-control">
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <label for="psw" class="text-info">Contraseña:</label><br>
                  <?php if(isset($errores["psw"])): ?>
                    <input type="password" name="psw" id="psw" class="form-control is-invalid">
                    <div class="invalid-feedback">
                      <?=$errores["psw"]?>
                    </div>
                  <?php else:?>
                    <input type="password" name="psw" id="psw" class="form-control">
                  <?php endif; ?>
                </div>
                <?php if(isset($errores["general"])): ?>
                <div class="row alert alert-danger" role="alert">
                  <?=$errores["general"]?>
                </div>
                <?php endif; ?>
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
