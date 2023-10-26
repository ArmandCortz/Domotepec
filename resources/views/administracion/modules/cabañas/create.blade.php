@extends('adminlte::page')
@section('title', 'Cabañas')

@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center py-2 mb-2">Crear Cabañas</h1>

                    <div class="card">

                        <div class="card-body">
                            <form method="POST" action="{{ route('cabañas.store') }}">
                                @csrf

                                <div class="row row-cols-2">
                                    <div class="col">
                                        <div class="row mb-3">
                                            <label for="nombre"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                            <div class="col-md-8">
                                                <input id="nombre" type="text"
                                                    class="form-control @error('nombre') is-invalid @enderror"
                                                    name="nombre" value="{{ old('nombre') }}" autocomplete="nombre"
                                                    autofocus>

                                                @error('nombre')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row mb-3">
                                            <label for="ubicacion"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Ubicacion') }}</label>

                                            <div class="col-md-8">
                                                <input id="ubicacion" type="text"
                                                    class="form-control @error('ubicacion') is-invalid @enderror"
                                                    name="ubicacion" value="{{ old('ubicacion') }}" autocomplete="ubicacion"
                                                    autofocus>

                                                @error('ubicacion')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row mb-3">
                                            <label for="sucursal"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Sucursal') }}</label>

                                            <div class="col-md-8">
                                                <select id="sucursal" name="sucursal"
                                                    class="form-control @error('sucursal') is-invalid @enderror"
                                                    autocomplete="sucursal">
                                                    <option value="" selected disabled>Selecciona una sucursal

                                                    @foreach ($sucursales as $sucursal)
                                                        <option value="{{$sucursal->id}}">{{ $sucursal->nombre }} </option>
                                                    @endforeach
                                                    
                                                </select>

                                                @error('sucursal')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col col-12">
                                        <div class="row mb-3">
                                            <label for="nombre"
                                                class="col-md-2 col-form-label text-md-end">{{ __('Descripción') }}</label>

                                            <div class="col-md-10">
                                                <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                                                    rows="6" autocomplete="descripcion" autofocus placeholder="Escribe una descripcion para la cabaña">{{ old('descripcion') }}</textarea>

                                                @error('descripcion')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>



                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('cabañas.index') }}" type="button"
                                class="btn btn-outline-danger">Cancelar</a>
                            <button type="submit" class="btn btn-outline-primary">Guardar</button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
