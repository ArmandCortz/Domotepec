@extends('layouts.app')

@section('content')
@extends('layouts.components.navbar')

    <div class="container">
        <h1 style="color: #007BFF;"class="mt-4">Reservación de Cabañas</h1>
        
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
    </div>
@endsection
