<?php
require_once("funciones.php");
if(estaLogueado()){
  $usuario = traerUsuarioLogueado();
}

$productos=[
 0 => [
"id" => 1,
"titulo" => "Sistema de observación ",
"descripcion" => "Kit central + panel 8 zonas expandible a 16 ",
"imagen" => "producto4.png",
],
1 => [
"id" => 2,
"titulo" => "Sistema de observación ",
"descripcion" => "Sistema de observación COLOR con monitor LCD de 7",
"imagen" => "producto2.png",
],
2 => [
"id" => 3,
"titulo" => "Sistema de observación ",
"descripcion" => "Sistema de observación COLOR con monitor LCD de 7",
"imagen" => "producto3.png",
],
3 => [
"id" => 4,
"titulo" => "Sistema de observación ",
"descripcion" => "Sistema de observación COLOR con monitor LCD de 7",
"imagen" => "producto4.png",
],
4 => [
"id" => 5,
"titulo" => "Sistema de observación ",
"descripcion" => "Sistema de observación COLOR con monitor LCD de 7",
"imagen" => "producto4.png",
]

];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
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
        <section class="productos">
			<?php foreach ($productos as $producto) { ?>
				<article class="producto">
					<div class="photo-container">
						<img class="photo" src="img/<?=$producto["imagen"]?>" alt="pdto 01">
          </div>
					<h2>
						<?= $producto["titulo"] ?>
					</h2>
					<p><?=$producto["descripcion"]?></p>
            <a class="more" href="producto.php?id=<?=$producto["id"]?>">ver más</a>
				</article>
			<?php } ?>

		</section>








          <!-- Footer -->
      <?php include_once("footer.php") ?>
    </div> <!-- Aca cierra el div del main-container  -->
  </body>
</html>
