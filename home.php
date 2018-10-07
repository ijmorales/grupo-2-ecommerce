<?php
require_once("funciones.php");
if(estaLogueado()){
  $usuario = traerUsuarioLogueado();
};
$productos = [
  0 => [
    "ID" => 1,
    "nombre" =>"kit4camaras",
    "precio" => 5000,
    "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
    "imagen" => "kit4camaras.png"
  ],
  1 => [
    "ID" => 2,
    "nombre" =>"kitAlarmas",
    "precio" => 400,
    "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
    "imagen" => "img-cam.jpg"
  ],
  2 => [
    "ID" => 3,
    "nombre" =>"kitAntiIncendio",
    "precio" => 900,
    "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
    "imagen" => "img-cam.jpg"
  ],
  3 => [
    "ID" => 4,
    "nombre" =>"Drones",
    "precio" => 800,
    "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
    "imagen" => "img-cam.jpg"
  ],
  4 => [
    "ID" => 5,
    "nombre" =>"Accesorios",
    "precio" => 700,
    "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
    "imagen" => "img-cam.jpg"
  ],
  5 => [
    "ID" => 6,
    "nombre" =>"Cámara 4k",
    "precio" => 600,
    "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
    "imagen" => "img-cam.jpg"
  ],
  6 => [
    "ID" => 7,
    "nombre" =>"Sistema UPS",
    "precio" => 1000,
    "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit",
    "imagen" => "img-cam.jpg"
  ]

];
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
      <!--  -->
        <div class="promo-text">
          <h2 class="titulo-promo">Promociones</h2>
        </div>
        <div class="promo-carousel-container">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" class="promo-photo" src="img/carrousel.png" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" class="promo-photo" src="img/perimetrales.png" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" class="promo-photo" src="img/drones.png" alt="Third slide">
            </div>
          </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
          <div class="h2-productos">
              <h2 class="titulo-product">Productos</h2>
          </div>
        <div class="boxes-container">
          <!-- productos -->
          <section class="productos-container">
          <?php foreach ($productos as $producto) { ?>
            <article class="productos" class="productbox">
              <div class="photo-container">
                <img class="photo" src="img/<?=$producto["imagen"]?>" alt="pdto 01">
              </div>
              <div class="product-text" class="productbox">
              <p class="texto-producto">
                <h2>
                  <p><?=$producto["nombre"]?></p>
                </h2>
                <p><?=$producto["descripcion"]?></p>
              </p>
              	<?php }?>
              <a class="masInfo" href="productos.php?id=<?=$productos["id"]?>">+Más Info</a></div>

            </article>


          </section>
            <div class="sidebar-container">
              <div class="novedades-container">
                <div class="promo1">
                  <img class="promo-img" src="img/promo1.png" alt="">
                  <h2 class="h2-promo-eventos">Novedad 1</h2>
                </div>
                <div class="promo2">
                  <img class="promo-img" src="img/promo2.png" alt="">
                  <h2 class="h2-promo-eventos">Novedad 2</h2>
                </div>
                <div class="promo3">
                  <img class="promo-img" src="img/promo3.png" alt="">
                  <h2 class="h2-promo-eventos">Novedad 3</h2>
                </div>

              </div>
              <div class="publicidad-container">
                <div class="promo1">
                  <img class="promo-img" src="img/ad1.png" alt="">
                  <h2 class="h2-promo-eventos">Ad 1</h2>
                </div>
                <div class="promo2">
                  <img class="promo-img" src="img/ad2.png" alt="">
                  <h2 class="h2-promo-eventos">Ad 2</h2>
                </div>
              </div>
              <div class="eventos-container">
                <img class="promo-img" src="img/ad3.png" alt="">
              </div>
            </div>
          </div>
          <!-- Footer -->
      <?php include_once("footer.php") ?>
    </div> <!-- Aca cierra el div del main-container  -->

    <!-- JavaScript iconos -->
    <script src="https://unpkg.com/ionicons@4.4.2/dist/ionicons.js"></script>
  </body>
</html>
