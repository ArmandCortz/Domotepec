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
                <div class="section rounded p-4"
                    style="background-color: rgba(140, 160, 165, 0.8); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
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
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#modal{{ $galeria->id }}">
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
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detalle de la
                                                        Imagen</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('storage/images/' . $galeria->imagen) }}"
                                                        class="img-fluid" alt="Galería Image" />
                                                        <br>
                                                        <br>
                                                    <p><strong>Descripción:</strong> {{ $galeria->descripcion }}</p>
                                                    <p><strong>Ubicación:</strong> {{ $galeria->ubicacion }}</p>
                                                    <button type="submit" class="btn btn-primary btn-block" onclick="window.location.href = 'reservaciones';">Reservar</button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                        

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>
@endsection
@section('js')
    <script>
        document.getElementById('sucursalSelect').addEventListener('change', function () {
            // Obtener el valor seleccionado del select
            var selectedSucursal = this.value;

            // Enviar una solicitud AJAX para obtener las galerías de la sucursal seleccionada
            axios.get('{{ route('galerias.indexs') }}', {
                params: {
                    sucursal: selectedSucursal
                }
            })
            .then(response => {
                // Limpiar el contenedor actual de galerías
                var galeriasContainer = document.getElementById('galeriasContainer');
                galeriasContainer.innerHTML = '';

                // Agregar las nuevas galerías al contenedor
                response.data.forEach(galeria => {
                    galeriasContainer.innerHTML += `
                        <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                            <!-- Imagen con zoom -->
                            <div class="zoom">
                                <div class="thumbex">
                                    <div class="thumbnail">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal${galeria.id}">
                                            <img src="{{ asset('storage/images/') }}/${galeria.imagen}" class="img-fluid mb-2" style="height:110%; width:110%;" alt="Galería Image" />
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="modal${galeria.id}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <!-- Contenido del modal -->
                            </div>
                        </div>
                    `;
                });
            })
            .catch(error => {
                console.error('Error al cargar galerías:', error);
            });
        });
    </script>
@endsection

