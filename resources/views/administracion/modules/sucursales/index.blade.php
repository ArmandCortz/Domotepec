@extends('adminlte::page')
@section('title', 'Sucursal')

@section('content')
<div class="jumbotron" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-3">Modulo Sucursal</h1>
                <button class="btn btn-primary" data-toggle="modal" data-target="#crearSucursalModal">Crear Sucursal</button>
                <div class="card mt-3">
                    <div class="card-body">

                        <table class="table table-hover table-responsive-sm" id="myDataTable">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>ID</th>
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
                                        <td>{{ $sucursal->nombre }}</td>
                                        <td>{{ $sucursal->empresa }}</td>
                                        <td>{{ $sucursal->direccion }}</td>
                                        <td>{{ $sucursal->telefono }}</td>
                                        <td>{{ $sucursal->gerente }}</td>
                                        <!-- Agrega aquí las acciones que desees, como editar y eliminar -->
                                        <td>
                                            {{-- Ejemplo de enlace para mostrar detalles --}}
                                            <a type="button"class="btn btn-info btn-sm" data-toggle="modal" data-target="#crearSucursalModal{{ $sucursal->id }}"> Detalles  </a>

                                                <!-- Botón para eliminar -->
                                              <a type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('sucursales.destroy', $sucursal->id) }}')">
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
</div>
@include('administracion.modules.sucursales.modalCrearSucursal')
@include('administracion.modules.sucursales.modalUpdateSucursal')
@push('scripts')
<script>
    function confirmDelete(url) {
        if (confirm('¿Estás seguro de que quieres eliminar esta sucursal?')) {
            window.location.href = url;
        }
    }
</script>
@endpush

@endsection

