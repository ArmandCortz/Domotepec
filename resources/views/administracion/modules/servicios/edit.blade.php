@extends('adminlte::page')
@section('title', 'Servicios')

@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center py-2 mb-2">Editar Servicio</h1>

                    <div class="card">

                        <div class="card-body">
                            <form method="POST" action="{{ route('users.store') }}">
                                @csrf

                                <div class="row row-cols-2">
                                    <div class="col">
                                        <div class="row mb-3">
                                            <label for="nombre"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                            <div class="col-md-8">
                                                <input id="nombre" type="text"
                                                    class="form-control @error('nombre') is-invalid @enderror"
                                                    name="nombre" value="{{ $servicio->nombre }}" autocomplete="nombre"
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
                                            <label for="sucursal"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Sucursal') }}</label>

                                            <div class="col-md-8">
                                                <select id="sucursal" name="sucursal"
                                                    class="form-control @error('sucursal') is-invalid @enderror"
                                                    autocomplete="sucursal">
                                                    <option value="{{ $servicio->sucursal }}"
                                                        >

                                                    @foreach ($sucursales as $sucursal)
                                                        <option value="{{ $sucursal->id }}"
                                                            {{ $sucursal->id == $servicio->sucursal ? 'selected' : '' }}>
                                                            {{ $sucursal->nombre }} </option>
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


                                    <div class="col">
                                        <div class="row mb-3">
                                            <label for="nombre"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Costo') }}</label>

                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input id="cantidad" type="number"
                                                        class="form-control @error('cantidad') is-invalid @enderror"
                                                        name="cantidad" value="{{$servicio->costo}}" step="0.01"
                                                        min="0.01" autocomplete="cantidad" autofocus>
                                                </div>

                                                @error('cantidad')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row mb-3">
                                            <label for="nombre"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Estado') }}</label>

                                            <div class="col-md-8">
                                                <select id="estado" name="estado"
                                                    class="form-control @error('estado') is-invalid @enderror"
                                                    autocomplete="estado" autofocus>
                                                    <option value="1"
                                                        {{ $servicio->estado == '1' ? 'selected' : '' }}>Activo</option>
                                                    <option value="2"
                                                        {{ $servicio->estado == '2' ? 'selected' : '' }}>Inactivo
                                                    </option>
                                                </select>

                                                @error('estado')
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
                                                    rows="6" autocomplete="descripcion" autofocus placeholder="Escribe una descripcion para el servicio">{{$servicio->descripcion}}</textarea>

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
                            <a href="{{ route('servicios.index') }}" type="button"
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
