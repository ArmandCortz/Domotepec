@extends('layouts.app')

@section('content')
    @extends('layouts.components.navbar')

    <!-- Agrega un margen superior para evitar que el contenido se superponga al navbar -->
    <div class="mt-2">
        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h1 style="color: #s007bff;line-height: 50px;text-align: center" class="vc_custom_heading">Galería
                        </h1>
                        <p style="color: #480d0d;text-align: center" class="vc_custom_heading vc_custom_1491259691992">Conoce
                            más detalles sobre Domotepec</p>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox"
                                        data-title="sample 1 - white" data-gallery="gallery">
                                        <img src="../img/cabaña1.jpeg" class="img-fluid mb-2" alt="white sample" />
                                    </a>
                                </div>
                                <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                                    <a href="https://via.placeholder.com/1200/000000.png?text=2" data-toggle="lightbox"
                                        data-title="sample 2 - black" data-gallery="gallery">
                                        <img src="../img/cabaña2.jpeg" class="img-fluid mb-1" alt="white sample" />
                                    </a>
                                </div>
                                <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                                    <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=3"
                                        data-toggle="lightbox" data-title="sample 3 - red" data-gallery="gallery">
                                        <img src="../img/cabaña12.jpeg" class="img-fluid mb-1" alt="white sample" />
                                    </a>
                                </div>
                                <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                                    <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=4"
                                        data-toggle="lightbox" data-title="sample 4 - red" data-gallery="gallery">
                                        <img src="../img/cabaña3.jpeg" class="img-fluid mb-2" alt="white sample" />
                                    </a>
                                </div>
                                <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                                    <a href="https://via.placeholder.com/1200/000000.png?text=5" data-toggle="lightbox"
                                        data-title="sample 5 - black" data-gallery="gallery">
                                        <img src="../img/cabaña5.jpeg" class="img-fluid mb-2" alt="white sample" />
                                    </a>
                                </div>
                                <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=6" data-toggle="lightbox"
                                        data-title="sample 6 - white" data-gallery="gallery">
                                        <img src="../img/cabaña6.jpeg" class="img-fluid mb-2" alt="white sample" />
                                    </a>
                                </div>
                                <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=7" data-toggle="lightbox"
                                        data-title="sample 7 - white" data-gallery="gallery">
                                        <img src="../img/cabaña7.jpeg" class="img-fluid mb-2" alt="white sample" />
                                    </a>
                                </div>
                                <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                                    <a href="https://via.placeholder.com/1200/000000.png?text=8" data-toggle="lightbox"
                                        data-title="sample 8 - black" data-gallery="gallery">
                                        <img src="../img/cabaña8.jpeg" class="img-fluid mb-2" alt="white sample" />
                                    </a>
                                </div>
                                <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                                    <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=9"
                                        data-toggle="lightbox" data-title="sample 9 - red" data-gallery="gallery">
                                        <img src="../img/cabaña9.jpeg" class="img-fluid mb-2" alt="white sample" />
                                    </a>
                                </div>
                                <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=10" data-toggle="lightbox"
                                        data-title="sample 10 - white" data-gallery="gallery">
                                        <img src="../img/cabaña10.jpeg" class="img-fluid mb-2" alt="white sample" />
                                    </a>
                                </div>
                                <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=11" data-toggle="lightbox"
                                        data-title="sample 11 - white" data-gallery="gallery">
                                        <img src="../img/cabaña11.jpeg" class="img-fluid mb-2" alt="white sample" />
                                    </a>
                                </div>
                                <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                                    <a href="https://via.placeholder.com/1200/000000.png?text=12" data-toggle="lightbox"
                                        data-title="sample 12 - black" data-gallery="gallery">
                                        <img src="../img/cabaña12.jpeg" class="img-fluid mb-2" alt="white sample" />
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
@endsection
