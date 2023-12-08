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
            @foreach ($carrusel as $cabaña)
                <div class="carousel-item ">
                    <img src="{{ asset('img/cabañas/' . $cabaña->imagen) }}" class="img-fluid mx-auto img" alt="...">
                    <div class="carousel-caption"
                        style="position: absolute;  top: 50%;  left: 50%;  transform: translate(-50%, -50%)">
                        <h5>{{ $cabaña->nombre }}</h5>
                        <a href="{{ route('reservaciones.cabaña', $cabaña->id) }}"
                                    class="btn btn-outline-light ver-cabaña" data-cabaña-id="{{ $cabaña->id }}">Ver
                                    Cabaña</a>
                    </div>
                </div>
            @endforeach

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

    <div class="container-xxl">
        <div id="nosotros" class="container-fluid">
            <div class="d-sm-block d-lg-none">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="container text-center ">
                            <div class="d-flex flex-column align-items-center  mt-5 mb-5">
                                <p>Nosotros</p>
                                <h1>Domotepec</h1>
                                <h5>En Domotepec buscamos brindar una experiencia Unica a nuestros huéspedes combinando
                                    excelencia en el servicio con la mejor calidad y la mejor atención</h5>
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
                        <h5>En Domotepec buscamos brindar una experiencia Unica a nuestros huéspedes combinando
                            excelencia en el servicio con la mejor calidad y la mejor atención.</h5>
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
    </div>


    <div id="servicios" class=" bg-dark text-white py-2" style="">

        <div class="container-xxl">
            <div class="col-md-6 offset-md-3 text-center">

                <h1>Servicios</h1>
                <p>En Domotepec buscamos brindar servicios de alta calidad, todo con el objetivo de que nuestros
                    huespedes encuentren una experiencia personal y unica.</p>
                <br>

            </div>
            <div class="container py-2 text-center">
                <div class="row row-cols-3">
                    @foreach ($servicios as $servicio)
                        <div class="col">
                            <img src="{{ asset('img/servicios/' . $servicio->imagen) }}" alt=""
                                class="rounded-circle img-fluid"
                                style="max-height: 50px; max-width: 50px; height: 100px;  width: 100px;"> <br>

                            <p>{{ $servicio->nombre }}</p>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>



    <div id="sucursales" class="  py-2 mb-2">
        <div class="container-xxl text-center">
            <div class="col-md-6 offset-md-3 text-center">

                <h1>Sucursales</h1>
                <h5>Selecciona la sucursal que más te interese: </h5>
            </div>
            <div class="row">
                @foreach ($sucursales as $sucursal)
                    <div class="col mt-2">
                        <img src="{{ asset('img/sucursales/' . $sucursal->imagen) }}" alt="{{ $sucursal->nombre }}"
                            class="img-fluid rounded-circle mb-2"
                            style="max-height: 200px; max-width: 200px; height: 200px;  width: 200px;"
                            {{-- style="height:80%; width:60%; border-radius: 15px;" --}}>
                        <br><br>
                        <h5>{{ $sucursal->nombre }}</h5>
                        <a href="#" class="btn btn-outline-success ver-sucursal"
                            data-sucursal-id="{{ $sucursal->id }}">Ver Sucursal</a>
                    </div>
                @endforeach
                {{-- @foreach ($cabañas as $cabaña)
                        <div class="col mt-2">
                            <img src="{{ asset('img/cabañas/' . $cabaña->imagen) }}" alt=""
                                class="rounded-circle img-fluid"
                                style="max-height: 200px; max-width: 200px; height: 200px;  width: 200px;">
                            <br><br>
                            <h5>{{ $cabaña->nombre }}</h5>
                            <a href="" class="btn btn-outline-success">Ver Cabaña</a>
                        </div>
                    @endforeach --}}
            </div>
        </div>
    </div>

    <div id="cabañas" class="bg-dark text-white py-2 ">
        <div class="row mt-5 my-5">
            <div class="container-xxl text-center">
                <div class="col-md-6 offset-md-3 text-center">


                    <h1>Cabañas</h1>
                    <h5>Selecciona la cabaña que desees ver: </h5>
                </div>

                <div class="container text-center py-2">
                    <div class="row">
                        @foreach ($cabañas as $cabaña)
                            <div class="col mt-2">
                                <img src="{{ asset('img/cabañas/' . $cabaña->imagen) }}" alt=""
                                    class="rounded-circle img-fluid"
                                    style="max-height: 200px; max-width: 200px; height: 200px;  width: 200px;">
                                <br><br>
                                <h5>{{ $cabaña->nombre }}</h5>

                                <a href="{{ route('reservaciones.cabaña', $cabaña->id) }}"
                                    class="btn btn-outline-success ver-cabaña" data-cabaña-id="{{ $cabaña->id }}">Ver
                                    Cabaña</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.ver-sucursal').on('click', function(e) {
                e.preventDefault(); // Evita el comportamiento predeterminado del enlace
                var sucursalId = $(this).data('sucursal-id');
                console.log(sucursalId);
                // Llamar a una función o realizar alguna acción con el ID de la sucursal
                // Por ejemplo, podrías realizar una solicitud AJAX para obtener más detalles sobre la sucursal
                console.log('ID de la Sucursal:', sucursalId);
                window.location.href = "{{ route('reservaciones.sucursal') }}?id=" + sucursalId;

                // Luego, puedes redirigir a la página de reservaciones o realizar otra acción según tus necesidades
            });
        });
        // $(document).ready(function() {
        //     $('.ver-cabaña').on('click', function(e) {
        //         e.preventDefault(); // Evita el comportamiento predeterminado del enlace
        //         var cabañaId = $(this).data('cabaña-id');
        //         console.log(cabañaId);

        //         // Redirigir a la ruta con el parámetro de ID
        //         window.location.href = "/reservaciones/cabaña/" + cabañaId;
        //     });
        // });
    </script>

    </div>
@endsection
