<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('Inicio') }}">
            <img src="/img/img/Logo-Domotepec-1.jpeg" class="rounded-circle img-fluid" alt="Domotepec" width="25" height="25">
            {{ env('APP_NAME') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('Inicio') }}" class="nav-link" style="font-size: 18px; margin-right: 15px;">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('Servicios') }}" class="nav-link" style="font-size: 18px; margin-right: 15px;">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('galerias.indexs') }}" style="font-size: 18px; margin-right: 15px;">Galería</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('Contacto') }}" class="nav-link" style="font-size: 18px; margin-right: 15px;">Contacto</a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('Reservaciones') }}" class="nav-link" style="font-size: 18px; margin-right: 15px;">Reservaciones</a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Estilos para la barra de navegación */
    .navbar {
        transition: background-color 0.5s ease-in-out;
    }

    /* Estilos para los íconos de navegación */
    .navbar-toggler-icon {
        color: #2cd5d9;
        transition: color 0.3s ease-in-out;
    }

    /* Estilo para cambiar el color de fondo al hacer clic */
    .nav-link.active, .nav-link:hover {
        color: #2cd5d9 !important;
    }

    /* Estilo para la marca activa */
    .navbar-brand.active, .navbar-brand:hover {
        color: #2cd5d9 !important;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        // Cambiar el color de fondo al hacer clic en un enlace
        $('.nav-link').on('click', function () {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
        });

        // Cambiar el color de fondo al hacer clic en la marca
        $('.navbar-brand').on('click', function () {
            $('.navbar-brand').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
