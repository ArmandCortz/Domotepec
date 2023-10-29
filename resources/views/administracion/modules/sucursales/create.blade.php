@extends('adminlte::page')
@section('title', 'Sucursales')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link rel="stylesheet" href="{{ asset('/css/admin/app.css') }}">
@endsection
@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center py-2 mb-2">Crear Sucursal</h1>

                    <div class="card">

                        <div class="card-body">
                            <form method="POST" action="{{ route('sucursales.store') }}">
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
                                            <label for="direccion"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Direccion') }}</label>

                                            <div class="col-md-8">
                                                <input id="direccion" type="text"
                                                    class="form-control @error('direccion') is-invalid @enderror"
                                                    name="direccion" value="{{ old('direccion') }}"
                                                    autocomplete="direccion" autofocus>

                                                @error('direccion')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row mb-3">
                                            <label for="telefono"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Telefono') }}</label>
                                            <div class="col-md-8">

                                                <input id="telefono" type="text"
                                                    class="form-control @error('telefono') is-invalid @enderror"
                                                    name="telefono" value="{{ old('telefono') }}" autocomplete="telefono">
                                                @error('telefono')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col">
                                        <div class="row mb-3">
                                            <label for="gerente"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Gerente') }}</label>

                                            <div class="col-md-8">
                                                <input id="gerente" type="text"
                                                    class="form-control @error('gerente') is-invalid @enderror"
                                                    name="gerente" value="{{ old('gerente') }}" autocomplete="gerente"
                                                    autofocus>

                                                @error('gerente')
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
                                <div class="modal-footer">
                                    <a href="{{ route('sucursales.index') }}" type="button"
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
    <!-- Incluye Cleave.js y cleave-phone.sv.js -->
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/addons/cleave-phone.sv.js"></script>
    <script>
        const phoneInputField = document.querySelector("#telefono");

        const cleave = new Cleave(phoneInputField, {
            phone: true, // Esto aplica el formato de número de teléfono
            phoneRegionCode: '{country}', // Código de región para El Salvador
            delimiter: " ", // Espacio como separador
            blocks: [4, 4, 4], // Bloques para el formato del número
            numericOnly: true, // Asegura que solo se permitan caracteres numéricos
            uppercase: true, // Convierte letras a mayúsculas
            prefix: "+503", // Prefijo de código de país para El Salvador
        });

        // Estilo personalizado (ajusta según tus necesidades)
        phoneInputField.style.width = "100%"; // Ajusta el ancho al 100%
        phoneInputField.style.padding = "10px"; // Ajusta el relleno
        phoneInputField.style.border = "1px solid #ccc"; // Añade un borde
    </script>

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