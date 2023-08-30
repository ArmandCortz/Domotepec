@extends('layouts.app')
@extends('layouts.components.navbar')
@section('content')
    <section id="Carousel-main">
        <div class="container-fluid" style=" position: relative; overflow: hidden; width: 100%; height: 400px;">
            <div class=" carousel" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                <!-- Contenido del carrusel -->
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <img src="img/boqueron_1.png" class="img-fluid " style="width:100%; height:100%" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/chalate_1.png" class="img-fluid" style="width:100%; height:100%" alt="...">
                        </div>
                        <div class="carousel-item active">
                            <img src="img/ilopango_1.jpg" class="img-fluid " style="width:100%; height:100%" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/surfcity_1.jpeg" class="img-fluid " style="width:100%; height:100%"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/chalate_2.png" class="img-fluid" style="width:100%; height:100%" alt="...">
                        </div>
                        <div class="carousel-item active">
                            <img src="img/ilopango_2.png" class="img-fluid " style="width:100%; height:100%" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/surfcity_2.jpeg" class="img-fluid " style="width:100%; height:100%"
                                alt="...">
                        </div>
                        <div class="carousel-item active">
                            <img src="img/surfcity_3.jpg" class="img-fluid " style="width:100%; height:100%" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-container"
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
                <h5 class="text-dark text-center">Bienvenidos a Domotepec</h5>
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
    </section>
    <section>

    </section>
@endsection
@section('footer')
    @include('layouts.components.footer')
@endsection
