<?php
// UN ARRAY CON LOS ERRORES
// Lineamientos:
// Cada campo puede tener solo un error a la vez.
// Si no tiene errores, se muestra como "".
// Esto permite ver si un campo fallo o no, haciendo evaluando $errores["nombre"].
// Cada campo tiene unas validaciones especificas.

$errores = [];
// Construccion dinamica de $errores
if($_POST){
  //$errores[] = validar_campos_blancos();
  var_dump($_POST);
  $errores += validar_campos_blancos("nombre", $_POST["nombre"]);
  $errores += validar_campos_blancos("apellido", $_POST["apellido"]);
  $errores += validar_campos_blancos("email", $_POST["email"]);
  $errores += validar_campos_blancos("psw", $_POST["psw"]);
  $errores += validar_campos_blancos("psw-repeat", $_POST["psw-repeat"]);

  echo "<pre>";
  foreach($errores as $campo => $error){
    echo "<pre>";
    echo "$campo => $error";
    echo "</pre>";
  }
  var_dump($errores["nombre"]);
  echo "</pre>";
}

// Recibe dos valores: $campo => nombre del campo, $texto => texto del campo.

function validar_campos_blancos($nombreCampo, $textoCampo){
  if(strlen($textoCampo) == 0 || ctype_space($textoCampo)){
    return [$nombreCampo => "El campo está vacio."];
  }else{
    return [$nombreCampo => null];
  }
}

?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <?php include_once("stylesheets.php") ?>
     <link rel="stylesheet" href="css/test.css">
     <title></title>
   </head>
   <body>
     <div class="main-container-registro  flex-column container">
       <?php include_once("header.php") ?>
       <div class="container form-container">
           <form action="funciones.php" method="post">
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
               <label for="psw-repeat"><b>Repetir Password</b></label>
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
