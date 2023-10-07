@extends('adminlte::page')
@section('title', 'Cabañas')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

@endsection
@section('content')
<div class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-3">Modulo Cabañas</h1>
                <button class="btn btn-primary" data-toggle="modal" data-target="#crearCabaña">Crear Cabaña</button>
                <div class="card mt-3">
                    <div class="card-body">

                        <table class="table table-hover table-responsive-sm" id="myDataTable">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Ubicación</th>
                                    <th>Sucursal</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cabañas as $cabaña)
                                    <tr>
                                        <td>{{ $cabaña->id }}</td>
                                        <td>{{ $cabaña->nombre }}</td>
                                        <td>{{ $cabaña->ubicacion }}</td>
                                        <td>{{ $cabaña->sucursal }}</td>
                                        <td>{{ $cabaña->descripcion }}</td>
                                        <td>
                                            {{-- Ejemplo de enlace para mostrar detalles --}}
                                            <a type="button"class="btn btn-info btn-sm" data-toggle="modal" data-target="#crearCabañaModal{{ $cabaña->id }}"> Detalles  </a>


                                             <!-- Botón para eliminar -->
                                             <a type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('cabañas.destroy', $cabaña->id) }}')">
                                                <i class="fas fa-trash"></i> 
    
                                            </a>

                            
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
</div><script>
    function confirmDelete(url) {
        if (confirm('¿Estás seguro de que quieres eliminar esta cabaña?')) {
            window.location.href = url;
        }
    }
</script>
@include('administracion.modules.cabañas.modalCrearCabañas')
@include('administracion.modules.cabañas.modalUpdateCabañas')
@section('js')
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

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
                lengthMenu:[[5,10,50,-1],[5,10,50,"Todos"]]
            });
        </script>

    @endsection
@endsection


