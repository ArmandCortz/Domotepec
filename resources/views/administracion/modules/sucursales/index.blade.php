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
                <h1 class="text-center mt-3">Modulo Sucursal</h1>
                <button class="btn btn-primary" data-toggle="modal" data-target="#crearSucursalModal">Crear Sucursal</button>
                <div class="card mt-3">
                    <div class="card-body">

                        <table class="table table-hover table-responsive-sm" id="sucursales"
                            style=" border-radius: 5px; overflow: hidden;">
                            <thead class="thead-dark">
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
                                        @foreach ($empresas as $empresa)
                                        @endforeach
                                        <td>{{ $sucursal->direccion }}</td>
                                        <td>({{ substr($sucursal->telefono, 0, 4) }})
                                            {{ substr($sucursal->telefono, 4, 3) }}{{ substr($sucursal->telefono, 7) }}
                                        </td>


                                        <td>{{ $sucursal->gerente }}</td>
                                        <!-- Agrega aquí las acciones que desees, como editar y eliminar -->
                                        <td>
                                            {{-- Ejemplo de enlace para mostrar detalles --}}
                                            <a type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                                data-target="#sucursal-{{ $sucursal->id }}"><i class="fas fa-pen"></i>
                                                Editar </a>

                                            <!-- Botón para eliminar -->
                                            <a type="button" class="btn btn-outline-danger btn-sm"
                                                onclick="confirmDelete('{{ route('sucursales.destroy', $sucursal->id) }}')">
                                                <i class="fas fa-trash"></i>
                                                Eliminar </a>


                                            @include('administracion.modules.sucursales.modalUpdateSucursal')

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
    @include('administracion.modules.sucursales.modalCrearSucursal')

    <script>
        function confirmDelete(url) {
            if (confirm('¿Estás seguro de que quieres eliminar esta sucursal?')) {
                window.location.href = url;
            }
        }
    </script>


@endsection

@section('js')

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script>
        const phoneInputField = document.querySelector("#telefono");
        let selectedCountry = null;

        const phoneInput = window.intlTelInput(phoneInputField, {
            initialCountry: "auto",
            separateDialCode: true,
            preferredCountries: ["sv", "us", "ca", "gb", "au"],
            geoIpLookup: function(callback) {
                jQuery.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });

        phoneInput.promise.then(function() {
            selectedCountry = phoneInput.getSelectedCountryData();
            const maxLength = selectedCountry.dialCode.length +
                11; // Ajusta el número máximo según tus necesidades para El Salvador

            phoneInputField.setAttribute("maxlength", maxLength);
        });

        phoneInputField.addEventListener("input", function() {
            const phoneNumber = phoneInput.getNumber();

            if (selectedCountry && phoneNumber) {
                const numericPhoneNumber = phoneNumber.replace("+" + selectedCountry.dialCode, "").replace(/\D/g,
                    "");
                const formattedPhoneNumber = numericPhoneNumber.slice(0, selectedCountry.dialCode.length + 1) +
                    "-" +
                    numericPhoneNumber.slice(selectedCountry.dialCode.length + 1);
                phoneInputField.value = "+" + selectedCountry.dialCode + " " + formattedPhoneNumber;
            }
        });
    </script>


@endsection
