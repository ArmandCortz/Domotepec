@extends('layouts.app_users')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/galeria.css') }}">
@endpush
@section('content')
    <!-- Main content -->
    <section class="content">
        {{-- primera galeria --}}
        <div class="row">
            <div class="col-12">
                <h1 style="color: #s007bff;line-height: 50px;text-align: center" class="vc_custom_heading">Galería
                </h1>
                <p style="color: #480d0d;text-align: center" class="vc_custom_heading vc_custom_1491259691992">
                    Conoce
                    más detalles sobre Domotepec</p>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                            {{-- imagen con zoom --}}
                            <div class="zoom">
                                <div class="thumbex">
                                    <div class="thumbnail">
                                        <a data-bs-toggle="modal" data-bs-target="#modal1">
                                            <img src="../img/cabaña1.jpeg" class="img-fluid mb-2"
                                                style="height:110%; width:110%;" alt="white sample" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade " id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl" style="height: 500px">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </button>
                                        <div class="marco" style="height: 100%; width:100%;">
                                            <div class="thumbex">
                                                <div class="thumbnail">
                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <img src="../img/cabaña1.jpeg" class="img-fluid mb-2"
                                                            style="height:100%; width:100%;" alt="white sample" />
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                            {{-- imagen con zoom --}}
                            <div class="zoom">
                                <div class="thumbex">
                                    <div class="thumbnail">
                                        <a data-bs-toggle="modal" data-bs-target="#modal2">
                                            <img src="../img/cabaña2.jpeg" class="img-fluid mb-2"
                                                style="height:110%; width:110%;" alt="white sample" />
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade " id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl" style="height: 500px">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </button>
                                        <div class="marco" style="height: 100%; width:100%;">
                                            <div class="thumbex">
                                                <div class="thumbnail">
                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <img src="../img/cabaña2.jpeg" class="img-fluid mb-2"
                                                            style="height:100%; width:100%;" alt="white sample" />
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                            {{-- imagen con zoom --}}
                            <div class="zoom">
                                <div class="thumbex">
                                    <div class="thumbnail">
                                        <a data-bs-toggle="modal" data-bs-target="#modal3">
                                            <img src="../img/cabaña3.jpeg" class="img-fluid mb-2"
                                                style="height:110%; width:110%;" alt="white sample" />
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade " id="modal3" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl" style="height: 500px">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </button>
                                        <div class="marco" style="height: 100%; width:100%;">
                                            <div class="thumbex">
                                                <div class="thumbnail">
                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <img src="../img/cabaña3.jpeg" class="img-fluid mb-2"
                                                            style="height:100%; width:100%;" alt="white sample" />
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                            {{-- imagen con zoom --}}
                            <div class="zoom">
                                <div class="thumbex">
                                    <div class="thumbnail">
                                        <a data-bs-toggle="modal" data-bs-target="#modal4">
                                            <img src="../img/cabaña4.jpeg" class="img-fluid mb-2"
                                                style="height:110%; width:110%;" alt="white sample" />
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade " id="modal4" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl" style="height: 500px">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </button>
                                        <div class="marco" style="height: 100%; width:100%;">
                                            <div class="thumbex">
                                                <div class="thumbnail">
                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <img src="../img/cabaña4.jpeg" class="img-fluid mb-2"
                                                            style="height:100%; width:100%;" alt="white sample" />
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                            {{-- imagen con zoom --}}
                            <div class="zoom">
                                <div class="thumbex">
                                    <div class="thumbnail">
                                        <a data-bs-toggle="modal" data-bs-target="#modal5">
                                            <img src="../img/cabaña5.jpeg" class="img-fluid mb-2"
                                                style="height:110%; width:110%;" alt="white sample" />
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade " id="modal5" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl" style="height: 500px">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </button>
                                        <div class="marco" style="height: 100%; width:100%;">
                                            <div class="thumbex">
                                                <div class="thumbnail">
                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <img src="../img/cabaña5.jpeg" class="img-fluid mb-2"
                                                            style="height:100%; width:100%;" alt="white sample" />
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                            {{-- imagen con zoom --}}
                            <div class="zoom">
                                <div class="thumbex">
                                    <div class="thumbnail">
                                        <a data-bs-toggle="modal" data-bs-target="#modal6">
                                            <img src="../img/cabaña6.jpeg" class="img-fluid mb-2"
                                                style="height:110%; width:110%;" alt="white sample" />
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade " id="modal6" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl" style="height: 500px">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </button>
                                        <div class="marco" style="height: 100%; width:100%;">
                                            <div class="thumbex">
                                                <div class="thumbnail">
                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <img src="../img/cabaña6.jpeg" class="img-fluid mb-2"
                                                            style="height:100%; width:100%;" alt="white sample" />
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                            {{-- imagen con zoom --}}
                            <div class="zoom">
                                <div class="thumbex">
                                    <div class="thumbnail">
                                        <a data-bs-toggle="modal" data-bs-target="#modal7">
                                            <img src="../img/cabaña7.jpeg" class="img-fluid mb-2"
                                                style="height:110%; width:110%;" alt="white sample" />
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade " id="modal7" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl" style="height: 500px">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </button>
                                        <div class="marco" style="height: 100%; width:100%;">
                                            <div class="thumbex">
                                                <div class="thumbnail">
                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <img src="../img/cabaña7.jpeg" class="img-fluid mb-2"
                                                            style="height:100%; width:100%;" alt="white sample" />
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                            {{-- imagen con zoom --}}
                            <div class="zoom">
                                <div class="thumbex">
                                    <div class="thumbnail">
                                        <a data-bs-toggle="modal" data-bs-target="#modal8">
                                            <img src="../img/cabaña8.jpeg" class="img-fluid mb-2"
                                                style="height:110%; width:110%;" alt="white sample" />
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade " id="modal8" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl" style="height: 500px">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </button>
                                        <div class="marco" style="height: 100%; width:100%;">
                                            <div class="thumbex">
                                                <div class="thumbnail">
                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <img src="../img/cabaña8.jpeg" class="img-fluid mb-2"
                                                            style="height:100%; width:100%;" alt="white sample" />
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                            {{-- imagen con zoom --}}
                            <div class="zoom">
                                <div class="thumbex">
                                    <div class="thumbnail">
                                        <a data-bs-toggle="modal" data-bs-target="#modal9">
                                            <img src="../img/cabaña9.jpeg" class="img-fluid mb-2"
                                                style="height:110%; width:110%;" alt="white sample" />
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade " id="modal9" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl" style="height: 500px">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </button>
                                        <div class="marco" style="height: 100%; width:100%;">
                                            <div class="thumbex">
                                                <div class="thumbnail">
                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <img src="../img/cabaña9.jpeg" class="img-fluid mb-2"
                                                            style="height:100%; width:100%;" alt="white sample" />
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2 col-md-4 col-lg-3 mb-4">
                            {{-- imagen con zoom --}}
                            <div class="zoom">
                                <div class="thumbex">
                                    <div class="thumbnail">
                                        <a data-bs-toggle="modal" data-bs-target="#modal11">
                                            <img src="../img/cabaña11.jpeg" class="img-fluid mb-2"
                                                style="height:110%; width:110%;" alt="white sample" />
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade " id="modal11" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl" style="height: 500px">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </button>
                                        <div class="marco" style="height: 100%; width:100%;">
                                            <div class="thumbex">
                                                <div class="thumbnail">
                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <img src="../img/cabaña11.jpeg" class="img-fluid mb-2"
                                                            style="height:100%; width:100%;" alt="white sample" />
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div><!-- /.container-fluid -->
    </section>
@endsection
