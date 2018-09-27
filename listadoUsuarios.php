<?php
  include_once("funciones.php");
  $usuarios = traer_usuarios();
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
          <ul>
            <?php foreach($usuarios as $usuario): ?>
              <li class="cajita">
                <a href="perfil.php?id=<?=$usuario["id"]?>"><?=$usuario["nombre"]?></a>
              </li>
            <?php endforeach; ?>
          </ul>
          <?php foreach($usuarios as $usuario): ?>
            <pre><?php var_dump($usuario) ?></pre>
          <?php endforeach; ?>
        </div>
      </main>
      <?php include_once("footer.php") ?>
    </div>
  </body>
</html>
