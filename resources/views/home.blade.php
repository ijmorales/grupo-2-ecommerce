@extends('layouts.app')
@section('content')
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
    <section class="productos-container">
    <article class="productos" class="productbox">
        <div class="photo-container">
        <img class="photo" src="img/producto1.png" alt="pdto 01">
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
            <a class="masInfo" href="#">+Más Info</a>
        </div>
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

<div class='recomendador container'>
    <form action="/recomendador" method="POST" class='d-flex flex-column'>
        <div class='form-group'>
            <input type="text" class='form-control'>
        </div>
    </form>
</div>

@endsection