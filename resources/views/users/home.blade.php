@extends('layouts.app')
@extends('layouts.components.navbar')
@section('content')
    <section id="Carousel-main">
        <div class="container-fluid" style=" position: relative; overflow: hidden; width: 100%; height: 400px;">

            <div class=" carousel" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                <!-- Contenido del carrusel -->
                <h1 class="text-dark text-center">Bienvenidos a Domotepec</h1>

                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/boqueron_1.png" class="img-fluid " style="width:100%; height:100%" alt="...">
                        </div>
                        <div class="carousel-item ">
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
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="search-container"
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
                <div style="display: flex; justify-content: center; align-items: center;">
                    <img src="img/Logo-Domotepec-1.jpeg"
                        style="width: 15%; height: 15%; border-radius: 50%; overflow: hidden;" alt="">
                </div>
                <form class="d-flex py-2" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                    <a href="{{ route('Dashboard') }}"  class="btn btn-light">Buscar</a>
                </form>
            </div>
        </div>
    </section>
    <section>
        <div class="container mt-4">
            <div class="card-group row-cols-md-3">
                <div class="card sombrear">
                    <div class="card-body">
                        <p class="text-center"><i class="fas fa-person-shelter"></i></p>
                        <h5 class="card-title text-center"> Flexibilidad</h5>
                        <p class="card-text">Gracias a las estancias flexibles, será facíl que hagas una nueva
                            reservación si la necesitas.</p>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-body">
                        <p class="text-center"><i class="fas fa-hotel"></i></p>
                        <h5 class="card-title text-center">Presentación</h5>
                        <p class="card-text">Excelente presentación de todos los bienes y servicios que ofrecemos.</p>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-body">
                        <p class="text-center"><i class="fa-solid fa-filter"></i></p>
                        <h5 class="card-title text-center">Filtros personalizados</h5>
                        <p class="card-text">Gracias a la busqueda flexible, podras encontrar alojamientos que se adapten a
                            tus necesidades.</p>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-body">
                        <p class="text-center"><i class="fas fa-tasks"></i></p>
                        <h5 class="card-title text-center">Rápida planificación</h5>
                        <p class="card-text">Nuestra flexibilidad hace de tu reserva facíl y eficiente.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <div class="container py-4">
        <div class="row">
            <div class="col" style="display: flex; justify-content: center; align-items: center;">

                <div class="container text-center">
                    <h1>¿Tienes dudas?</h1> <br>
                <h5>Nosotros respondemos a tus preguntas </h5>
                </div>
            </div>
            <div class="col">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                ¿Quienes somos?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion
                                body.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                ¿Cómo se realizan las reservas?
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion
                                body. Let's imagine this being filled with some actual content.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                ¿Qué pasa si tengo que cancelar una reservación?
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion
                                body. Nothing more exciting happening here in terms of content, but just filling up the
                                space to make it look, at least at first glance, a bit more representative of how this would
                                look in a real-world application.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFour" aria-expanded="false"
                                aria-controls="flush-collapseFour">
                                ¿Necesitas más información?
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion
                                body. Nothing more exciting happening here in terms of content, but just filling up the
                                space to make it look, at least at first glance, a bit more representative of how this would
                                look in a real-world application.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>

    </section>
@endsection
@section('footer')
    @include('layouts.components.footer')
@endsection
