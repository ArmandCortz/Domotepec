@extends('layouts.app_users')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/galeria.css') }}">
@endpush
@section('content')
    <!-- Main content -->
    <section class="content">
        {{-- primera galeria --}}
        <div class="row">
            <div class="col-12">
                <div class="section rounded p-4" style="background-color: rgba(140, 160, 165, 0.8); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h1 style="color: #fbfbfb; line-height: 50px; text-align: center;">Galería</h1>
                    <p style="color: #000000; text-align: center;">
                        Conoce más detalles sobre Domotepec
                    </p>
                        <div class="container mt-1">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form action="{{ route('galerias.indexs') }}" method="GET" class="mb-3">
                                        <div class="form-group text-center">
                                            <label for="sucursal" class="mb-2">Seleccionar Sucursal:</label>
                                            <select class="form-control" name="sucursal" id="sucursal">
                                                <option value="">Todas las Sucursales</option>
                                                @foreach ($sucursales as $sucursal)
                                                    <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                            <button type="submit" class="btn btn-primary btn-block">Filtrar</button>

                                        </div>
                                    
                                    </form>
                                </div>
                            </div>
                </div>
                
          
                    <div class="card-body">
                        <div class="row">
                            @foreach ($galerias as $galeria)
                                <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                                    {{-- imagen con zoom --}}
                                    <div class="zoom">
                                        <div class="thumbex">
                                            <div class="thumbnail">
                                                <a data-bs-toggle="modal" data-bs-target="#modal{{ $galeria->id }}">
                                                    <img src="{{ asset('storage/images/' . $galeria->imagen) }}"
                                                        class="img-fluid mb-2" style="height:110%; width:110%;"
                                                        alt="Galería Image" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
    
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal{{ $galeria->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <!-- Contenido del modal -->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
    </section>
@endsection
