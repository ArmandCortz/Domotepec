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
                            <div id="calendario"></div>

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

    <!-- Luego carga FullCalendar -->
    <script src="{{ asset('/js/fullcalendar.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendario');
            var events = [];

            @foreach ($reservaciones as $reserva)
                var cabañaNombre = '';
                @foreach ($cabañas as $cabaña)
                    @if ($reserva->cabaña === $cabaña->id)
                        cabañaNombre = '{{ $cabaña->nombre }}';
                    @endif
                @endforeach

                events.push({
                    title: cabañaNombre,
                    start: '{{ $reserva->ingreso }}T17:00:00', // Agrega la hora 17:00:00 (5 pm) al inicio
                    end: '{{ $reserva->egreso }}T14:00:00', // Agrega la hora 14:00:00 (2 pm) al final
                    state: '{{ $reserva->estado }}',
                    backgroundColor: getBackgroundColor('{{ $reserva->estado }}'),
                    borderColor: getBorderColor('{{ $reserva->estado }}')
                });
            @endforeach

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridDay,listWeek'
                },
                events: events
            });

            calendar.render();

            function getBackgroundColor(state) {
                switch (state) {
                    case '1':
                        return '#FFD700'; // Color amarillo para estado 1
                    case '2':
                        return '#DC3545'; // Color rojo para estado 2
                    case '3':
                        return '#28A745'; // Color verde para estado 3
                    case '4':
                        return '#007BFF'; // Color azul para estado 4
                    case '5':
                        return '#6C757D'; // Color gris para estado 5
                    default:
                        return '#f7f7f7'; // Color por defecto
                }
            }

            function getBorderColor(state) {
                switch (state) {
                    case '1':
                        return '#FFD700'; // Color amarillo para estado 1
                    case '2':
                        return '#DC3545'; // Color rojo para estado 2
                    case '3':
                        return '#28A745'; // Color verde para estado 3
                    case '4':
                        return '#007BFF'; // Color azul para estado 4
                    case '5':
                        return '#6C757D'; // Color gris para estado 5
                    default:
                        return '#ccc'; // Color por defecto
                }
            }

        });
    </script>



@endsection
