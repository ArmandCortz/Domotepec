@extends('adminlte::page')
@section('title', 'Cabanas')

@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center py-2 mb-2">Crear Cabanas</h1>

                    <div class="card">

                        <div class="card-body">
                            <form method="POST" action="{{ route('cabanas.store') }}" enctype="multipart/form-data">
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
                                                    autocomplete="sucursal" value="{{ old('sucursal') }}">
                                                    <option value="" selected disabled>Selecciona una sucursal

                                                        @foreach ($sucursales as $sucursal)
                                                    <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }} </option>
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
                                            <label for="precio"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Precio') }}</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input id="precio" type="number"
                                                        class="form-control @error('precio') is-invalid @enderror"
                                                        name="precio" value="{{ old('precio') }}" autocomplete="precio"
                                                        step="0.01" min="0.01" autofocus>
                                                    @error('precio')
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
                                            <label for="huespedes"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Maximo de huespedes') }}</label>
                                            <div class="col-md-8">
                                                <input id="huespedes" type="number"
                                                    class="form-control @error('huespedes') is-invalid @enderror"
                                                    name="huespedes" value="{{ old('huespedes') }}"
                                                    autocomplete="huespedes" autofocus>
                                                @error('huespedes')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row mb-3">
                                            <label for="habitaciones"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Habitaciones') }}</label>
                                            <div class="col-md-8">
                                                <input id="habitaciones" type="number"
                                                    class="form-control @error('habitaciones') is-invalid @enderror"
                                                    name="habitaciones" value="{{ old('habitaciones') }}"
                                                    autocomplete="habitaciones" autofocus>
                                                @error('habitaciones')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row mb-3">
                                            <label for="camas"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Camas') }}</label>
                                            <div class="col-md-8">
                                                <input id="camas" type="number"
                                                    class="form-control @error('camas') is-invalid @enderror"
                                                    name="camas" value="{{ old('camas') }}" autocomplete="camas"
                                                    autofocus>
                                                @error('camas')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row mb-3">
                                            <label for="baños"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Baños') }}</label>
                                            <div class="col-md-8">
                                                <input id="baños" type="number"
                                                    class="form-control @error('baños') is-invalid @enderror"
                                                    name="baños" value="{{ old('baños') }}" autocomplete="baños"
                                                    autofocus>
                                                @error('baños')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row mb-3">
                                            <label for="limpieza"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Tarifa de limpieza') }}</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input id="limpieza" type="number"
                                                        class="form-control @error('limpieza') is-invalid @enderror"
                                                        name="limpieza" value="{{ old('limpieza') }}"
                                                        autocomplete="limpieza" step="0.01" min="0.01" autofocus>
                                                    @error('limpieza')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col"></div>
                                    <div class="col col-6">
                                        <div class="row mb-3">
                                            <label for="nombre"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Descripción') }}</label>

                                            <div class="col-md-8">
                                                <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                                                    rows="10" autocomplete="descripcion" autofocus placeholder="Escribe una descripcion para la cabana">{{ old('descripcion') }}</textarea>

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
                                                    <label for="imagen">

                                                        <div class="upload-button form-control @error('imagen') is-invalid @enderror"
                                                            style="cursor: pointer;
                                                        width: auto;
                                                        border-radius: 8px;
                                                        height: 40px;
                                                        background-color: rgb(255, 255, 255);
                                                        border-color:rgb(206, 207, 208);
                                                        display: grid;
                                                        justify-content: center;
                                                        align-items: center;
                                                        font-size: 20px;
                                                        font-weight: 600">
                                                            Seleccionar Archivo </div>
                                                    </label>
                                                    <input type="file" name="imagen" id="imagen" accept="image/*"
                                                        class="form-control @error('imagen') is-invalid @enderror"
                                                        style="display:none">
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
                            <a href="{{ route('cabanas.index') }}" type="button"
                                class="btn btn-outline-danger">Cancelar</a>
                            <button type="submit" class="btn btn-outline-primary">Guardar</button>
                        </div>

                        </form>
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
