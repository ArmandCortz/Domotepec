@extends('layouts.app_users')
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @endpush
    <h2>Vista cabaña</h2>

            <script>
                $(document).ready(function() {
                    $('.ver-sucursal').on('click', function(e) {
                        e.preventDefault(); // Evita el comportamiento predeterminado del enlace
                        var sucursalId = $(this).data('sucursal-id');
                        console.log(sucursalId);
                        // Llamar a una función o realizar alguna acción con el ID de la sucursal
                        // Por ejemplo, podrías realizar una solicitud AJAX para obtener más detalles sobre la sucursal
                        console.log('ID de la Sucursal:', sucursalId);
                        window.location.href = "/reservaciones?id=" + sucursalId;

                        // Luego, puedes redirigir a la página de reservaciones o realizar otra acción según tus necesidades
                    });
                });
            </script>

        </div>
    @endsection
