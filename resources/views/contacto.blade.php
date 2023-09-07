@extends('layouts.app')

@section('content')
    @extends('layouts.components.navbar')

    <div class="mt-2">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center mb-4" style="color: #007BFF;"><i class="fas fa-id-badge"></i> Contacto</h1>
                        <p class="text-center" style="color: #333;">Estamos aquí para resolver todas tus dudas y escuchar tus
                            comentarios. Por favor, no dudes en escribirnos y te contestaremos lo más pronto posible.</p>
                        <h1 class="text-center" style="color: #007BFF;"><i class="fas fa-phone"></i> Teléfono: 1234-5678
                        </h1>
                        <div class="card-body">
                            <div class="row">
                                <!-- Agrega aquí el contenido adicional que desees mostrar -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contacto">
            <h3 class="titulo-seccion"style="color: #007BFF;">Contáctanos ahora</h3>
            <div class="contenedor-form">
                <form action="" id="contact-form">
                    <div class="fila mitad">
                        <input type="text" id="nombre" placeholder="Nombre Completo *" class="input-mitad">
                        <input type="email" id="email" placeholder="Dirección de Email" class="input-mitad">
                    </div>
                    <div class="fila">
                        <input type="text" id="tema" placeholder="Tema..." class="input-full">
                    </div>
                    <div class="fila">
                        <textarea id="mensaje" cols="30" rows="10" placeholder="Tu Mensaje..." class="input-full"></textarea>
                    </div>
                    <button type="button" id="enviar" class="btn-enviar">Enviar Mensaje</button>
                </form>
            </div>
        </section>

        <script>
            // Estilo JavaScript para el formulario
            document.getElementById('enviar').addEventListener('click', function() {
                // Obtener valores de los campos del formulario
                var nombre = document.getElementById('nombre').value;
                var email = document.getElementById('email').value;
                var tema = document.getElementById('tema').value;
                var mensaje = document.getElementById('mensaje').value;

                // Validar que el campo Nombre Completo no esté vacío
                if (!nombre) {
                    alert('Por favor, ingrese su Nombre Completo.');
                    return;
                }

                // Validar que el campo Email sea una dirección de correo válida (opcional)
                if (email && !isValidEmail(email)) {
                    alert('Por favor, ingrese una dirección de correo válida.');
                    return;
                }

                // Validar que el campo Tema no esté vacío
                if (!tema) {
                    alert('Por favor, ingrese un Tema.');
                    return;
                }

                // Validar que el campo Mensaje no esté vacío
                if (!mensaje) {
                    alert('Por favor, ingrese su Mensaje.');
                    return;
                }

                // Si todos los campos están completos, puedes enviar el formulario o realizar otras acciones aquí
                // Por ejemplo, puedes enviar los datos a través de una solicitud AJAX
                // o redirigir al usuario a una página de confirmación.

                // Aquí puedes agregar la lógica para enviar el formulario o realizar otras acciones.

                // Limpiar los campos después de enviar el formulario (opcional)
                document.getElementById('nombre').value = '';
                document.getElementById('email').value = '';
                document.getElementById('tema').value = '';
                document.getElementById('mensaje').value = '';
            });

            // Función para validar una dirección de correo electrónico
            function isValidEmail(email) {
                var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                return pattern.test(email);
            } <
            div class="mapa" >
                <
                img src="img/descarga.jpeg" alt="Mapa" width="400" height="300" >
                <
                /div> /
                div >
            @endsection
