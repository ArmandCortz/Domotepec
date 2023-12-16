@extends('layouts.app')
@section('title', 'Sucursales')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link rel="stylesheet" href="{{ asset('/css/admin/app.css') }}">

@endsection

@section('content-admin')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-3">Modulo Sucursales</h1>
                @can('sucursales.create')
                    <a href="{{ route('sucursales.create') }}" class="btn btn-outline-primary"><i class="fas fa-user"></i> Crear
                        Sucursal</a>
                @endcan <div class="card mt-3">
                    <div class="card-body">

                        <table class="table table-hover table-responsive-sm" id="sucursales"
                            style=" border-radius: 5px; overflow: hidden;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Empresa</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Gerente</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sucursales as $sucursal)
                                    <tr>
                                        <td>{{ $sucursal->id }}</td>
                                        <td>
                                            @if ($sucursal->imagen)
                                                <img src="{{ asset('img/sucursales/' . $sucursal->imagen) }}"
                                                    alt="Imagen de la empresa"
                                                    style="max-width: 100px;  border-radius: 5px; overflow: hidden;">
                                            @else
                                                <img src="{{ asset('img/sucursales/img.png') }}" alt="No hay imagen"
                                                    style="max-width: 50px;  border-radius: 5px; overflow: hidden;">
                                            @endif
                                        </td>
                                        <td>{{ $sucursal->nombre }}</td>
                                        @foreach ($empresas as $empresa)
                                            @if ($sucursal->empresa === $empresa->id)
                                                <td>{{ $empresa->nombre }}</td>
                                            @endif
                                        @endforeach

                                        <td>{{ $sucursal->direccion }}</td>
                                        <td>({{ substr($sucursal->telefono, 0, 4) }})
                                            {{ substr($sucursal->telefono, 4, 3) }}{{ substr($sucursal->telefono, 7) }}
                                        </td>


                                        <td>{{ $sucursal->gerente }}</td>
                                        <!-- Agrega aquí las acciones que desees, como editar y eliminar -->
                                        <td
                                            @if (auth()->user()->can('sucursales.edit') &&
                                                    auth()->user()->can('sucursales.destroy')) style="width: 200px;" @else style="width: 100px;" @endif>




                                            @can('sucursales.edit')
                                                <a type="button" href="{{ route('sucursales.edit', $sucursal->id) }}"
                                                    class="btn btn-outline-primary">
                                                    <i class="fas fa-pen"></i> Editar
                                                </a>
                                            @endcan
                                            @can('sucursales.destroy')
                                                <a type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                    data-target="#modal-eliminar-{{ $sucursal->id }}">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </a>
                                                @include('administracion.modules.sucursales.delete')
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
        new DataTable('#sucursales', {
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Sucursales",
                "infoEmpty": "",
                "infoFiltered": "( _MAX_ Sucursales filtradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Sucursales",
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
