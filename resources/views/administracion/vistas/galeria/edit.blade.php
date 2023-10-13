@extends('layouts.app')

@section('title', 'Editar Galería')

@section('content-admin')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-3">Editar Galería</h1>
                <!-- Formulario para editar la galería -->
                <form action="{{ route('galerias.update', $galeria->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3">{{ $galeria->descripcion }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="ubicacion">Ubicación:</label>
                        <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="{{ $galeria->ubicacion }}">
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen:</label>
                        <input type="file" class="form-control-file" name="imagen" id="imagen">
                    </div>
                    <div class="form-group">
                        <label for="empresa">Empresa:</label>
                        <select class="form-control" name="empresa" id="empresa">
                            @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->id }}" {{ $empresa->id == $galeria->empresa ? 'selected' : '' }}>{{ $empresa->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sucursal">Sucursal:</label>
                        <select class="form-control" name="sucursal" id="sucursal">
                            @foreach ($sucursales as $sucursal)
                                <option value="{{ $sucursal->id }}" {{ $sucursal->id == $galeria->sucursal ? 'selected' : '' }}>{{ $sucursal->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
@endsection
