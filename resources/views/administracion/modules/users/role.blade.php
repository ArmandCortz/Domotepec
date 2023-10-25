@extends('adminlte::page')
@section('title', 'Roles')

@section('content')
    <div class="container py-4">
        <h1 class="text-center">Edición de roles de usuarios</h1>
        <br>
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Datos de usuario:</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::model($user, [
                                'route' => ['users.update', $user->id],
                                'method' => 'PUT',
                            ]) !!}
                            <div class="form-group">
                                <div class="row justify-content-center align-items-center g-2">
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('name-' . $user->id) ? ' has-error' : '' }}">
                                            {!! Form::label('name-' . $user->id, 'Usuario:') !!}
                                            {!! Form::text('name-' . $user->id, $user->name, [
                                                'class' => 'form-control',
                                                'disabled' => Auth::user()->id === $user->id ? true : false,
                                            ]) !!}
                                            <small class="text-danger">{{ $errors->first('name-' . $user->id) }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('email-' . $user->id) ? ' has-error' : '' }}">
                                            {!! Form::label('email-' . $user->id, 'Email:') !!}
                                            {!! Form::email('email-' . $user->id, $user->email, [
                                                'class' => 'form-control',
                                                'disabled' => Auth::user()->id === $user->id ? true : false,
                                            ]) !!}
                                            <small class="text-danger">{{ $errors->first('email-' . $user->id) }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                                {!! Form::label('roles[]', 'Rol:') !!}
                                {!! Form::select('roles[]', $roles->pluck('name', 'id'), null, [
                                    'class' => 'form-control',
                                    'disabled' => Auth::user()->id === $user->id ? true : false,
                                    'required' => 'required',
                                ]) !!}

                                <small class="text-danger">{{ $errors->first('rol') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('permisos') ? ' has-error' : '' }}">
                                <div class="row justify-content-center align-items-center g-2">

                                    <div class="col">
                                        {{-- {!! Form::label('permisos[]', 'Permisos:') !!} --}}
                                        {{ 'Permisos:' }}
                                        <div class="row row-cols-3">

                                            @foreach ($permisos as $permiso)
                                                <div class="col">
                                                    <div class="form-check">
                                                        {!! Form::checkbox(
                                                            'permisos[]', // Nombre del campo
                                                            $permiso->name, // Valor del campo
                                                            $user->hasPermissionTo($permiso->name), // Si debe estar marcado o no
                                                            ['class' => 'form-check-input', 'id' => 'permiso-' . $permiso->id],
                                                        ) !!}
                                                        {!! Form::label('permiso-' . $permiso->id, $permiso->description, ['class' => 'form-check-label']) !!}
                                                    </div>
                                                </div>
                                            @endforeach



                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        {!! link_to(route('users.index'), 'Cancelar', [
                            'class' => 'btn btn-outline-danger',
                        ]) !!}

                        @if (Auth::user()->id === $user->id)
                            {!! Form::submit('Guardar', ['class' => 'btn btn-outline-primary', 'disabled' => 'disabled']) !!}
                        @else
                            {!! Form::submit('Guardar', ['class' => 'btn btn-outline-primary']) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>

    <script></script>
@endsection
