@extends('layouts.app_users')

@section('content')

<!-- Sección 1: Título centrado y cuadro de texto -->
<section class="wpb_wrapper" style="background-color: #bfbcbcbf; padding: 20px;">
    <h3 style="text-align: center;">SISTEMA DE RESERVAS DE HOTEL &amp; DOMOTEPEC</h3>
    <p style="text-align: center">Todas las reservas deben ser con al menos 2 días de anticipación.</p>
</section>

<!-- Sección 2: Imagen de fondo, título y dos inputs tipo calendario -->
<section class="wpb_wrapper" style="background-color: #bfbcbc; padding: 20px; position: relative;">
    <div class="container text-center">
        <h2 class="mt-4">Reservación de Cabañas</h2>
        <!-- Aquí colocamos la imagen desde el directorio "public/img" -->
        <img src="{{ asset('img/RESERVA.png') }}" alt="Imagen" class="img-fluid">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Fecha Inicio</label>
                        <input type="date" class="form-control" placeholder="Fecha de Check-In">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Fecha Final</label>
                        <input type="date" class="form-control" placeholder="Fecha de Check-Out">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
