@extends('adminlte::page')
@section('title', 'Servicios')

@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center py-2 mb-2">Editar Empresa</h1>

                    <div class="card">

                        <div class="card-body">
                            <form method="POST"
                                action="{{ route('empresas.update', $empresa->id) }}"enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row row-cols-2">
                                    <div class="col col-6">
                                        <div class="row mb-3">
                                            <label for="nombre"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                            <div class="col-md-8">
                                                <input id="nombre" type="text"
                                                    class="form-control @error('nombre') is-invalid @enderror"
                                                    name="nombre" value="{{ $empresa->nombre }}" autocomplete="nombre"
                                                    autofocus>

                                                @error('nombre')
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
                                                class="col-md-4 col-form-label text-md-end">{{ __('Logo') }}</label>

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
                                                    src="{{ asset('img/empresas/' . ($empresa->imagen ?? 'img.png')) }}"
                                                    alt="Imagen de la empresa"
                                                    style="width: 200px; height: 200px; max-width: 200px; max-height: 200px; border-radius: 15px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>



                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('empresas.index') }}" type="button"
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
