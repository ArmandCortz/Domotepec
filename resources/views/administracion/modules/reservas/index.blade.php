@extends('layouts.app')

@section('title', 'Reservas')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin/app.css') }}">
    <!-- Estilos FullCalendar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet" />

@endsection

@section('content-admin')
    <div class="container">
        {{-- <div id="calendario"></div> --}}
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-3">Modulo Reservaciones</h1>

                {{-- <a href="{{ route('users.create') }}" class="btn btn-primary" data-toggle="modal" 
                    <a href="{{ route('users.create') }}" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Crear Usuario</a> --}}
                {{-- <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                    Crear Usuario
                </a> --}}
                @can('cabañas.create')
                    <a href="" class="btn btn-outline-primary"><i class="fas fa-user"></i> Crear
                        Reservaciones</a>
                @endcan

                <div class="card mt-3">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="reservaciones" class="table table-hover table-responsive-md"
                                style=" border-radius: 5px; overflow: hidden;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Email</th>
                                        <th>Cabaña</th>
                                        <th>Estado</th>
                                        {{-- <th>Descripción</th> --}}
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($reservaciones as $reserva)
                                        <tr>
                                            <td>{{ $reserva->id }}</td>

                                            <td>
                                                {{ $reserva->cliente }}
                                            </td>
                                            <td>{{ $reserva->email }}</td>

                                            @foreach ($cabañas as $cabaña)
                                                @if ($reserva->cabaña === $cabaña->id)
                                                    <td>{{ $cabaña->nombre }}</td>
                                                @endif
                                            @endforeach


                                            @if ($reserva->estado == 1)
                                                <td>Espera</td>
                                            @endif
                                            @if ($reserva->estado == 2)
                                                <td>Cancelada</td>
                                            @endif
                                            @if ($reserva->estado == 3)
                                                <td>Confirmada</td>
                                            @endif
                                            @if ($reserva->estado == 4)
                                                <td>Pagada</td>
                                            @endif
                                            @if ($reserva->estado == 5)
                                                <td>Vencida</td>
                                            @endif


                                            <td
                                                @if (auth()->user()->can('cabañas.edit') &&
                                                        auth()->user()->can('cabañas.destroy')) style="width: 100px;" @else style="width: 100px;" @endif>

                                                @can('cabañas.edit')
                                                    @if ($reserva->estado == 1)
                                                        <a type="button" href="" class="btn btn-outline-warning">
                                                            <i class="fas fa-pen"></i> Revisar
                                                        </a>
                                                    @endif
                                                    @if ($reserva->estado == 2)
                                                        <a type="button" href="" class="btn btn-outline-danger">
                                                            <i class="fas fa-pen"></i> Revisar
                                                        </a>
                                                    @endif
                                                    @if ($reserva->estado == 3)
                                                        <a type="button" href="" class="btn btn-outline-success">
                                                            <i class="fas fa-pen"></i> Revisar
                                                        </a>
                                                    @endif
                                                    @if ($reserva->estado == 4)
                                                        <a type="button" href="" class="btn btn-outline-primary">
                                                            <i class="fas fa-pen"></i> Revisar
                                                        </a>
                                                    @endif
                                                    @if ($reserva->estado == 5)
                                                        <a type="button" href="" class="btn btn-outline-secondary">
                                                            <i class="fas fa-pen"></i> Revisar
                                                        </a>
                                                    @endif
                                                @endcan

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Calendario de reservas</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body ">
                        {{-- coloca el calendario dentro de esta tarjeta --}}
                        <div class="card-body">
                            <div id="calendario" class=""></div>
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
        new DataTable('#reservaciones', {
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando del _START_ al _END_ de un total de _TOTAL_ reservaciones",
                "infoEmpty": "",
                "infoFiltered": "(_MAX_ reservaciones filtradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ reservaciones",
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

    <!-- Script adicional para manejar el modal -->
    <script>
        $(document).ready(function() {
            // Obtén las reservas desde el controlador
            var reservas = <?php echo $reservaciones->toJson(); ?>;

            // Configura FullCalendar
            $('#calendario').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultView: 'month',
                events: reservas.map(function(reserva) {
                    return {
                        title: reserva.id_cliente + ' Reserva ' + reserva.id,
                        start: reserva.fecha_ingreso,
                        end: reserva.fecha_salida,
                        description: 'Cabaña: ' + reserva.id_cabaña + ', Personas: ' + reserva
                            .n_personas
                    };
                }),
                editable: false,
                eventLimit: true,
                dayClick: function(date, jsEvent, view) {
                    // Abre el modal al hacer clic en un día
                    $('#agregarReservaModal').modal('show');
                    // Puedes actualizar el modal con información adicional si es necesario
                    // Por ejemplo, puedes establecer la fecha del día seleccionado en el modal
                    $('#checkInDateModal').val(date.format('YYYY-MM-DD'));
                }
            });
        });

        // Función para agregar reserva (la puedes ajustar según tus necesidades)
        function agregarReserva() {
            // Obtén los datos del formulario del modal
            var clientName = document.getElementById('clientName').value;
            var checkInDate = document.getElementById('checkInDate').value;
            var checkOutDate = document.getElementById('checkOutDate').value;
            var id_empresa = document.getElementById('id_empresa').value;
            var id_sucursal = document.getElementById('id_sucursal').value;
            var id_cabaña = document.getElementById('id_cabaña').value;
            var n_personas = document.getElementById('n_personas').value;

            // Enviar datos al backend (si es necesario)
            // ...
            fetch("{{ route('reservas.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        clientName: clientName,
                        checkInDate: checkInDate,
                        checkOutDate: checkOutDate,
                        id_empresa: id_empresa,
                        id_sucursal: id_sucursal,
                        id_cabaña: id_cabaña,
                        n_personas: n_personas
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Procesar la respuesta del backend según sea necesario
                    console.log(data);
                    // Puedes actualizar el calendario con la nueva reserva
                    mostrarReservaEnCalendario(clientName, checkInDate, checkOutDate);
                })
            // Cierra el modal después de agregar la reserva
            $('#agregarReservaModal').modal('hide');
        }
    </script>

@endsection
