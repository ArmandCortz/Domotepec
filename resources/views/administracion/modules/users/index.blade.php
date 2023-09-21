@extends('adminlte::page')
@section('title', 'Users')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Usuarios</h1>
                {{-- <a href="{{ route('users.create') }}" class="btn btn-primary" data-toggle="modal" 
                    <a href="{{ route('users.create') }}" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Crear Usuario</a> --}}
                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                    Crear Usuario
                </a>
                <div class="card mt-3">
                    <div class="card-body ">

                        <table class="table table-hover table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            {{-- <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Ver</a> --}}

                                            {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a> --}}
                                            <a type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#modal-perfil-{{ $user->id }}">
                                                Perfil
                                            </a>


                                            <div class="modal fade" id="modal-perfil-{{ $user->id }}"
                                                data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                aria-labelledby="modal-perfilLabel" aria-hidden="true">
                                                <div
                                                    class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-dark">
                                                            <div class="container text-center">
                                                                <h1 class="modal-title" id="modal-perfilLabel">Perfil de
                                                                    Usuario</h1>
                                                            </div>
                                                            <button type="button" class="close" style="color:white;"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row mb-3">
                                                                            <label for="name"
                                                                                class="col-md-4 col-form-label text-md-end">{{ __('Nombre:') }}</label>

                                                                            <div class="col-md-6">
                                                                                <input id="name" type="text"
                                                                                    name="name" class="form-control"
                                                                                    value="{{ $user->name }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label for="name"
                                                                                class="col-md-4 col-form-label text-md-end">{{ __('Correo:') }}</label>

                                                                            <div class="col-md-6">
                                                                                <input id="name" type="text"
                                                                                    name="name" class="form-control"
                                                                                    value="{{ $user->email }}">
                                                                            </div>
                                                                        </div>


                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-primary"
                                                                                data-dismiss="modal">Cerrar</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>





                                            <a type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal-edit-{{ $user->id }}">
                                                Editar
                                            </a>


                                            <div class="modal fade" id="modal-edit-{{ $user->id }}"
                                                data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                aria-labelledby="modal-editLabel" aria-hidden="true">
                                                <div
                                                    class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-dark">
                                                            <div class="container text-center">
                                                                <h1 class="modal-title" id="modal-editLabel">Editar
                                                                    Usuario</h1>
                                                            </div>
                                                            <button type="button" class="close" style="color:white;"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row mb-3">
                                                                            <label for="name"
                                                                                class="col-md-4 col-form-label text-md-end">{{ __('Nombre:') }}</label>

                                                                            <div class="col-md-6">
                                                                                <input id="name" type="text"
                                                                                    name="name" class="form-control"
                                                                                    value="{{ $user->name }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label for="name"
                                                                                class="col-md-4 col-form-label text-md-end">{{ __('Correo:') }}</label>

                                                                            <div class="col-md-6">
                                                                                <input id="email" type="text"
                                                                                    name="email" class="form-control"
                                                                                    value="{{ $user->email }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label for="password"
                                                                                class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                                                            <div class="col-md-6">
                                                                                <input id="password" type="password"
                                                                                    class="form-control @error('password') is-invalid @enderror"
                                                                                    name="password" required
                                                                                    autocomplete="new-password">

                                                                                @error('password')
                                                                                    <span class="invalid-feedback"
                                                                                        role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label for="password-confirm"
                                                                                class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>

                                                                            <div class="col-md-6">
                                                                                <input id="password-confirm"
                                                                                    type="password" class="form-control"
                                                                                    name="password_confirmation" required
                                                                                    autocomplete="new-password">
                                                                            </div>
                                                                        </div>


                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Cancelar</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Guardar</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                            @if (Auth::user()->name === $user->name)
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        disabled>Eliminar</button>
                                                </form>
                                            @else
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal crete_user --}}

    <div class="modal fade" id="modal-create" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="modal-createLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <div class="container text-center">
                        <h1 class="modal-title" id="modal-createLabel">Crear Usuario</h1>
                    </div>
                    <button type="button" class="close" style="color:white;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    @endsection
