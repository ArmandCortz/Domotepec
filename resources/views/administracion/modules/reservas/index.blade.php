@extends('layouts.app')

@section('title', 'Reservas')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin/app.css') }}">
    <!-- Estilos de FullCalendar -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />


@endsection

@section('content-admin')
    <div class="container">
        <div id="calendario"></div>

    </div>
    <!-- ... (tu contenido actual) ... -->

<!-- Modal para agregar reserva -->
<div class="modal fade" id="agregarReservaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reservas Domotepec</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="app" class="container">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="clientName" class="form-label">Nombre del Cliente:</label>
                                <input type="text" class="form-control" id="clientName">
                            </div>
                            <div class="col-md-6">
                                <label for="checkInDate" class="form-label">Fecha de Entrada:</label>
                                <input type="date" class="form-control" id="checkInDate">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="checkOutDate" class="form-label">Fecha de Salida:</label>
                                <input type="date" class="form-control" id="checkOutDate">
                            </div>
                            <div class="col-md-6">
                                <label for="id_empresa" class="form-label">ID Empresa:</label>
                                <input type="text" class="form-control" id="id_empresa">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="id_sucursal" class="form-label">ID Sucursal:</label>
                                <input type="text" class="form-control" id="id_sucursal">
                            </div>
                            <div class="col-md-6">
                                <label for="id_cabaña" class="form-label">ID Cabaña:</label>
                                <input type="text" class="form-control" id="id_cabaña">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="n_personas" class="form-label">Número de Personas:</label>
                                <input type="number" class="form-control" id="n_personas" min="1">
                            </div>
                            <!-- Puedes agregar más campos aquí -->
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="agregarReserva()">Guardar Reserva</button>
            </div>
        </div>
    </div>
</div>


<!-- ... (tu contenido actual) ... -->



@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

<!-- Script adicional para manejar el modal -->
<script>
    $(document).ready(function () {
        // Obtén las reservas desde el controlador
        var reservas = <?php echo $reservas->toJson(); ?>;

        // Configura FullCalendar
        $('#calendario').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultView: 'month',
            events: reservas.map(function (reserva) {
                return {
                    title: reserva.id_cliente + ' Reserva ' + reserva.id,
                    start: reserva.fecha_ingreso,
                    end: reserva.fecha_salida,
                    description: 'Cabaña: ' + reserva.id_cabaña + ', Personas: ' + reserva.n_personas
                };
            }),
            editable: false,
            eventLimit: true,
            dayClick: function (date, jsEvent, view) {
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

