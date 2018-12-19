@extends('layouts.app')
@section('content')

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--<div class="promo-text">
    <!--<h2 class="titulo-promo">Promociones</h2>
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
</div>-->
    <!--<div class="h2-productos">
        <h2 class="titulo-product">Productos</h2>
    </div>-->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="/img/carrousel-home.png" alt="Image">
        <div class="carousel-caption">
          <!--<h3>Cámaras de seguridad</h3>
          <p>Proteja su empresa y hogar </p>-->
        </div>
      </div>

      <div class="item">
        <img src="/img/carrousel-home2.png" alt="Image">
        <div class="carousel-caption">
          <!--<h3>Alarmas</h3>
          <p>La tecnología mas segura</p>-->
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<!--Asesor online-->
<div id="asesor-online">
    <div class="pregunta">
      <h2>¿Qué necesitás protejer?</h2>
    </div>

    <div class="asesor-categorias">
      <div class="asesor-img-empresa">
      <img src="/img/img/asesor/empresa.png" alt="Img" class="asesor-img" />
      <button class="asesor-btn">Empresa</button>
      </div>

      <div class="asesor-img-vivienda">


      <img src="/img/img/asesor/vivienda.png" alt="Img" class="asesor-img" />
      <button class="asesor-btn">Vivienda</button>

      </div>

    </div>

</div>



<div class="productos-novedades">



</div>




































    <!--<div class="sidebar-container">
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
</div>-->

<!--<div class='recomendador container'>
    <form action="/recomendador" method="POST" class='d-flex flex-column'>
        <div class='form-group'>
            <input type="text" class='form-control'>
        </div>
    </form>
</div>



@endsection
