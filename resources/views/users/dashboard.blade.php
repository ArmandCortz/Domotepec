@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
    <div class="container">
        <div class="container" style="position: relative; display: inline-block;">
            <img src="img/surfcity.jpg" style="width: 70%; height: 400px; border-radius: 5%; " alt="Imagen">
            <form class="formulario" style="position: absolute; padding-top: 5%; top: 0; right: 1%;">
                <!-- Contenido del formulario -->
                <div class="card ">
                    <div class="container" style="margin-top: 10px; padding-top: 10px;">
                        <h3 class="text-center py-2">Alojamientos en Domotepec</h3>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Llegada</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1"
                                        placeholder="name@example.com">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Salida</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1"
                                        placeholder="name@example.com">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Adultos</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                        placeholder="0">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Niños</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                        placeholder="0">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                        </div>
                        <div class="py-2"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
