@extends('layouts.app')
@section('title', 'Perfil')

@section('content-admin')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-3">Perfil de usuario</h1>


                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Información de usuario</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">

                        <br>
                        <div class="row row-cols-2 py-2">
                            <div class="col-4">
                                <h2>Información del usuario</h2>
                                <small> Actualice la información del perfil y la dirección de correo electrónico de su
                                    cuenta.</small>
                            </div>
                            <div class="col-8 ">
                                {!! Form::model($user, [
                                    'route' => ['perfil.update', $user->id],
                                    'method' => 'PUT',
                                ]) !!}
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row row-cols-2 justify-content-center align-items-center g-2">
                                                <div class="col">
                                                    <div class="form-group{{ $errors->has('name-'.$user->id,) ? ' has-error' : '' }}">
                                                        {!! Form::label('name-'.$user->id, 'Usuario:') !!}
                                                        {!! Form::text('name-'.$user->id, $user->name, [
                                                            'class' => 'form-control',
                                                        ]) !!}
                                                        <small class="text-danger">{{ $errors->first('name-'.$user->id) }}</small>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        {!! Form::label('email', 'Email:') !!}
                                                        {!! Form::email('email', $user->email, [
                                                            'class' => 'form-control',
                                                        ]) !!}
                                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div
                                                        class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
                                                        {!! Form::label('nombres', 'Nombres:') !!}
                                                        {!! Form::text('nombres', $user->nombres, [
                                                            'class' => 'form-control',
                                                        ]) !!}
                                                        <small class="text-danger">{{ $errors->first('nombres') }}</small>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div
                                                        class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
                                                        {!! Form::label('apellidos', 'Apellidos:') !!}
                                                        {!! Form::text('apellidos', $user->apellidos, [
                                                            'class' => 'form-control',
                                                        ]) !!}
                                                        <small class="text-danger">{{ $errors->first('apellidos') }}</small>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group{{ $errors->has('dui') ? ' has-error' : '' }}">
                                                        {!! Form::label('dui', 'Dui:') !!}
                                                        {!! Form::text('dui', $user->dui, [
                                                            'class' => 'form-control',
                                                        ]) !!}
                                                        <small class="text-danger">{{ $errors->first('dui') }}</small>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div
                                                        class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                                        {!! Form::label('telefono', 'telefono:') !!}
                                                        {!! Form::text('telefono', $user->telefono, [
                                                            'class' => 'form-control',
                                                        ]) !!}
                                                        <small class="text-danger">{{ $errors->first('telefono') }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-outline-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Actualizar contraseña</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row row-cols-2 py-2">
                            <div class="col-4">
                                <h2>Actualizar contraseña</h2>
                                <small> Asegúrese de que su cuenta utilice una contraseña larga y aleatoria para mantenerse
                                    segura.</small>
                            </div>
                            <div class="col-8 ">
                                {!! Form::model($user, [
                                    'route' => ['users.update', $user->id],
                                    'method' => 'PUT',
                                ]) !!}
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row row-cols-1 justify-content-center align-items-center g-2">
                                                <div class="col">
                                                    <div
                                                        class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        {!! Form::label('password', 'Contraseña actual:') !!}
                                                        {!! Form::password('password', [
                                                            'class' => 'form-control',
                                                        ]) !!}
                                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <div class="row row-cols-2">
                                                        <div class="col">
                                                            <div
                                                                class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                                                {!! Form::label('new-password', 'Nueva contraseña:') !!}
                                                                {!! Form::password('new-password', [
                                                                    'class' => 'form-control',
                                                                ]) !!}
                                                                <small
                                                                    class="text-danger">{{ $errors->first('new-password') }}</small>
                                                            </div>

                                                        </div>
                                                        <div class="col">

                                                            <div
                                                                class="form-group{{ $errors->has('new-password-confirm') ? ' has-error' : '' }}">
                                                                {!! Form::label('new-password-confirm', 'Confirmar nueva contraseña:') !!}
                                                                {!! Form::password('new-password-confirm', [
                                                                    'class' => 'form-control',
                                                                ]) !!}
                                                                <small
                                                                    class="text-danger">{{ $errors->first('new-password-confirm') }}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-outline-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
    <script>
        @if (session('success'))
            {
                alertify.notify("{{ session('success') }}", 'success', 5);
            }
        @endif
        @if (session('error'))
            {
                alertify.error("{{ session('error') }}", 'error', 5);
            }
        @endif
        @if (session('info'))
            {
                alertify.notify("{{ session('info') }}", 'custom', 5);
            }
        @endif
    </script>

@endsection
