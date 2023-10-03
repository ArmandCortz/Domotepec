@extends('adminlte::page')
@section('title', 'Cabañas')

@section('content')
<div class="jumbotron" style="background: #999aac;">
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
                                            <a href="{{ route('cabañas.show', $cabaña->id) }}" class="btn btn-info btn-sm">Detalles</a>

                            
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
@include('administracion.modules.cabañas.modalCrearCabañas')
@push('scripts')

<script>
function confirmDelete(url) {
        if (confirm('¿Estás seguro de que quieres eliminar esta sucursal?')) {
            window.location.href = url;
        }
    }
</script>
@endpush
