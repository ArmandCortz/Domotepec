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
                        <div class="carousel-item active">
                            <img src="img/chalate_1.png" class="img-fluid" style="width:100%; height:100%" alt="...">
                        </div>
                        <div class="carousel-item ">
                            <img src="img/ilopango_1.jpg" class="img-fluid " style="width:100%; height:100%" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/surfcity_1.jpeg" class="img-fluid " style="width:100%; height:100%"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/chalate_2.jpeg" class="img-fluid" style="width:100%; height:100%" alt="...">
                        </div>
                        <div class="carousel-item ">
                            <img src="img/ilopango_2.png" class="img-fluid " style="width:100%; height:100%" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/surfcity_2.jpeg" class="img-fluid " style="width:100%; height:100%"
                                alt="...">
                        </div>
                        <div class="carousel-item ">
                            <img src="img/surfcity_3.jpg" class="img-fluid " style="width:100%; height:100%" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-container"
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
                {{-- <h5 class="text-dark text-center">Bienvenidos a Domotepec</h5> --}}
                <div style="display: flex; justify-content: center; align-items: center;">
                    <img src="img/Logo-Domotepec-1.jpeg"
                        style="width: 30%; height: 30%; border-radius: 50%; overflow: hidden;" alt="">
                </div>
                <form class="d-flex py-2" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn btn-light" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </section>
    <section>
        <div class="container mt-4">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 ">
                <div class="col">
                    <div class="card mt-4 " style="height: 250px">
                        <div class="card-body">
                            <p class="text-center"><i class="fas fa-person-shelter"></i></p>
                            <h5 class="card-title text-center"> Flexibilidad</h5>
                            <p class="card-text">Gracias a las estancias flexibles, será facíl que hagas una nueva reservación si la necesitas.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mt-4" style="height: 250px">
                        <div class="card-body">
                            <p class="text-center"><i class="fas fa-hotel"></i></p>
                            <h5 class="card-title text-center">Presentación</h5>
                            <p class="card-text">Excelente presentación de todos los bienes y servicios que ofrecemos.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mt-4" style="height: 250px">
                        <div class="card-body">
                            <p class="text-center"><i class="fa-solid fa-filter"></i></p>
                            <h5 class="card-title text-center">Filtros personalizados</h5>
                            <p class="card-text">Gracias a la busqueda flexible, podras encontrar alojamientos que se adapten a tus necesidades.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mt-4" style="height: 250px">
                        <div class="card-body">
                            <p class="text-center"><i class="fas fa-tasks"></i></p>
                            <h5 class="card-title text-center">Rápida planificación</h5>
                            <p class="card-text">Nuestra flexibilidad hace de tu reserva facíl y eficiente.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        
    </section>
@endsection
@section('footer')
    @include('layouts.components.footer')
@endsection
