@extends('layouts.app')
@extends('layouts.components.navbar')
@section('content')

<section class="content">
    <div class="container-fluid">
        <!-- Application buttons -->
        <div class="card-header">
            <h3 class="card-title">BIENVENIDOS A AV SISTEM (DOMOTEPEC)</h3>
        </div>
        <div class="card-body" style="text-align: center;">
            <a class="btn btn-app">
                <i class="fas fa-house-tsunami"></i> Playa
            </a>
            <a class="btn btn-app">
                <i class="fas fa-mountain-sun"></i> campo
            </a>
            <a class="btn btn-app">
                <i class="fas fa-hotel"></i> Ciudad
            </a>
            <a class="btn btn-app">
                <i class="fas fa-sailboat"></i> Lago
            </a>
        </div>
        <!-- /.card-body -->

        <!-- /.card -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="info-box">
                    <div class="info-box-content">
                        <span class="info-box-text">Domotepec</span>
                        <span class="info-box-number">1,410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div id="imageCarousel6" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="w-100" src="{{ asset('img/CHALATE_1.png') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="w-100" src="{{ asset('img/CHALATE_1.png') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="w-100" src="{{ asset('img/CHALATE_1.png') }}">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#imageCarousel6" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#imageCarousel6" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="info-box">
                    <div class="info-box-content">
                        <span class="info-box-text">Chalate</span>
                        <span class="info-box-number">1,410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div id="imageCarousel3" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#imageCarousel3" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#imageCarousel3" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="info-box">
                    <div class="info-box-content">
                    <span class="info-box-text">Domotepec</span>
                        <span class="info-box-number">1,410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div id="imageCarousel4" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#imageCarousel4" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#imageCarousel4" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="info-box">
                    <div class="info-box-content">
                        <span class="info-box-text">Surfcity</span>
                        <span class="info-box-number">1,410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
      <!-- /.card -->
      <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="info-box">
                    <div class="info-box-content">
                        <span class="info-box-text">Lago</span>
                        <span class="info-box-number">1,410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div id="imageCarousel6" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="w-100" src="{{ asset('img/CHALATE_1.png') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="w-100" src="{{ asset('img/CHALATE_1.png') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="w-100" src="{{ asset('img/CHALATE_1.png') }}">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#imageCarousel6" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#imageCarousel6" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="info-box">
                    <div class="info-box-content">
                        <span class="info-box-text">Messages</span>
                        <span class="info-box-number">1,410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div id="imageCarousel3" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#imageCarousel3" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#imageCarousel3" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="info-box">
                    <div class="info-box-content">
                        <span class="info-box-text">Messages</span>
                        <span class="info-box-number">1,410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div id="imageCarousel4" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                        <div class="carousel-item">
                        <img class="w-100" src="{{ asset('img/surfcity_3.png') }}">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#imageCarousel4" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#imageCarousel4" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="info-box">
                    <div class="info-box-content">
                        <span class="info-box-text">Messages</span>
                        <span class="info-box-number">1,410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    
</section>
@endsection