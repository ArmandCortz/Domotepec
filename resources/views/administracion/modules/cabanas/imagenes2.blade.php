@extends('adminlte::page')
@section('title', 'Cabanas')

@section('content')
    <div class="content-header">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center py-2 mb-2">Imagenes de la cabana {{ $cabana->nombre }} </h1>

                    <div class="card">
                        <form method="POST" action="{{ route('cabanas.update', $cabana->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="row row-cols-2">
                                    @foreach ($imagenes as $imagen)
                                        <div class="col ">
                                            <div class="row mb-3">
                                                <div class="col-md-8 ">
                                                    <div class="form-group">

                                                        <input type="file" name="imagen"
                                                            id="imagen-{{ $imagen->clase }}" accept="image/*"
                                                            class="form-control @error('imagen') is-invalid @enderror"
                                                            style="display: none">
                                                        @error('imagen')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div style="text-align: center; position: relative;">
                                                <div class="img-container"
                                                    style="position: relative; display: inline-block;">
                                                    <img id="imagen-preview-{{ $imagen->clase }}"
                                                        src="{{ asset('img/cabanas/imagenes/' . ($imagen->imagen ?? 'img.png')) }}"
                                                        alt="Imagen de la cabana"
                                                        style="width: 400px; height: 200px; max-width: 100%; max-height: 200px; border-radius: 15px;">

                                                    <label for="imagen-{{ $imagen->clase }}" class="upload-label"
                                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; cursor: pointer; display: grid; justify-content: center; align-items: center; font-size: 20px; font-weight: 600;">
                                                        <div class="upload-button form-control @error('imagen') is-invalid @enderror"
                                                            style="cursor: pointer; width: auto; border-radius: 8px; height: 40px; background-color: rgb(255, 255, 255); border-color: rgb(206, 207, 208);">
                                                            <i class="fas fa-image"></i>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('cabanas.edit', $cabana->id) }}" type="button"
                                    class="btn btn-outline-danger">Cancelar</a>
                                <button type="submit" class="btn btn-outline-primary">Guardar</button>
                            </div>
                    </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.getElementById('imagen-1').addEventListener('change', function() {
            const imagenPreview = document.getElementById('imagen-preview-1');
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagenPreview.src = e.target.result;
                    imagenPreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
        document.getElementById('imagen-2').addEventListener('change', function() {
            const imagenPreview = document.getElementById('imagen-preview-2');
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagenPreview.src = e.target.result;
                    imagenPreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
        document.getElementById('imagen-3').addEventListener('change', function() {
            const imagenPreview = document.getElementById('imagen-preview-3');
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagenPreview.src = e.target.result;
                    imagenPreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
        document.getElementById('imagen-4').addEventListener('change', function() {
            const imagenPreview = document.getElementById('imagen-preview-4');
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagenPreview.src = e.target.result;
                    imagenPreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
        document.getElementById('imagen-5').addEventListener('change', function() {
            const imagenPreview = document.getElementById('imagen-preview-5');
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagenPreview.src = e.target.result;
                    imagenPreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
        document.getElementById('imagen-6').addEventListener('change', function() {
            const imagenPreview = document.getElementById('imagen-preview-6');
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagenPreview.src = e.target.result;
                    imagenPreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

@endsection
