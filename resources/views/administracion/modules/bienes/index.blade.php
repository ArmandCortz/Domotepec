@extends('layouts.app')
@section('title', 'Bienes')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin/app.css') }}">
@endsection

@section('content-admin')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-3">Modulo Bienes</h1>

                <a href="{{ route('bienes.create') }}" class="btn btn-outline-primary"><i class="fas fa-user"></i> Crear
                    Bienes</a>
                <div class="card mt-3">
                    <div class="card-body ">

                        <table id="bienes" class="table table-hover table-striped table-responsive-lg"
                            style=" border-radius: 5px; overflow: hidden;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Sucursal</th>
                                    <th>Empresa</th>
                                    <th>Costo</th>
                                    <th>Stock</th>
                                    {{-- <th>Stock</th> --}}
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bienes as $bien)
                                    <tr>
                                        <td>{{ $bien->id }}</td>
                                        <td>{{ $bien->nombre }}</td>
                                        @foreach ($sucursales as $sucursal)
                                            @if ($bien->sucursal === $sucursal->id)
                                                <td>{{ $sucursal->nombre }}</td>
                                            @endif
                                        @endforeach
                                        @foreach ($empresas as $empresa)
                                            @if ($bien->empresa === $empresa->id)
                                                <td>{{ $empresa->nombre }}</td>
                                            @endif
                                        @endforeach
                                        <td>${{ number_format($bien->costo, 2, '.', ',') }}</td>
                                        <td>{{ $bien->stock }}</td>

                                        <td
                                            @if (auth()->user()->can('bienes.edit') &&
                                                    auth()->user()->can('bienes.destroy')) style="width: 200px;" @else style="width: 100px;" @endif>



                                            @can('bienes.edit')
                                                <a type="button" href="{{ route('bienes.edit', $bien->id) }}"
                                                    class="btn btn-outline-primary">
                                                    <i class="fas fa-pen"></i> Editar
                                                </a>
                                            @endcan
                                            @can('bienes.destroy')
                                                <a type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                    data-target="#modal-eliminar-{{ $bien->id }}">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </a>
                                                @include('administracion.modules.bienes.delete')
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
        new DataTable('#bienes', {
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
