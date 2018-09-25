<?php
  require_once("funciones.php");
  $camposDefault = [
    "nombre" => "",
    "apellido" => "",
    "email" => "",
    "psw" => "",
    "psw-repeat" => ""
  ];
  $errores = [];
  if($_POST){
    $errores = validar_registracion($_POST, $_FILES);
    if(empty($errores)){
      // var_dump($datosUsuario);exit;
      $usuario = armar_usuario($_POST, $_FILES);
      crear_usuario($usuario);
      header("Location:home.php");exit;
    }else{
      // Chequea que no haya errores para ese campo, y lo agrega al autocompletado.
      // Los campos de contraseña no se autocompletan por seguridad.
      var_dump($errores);
      foreach($_POST as $campo => $valor){
        if($campo != "psw" && $campo != "psw-repeat"){
          if(isset($errores["$campo"]) == false){ // Si NO existe error en esa posicion.
            $camposDefault["$campo"] = $valor;
          }
        }
      }
    }
  }
?>

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
            <form action="registro.php" method="post" enctype="multipart/form-data">
              <div class="flex-container">
              <h1>Alta de usuario</h1>
              <p>Complete con sus datos para crear un usuario</p>
              <hr>
              <div class="form-group">
                <label for="nombre"><b>Nombre</b></label>
                <?php if(isset($errores["nombre"])): ?>
                  <input class="form-control is-invalid" type="text" placeholder="Ingrese su nombre" name="nombre" required>
                  <div class="invalid-feedback">
                    <?=$errores["nombre"]?>
                  </div>
                <?php else: ?>
                  <input class="form-control" type="text" placeholder="Ingrese su nombre" name="nombre" value="<?=$camposDefault["nombre"]?>" required>
                <?php endif; ?>
              </div>

              <div class="form-group">
              <label for="apellido"><b>Apellido</b></label>
              <?php if(isset($errores["apellido"])): ?>
                <input class="form-control is-invalid" type="text" placeholder="Ingrese su apellido" name="apellido" required>
                <div class="invalid-feedback">
                  <?=$errores["apellido"]?>
                </div>
              <?php else: ?>
                <input class="form-control" type="text" placeholder="Ingrese su apellido" name="apellido" value="<?=$camposDefault["apellido"]?>" required>
              <?php endif; ?>
              </div>

              <div class="form-group">
                <label for="email"><b>Email</b></label>
                <?php if(isset($errores["email"])): ?>
                  <input class="form-control is-invalid" type="text" placeholder="Ingrese su email" name="email" required>
                  <div class="invalid-feedback">
                    <?=$errores["email"]?>
                  </div>
                <?php else: ?>
                  <input class="form-control" type="text" placeholder="Ingrese su email" name="email" value="<?=$camposDefault["email"]?>" required>
                <?php endif; ?>
              </div>

              <div class="form-group">
                <label for="psw"><b>Password</b></label>
                <?php if(isset($errores["psw"])): ?>
                  <input class="form-control is-invalid" type="password" placeholder="Ingrese su password" name="psw" required>
                  <div class="invalid-feedback">
                    <?=$errores["psw"]?>
                  </div>
                <?php else: ?>
                  <input class="form-control" type="password" placeholder="Ingrese su password" name="psw" value="" required>
                <?php endif; ?>
              </div>

              <div class="form-group">
                <label for="psw-repeat"><b>Repetir Password</b></label>
                <?php if(isset($errores["psw-repeat"])): ?>
                  <input class="form-control is-invalid" type="password" placeholder="Repita su password" name="psw-repeat" required>
                  <div class="invalid-feedback">
                    <?=$errores["psw-repeat"]?>
                  </div>
                <?php else: ?>
                  <input class="form-control" type="password" placeholder="Repita su password" name="psw-repeat" value="" required>
                <?php endif; ?>
              </div>

              <div class="input-group">
                <label class="avatar-label" for="avatar"><b>Avatar</b></label>
                <input class="avatar-input" type="file" name="avatar" value="messi.pdf">
                <?php if(isset($errores["avatar"])): ?>
                <div class="invalid-feedback" style="display: block !important">
                  <?=$errores["avatar"]?>
                </div>
                <?php endif; ?>
              </div>
              <!-- Input de Bootstrap, hay que agregarle JS para que funcione bien -->
              <!-- <div class="form-group">
                <label for=""><b>Avatar</b></label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="avatar" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="avatar">Elegir archivo</label>
                </div>
              </div> -->

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
