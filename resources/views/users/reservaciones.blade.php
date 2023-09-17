@extends('layouts.app_users')

@section('content')

    <!-- Sección 1: Título centrado y cuadro de texto -->
<section class="wpb_wrapper" style="background-color: #bfbcbc; padding: 20px;">
<h3 style="text-align: center;">SISTEMA DE RESERVAS DE HOTEL &amp; DOMOTEPEC</h3>        
<h4 style="text-align: center;"><strong>SOLO SE PERMITE LA ENTRADA A CLIENTES MAYORES DE 18 AÑOS, SIN EXCEPCIONES.</strong></h4>
<br>
<p style="text-align: center">Todas las reservas deben ser con al menos 2 días de anticipaciòn.</p>
<div class="vc-zigzag-inner" style="width: 100%;min-height: 14px;background: 0 repeat-x url('data:image/svg+xml;utf-8,%3C%3Fxml%20version%3D%221.0%22%20encoding%3D%22utf-8%22%3F%3E%3C%21DOCTYPE%20svg%20PUBLIC%20%22-%2F%2FW3C%2F%2FDTD%20SVG%201.1%2F%2FEN%22%20%22http%3A%2F%2Fwww.w3.org%2FGraphics%2FSVG%2F1.1%2FDTD%2Fsvg11.dtd%22%3E%3Csvg%20width%3D%2214px%22%20height%3D%2212px%22%20viewBox%3D%220%200%2018%2015%22%20version%3D%221.1%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20xmlns%3Axlink%3D%22http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink%22%3E%3Cpolygon%20id%3D%22Combined-Shape%22%20fill%3D%22%23ebebeb%22%20points%3D%228.98762301%200%200%209.12771969%200%2014.519983%209%205.40479869%2018%2014.519983%2018%209.12771969%22%3E%3C%2Fpolygon%3E%3C%2Fsvg%3E');"></div>    </section>

<!-- Sección 2: Imagen de fondo, título y dos inputs tipo calendario -->
<section class="wpb_wrapper" style="background-color: #bfbcbc; padding: 20px; position: relative;">
    <div class="container text-center">
        <h2 class="mt-4">Reservación de Cabañas</h2>
        <!-- Aquí colocamos la imagen desde el directorio "public/img" -->
        <img src="{{ asset('img/img/chalate_1.png') }}" alt="Imagen" class="img-fluid">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <div class="form-inline">
                <div class="form-group mr-2">
                    <input type="date" class="form-control" placeholder="Fecha de Check-In">
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" placeholder="Fecha de Check-Out">
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- Sección 3: Formulario -->
    <section class="container" style="background-color: #f0f0f0; padding: 20px;">
        <h1 style="color: #007BFF;" class="mt-4">Reservación de Cabañas</h1>
        <form action="{{ route('cabin.reservation.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="cabin">Selecciona una cabaña:</label>
                <select name="cabin" id="cabin" class="form-control">
                    <!-- Aquí puedes cargar las opciones de cabañas desde tu base de datos -->
                    <option value="1">Cabaña 1</option>
                    <option value="2">Cabaña 2</option>
                    <!-- Agrega más opciones según sea necesario -->
                </select>
            </div>
            
            <div class="form-group">
                <label for="check_in">Fecha de Check-In:</label>
                <input type="date" name="check_in" id="check_in" class="form-control">
            </div>

            <div class="form-group">
                <label for="check_out">Fecha de Check-Out:</label>
                <input type="date" name="check_out" id="check_out" class="form-control">
            </div>

            <div class="form-group">
                <label for="guests">Número de Huéspedes:</label>
                <input type="number" name="guests" id="guests" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Reservar</button>
        </form>
    </section>
@endsection
