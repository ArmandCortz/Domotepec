@extends('layouts.app')
@section('title', 'Cabanas')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin/app.css') }}">
@endsection

@section('content-admin')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-3">Modulo Cabanas</h1>

                {{-- <a href="{{ route('users.create') }}" class="btn btn-primary" data-toggle="modal" 
                    <a href="{{ route('users.create') }}" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Crear Usuario</a> --}}
                {{-- <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                    Crear Usuario
                </a> --}}
                @can('cabanas.create')
                    <a href="{{ route('cabanas.create') }}" class="btn btn-outline-primary"><i class="fas fa-user"></i> Crear
                        Cabanas</a>
                @endcan

                <div class="card mt-3">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="cabanas" class="table table-hover table-responsive-md"
                                style=" border-radius: 5px; overflow: hidden;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Ubicación</th>
                                        <th>Sucursal</th>
                                        {{-- <th>Descripción</th> --}}
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cabanas as $cabana)
                                        <tr>
                                            <td>{{ $cabana->id }}</td>
                                            <td>
                                                @if ($cabana->imagen)
                                                    <img src="{{ asset('img/cabanas/' . $cabana->imagen) }}"
                                                        alt="Imagen de la cabana"
                                                        style="max-width: 100px;  border-radius: 5px; overflow: hidden;">
                                                @else
                                                    <img src="{{ asset('img/cabanas/img.png') }}" alt="No hay imagen"
                                                        style="max-width: 50px;  border-radius: 5px; overflow: hidden;">
                                                @endif
                                            </td>

                                            <td>
                                                <p class="d-flex align-items-center justify-content-center">
                                                    {{ $cabana->nombre }}</p>
                                            </td>
                                            <td>{{ $cabana->ubicacion }}</td>
                                            @foreach ($sucursales as $sucursal)
                                                @if ($cabana->sucursal === $sucursal->id)
                                                    <td>{{ $sucursal->nombre }}</td>
                                                @endif
                                            @endforeach
                                            {{-- <td>{{ $cabana->descripcion }}</td> --}}
                                            <td
                                                @if (auth()->user()->can('cabanas.edit') &&
                                                        auth()->user()->can('cabanas.destroy')) style="width: 200px;" @else style="width: 100px;" @endif>

                                                @can('cabanas.edit')
                                                    <a type="button" href="{{ route('cabanas.edit', $cabana->id) }}"
                                                        class="btn btn-outline-primary">
                                                        <i class="fas fa-pen"></i> Editar
                                                    </a>
                                                @endcan
                                                @can('cabanas.destroy')
                                                    <a type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                        data-target="#modal-eliminar-{{ $cabana->id }}">
                                                        <i class="fas fa-trash"></i> Eliminar
                                                    </a>
                                                    @include('administracion.modules.cabanas.delete')
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
    </div>



@endsection
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
        new DataTable('#cabanas', {
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando del _START_ al _END_ de un total de _TOTAL_ cabanas",
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
