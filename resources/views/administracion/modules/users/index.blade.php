@extends('adminlte::page')
@section('title', 'Users')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-3">Modulo Usuarios</h1>
                {{-- <a href="{{ route('users.create') }}" class="btn btn-primary" data-toggle="modal" 
                    <a href="{{ route('users.create') }}" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Crear Usuario</a> --}}
                {{-- <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                    Crear Usuario
                </a> --}}
                <a href="{{ route('users.create') }}" class="btn btn-primary">Crear Usuario</a>
                <div class="card mt-3">
                    <div class="card-body ">

                        <table  class="table table-hover table-striped">
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
                                                                        <form
                                                                            action="{{ route('users.update', $user->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="form-group">
                                                                                <label for="name">Nombre:</label>
                                                                                <input type="text" name="name"
                                                                                    class="form-control"
                                                                                    value="{{ $user->name }}" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="email">Email:</label>
                                                                                <input type="email" name="email"
                                                                                    class="form-control"
                                                                                    value="{{ $user->email }}" required>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-danger"
                                                                                    data-dismiss="modal">Cancelar</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Guardar</button>
                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                            @if (Auth::user()->name === $user->name)
                                                
                                                    <button type="submit" class="btn btn-danger" disabled>Eliminar</button> 
                                            @else
                                                <a type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#modal-eliminar-{{ $user->id }}">
                                                    Eliminar
                                                </a>


                                                <div class="modal fade" id="modal-eliminar-{{ $user->id }}"
                                                    data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                    aria-labelledby="modal-perfilLabel" aria-hidden="true">
                                                    <div
                                                        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-dark">
                                                                <div class="container text-center">
                                                                    <h1 class="modal-title" id="modal-perfilLabel">Eliminar
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
                                                                            <h5 class="text-center" style="color: red">¿Estas seguro de querer eliminar al usuario con los siguientes datos?</h5>
                                                                            <br>
                                                                            <div class="row mb-3">
                                                                                <label for="name"
                                                                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombre:') }}</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="name" type="text"
                                                                                        name="name" class="form-control"
                                                                                        value="{{ $user->name }}" disabled readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="name"
                                                                                    class="col-md-4 col-form-label text-md-end">{{ __('Correo:') }}</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="name" type="text"
                                                                                        name="name"
                                                                                        class="form-control"
                                                                                        value="{{ $user->email }}" disabled readonly>
                                                                                </div>
                                                                            </div>


                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-success"
                                                                                    data-dismiss="modal">Cancelar</button>
                                                                                <form
                                                                                    action="{{ route('users.destroy', $user->id) }}"
                                                                                    method="POST"
                                                                                    style="display: inline;">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger">Eliminar</button>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
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
                                <form method="POST" action="{{ route('users.store') }}">
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
                                        <button type="button" class="btn btn-danger"
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
@push('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

@endpush
    @endsection
