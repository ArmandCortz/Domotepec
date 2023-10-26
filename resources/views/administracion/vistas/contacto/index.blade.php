@extends('layouts.app')
@section('title', 'Usuarios')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin/app.css') }}">
@endsection

@section('content-admin')
    <div class="container">
        <h1 class="text-center py-4">Modulo Contacto</h1>
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <button class="btn btn-danger" id="eliminarTodos">
                        <i class="fas fa-trash-alt"></i> Eliminar Todos
                    </button>
                </div>
                <table class="table table-hover table-responsive-sm" id="contacto" style="border-radius: 5px; overflow: hidden;">
                    <thead class="thead-dark">
                        <tr>
                            <th class="col-xs-1">ID</th>
                            <th class="col-xs-2">Nombre</th>
                            <th class="col-xs-4">Mensaje</th>
                            <th class="col-xs-2">Telefono</th>
                            <th class="col-xs-3">Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contactos as $contacto)
                            <tr>
                                <td>{{ $contacto->id }}</td>
                                <td>{{ $contacto->nombre }}</td>
                                <td>{{ $contacto->mensaje }}</td>
                                <td>{{ $contacto->telefono }}</td>
                                <td>{{ $contacto->email }}</td>
                                <td>



                                    <a type="button" href="{{ route('contacto.edit', $contacto->id) }}"
                                        class="btn btn-outline-primary">
                                        <i class="fas fa-pen"></i> Editar
                                    </a>
                                    <a type="button" class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#modal-eliminar-{{ $contacto->id }}">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </a>
                            </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
     document.getElementById('eliminarTodos').addEventListener('click', function () {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: '¿Estás seguro?',
        text: "No podrás revertir esto",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminarlo',
        cancelButtonText: 'No, cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Enviar una solicitud AJAX para eliminar todos los contactos
            axios.delete('{{ url('/contacto/eliminar-todos') }}')
                .then(response => {
                    // Limpiar y recargar los datos en la tabla
                    let contactoTable = $('#contacto').DataTable();
                    contactoTable.clear().draw();
                    swalWithBootstrapButtons.fire(
                        'Eliminados',
                        'Todos los contactos han sido eliminados correctamente.',
                        'success'
                    );
                })
                .catch(error => {
                    console.error('Error al eliminar todos los contactos:', error);
                    swalWithBootstrapButtons.fire(
                        'Error',
                        'Hubo un error al intentar eliminar todos los contactos.',
                        'error'
                    );
                });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
                'Tus contactos están seguros :)',
                'error'
            );
        }
    });
});



        new DataTable('#contacto', {
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

