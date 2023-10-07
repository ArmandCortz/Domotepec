@extends('layouts.app')
@section('title', 'Usuarios')
@section('css')
    <link rel="stylesheet" href="{{asset('/css/admin/app.css')}}">
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
                <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-user"></i> Crear Usuario</a>
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
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td width="200px">


                                            <a type="button" class="btn btn-outline-primary" data-toggle="modal"
                                                data-target="#modal-edit-{{ $user->id }}">
                                                <i class="fas fa-pen"></i> Editar
                                            </a>


                                            @include('administracion.modules.users.editar')


                                            @if (Auth::user()->name === $user->name)
                                                <button type="submit" class="btn btn-outline-danger" disabled><i
                                                        class="fas fa-trash"></i> Eliminar</button>
                                            @else
                                                <a type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                    data-target="#modal-eliminar-{{ $user->id }}">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </a>
                                                @include('administracion.modules.users.eliminar')
                                            @endif

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
        new DataTable('#usuarios', {
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
    </script>

@endsection
@endsection
