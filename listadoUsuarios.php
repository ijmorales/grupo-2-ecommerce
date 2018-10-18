<?php
  include_once("funciones.php");
  $db = conectarDB();
  $usuarios = traerUsuarios($db);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once("stylesheets.php") ?>
    <link rel="stylesheet" href="css/test.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="main-container-test container d-flex flex-column">
      <?php include_once("header.php") ?>
      <main class="main-test-container">
        <div class="container flex-column">
          <h2>Usuarios</h2>
          <table class='table'>
            <thead>
              <tr>
                <th scope='col'>#</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Apellido</th>
                <th scope='col'>Email</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($usuarios as $usuario): ?>
              <tr>
                <th scope='row'><a href="perfil.php?id=<?=$usuario['id']?>"><?=$usuario["id"]?></a></th>
                <td scope='row'><?=$usuario["nombre"]?></th>
                <td scope='row'><?=$usuario["apellido"]?></th>
                <td scope='row'><?=$usuario["email"]?></th>
              </tr>
            <?php endforeach;?>            
            </tbody>
          </table>
        </div>
      </main>
      <?php include_once("footer.php") ?>
    </div>
  </body>
</html>
