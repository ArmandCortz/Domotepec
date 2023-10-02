@extends('adminlte::page')
@section('title', 'Sucursal')


@section('content')
<div class="jumbotron" style="background: #999aac;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-3">Modulo Sucursales</h1>
                <button class="btn btn-primary" data-toggle="modal" data-target="#crearSucursalModal">Crear Sucursal</button>
                <div class="card mt-3">
                    <div class="card-body">

                        <table class="table table-hover" id="myDataTable">
                        <thead class="bg-dark text-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>dasdasd</td>
                                <td>jsdhsj</td>
                                <!-- Tus filas de datos irán aquí -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('administracion.modules.sucursales.modalCrearSucursal')

@endsection

@push('scripts')

<script>

</script>
@endpush
