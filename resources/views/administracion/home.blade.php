{{-- @extends('layou --}}
@extends('layouts.app')
@section('title', 'Home')

@section('content-admin')
    @can('modulos')
    <div class="content-header">
        <div class="card">
            
            <section class="content">
                <div class="container-fluid text-center py-4">
                    <img src="{{ asset('img/img/Logo-Domotepec-1.jpeg') }}"
                        alt="Logo de empresa"
                        style="width: 400px; height: 400px;  border-radius: 5px; overflow: hidden;">
                

                </div>
            </section>
        </div>
    </div>
    @endcan
@endsection
@push('scripts')
@endpush
