@extends('layouts.app')

@section('content')
    @extends('layouts.components.navbar')



@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">

                <section id="contacto" class="mt-5">
                    <div class="container contenedor-form">
                        <h3 class="titulo-seccion">Contáctanos ahora</h3>
                        <form action="" id="contact-form">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" id="nombre" placeholder="Nombre Completo *"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" id="email" placeholder="Dirección de Email"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" id="tema" placeholder="Tema..." class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea id="mensaje" cols="30" rows="10" placeholder="Tu Mensaje..." class="form-control"></textarea>
                            </div>
                            <button type="button" id="enviar" class="btn btn-primary btn-enviar">Enviar Mensaje</button>
                        </form>
                    </div>
                </section>
            </div>
            <div class="col-md-6">
                <section id="mapa" class="mt-5">
                    <h3 class="titulo-seccion">Ubicación</h3>
                    <div id="mapa">
                        <!-- Aquí puedes insertar un mapa interactivo, por ejemplo, usando Google Maps o Leaflet.js -->
                        <!-- Reemplaza el siguiente texto con tu mapa -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13635.569284418036!2d-89.18715542674451!3d13.692983824697966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f67487e7699f56b%3A0x47a1b29234ac4f21!2sSan%20Salvador%2C%20El%20Salvador!5e0!3m2!1sen!2sus!4v1661756912345!5m2!1sen!2sus"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function initMap() {
            const googleMap = new google.maps.Map(document.getElementById('google-map'), {
                center: {
                    lat: -25.363,
                    lng: 131.044
                }, // Cambia estas coordenadas por las de tu ubicación
                zoom: 8, // Ajusta el nivel de zoom deseado
            });
        }
    </script>
    <iframe
        src="https://www.google.com/maps/place/El+Salvador/@13.7481023,-89.5896802,9z/data=!4m6!3m5!1s0x8f6327a659640657:0x6f9a16eb98854832!8m2!3d13.794185!4d-88.89653!16zL20vMDJrOGs?hl=en&entry=ttu"
        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>


@endsection
