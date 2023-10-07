@extends('layouts.app_users')
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @endpush
    {{-- inicio del carrusel --}}
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active ">
                <img src="/img/img/boqueron_1.png" class="img-fluid mx-auto img" alt="...">
                <div class="carousel-caption "
                    style="position: absolute;  top: 50%;  left: 50%;  transform: translate(-50%, -50%)">
                    <h1>Bienvenido a Domotepec</h1>
                    <p>La mejor experiencia en tus viajes</p>
                </div>
            </div>
            <div class="carousel-item ">
                <img src="/img/img/surfcity_3.jpg" class="img-fluid mx-auto img" alt="...">
                <div class="carousel-caption"
                    style="position: absolute;  top: 50%;  left: 50%;  transform: translate(-50%, -50%)">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item ">
                <img src="/img/img/ilopango_2.png" class="img-fluid mx-auto"
                    style="width: 100%; height: 400px; object-fit: cover;" alt="...">
                <div class="carousel-caption "
                    style="position: absolute;  top: 50%;  left: 50%;  transform: translate(-50%, -50%)">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- final del carrusel --}}

    <div id="nosotros" class="container-fluid">
        <div class="d-sm-block d-lg-none">
            <div class="row">
                <div class="col-lg-6">
                    <div class="container text-center ">
                        <div class="d-flex flex-column align-items-center  mt-5 mb-5">
                            <p>Nosotros</p>
                            <h1>Domotepec</h1>
                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quaerat cum eum veniam
                                culpa
                                voluptatum ipsum nam tempora! Quia cumque temporibus inventore suscipit nihil recusandae
                                accusantium ipsum quibusdam vero perspiciatis?</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-lg-block">
            <div class="row text-center">
                <div class="col-6 mt-5 mb-5">
                        <p>Nosotros</p>
                        <h1>Domotepec</h1>
                        <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quaerat cum eum veniam
                            culpa
                            voluptatum ipsum nam tempora! Quia cumque temporibus inventore suscipit nihil recusandae
                            accusantium ipsum quibusdam vero perspiciatis?</h5>
                </div>
                <div class="col-6" style="background-image: url(../img/img/chalate_1.png); background-size: cover;">
                    <div class="container text-center" style="position: relative; height: 300px;">
                        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                            <img src="/img/img/Logo-Domotepec-1.jpeg" alt="" class="rounded-circle img-fluid"
                                style="max-height: 150px; max-width: 150px; opacity: 75%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div id="nosotros" class="container-fluid bg-light ">
        
        <div class="d-none d-lg-block">
            <div class="row ">
                

                <div class="col-6">
                    <img class="" src="/img/img/chalate_1.png" style="max-height: 500px; width: 100%;" alt="">
                    <div class="container text-center"
                        style="position: absolute;  top: 50%;  left: 50%;  transform: translate(-50%, -50%)">
                        <img src="/img/img/Logo-Domotepec-1.jpeg" alt="" class="rounded-circle img-fluid"
                            style="max-height: 200px; max-width: 200px; opacity: 50%;">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div id="servicios" class=" bg-dark text-white py-2" style="">
        <div class="row mt-5 my-5">

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
                        <i class="fa fa-binoculars"></i>
                        <p>Servicio 1</p>
                        <i class="fa fa-binoculars"></i>
                        <p>Servicio 2</p>

                    </div>
                    <div class="col">
                        <i class="fa fa-binoculars"></i>
                        <p>Servicio 3</p>
                        <i class="fa fa-binoculars"></i>
                        <p>Servicio 4</p>
                    </div>
                    <div class="col">
                        <i class="fa fa-binoculars"></i>
                        <p>Servicio 5</p>
                        <i class="fa fa-binoculars"></i>
                        <p>Servicio 6</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="habitaciones" class=" py-2">
        <div class="row mt-5 my-5">

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
            <div class="container text-center">
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
@endsection
