@extends('layouts.app')
@extends('layouts.components.navbar')
@section('content')
<!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Enlace a los archivos JavaScript de Bootstrap 5 (Requiere Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Styles -->
<div class="card">
    <div class="card-body">
    <h5 class="card-title" style="text-align: center;">Bienvenido a Domotepec</h5>

        <!-- Slick Carousel -->
        <div class="slick-carousel">
            <div class="carousel-item">
                <img src="img/chalate_1.png" class="d-block mx-auto img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/ilopango_2.png" class="d-block mx-auto img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/Surfcity_1.jpeg" class="d-block mx-auto img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/Surfcity_2.jpeg" class="d-block mx-auto img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/chalate_1.png" class="d-block mx-auto img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/chalate_2.jpeg" class="d-block mx-auto img-fluid" alt="...">
            </div>
            <!-- Agrega más elementos del carrusel según sea necesario -->
        </div><!-- End Slick Carousel -->
        
        <!-- Overlay con formulario de búsqueda -->
        <div class="overlay">
            <div class="search-container">
                <div style="display: flex; justify-content: center; align-items: center;">
                    <img src="img/Logo-Domotepec-1.jpeg"
                        style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden;" alt="">
                </div>
                <form class="d-flex py-2" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn btn-light" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Estilos para el carrusel */
    .slick-carousel {
        display: block;
        width: 100%;
        overflow: hidden;
    }
    
    .slick-slide {
        display: inline-block;
        margin: 0 10px;
    }
    
    .slick-prev, .slick-next {
        font-size: 0;
        line-height: 0;
        position: absolute;
        top: 50%;
        transform: translate(0, -50%);
        z-index: 1;
        cursor: pointer;
    }
    
    .slick-prev {
        left: 10px;
    }
    
    .slick-next {
        right: 10px;
    }
    
    .overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        max-width: 400px;
        text-align: center;
    }

    .search-container {
        text-align: center;
        color: white;
    }
    
    /* Estilos para hacer el formulario responsive */
    @media (max-width: 576px) {
        .slick-slide {
            margin: 0 5px;
        }
        
        .slick-prev, .slick-next {
            display: none;
        }
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    $(document).ready(function () {
        $('.slick-carousel').slick({
            centerMode: true,
            centerPadding: '0',
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
</script>

@endsection