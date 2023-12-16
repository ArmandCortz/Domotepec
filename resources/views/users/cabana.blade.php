@extends('layouts.app_users')
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @endpush
    <section>
        <div id="cabana" class="py-2">
            <div class="container">

                <h2 class="text-center">Domotepec</h2>


                <div class="row">
                    <div class="col-6 ">
                        <div class="col">
                            <img src="{{ asset('img/cabanas/' . $cabana->imagen) }}" alt="No hay imagen"
                                style="width: 100%; height: 300px;  border-radius: 15px; overflow: hidden;">
                        </div>
                    </div>
                    <div class="col">
                        <div class="row row-cols-3 ">
                            @foreach ($imagenes as $imagen)
                                <div class="col py-2">
                                    <img src="{{ asset('img/cabanas/imagenes/' . $imagen->imagen) }}" alt="No hay imagen"
                                        style="width: 100%; height: 135px;  border-radius: 15px; overflow: hidden;">
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <div class="row row-cols-2 py-4">
                    <div class="col-8">
                        <h1>Nombre de la cabana: {{ $cabana->nombre }}</h1>
                        <p>{{ $cabana->huespedes }} huéspedes . {{ $cabana->habitaciones }} habitaciones .
                            {{ $cabana->camas }} camas . {{ $cabana->baños }} baños completos</p>
                        <hr>
                        <small>{{ $cabana->descripcion }}
                        </small>
                        <hr>
                        <h2>Lo que ofrece este lugar</h2>
                        <div class="row row-cols-2">
                            @foreach ($cabana->servicios as $servicio)
                                <div class="col">
                                    <div class="row row-cols-2">
                                        <div class="col-2">
                                            <img src="{{ asset('img/servicios/' . $servicio->imagen) }}" alt=""
                                                class="rounded-circle img-fluid"
                                                style="max-height: 50px; max-width: 50px; height: 20px;  width: 20px;">
                                        </div>
                                        <div class="col">
                                            <p>{{ $servicio->nombre }}: <small>{{ $servicio->descripcion }}</small></p>
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card shadow-lg bg-light mb-3" style="max-width: 100$;">

                            <div class="card-body">
                                <h3>${{ $cabana->precio }} USD por noche</h3>
                                <form action="{{ route('reservaciones.solicitud', $cabana->id) }}" method="POST">
                                    @csrf
                                    <div class="row row-cols-2">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="fecha_entrada" class="form-label">Fecha de entrada:</label>
                                                <input type="date" class="form-control" id="fecha_entrada"
                                                    name="fecha_entrada" required
                                                    value="{{ date('Y-m-d', strtotime('+1 day')) }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="fecha_salida" class="form-label">Fecha de salida:</label>
                                                <input type="date" class="form-control" id="fecha_salida"
                                                    name="fecha_salida" required
                                                    value="{{ date('Y-m-d', strtotime('+2 day')) }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="huespedes" class="form-label">Cantidad de huéspedes:</label>
                                        <input type="number" class="form-control" name="huespedes" id="huespedes"
                                            min="1" value="1" max="{{ $cabana->huespedes }}">
                                    </div>

                                    <button type="submit" class="btn btn-outline-primary mb-2"
                                        style="width: 100%">Solicitar
                                        Reserva</button>
                                    <p class="text-center">Aun no se te cobrara nada.</p>

                                    <!-- Elemento para mostrar el total de gastos -->
                                    <div class="row row-cols-2">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="total_cabaña" class="form-label">{{ $cabana->precio }} USD X
                                                    <span id="diferencia_dias"></span> Noches</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <p id="total_cabaña" class="text-end"><span id="total_cabaña"></p>
                                        </div>
                                    </div>

                                    <!-- Calculo de impuestos y tarifas -->
                                    <!-- Aquí se mostrará el total de impuestos -->
                                    <div class="row row-cols-2">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="impuestos" class="form-label">Impuestos</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <p class="text-end"><span id="impuestos"></span></p>
                                        </div>
                                    </div>

                                    <!-- Aquí se mostrará la tarifa de limpieza -->
                                    <div class="row row-cols-2">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="tarifa_limpieza" class="form-label">Tarifa de limpieza</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <p id="tarifa_limpieza" class="text-end"></p>
                                        </div>
                                    </div>

                                    <!-- Aquí se mostrará el total de la estadia -->
                                    <div class="card-footer">
                                        <div class="row row-cols-2">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="total_estadia" class="form-label">Total de estadia</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <p class="text-end" id="total_estadia"> </p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section>
        <div id="cabanas" class="bg-dark text-white py-2 ">
            <div class="row mt-5 my-5">
                <div class="container-xxl text-center">
                    <div class="col-md-6 offset-md-3 text-center">


                        <h1>Descubre más cabanas</h1>
                        <h5>Selecciona la cabana que desees ver: </h5>
                    </div>

                    <div class="container text-center py-2">
                        <div class="row row-cols-3">
                            @foreach ($cabanas as $cabana)
                                <div class="col mt-2">
                                    <img src="{{ asset('img/cabanas/' . $cabana->imagen) }}" alt=""
                                        class="rounded-circle img-fluid"
                                        style="max-height: 200px; max-width: 200px; height: 200px;  width: 200px;">
                                    <br><br>
                                    <h5>{{ $cabana->nombre }}</h5>

                                    <a href="{{ route('reservaciones.cabana', $cabana->id) }}"
                                        class="btn btn-outline-success ver-cabana"
                                        data-cabana-id="{{ $cabana->id }}">Ver
                                        Cabana</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
    </section>
@endsection
