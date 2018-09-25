<?php
  require_once("./funciones.php");
  if(isset($_GET["id"])){
    $usuario = buscar_por_id($_GET["id"]);

    if($usuario === null){
      // Redirige a 404.
      header("Location:404.php");exit;
    }

  }else{
      // Redirige a 404.
      header("Location:404.php");exit;
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php require_once("./stylesheets.php") ?>
    <title>Perfil</title>
  </head>
  <body>
    <div class="perfil-main-container container">
      <?php require_once("./header.php") ?>
      <section name="usuario" class="container">
        <div class="detalle-usuario-container">
          <div class="perfil-img-container">
            <img src="uploads/avatars/<?=$usuario["avatar"]?>" alt="" class="avatar-grande">
          </div>
          <div class="perfil-nombre-container">
            <?=$usuario["nombre"]?> <?=$usuario["apellido"]?>
          </div>
          <div class="perfil-email-container">
            <p class="perfil-email-texto"><?=$usuario["email"]?></p>
          </div>
          <button class="contactar" type="button" name="contactar">Contactar</button>
        </div>
      </section>
      <?php require_once("./footer.php") ?>
    </div>
  </body>
</html>
