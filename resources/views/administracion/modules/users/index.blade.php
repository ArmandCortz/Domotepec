@extends('layouts.app')
@section('title', 'Usuarios')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin/app.css') }}">
@endsection

@section('content-admin')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-3">Modulo Usuarios</h1>

                {{-- <a href="{{ route('users.create') }}" class="btn btn-primary" data-toggle="modal" 
                    <a href="{{ route('users.create') }}" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Crear Usuario</a> --}}
                {{-- <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                    Crear Usuario
                </a> --}}
                @can('users.create')
                    <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-user"></i> Crear Usuario</a>
                @endcan
                <div class="card mt-3">
                    <div class="card-body ">

                        <table id="usuarios" class="table table-hover table-striped table-responsive-lg">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    @if (Auth::user()->id !== $user->id)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td
                                                @if (auth()->user()->can('users.edit') &&
                                                        auth()->user()->can('users.destroy')) style="width: 200px;" @else style="width: 100px;" @endif>
                                            


                                            
                                                @can('users.edit')
                                                    <a type="button" href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-outline-primary">
                                                        <i class="fas fa-pen"></i> Editar
                                                    </a>
                                                @endcan
                                                {{-- <a type="button" class="btn btn-outline-primary" data-toggle="modal"
                                                    data-target="#modal-edit-{{ $user->id }}">
                                                    <i class="fas fa-pen"></i> Editar
                                                </a> 
                                                @include('administracion.modules.users.editar') --}}
                                                @can('users.destroy')
                                                    <a type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                        data-target="#modal-eliminar-{{ $user->id }}">
                                                        <i class="fas fa-trash"></i> Eliminar
                                                    </a>
                                                    @include('administracion.modules.users.eliminar')
                                                @endcan
                                            </td>
                                        </tr>
                                    @endif
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
        new DataTable('#usuarios', {
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando del _START_ al _END_ de un total de _TOTAL_ Usuarios",
                "infoEmpty": "",
                "infoFiltered": "(_MAX_ usuarios filtrados)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Usuarios",
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
