@extends('layouts.app')
@section('title', 'galeria')

@section('content-admin')
<!-- En tu archivo de diseño (layouts.app), dentro de la sección head -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-3">Modulo Galeria</h1>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearGaleriaModal">
                    Crear Galería
                </button>
                <div class="card mt-3">
                    <div class="card-body">

                        <table id="myDataTable" class="table table-hover table-striped table-responsive-lg">
                            <thead class="thead-dark">
                                
                                <tr>
                                    <th>ID</th>
                                    <th>Imagen</th>
                                    <th>Empresa</th>
                                    <th>Sucursal</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($galerias as $galeria)
                                    <tr>
                                        <td>{{ $galeria->id }}</td>
                                        <td><img src="{{ asset('storage/images/' . $galeria->imagen) }}"
                                                alt="Imagen de la galería" style="max-width: 100px;"></td>
                                        <td>{{ $galeria->empresa }}</td>
                                        <td>{{ $galeria->sucursal }}</td>
                                        <td>{{ $galeria->descripcion }}</td>

                                            <td>
                                                <a href="{{ route('galerias.edit', $galeria->id) }}"  class="btn btn-outline-info">Editar</a>
                                                <!-- Botón para eliminar -->
                                                <form action="{{ route('galerias.destroy', $galeria->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro?')">
                                                        <i class="fas fa-trash"></i> Eliminar
                                                    </button>
                                                </form>
                                            </td>



                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="crearGaleriaModal" tabindex="-1" role="dialog" aria-labelledby="crearGaleriaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearGaleriaModalLabel">Crear Nueva Galería</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para crear la galería -->
                    <form action="{{ route('galerias.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="ubicacion">Ubicación:</label>
                            <input type="text" class="form-control" name="ubicacion" id="ubicacion">
                        </div>
                        <div class="form-group">
                            <label for="imagen">Imagen:</label>
                            <input type="file" class="form-control-file" name="imagen" id="imagen">
                        </div>
                        <div class="form-group">
                            <label for="sucursal">Empresa:</label>
                            <select class="form-control" name="empresa" id="empresa">
                                @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="sucursal">Sucursal:</label>
                            <select class="form-control" name="sucursal" id="sucursal">
                                @foreach ($sucursales as $sucursal)
                                    <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Crear Galería</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@section('js')

<script>
    new DataTable('#myDataTable', {
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        lengthMenu: [
            [5, 10, 50, -1],
            [5, 10, 50, "Todos"]
        ]
    });
      // Inicializar modales
      $('[data-toggle="modal"]').each(function () {
            let target = $(this).data('target');
            $(target).modal({
                show: false,
                backdrop: 'static',
                keyboard: false
            });
        });
</script>

@endsection
@endsection
