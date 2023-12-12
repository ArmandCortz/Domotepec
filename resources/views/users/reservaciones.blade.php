
@extends('layouts.app_users')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISTEMA DE RESERVAS DE HOTEL & DOMOTEPEC</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<!-- Sección 1: Título centrado y cuadro de texto -->
<section class="wpb_wrapper" style="background-color: #bfbcbcbf; padding: 20px;">
    <h3 style="text-align: center;">SISTEMA DE RESERVAS DE HOTEL &amp; DOMOTEPEC</h3>
    <p style="text-align: center">Todas las reservas deben ser con al menos 2 días de anticipación.</p>
</section>
<!-- Sección 2: Imagen de fondo, título y dos inputs tipo calendario -->
<section class="wpb_wrapper" style="background-color: #bfbcbc; padding: 20px; position: relative;">

    <div class="container text-center">
        <!-- Eliminé el formulario que estaba aquí -->
    </div>
</section>
<section class="wpb_wrapper" style="padding: 20px;">
    <div class="container">
        <div class="row">
            @foreach($cabañas as $cabaña)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('img/cabañas/' . $cabaña->imagen) }}" class="card-img-top" alt="{{ $cabaña->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cabaña->nombre }}</h5>
                        <p class="card-text">{{ $cabaña->descripcion }}</p>
                        <!-- Agrega aquí cualquier otra información que desees mostrar -->
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reservaModal" data-cabana-nombre="{{ $cabaña->nombre }}" data-cabana-descripcion="{{ $cabaña->descripcion }}">Reservar</button> --}}
                        <a href="{{ route('reservaciones.cabaña', $cabaña->id) }}"
                                    class="btn btn-outline-primary ver-cabaña" style="width: 100%" data-cabaña-id="{{ $cabaña->id }}">Ver
                                    Cabaña</a>
                    </div>
                </div>
            </div>
        @endforeach

        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="reservaModal" tabindex="-1" role="dialog" aria-labelledby="reservaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reservaModalLabel">Realizar Reserva</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de reserva -->
                <form action="index.html" method="get" class="tm-search-form tm-section-pad-2">
                    <div class="form-row tm-search-form-row">
                        <div class="form-group tm-form-element tm-form-element-100">
                            <label for="">
                                <i class="fas fa-map-marker"></i> Ciudad
                            </label>
                            <input name="city" type="text" class="form-control" id="inputCity" placeholder="Type your destination...">
                        </div>
                        <div class="form-group tm-form-element tm-form-element-50">
                            <label for="">
                                <i class="fas fa-calendar-alt"></i> Fecha Inicio
                            </label>
                            <input name="check-in" type="date" class="form-control" id="inputCheckIn" placeholder="Check In">
                        </div>
                        <div class="form-group tm-form-element tm-form-element-50">
                            <label for="">
                                <i class="fas fa-calendar-alt"></i> Fecha Final
                            </label>
                            <input name="check-out" type="date" class="form-control" id="inputCheckOut" placeholder="Check Out">
                        </div>
                    </div>
                    <div class="form-row tm-search-form-row">
                        <div class="form-group tm-form-element tm-form-element-2">
                            <label for="">
                                <i class="fa fa-user"></i> Adulto
                            </label>
                            <select name="adult" class="form-control tm-select" id="adult">
                                <option value="">Adult</option>
                                <!-- Opciones de adultos -->
                            </select>
                        </div>
                        <div class="form-group tm-form-element tm-form-element-2">
                            <label for="">
                                <i class="fa fa-user"></i> Niños
                            </label>
                            <select name="children" class="form-control tm-select" id="children">
                                <option value="">Children</option>
                                <!-- Opciones de niños -->
                            </select>
                        </div>
                        <div class="form-group tm-form-element tm-form-element-2">
                            <label for="">
                                <i class="fa fa-bed"></i> Habitación
                            </label>
                            <select name="room" class="form-control tm-select" id="room">
                                <option value="">Room</option>
                                <!-- Opciones de habitaciones -->
                            </select>
                        </div>

                    </div>
                    <div class="form-row clearfix pl-2 pr-2 tm-fx-col-xs">
                        <a href="#" class="ie-10-ml-auto ml-auto mt-1 tm-font-semibold tm-color-primary">¿Necesitas ayuda?</a>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary tm-btn-search">Confirmar Reserva</button>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('[data-toggle="modal"]').click(function() {
            var target = $(this).data('target');
            $(target).modal('show');
        });

        $('#reservaModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var cabanaNombre = button.data('cabana-nombre');
            var cabanaDescripcion = button.data('cabana-descripcion');

            // Actualiza el contenido de la modal con la información de la cabaña
            var modal = $(this);
            modal.find('.modal-title').text('Reservar ' + cabanaNombre);
            modal.find('input[name="room"]').val(cabanaNombre);
            // Agrega más líneas según sea necesario para otros campos
        });
    });
</script>


</body>
</html>

@endsection
