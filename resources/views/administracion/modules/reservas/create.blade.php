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
                <h1 class="text-center mt-3">Crear Reservaciones</h1>


                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="{{ route('reservas.store') }}">
                            @csrf
                            <div class="row row-cols-2">
                                <div class="col col-8">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row ">
                                                <div class="col-12 ">
                                                    <div class="row mb-3">
                                                        <label for="cliente"
                                                            class="col-md-2 col-form-label text-md-end">{{ __('Cliente') }}</label>

                                                        <div class="col-md-10">
                                                            <input id="cliente" type="text"
                                                                class="form-control @error('cliente') is-invalid @enderror"
                                                                name="cliente" value="{{ old('cliente') }}"
                                                                autocomplete="cliente" placeholder="Nombre Completo"
                                                                autofocus>

                                                            @error('cliente')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <label for="email"
                                                            class="col-md-2 col-form-label text-md-end">{{ __('Email') }}</label>

                                                        <div class="col-md-10">
                                                            <input id="email" type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" value="{{ old('email') }}"
                                                                placeholder="Correo Electronico" autocomplete="email"
                                                                autofocus>

                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>


                                            <div class="row row-cols-2">
                                                <div class="col">
                                                    <div class="row mb-3">
                                                        <label for="cabana"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('Cabaña') }}</label>

                                                        <div class="col-md-8">
                                                            <select id="cabana" name="cabana"
                                                                class="form-control @error('cabana') is-invalid @enderror"
                                                                autocomplete="cabana" value="{{ old('cabana') }}">
                                                                <option value="" selected disabled>Selecciona una
                                                                    cabana

                                                                    @foreach ($cabanas as $cabana)
                                                                <option value="{{ $cabana->id }}">{{ $cabana->nombre }}
                                                                </option>
                                                                @endforeach

                                                            </select>

                                                            @error('cabana')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="row mb-3">
                                                        <label for="telefono"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('Telefono') }}</label>
                                                        <div class="col-md-8">

                                                            <input id="telefono" type="text"
                                                                class="form-control @error('telefono') is-invalid @enderror"
                                                                name="telefono" value="{{ old('telefono') }}"
                                                                autocomplete="telefono">
                                                            @error('telefono')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="row mb-3">
                                                        <label for="fecha_entrada"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('Ingreso') }}</label>
                                                        <div class="col-md-8">
                                                            <input id="startDate" type="date"
                                                                class="form-control @error('fecha_entrada') is-invalid @enderror"
                                                                name="fecha_entrada" value="{{ old('fecha_entrada') }}"
                                                                autocomplete="fecha_entrada" autofocus
                                                                min="<?php echo date('Y-m-d'); ?>">
                                                            @error('fecha_entrada')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="row mb-3">
                                                        <label for="fecha_salida"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('Egreso') }}</label>
                                                        <div class="col-md-8">
                                                            <input id="endDate" type="date"
                                                                class="form-control @error('fecha_salida') is-invalid @enderror"
                                                                name="fecha_salida" value="{{ old('fecha_salida') }}"
                                                                autocomplete="fecha_salida" autofocus
                                                                min="<?php echo date('Y-m-d'); ?>">
                                                            @error('fecha_salida')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row mb-3">
                                                        <label for="huespedes"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('Huespedes') }}</label>
                                                        <div class="col-md-8">
                                                            <input id="huespedes" type="number" min="1"
                                                                class="form-control @error('huespedes') is-invalid @enderror"
                                                                name="huespedes" value="{{ old('huespedes') }}"
                                                                autocomplete="huespedes" autofocus>
                                                            @error('huespedes')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="number" class="form-control" style="display: none"
                                                        name="costo" id="costo">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="number" class="form-control" style="display: none"
                                                        name="estado" id="estado" value="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col col-4">

                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="text-center">Cuenta</h5>
                                        </div>
                                        <div class="card-body">

                                            <div class="row row-cols-2">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="total_cabaña" class="form-label"><span
                                                                id="precio"></span> USD X
                                                            <span id="diferencia_dias"></span> Noches</label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p id="total_cabaña" class="text-end"><span id="total_cabaña"></p>
                                                </div>
                                            </div>

                                            <!-- Calculo de impuestos y tarifas -->
                                            <!-- Aquí se mostrará el total de impuestos -->
                                            <div class="row row-cols-2">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="impuestos" class="form-label">Impuestos</label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p class="text-end"><span id="impuestos"></span></p>
                                                </div>
                                            </div>

                                            <!-- Aquí se mostrará la tarifa de limpieza -->
                                            <div class="row row-cols-2">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="tarifa_limpieza" class="form-label">Tarifa de
                                                            limpieza</label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p id="tarifa_limpieza" class="text-end"></p>
                                                </div>

                                            </div>

                                            <hr>
                                            <!-- Aquí se mostrará el total de la estadia -->
                                            <div class="card-footer">
                                                <div class="row row-cols-2">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label for="total_estadia" class="form-label">Total de
                                                                estadia</label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <p class="text-end" id="total_estadia"> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                    </div>

                    <div class="modal-footer">
                        <a href="{{ route('reservas.index') }}" type="button"
                            class="btn btn-outline-danger">Cancelar</a>
                        <button type="submit" class="btn btn-outline-primary">Reservar</button>
                    </div>

                    </form>
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


                        <div id="calendario"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('/js/fullcalendar.js') }}"></script>
    <script src="{{ asset('/js/moment.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendario');
            var startDateInput = $('#startDate');
            var endDateInput = $('#endDate');
            var calendar = null;


            var mañana = new Date();
            mañana.setDate(mañana.getDate() + 1); // Obtiene la fecha de mañana
            var pasado = new Date();
            pasado.setDate(pasado.getDate() + 2); // Obtiene la fecha de pasado mañana

            var calendar = new FullCalendar.Calendar(calendarEl, {

                selectable: true,
                selectConstraint: {
                    start: new Date().toISOString().split("T")[0] // Fecha actual como límite inferior
                },
                datesSet: function(info) {
                    startDateInput.val(moment(mañana).format('YYYY-MM-DD'));
                    endDateInput.val(moment(pasado).format('YYYY-MM-DD'));
                    createEvent(); // Crear evento inicial
                },
                select: function(info) {
                    if (!startDateInput.val()) {
                        startDateInput.val(info.startStr);
                    } else if (!endDateInput.val()) {
                        endDateInput.val(info.startStr);
                    } else {
                        startDateInput.val(info.startStr);
                        endDateInput.val('');
                    }
                    createEvent(); // Crear evento al seleccionar fechas
                }
            });

            calendar.render();

            function createEvent() {
                var startDate = startDateInput.val();
                var endDate = endDateInput.val();

                if (calendar) {
                    calendar.getEvents().forEach(function(event) {
                        event.remove(); // Remover eventos anteriores
                    });
                }

                if (startDate && endDate) {
                    calendar.addEvent({
                        title: 'Nueva Reserva',
                        start: startDate + 'T17:00:00',
                        end: endDate + 'T14:00:00',
                        color: 'blue' // Puedes cambiar el color del evento si lo deseas
                    });
                }
            }

            // Detectar cambios en los inputs de fecha y actualizar el evento
            startDateInput.on('change', function() {
                createEvent(); // Crear evento al cambiar la fecha de inicio
                actualizarCalculos(); // Actualizar cálculos al cambiar la fecha de inicio
            });

            endDateInput.on('change', function() {
                createEvent(); // Crear evento al cambiar la fecha de fin
                actualizarCalculos(); // Actualizar cálculos al cambiar la fecha de fin
            });

            $(document).ready(function() {
                $('#cabana').change(function() {
                    var selectedCabaña = $(this).val();
                    @foreach ($cabanas as $cabana)
                        if (selectedCabaña) {

                            if (selectedCabaña === "{{ $cabana->id }}") {

                                var huespedes = "{{ $cabana->huespedes }}";
                                var mensaje = huespedes + " Personas máximo";
                                var precio = "{{ $cabana->precio }}";


                                $('#huespedes').attr('max', huespedes);
                                $('#huespedes').attr('placeholder', mensaje);
                                $('#precio').attr('value', precio);

                                if (calendar) {
                                    console.log(precio);
                                }
                                actualizarCalculos(precio, selectedCabaña, calendar);

                            }
                        }
                    @endforeach
                });
            });
        });

        // operaciones




        function calcularDiferenciaDias(startDate, endDate) {
            const unDia = 24 * 60 * 60 * 1000; // 1 día en milisegundos
            const diffTiempo = Math.abs(new Date(endDate) - new Date(startDate));
            const diffDias = Math.ceil(diffTiempo / unDia);
            console.log(startDate);
            return diffDias;
        }

        function calcularTotalCabaña(precio, fechaEntrada, fechaSalida) {
            const diffDias = calcularDiferenciaDias(fechaEntrada, fechaSalida);
            const totalCabaña = precio * diffDias;
            return totalCabaña.toFixed(2);
        }

        function calcularImpuestos(totalCabaña) {
            const impuestos = totalCabaña * 0.2;
            return impuestos.toFixed(2);
        }

        function calcularTotalEstadia(totalCabaña, impuestos, tarifaLimpieza) {
            const totalEstadia = parseFloat(totalCabaña) + parseFloat(impuestos) + parseFloat(tarifaLimpieza);
            return totalEstadia.toFixed(2);
        }

        function getBackgroundColor(state) {
            switch (state) {
                case '1':
                    return '#17a2b8'; // Color celeste para estado Espera
                case '2':
                    return '#ffc107'; // Color amarillo para estado Reservada
                case '3':
                    return '#28a745'; // Color verde para estado Confirmada
                case '4':
                    return '#007bff'; // Color azul para estado Pagada
                case '5':
                    return '#6c757d'; // Color gris para estado Vencida
                case '6':
                    return '#dc3545'; // Color rojo para estado Cancelada
                default:
                    return '#f8f9fa'; // Color por defecto
            }

        }

        function getBorderColor(state) {
            switch (state) {
                case '1':
                    return '#17a2b8'; // Color celeste para estado Espera
                case '2':
                    return '#ffc107'; // Color amarillo para estado Reservada
                case '3':
                    return '#28a745'; // Color verde para estado Confirmada
                case '4':
                    return '#007bff'; // Color azul para estado Pagada
                case '5':
                    return '#6c757d'; // Color gris para estado Vencida
                case '6':
                    return '#dc3545'; // Color rojo para estado Cancelada
                default:
                    return '#f8f9fa'; // Color por defecto
            }

        }

        function actualizarCalculos(precio, selectedCabaña, calendar) {
            const startDate = document.getElementById('startDate');
            const startDateValue = startDate.value;
            const endDate = document.getElementById('endDate');
            const endDateValue = endDate.value;

            var precio = precio;
            const preciotext = document.getElementById('precio');
            console.log(precio);

            const diastext = document.getElementById('diferencia_dias');
            const diffDias = calcularDiferenciaDias(startDateValue, endDateValue);

            const totalCabañatext = document.getElementById('total_cabaña');
            const totalCabaña = calcularTotalCabaña(precio, startDateValue, endDateValue);

            const impuestostext = document.getElementById('impuestos');
            const impuestos = calcularImpuestos(totalCabaña);

            var limpieza = "{{ $cabana->limpieza }}";
            const limpiezatext = document.getElementById('tarifa_limpieza');

            const totalEstadiatext = document.getElementById('total_estadia');
            const totalEstadia = calcularTotalEstadia(totalCabaña, impuestos, limpieza);
            const inputTotal = document.getElementById('costo');


            diastext.textContent = `${diffDias}`;
            totalCabañatext.textContent = `$${totalCabaña} USD`;
            preciotext.textContent = `$${precio} USD`;

            impuestostext.textContent = `$${impuestos} USD`;
            limpiezatext.textContent = `$${limpieza} USD`;

            totalEstadiatext.textContent = `$${totalEstadia} USD`;
            inputTotal.value = totalEstadia;

            cargarReservasPorCabaña(selectedCabaña, calendar);

        }

        

        function cargarReservasPorCabaña(cabanaId, calendar) {
            calendar.removeAllEvents();
            $.ajax({
                url: `/reservas_por_cabana/${cabanaId}`,
                type: 'GET',
                success: function(reservas) {
                    agregarReservasAlCalendario(reservas, calendar);
                },
                error: function(error) {
                    console.error('Error al obtener reservas por cabaña:', error);
                }
            });
        }

        function agregarReservasAlCalendario(reservas, calendar) {

            reservas.forEach(function(reserva) {
                calendar.addEvent({
                    title: 'reservado',
                    start: reserva.ingreso + 'T17:00:00',
                    end: reserva.egreso + 'T14:00:00',
                    color: 'gray'
                });
            });
        }
    </script>



@endsection
