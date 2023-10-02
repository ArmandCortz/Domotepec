{{-- @extends('layou --}}
@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <div class="content-header">
        <div class="card">
            <div class="container-fluid card-header mb-5 text-center">

                <h1 class="">Dashboard</h1>

            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-3 col-6">
                            <div class="small-box text-white" style="background-color: rgb(43, 42, 42);">
                                <div class="inner">
                                    <h3>Usuarios</h3>

                                    <p>Modulo administrativo</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="users" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box text-white" style="background-color: rgb(73, 73, 73);">
                                <div class="inner">
                                    <h3>Sucursal</h3>

                                    <p>Modulo administrativo</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box text-white" style="background-color: rgb(107, 105, 105);">
                                <div class="inner">
                                    <h3>Cabaña</h3>

                                    <p>Modulo administrativo</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box text-white" style="background-color: rgb(155, 152, 152);">
                                <div class="inner">
                                    <h3>Servicios</h3>

                                    <p>Modulo administrativo</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box text-white" style="background-color: rgb(43, 42, 42);">
                                <div class="inner">
                                    <h3>Bienes</h3>

                                    <p>Modulo administrativo</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="users" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
@push('scripts')
    
@endpush