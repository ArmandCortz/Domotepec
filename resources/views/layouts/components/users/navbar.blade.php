<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top mb-8 shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('/') }}">
            <img src="/img/img/Logo-Domotepec-1.jpeg" class="rounded-circle img-fluid" alt="Domotepec" width="25"
                height="25">
        </a>
        <a class="navbar-brand" href="{{ route('/') }}">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('/') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('Servicios') }}" class="nav-link">Servicios</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('Galeria') }}" class="nav-link">Galeria</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('Contacto') }}" class="nav-link">Contacto</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('Reservaciones') }}" class="nav-link">Reservaciones</a>
                </li>
            </ul>
        </div>
    </div>
</nav>