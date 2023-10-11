@extends('adminlte::page')
@section('title', 'Roles')

@section('content')
    <div class="container py-4">
        <h1 class="text-center">Edicion de roles de usuarios</h1> <br>
        <div class="card">

            <div class="card-body">
                <h2 class="text-center">Datos de usuario:</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <form>
                                <div class="form-group">
                                    <div class="row justify-content-center align-items-center g-2">
                                        <div class="col">
                                            <label for="name-{{ $user->id }}">Nombre:</label>
                                            <input id="name-{{ $user->id }}" type="text"
                                                name="name-{{ $user->id }}" class="form-control"
                                                value="{{ $user->name }}" disabled>
                                        </div>
                                        <div class="col"> <label for="email-{{ $user->id }}">Email:</label>
                                            <input id="email-{{ $user->id }}" type="email"
                                                name="email-{{ $user->id }}" class="form-control"
                                                value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="row justify-content-center align-items-center g-2">
                                        @if (Auth::user()->id === $user->id)
                                            <div class="col-12">
                                                <label for="rol-{{ $user->id }}">Rol:</label>
                                                <select id="rol-{{ $user->id }}" class="form-control form-control-lg"
                                                    disabled>
                                                    <option selected value="1">Superadministrador</option>
                                                    <option value="2">Administrador</option>
                                                    <option value="3">Cliente</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="email-{{ $user->id }}">Email:</label>
                                                <input id="email-{{ $user->id }}" type="email"
                                                    name="email-{{ $user->id }}" class="form-control"
                                                    value="{{ $user->email }}" disabled>
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <label for="rol-{{ $user->id }}">Rol:</label>
                                                <select id="rol-{{ $user->id }}" class="form-control form-control-lg">
                                                    <option selected value="1">Superadministrador</option>
                                                    <option value="2">Administrador</option>
                                                    <option value="3">Cliente</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <br>
                                                <label for="">Permisos:</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="defaultCheck1" checked>
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        Permiso 1
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        Permiso 2
                                                    </label>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('users.index') }}" type="button"
                                        class="btn btn-outline-danger">Cancelar</a>
                                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
