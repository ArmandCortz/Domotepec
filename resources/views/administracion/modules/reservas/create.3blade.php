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
                            <div class="col">
                                <div class="row mb-3">
                                    <label for="cliente" class="col-md-4 col-form-label text-md-end">{{ __('Cliente')
                                        }}</label>

                                    <div class="col-md-8">
                                        <input id="cliente" type="text"
                                            class="form-control @error('cliente') is-invalid @enderror" name="cliente"
                                            value="{{ old('cliente') }}" autocomplete="cliente"
                                            placeholder="Nombre Completo" autofocus>

                                        @error('cliente')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col">
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email')
                                        }}</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="col">
                                <div class="row mb-3">
                                    <label for="cabana" class="col-md-4 col-form-label text-md-end">{{ __('Cabana')
                                        }}</label>

                                    <div class="col-md-8">
                                        <select id="cabana" name="cabana"
                                            class="form-control @error('cabana') is-invalid @enderror"
                                            autocomplete="cabana" value="{{ old('cabana') }}">
                                            <option value="" selected disabled>Selecciona una cabana

                                                @foreach ($cabanas as $cabana)
                                            <option value="{{ $cabana->id }}">{{ $cabana->nombre }} </option>
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
                                    <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Telefono')
                                        }}</label>
                                    <div class="col-md-8">

                                        <input id="telefono" type="text"
                                            class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                            value="{{ old('telefono') }}" autocomplete="telefono">
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
                                    <label for="fecha_entrada" class="col-md-4 col-form-label text-md-end">{{ __('Fecha
                                        de ingreso') }}</label>
                                    <div class="col-md-8">
                                        <input id="startDate" type="date"
                                            class="form-control @error('fecha_entrada') is-invalid @enderror"
                                            name="fecha_entrada" value="{{ old('fecha_entrada') }}"
                                            autocomplete="fecha_entrada" autofocus>
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
                                    <label for="fecha_salida" class="col-md-4 col-form-label text-md-end">{{ __('Fecha
                                        de egreso') }}</label>
                                    <div class="col-md-8">
                                        <input id="endDate" type="date"
                                            class="form-control @error('fecha_salida') is-invalid @enderror"
                                            name="fecha_salida" value="{{ old('fecha_salida') }}"
                                            autocomplete="fecha_salida" autofocus>
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
                                    <label for="huespedes" class="col-md-4 col-form-label text-md-end">{{
                                        __('Huespedes') }}</label>
                                    <div class="col-md-8">
                                        <input id="huespedes" type="number" min="1"
                                            class="form-control @error('huespedes') is-invalid @enderror"
                                            name="huespedes" value="{{ old('huespedes') }}" autocomplete="huespedes"
                                            autofocus>
                                        @error('huespedes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row mb-3">
                                    <label for="precio" class="col-md-4 col-form-label text-md-end">{{ __('Precio')
                                        }}</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input id="precio" type="number"
                                                class="form-control @error('precio') is-invalid @enderror" name="precio"
                                                autocomplete="precio" step="0.01" min="0.01" autofocus>
                                            @error('precio')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row mb-3">
                                    <label for="limpieza" class="col-md-4 col-form-label text-md-end">{{ __('Tarifa de
                                        limpieza') }}</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input id="limpieza" type="number"
                                                class="form-control @error('limpieza') is-invalid @enderror "
                                                name="limpieza" autocomplete="limpieza" step="0.01" min="0.01"
                                                autofocus>
                                            @error('limpieza')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>



                </div>
                <div class="modal-footer">
                    <a href="{{ route('cabanas.index') }}" type="button" class="btn btn-outline-danger">Cancelar</a>
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
    document.addEventListener('DOMContentLoaded', function () {
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
            datesSet: function (info) {
                startDateInput.val(moment(mañana).format('YYYY-MM-DD'));
                endDateInput.val(moment(pasado).format('YYYY-MM-DD'));
                createEvent(); // Crear evento inicial
            },
            select: function (info) {
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
                calendar.getEvents().forEach(function (event) {
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
        startDateInput.on('change', createEvent);
        endDateInput.on('change', createEvent);
    });
</script>

<script>
    $(document).ready(function () {
        $('#cabana').change(function () {
            var selectedCabaña = $(this).val();
            @foreach($cabanas as $cabana)
            if (selectedCabaña) {

                if (selectedCabaña === "{{ $cabana->id }}") {
                    var huespedes = "{{ $cabana->huespedes }}";
                    var mensaje = huespedes + " Personas máximo";
                    var precio = "{{ $cabana->precio }}";
                    var limpieza = "{{ $cabana->limpieza }}";

                    $('#huespedes').attr('max', huespedes);
                    $('#huespedes').attr('placeholder', mensaje);
                    $('#precio').attr('value', precio);
                    $('#limpieza').attr('value', limpieza);
                }
            }
            @endforeach
        });
    });

</script>



@endsection