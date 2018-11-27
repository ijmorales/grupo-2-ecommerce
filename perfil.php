<?php
  include_once('init.php');
  $db = new DBMySql();
  // Si viene por GET, chequea que traiga el parametro ID en el querystring.
  if(isset($_GET["id"])){
    // Trae al usuario del cual se solicito su perfil
    $usuario = $db->getUsuarioById($_GET['id']);
    if($usuario === null){
      // Si no encuentra ese usuario, redirige a 404.
      header("Location:404.php");exit;
    }
  }else{
    // Si viene por GET pero no especifica un ID, redirige a 404.
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
            <img src="uploads/avatars/<?=$usuario->getAvatar()?>" alt="" class="avatar-grande">
          </div>
          <div class="perfil-nombre-container">
            <?=$usuario->getNombre()?> <?=$usuario->getApellido()?>
          </div>
          <div class="perfil-email-container">
            <p class="perfil-email-texto"><?=$usuario->getEmail()?></p>
          </div>
          <button class="contactar" type="button" name="contactar">Contactar</button>
        </div>
      </section>
      <?php require_once("./footer.php") ?>
    </div>
  </body>
</html>
