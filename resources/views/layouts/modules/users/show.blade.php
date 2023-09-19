@extends('layouts.app')
        @include('layouts.components.navbaradmin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Detalles del Usuario</h1>
            <table class="table mt-3">
                <tbody>
                    <tr>
                        <th>ID:</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th>Nombre:</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
