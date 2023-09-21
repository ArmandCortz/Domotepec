{{-- @extends('layou --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@extends('adminlte::page')
@section('title','Home')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                
            </div>
        </div>
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
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box text-white" style="background-color: rgb(73, 73, 73);">
                        <div class="inner">
                            <h3>Modulo</h3>

                            <p>Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box text-white" style="background-color: rgb(107, 105, 105);">
                        <div class="inner">
                            <h3>Modulo</h3>

                            <p>Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box text-white" style="background-color: rgb(155, 152, 152);">
                        <div class="inner">
                            <h3>Modulo</h3>

                            <p>Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

@endsection
@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endsection
@section('js')
    <script>
        console.log('Vista Home')
    </script>
@endsection
