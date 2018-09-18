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
      <!--  -->
      <header class="main-header">
        <nav class="navbar navbar-dark main-navbar navbar-expand-md">
          <a class="navbar-brand" href="home.html">
            <img src="img/logo.png" alt="" class="logo">
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

            <!-- Contenido que en mobile se colapsa. -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="links-utiles">
            <span class="links-extra">
              <ul>
                <li>
                  <a href="#">Quienes somos</a>
                </li>
                <li>
                  <p>|</p>
                </li>
                <li>
                  <a href="#">Servicio Tecnico</a>
                </li>
                <li>
                  <p>|</p>
                </li>
                <li>
                  <a href="#">Monitoreo</a>
                </li>
              </ul>
            </span>
            <span class="llamenos">
              <p>Llamenos 0800-888-6666</p>
            </span>
            <span class="header-rrss">
              <ul>
                <li>
                  <ion-icon name="logo-twitter" size="large"></ion-icon>
                </li>
                <li>
                  <ion-icon name="logo-instagram" size="large"></ion-icon>
                </li>
                <li>
                  <ion-icon name="logo-facebook" size="large"></ion-icon>
                </li>
              </ul>
            </span>
        </div>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown nav-cuenta">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cuenta
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="login.html">Login</a>
                <a class="dropdown-item" href="registro.html">Registro</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Kits alarmas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Camaras</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Anti incendios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Accesorios</a>
            </li>
        </ul>
          </div>
        </nav>
      </header>

        <div class="promo-text">
          <h2 class="titulo-promo">Promociones</h2>
        </div>
        <div class="promo-carousel-container">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" class="promo-photo" src="img/logo.png" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" class="promo-photo" src="img/kit4camaras.png" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" class="promo-photo" src="img/img-cam.jpg" alt="Third slide">
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
          <section class="productos-container">
            <article class="productos" class="productbox">
              <div class="photo-container">
                <img class="photo" src="img/img-cam.jpg" alt="pdto 01">
                    </div>
              <div class="product-text" class="productbox"><p class="texto-producto">Sistema de alimentacion ininterrumpida UPS de 30 minutos para DVR más 4 cámaras</p>
              <a class="masInfo" href="#">+Más Info</a></div>
            </article>
            <article class="productos" class="productbox">
                <div class="photo-container">
                  <img class="photo" src="img/kit4camaras.png" alt="pdto 01">
                </div>
                <div class="product-text" class="productbox"><p class="texto-producto">Sistema de alimentacion ininterrumpida UPS de 30 minutos para DVR más 4 cámaras</p>
                      <a class="masInfo" href="#">+Más Info</a></div>
              </article>
              <article class="productos" class="productbox">
                <div class="photo-container">
                  <img class="photo" src="img/kit4camaras.png" alt="pdto 01">
                    </div>
                <div class="product-text" class="productbox"><p class="texto-producto">Sistema de alimentacion ininterrumpida UPS de 30 minutos para DVR más 4 cámaras</p>
                  <a class="masInfo" href="#">+Más Info</a></div>
              </article>
              <article class="productos" class="productbox">
                <div class="photo-container">
                  <img class="photo" src="img/img-cam.jpg" alt="pdto 01">
                    </div>
                <div class="product-text" class="productbox"><p class="texto-producto">Sistema de alimentacion ininterrumpida UPS de 30 minutos para DVR más 4 cámaras</p>
                  <a class="masInfo" href="#">+Más Info</a></div>
              </article>
              <article class="productos" class="productbox">
                <div class="photo-container">
                  <img class="photo" src="img/img-cam.jpg" alt="pdto 01">
                    </div>
                <div class="product-text" class="productbox"><p class="texto-producto">Sistema de alimentacion ininterrumpida UPS de 30 minutos para DVR más 4 cámaras</p>
                  <a class="masInfo" href="#">+Más Info</a></div>
              </article>
              <article class="productos" class="productbox">
                <div class="photo-container">
                  <img class="photo" src="img/img-cam.jpg" alt="pdto 01">
                    </div>
                <div class="product-text" class="productbox"><p class="texto-producto">Sistema de alimentacion ininterrumpida UPS de 30 minutos para DVR más 4 cámaras</p>
                  <a class="masInfo" href="#">+Más Info</a></div>
              </article>
              <article class="productos" class="productbox">
                <div class="photo-container">
                  <img class="photo" src="img/img-cam.jpg" alt="pdto 01">
                    </div>
                <div class="product-text" class="productbox"><p class="texto-producto">Sistema de alimentacion ininterrumpida UPS de 30 minutos para DVR más 4 cámaras</p>
                  <a class="masInfo" href="#">+Más Info</a></div>
              </article>
              <article class="productos" class="productbox">
                <div class="photo-container">
                  <img class="photo" src="img/img-cam.jpg" alt="pdto 01">
                    </div>
                <div class="product-text" class="productbox"><p class="texto-producto">Sistema de alimentacion ininterrumpida UPS de 30 minutos para DVR más 4 cámaras</p>
                  <a class="masInfo" href="#">+Más Info</a></div>
              </article>
            </section>
            <div class="sidebar-container">
              <div class="novedades-container">
                <div class="promo1">
                  <img class="promo-img" src="img/img-cam.jpg" alt="">
                  <h2 class="h2-promo-eventos">Novedad 1</h2>
                </div>
                <div class="promo2">
                  <img class="promo-img" src="img/img-cam.jpg" alt="">
                  <h2 class="h2-promo-eventos">Novedad 2</h2>
                </div>
                <div class="promo3">
                  <img class="promo-img" src="img/img-cam.jpg" alt="">
                  <h2 class="h2-promo-eventos">Novedad 3</h2>
                </div>

              </div>
              <div class="publicidad-container">
                <div class="promo1">
                  <img class="promo-img" src="img/img-cam.jpg" alt="">
                  <h2 class="h2-promo-eventos">Ad 1</h2>
                </div>
                <div class="promo2">
                  <img class="promo-img" src="img/img-cam.jpg" alt="">
                  <h2 class="h2-promo-eventos">Ad 2</h2>
                </div>
              </div>
              <div class="eventos-container">
                <img class="promo-img" src="img/logo.png" alt="">
              </div>
            </div>
          </div>

          <!-- Footer -->
          <footer class="main-footer">
        <div class="logo-container-footer">
          <img src="img/logo.png" alt="" class="logo-footer">
        </div>
        <div class="informacion-contacto">
          <ul>
            <li>
              <p class="footer-info">Av. Corrientes 5067 1º Piso Of. 5. C1414AJD. C.A.B.A.</p>
            </li>
            <li>
              <p class="footer-info">Tel/Fax: (011) 4555-5555 / (011) 4856-5573</p>
            </li>
            <li>
              <p class="footer-info">Email: info@helsecurity.com</p>
            </li>
          </ul>
        </div>
        <span class="footer-rrss ml-auto">
          <ul>
            <li>
              <ion-icon name="logo-twitter" size="large" class="rrss-verde"></ion-icon>
            </li>
            <li>
              <ion-icon name="logo-instagram" size="large" class="rrss-verde"></ion-icon>
            </li>
            <li>
              <ion-icon name="logo-facebook" size="large" class="rrss-verde"></ion-icon>
            </li>
          </ul>
        </span>
      </footer>
    </div> <!-- Aca cierra el div del main-container  -->

    <!-- JavaScript iconos -->
    <script src="https://unpkg.com/ionicons@4.4.2/dist/ionicons.js"></script>
  </body>
</html>
