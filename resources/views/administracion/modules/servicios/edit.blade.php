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
                            <form method="POST" action="{{ route('servicios.update', $servicio->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

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
                                                class="col-md-4 col-form-label text-md-end">{{ __('Empresa') }}</label>

                                            <div class="col-md-8">
                                                <select id="empresa" name="empresa"
                                                    class="form-control @error('empresa') is-invalid @enderror"
                                                    autocomplete="empresa">
                                                    <option value="" selected>Selecciona una empresa</option>

                                                    @foreach ($empresas as $empresa)
                                                        <option value="{{ $empresa->id }}"
                                                            {{ $empresa->id == $servicio->sucursal ? 'selected' : '' }}>
                                                            {{ $empresa->nombre }} </option>
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
                                                        name="costo" value="{{ $servicio->costo }}" step="0.01"
                                                        min="0.01" autocomplete="costo" autofocus>
                                                </div>

                                                @error('costo')
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
                                                    <option value="{{ $servicio->sucursal }}">

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
                                            <label for="stock"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Stock') }}</label>
                                            <div class="col-md-8">
                                                <input id="stock" type="number"
                                                    class="form-control @error('stock') is-invalid @enderror" name="stock"
                                                    value="{{ $servicio->stock }}" autocomplete="stock" autofocus>
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
                                    <div class="col col-6">
                                        <div class="row mb-3">
                                            <label for="nombre"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Descripción') }}</label>

                                            <div class="col-md-8">
                                                <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                                                    rows="10" autocomplete="descripcion" autofocus placeholder="Escribe una descripcion para la cabana">{{ $servicio->descripcion }}</textarea>

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
                                                <img id="imagen-preview"
                                                    src="{{ asset('img/servicios/' . ($servicio->imagen ?? 'img.png')) }}"
                                                    alt="Imagen de la cabana"
                                                    style="width: 400px; height: 200px; max-width: 100%; max-height: 200px; border-radius: 15px;">
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
