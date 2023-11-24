@extends('layouts.app_users')

@section('content')
    <div class="container text-center mb-3">
        <h3>Contacto</h3>
        <p>Estamos para resolver todas tus dudas y escuchar tus comentarios. Por favor, no dudes en escribirnos y te contestaremos lo más pronto posible.</p>

        <div class="row">
            <div class="col-md-6">
                <section id="contacto" class="mt-5">
                    <div class="container contenedor-form">
                        <h3 class="titulo-seccion">Formulario de contacto</h3>
                        <form action="{{ route('contacto.store') }}" method="post" id="contact-form">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="nombre"></label>
                                    <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo *" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="email"></label>
                                    <input type="email" name="email" id="email" placeholder="Dirección de Email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefono"></label>
                                <input type="number" name="telefono" id="telefono" placeholder="Teléfono" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="mensaje"></label>
                                <textarea name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Tu Mensaje..." class="form-control"></textarea>
                            </div>
                            <button type="submit" id="enviar" class="btn btn-primary btn-enviar">Enviar Mensaje</button>
                        </form>
                        
                    </div>
                </section>
            </div>
            <div class="col-md-6">
                <section id="mapa" class="mt-5">
                    <h3 class="titulo-seccion">Ubicación</h3>
                    <div id="mapa">
                        <!-- Aquí puedes insertar un mapa interactivo -->
                        <!-- Reemplaza el siguiente texto con tu mapa -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13635.569284418036!2d-89.18715542674451!3d13.692983824697966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f67487e7699f56b%3A0x47a1b29234ac4f21!2sSan%20Salvador%2C%20El%20Salvador!5e0!3m2!1sen!2sus!4v1661756912345!5m2!1sen!2sus" width="100%" height="361px" style="border:0.5;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Tus scripts aquí (por ejemplo, el script de Google Maps) -->
    <script>
        function initMap() {
            const googleMap = new google.maps.Map(document.getElementById('google-map'), {
                center: { lat: -25.363, lng: 131.044 },
                zoom: 8,
            });
        }
    </script>
@endsection
