@extends('layouts.app')

@section('content')
    @extends('layouts.components.navbar')

    <!-- Agrega un margen superior para evitar que el contenido se superponga al navbar -->
    <div class="mt-2">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h1 style="color: #020202; line-height: 50px; text-align: center" class="vc_custom_heading">Contacto</h1>
                        <p style="color: #050505; text-align: center" class="vc_custom_heading vc_custom_1491259691992">Estamos para resolver todas tus dudas y escuchar tus comentarios. Por favor, no dudes en escribirnos y te contestaremos lo más pronto posible.</p>
                        <h1 style="color: #020202; line-height: 50px; text-align: center" class="vc_custom_heading">Telefono:1234-5678</h1>
                        <div class="card-body">
                            <div class="row">
                                <!-- Agrega aquí el contenido adicional que desees mostrar -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
