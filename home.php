<?php
require_once("funciones.php");
if(estaLogueado()){
  $usuario = traerUsuarioLogueado();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Estilos -->
    <?php include_once("stylesheets.php") ?>
    <title>Home</title>
  </head>
  <body>
    <div class="main-container">
      <!-- HEADER -->
      <?php include_once("header.php") ?>
      <!-- carrousel -->
      <div class="carrousel">
        <img src="img\drones.png" alt="">
      </div>
        <!-- productos -->
        <section>

        <article class="productos"
        <img class="fotoProducto" src="img/kit4camaras.png" alt="pdto 01">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation </p>
        <a class="masInfo" href="#">+Más Info</a></div>
        </article>
        </section>



          <!-- Footer -->
      <?php include_once("footer.php") ?>
    </div> <!-- Aca cierra el div del main-container  -->
  </body>
</html>
