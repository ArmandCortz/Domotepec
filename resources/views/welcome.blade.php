@extends('layouts.app')
@extends('layouts.navbar')
@section('content')

</style>
<div class="container-fluid" style=" position: relative; overflow: hidden; width: 100%; height: 400px;">
    <div class=" carousel" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
        <!-- Contenido del carrusel -->
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/surfcity.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/ilopango.jpg" class="d-lock w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/el-boqueron.png" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </div>
    <div class="search-container"
        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">

        <div style="display: flex; justify-content: center; align-items: center;">
            <img src="img/Logo-Domotepec-1.jpeg"
                style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden;" alt="">
        </div>
        <form class="d-flex py-2" role="search">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
            <button class="btn btn-light" type="submit">Buscar</button>
        </form>
    </div>
</div>
</div>
@endsection