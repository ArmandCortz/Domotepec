@extends('layouts.app')
@section('title', 'Empresas')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin/app.css') }}">
@endsection

@section('content-admin')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-3">Modulo Empresas</h1>

                <a href="{{ route('empresas.create') }}" class="btn btn-outline-primary"><i class="fas fa-user"></i> Crear
                    Empresa</a>
                <div class="card mt-3">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="empresa" class="table table-hover table-responsive-md"
                                style=" border-radius: 5px; overflow: hidden;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        {{-- <th>Stock</th> --}}
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empresas as $empresa)
                                        <tr>
                                            <td>{{ $empresa->id }}</td>
                                            <td>
                                                @if ($empresa->imagen)
                                                    <img src="{{ asset('img/empresas/' . $empresa->imagen) }}"
                                                        alt="Imagen de la empresa"
                                                        style="max-width: 100px; max-height: 100px;  border-radius: 5px; overflow: hidden;">
                                                @else
                                                    <img src="{{ asset('img/empresas/img.png') }}" alt="No hay imagen"
                                                        style="max-width: 50px;  border-radius: 5px; overflow: hidden;">
                                                @endif
                                            </td>
                                            <td>{{ $empresa->nombre }}</td>
                                            <td
                                                @if (auth()->user()->can('empresas.edit') &&
                                                        auth()->user()->can('empresas.destroy')) style="width: 200px;" @else style="width: 100px;" @endif>



                                                @can('empresas.edit')
                                                    <a type="button" href="{{ route('empresas.edit', $empresa->id) }}"
                                                        class="btn btn-outline-primary">
                                                        <i class="fas fa-pen"></i> Editar
                                                    </a>
                                                @endcan
                                                @can('empresas.destroy')
                                                    <a type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                        data-target="#modal-eliminar-{{ $empresa->id }}">
                                                        <i class="fas fa-trash"></i> Eliminar
                                                    </a>
                                                    @include('administracion.modules.empresas.delete')
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
        new DataTable('#empresa', {
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Empresas",
                "infoEmpty": "Mostrando 0 a 0 de 0 Empresas",
                "infoFiltered": "(Filtrado de _MAX_ total Empresas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Empresas",
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
