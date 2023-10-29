@extends('adminlte::page')
@section('title', 'Servicios')

@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center py-2 mb-2">Crear Bienes</h1>

                    <div class="card">

                        <div class="card-body">
                            <form method="POST" action="{{ route('bienes.store') }}" enctype="multipart/form-data">
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
                                            <label for="sucursal"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Empresa') }}</label>

                                            <div class="col-md-8">
                                                <select id="empresa" name="empresa"
                                                    class="form-control @error('empresa') is-invalid @enderror"
                                                    autocomplete="empresa">
                                                    <option value="" selected disabled>Selecciona una empresa</option>

                                                    @foreach ($empresas as $empresa)
                                                        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}
                                                        </option>
                                                    @endforeach

                                                </select>

                                                @error('empresa')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row mb-3">
                                            <label for="costo"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Costo') }}</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input id="costo" type="number"
                                                        class="form-control @error('costo') is-invalid @enderror"
                                                        name="costo" value="{{ old('costo') }}" autocomplete="costo"
                                                        step="0.01" min="0.01" autofocus>
                                                    @error('costo')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
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
                                                    </option>

                                                    @foreach ($sucursales as $sucursal)
                                                        <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}
                                                        </option>
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
                                            <label for="stock"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Stock') }}</label>
                                            <div class="col-md-8">
                                                <input id="stock" type="number"
                                                    class="form-control @error('stock') is-invalid @enderror" name="stock"
                                                    value="{{ old('stock') }}" autocomplete="stock" autofocus>
                                                @error('stock')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row mb-3">
                                            <label for="estado"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Estado') }}</label>

                                            <div class="col-md-8">
                                                <select id="estado" name="estado"
                                                    class="form-control @error('estado') is-invalid @enderror"
                                                    autocomplete="estado" autofocus>
                                                    <option value="1"
                                                        {{ old('estado') == 'Activo' ? 'selected' : '' }}>Activo</option>
                                                    <option value="2"
                                                        {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo
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

                                    <div class="col col-6">
                                        <div class="row mb-3">
                                            <label for="nombre"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Descripción') }}</label>

                                            <div class="col-md-8">
                                                <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                                                    rows="10" autocomplete="descripcion" autofocus placeholder="Escribe una descripcion para la cabaña">{{ old('descripcion') }}</textarea>

                                                @error('descripcion')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col col-6">
                                        <div class="row mb-3">
                                            <label for="imagen"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Imagen') }}</label>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="file" name="imagen" id="imagen" accept="image/*"
                                                        class="form-control @error('imagen') is-invalid @enderror">
                                                    @error('imagen')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div style="text-align: center;">
                                            <div class="img-fluid">
                                                <img id="imagen-preview" src="#" alt="Vista previa de la imagen"
                                                    style="width: 400px; height: 200px; max-width: 100%; max-height: 200px; display: none; margin: 0 auto;">

                                            </div>
                                        </div>
                                    </div>

                                </div>

                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('bienes.index') }}" type="button"
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
@section('js')
    <script>
        document.getElementById('imagen').addEventListener('change', function() {
            const imagenPreview = document.getElementById('imagen-preview');
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagenPreview.src = e.target.result;
                    imagenPreview.style.display = 'block';
                    imagenPreview.style.borderRadius = '15px'; // Propiedad corregida
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

@endsection
