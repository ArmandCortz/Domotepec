@extends('layouts.app')
@section('title', 'Servicios')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin/app.css') }}">
@endsection

@section('content-admin')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-3">Modulo Cabañas</h1>

                {{-- <a href="{{ route('users.create') }}" class="btn btn-primary" data-toggle="modal" 
                    <a href="{{ route('users.create') }}" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Crear Usuario</a> --}}
                {{-- <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                    Crear Usuario
                </a> --}}
                @can('cabañas.create')
                    <a href="{{ route('cabañas.create') }}" class="btn btn-outline-primary"><i class="fas fa-user"></i> Crear
                        Cabañas</a>
                @endcan

                <div class="card mt-3">
                    <div class="card-body ">

                        <table class="table table-hover table-responsive-sm" id="cabañas"
                            style=" border-radius: 5px; overflow: hidden;">
                            <thead class="thead-dark">
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
                                        @foreach ($sucursales as $sucursal)
                                            @if ($cabaña->sucursal === $sucursal->id)
                                                <td>{{ $sucursal->nombre }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ $cabaña->descripcion }}</td>
                                        <td
                                            @if (auth()->user()->can('cabañas.edit') &&
                                                    auth()->user()->can('cabañas.destroy')) style="width: 200px;" @else style="width: 100px;" @endif>




                                            @can('cabañas.edit')
                                                <a type="button" href="{{ route('cabañas.edit', $cabaña->id) }}"
                                                    class="btn btn-outline-primary">
                                                    <i class="fas fa-pen"></i> Editar
                                                </a>
                                            @endcan
                                            @can('cabañas.destroy')
                                                <a type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                    data-target="#modal-eliminar-{{ $cabaña->id }}">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </a>
                                            @endcan
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


@section('js')
    <script>
        @if (session('success'))
            {
                alertify.notify("{{ session('success') }}", 'success', 5);
            }
        @endif
        @if (session('error'))
            {
                alertify.error("{{ session('error') }}", 'error', 5);
            }
        @endif
        @if (session('info'))
            {
                alertify.notify("{{ session('info') }}", 'custom', 5);
            }
        @endif
    </script>
    <script>
        new DataTable('#cabañas', {
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando del _START_ al _END_ de un total de _TOTAL_ servicios",
                "infoEmpty": "",
                "infoFiltered": "(_MAX_ servicios filtrados)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ servicios",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron coincidencias",
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
    </script>

@endsection
@endsection
