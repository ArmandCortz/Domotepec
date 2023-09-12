@extends('layouts.app')
@extends('layouts.components.navbar')
@section('content')
    <div id="carusel" class="" style="background-color: bisque">

        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            

            <!-- Slides -->
            <div class="carousel-inner">
                <div class="carousel-item active ">
                    <img src="/img/cabaña1.jpeg" class=" w-100" style="max-height: 400px" alt="...">
                    <div class="carousel-caption " style="position: absolute;  top: 50%;  left: 50%;  transform: translate(-50%, -50%)">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="/img/cabaña3.jpeg" class="d-block w-100" style="max-height: 400px" alt="...">
                    <div class="carousel-caption " style="position: absolute;  top: 50%;  left: 50%;  transform: translate(-50%, -50%)">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="/img/cabaña5.jpeg" class="d-block w-100" style="max-height: 400px" alt="...">
                    <div class="carousel-caption " style="position: absolute;  top: 50%;  left: 50%;  transform: translate(-50%, -50%)">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
            </div>

            <!-- Controles de navegación -->
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>

    </div>
    <div id="nosotros" class="container bg-dark">

        <div class="row ">
            <div class="col-8">
                <div class="container">
                    <div class="container text-center">
                        <div style="position: absolute;  top: 50%;  left: 50%;  transform: translate(-50%, -50%)">
                            <p>Nosotros</p>
                            <h1>Domotepec</h1> <br>
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quaerat cum eum veniam
                                culpa
                                voluptatum ipsum nam tempora! Quia cumque temporibus inventore suscipit nihil recusandae
                                accusantium
                                ipsum quibusdam vero perspiciatis?</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <img class="" src="/img/cabaña10.jpeg" style="height: 100%; width: 100%;" alt="">
            </div>
        </div>
    </div>
    <div id="habitaciones" class="container-fluid bg-light  py-2">
        <div class="row">

            <div class="col-md-6 offset-md-3 text-center">

                <h1>Habitaciones</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate, inventore. Quisquam repellendus
                    voluptatum
                    doloribus minus dignissimos fuga porro dicta, nostrum aspernatur sequi, illum temporibus! Placeat aut
                    sed iusto explicabo neque.</p>
                <br>
                <h5>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos voluptatem suscipit eligendi
                    necessitatibus odit neque deserunt?
                </h5>


            </div>
            <div class="container py-2 text-center">
                <div class="row">
                    <div class="col">
                        <img src="/img/cabaña2.jpeg" alt="" class="rounded-circle img-fluid"
                            style="max-height: 100px; max-width: 100px;">
                        <h5>Nombre de cabaña</h5>
                        <a href="" class="btn btn-outline-success">Descripción</a>
                    </div>
                    <div class="col">
                        <img src="/img/cabaña2.jpeg" alt="" class="rounded-circle img-fluid"
                            style="max-height: 100px; max-width: 100px;">
                        <h5>Nombre de cabaña</h5>
                        <a href="" class="btn btn-outline-success">Descripción</a>
                    </div>
                    <div class="col">
                        <img src="/img/cabaña2.jpeg" alt="" class="rounded-circle img-fluid"
                            style="max-height: 100px; max-width: 100px;">
                        <h5>Nombre de cabaña</h5>
                        <a href="" class="btn btn-outline-success">Descripción</a>
                    </div>
                    <div class="col">
                        <img src="/img/cabaña2.jpeg" alt="" class="rounded-circle img-fluid"
                            style="max-height: 100px; max-width: 100px;">
                        <h5>Nombre de cabaña</h5>
                        <a href="" class="btn btn-outline-success">Descripción</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="servicios" class="container-fluid bg-dark  py-2">
        <div class="row">

            <div class="col-md-6 offset-md-3 text-center">

                <h1>Servicios</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate, inventore. Quisquam repellendus
                    voluptatum
                    doloribus minus dignissimos fuga porro dicta, nostrum aspernatur sequi, illum temporibus! Placeat aut
                    sed iusto explicabo neque.</p>
                <br>


            </div>
            <div class="container py-2 text-center">
                <div class="row">
                    <div class="col">
                        <i class="fa-solid fa-wifi"></i>
                        <p>Servicio 1</p>
                        <i class="fa-solid fa-wifi"></i>
                        <p>Servicio 2</p>

                    </div>
                    <div class="col">
                        <i class="fa-solid fa-wifi"></i>
                        <p>Servicio 3</p>
                        <i class="fa-solid fa-wifi"></i>
                        <p>Servicio 4</p>
                    </div>
                    <div class="col">
                        <i class="fa-solid fa-wifi"></i>
                        <p>Servicio 5</p>
                        <i class="fa-solid fa-wifi"></i>
                        <p>Servicio 6</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
