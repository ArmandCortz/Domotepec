<div class="modal fade" id="modal-eliminar-{{ $sucursal->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modal-perfilLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <div class="container text-center">
                    <h1 class="modal-title" id="modal-perfilLabel">Eliminar
                        Empresa</h1>
                </div>
                <button type="button" class="close" style="color:white;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="card-body">
                        <h5 class="text-center" style="color: red">
                            ¿Estas seguro de querer eliminar la empresa
                            con los siguientes datos?</h5>
                        <br>
                        <div class="row row-cols-2">
                            <div class="col">
                                <div class="row mb-3">
                                    <label for="nombre"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                    <div class="col-md-8">
                                        <input id="nombre" type="text"
                                            class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                            value="{{ $sucursal->nombre }}" autocomplete="nombre" autofocus>

                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="col">
                                <div class="row mb-3">
                                    <label for="sucursal"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Empresa') }}</label>

                                    <div class="col-md-8">
                                        <select id="empresa" name="empresa"
                                            class="form-control @error('empresa') is-invalid @enderror"
                                            autocomplete="empresa">
                                            <option value="" selected disabled>Selecciona una empresa</option>

                                            @foreach ($empresas as $empresa)
                                                <option value="{{ $empresa->id }}"
                                                    {{ $empresa->id == $sucursal->empresa ? 'selected' : '' }}>
                                                    {{ $empresa->nombre }} </option>
                                            @endforeach

                                        </select>

                                        @error('empresa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row mb-3">
                                    <label for="direccion"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Direccion') }}</label>

                                    <div class="col-md-8">
                                        <input id="direccion" type="text"
                                            class="form-control @error('direccion') is-invalid @enderror"
                                            name="direccion" value="{{ $sucursal->direccion }}"
                                            autocomplete="direccion" autofocus>

                                        @error('direccion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="col">
                                <div class="row mb-3">
                                    <label for="telefono"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Telefono') }}</label>
                                    <div class="col-md-8">

                                        <input id="telefono" type="text"
                                            class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                            value="{{ $sucursal->telefono }}" autocomplete="telefono">
                                        @error('telefono')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col">
                                <div class="row mb-3">
                                    <label for="gerente"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Gerente') }}</label>

                                    <div class="col-md-8">
                                        <input id="gerente" type="text"
                                            class="form-control @error('gerente') is-invalid @enderror" name="gerente"
                                            value="{{ $sucursal->gerente }}" autocomplete="gerente" autofocus>

                                        @error('gerente')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>


                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-success"
                                data-dismiss="modal">Cancelar</button>
                            <form action="{{ route('sucursales.destroy', $sucursal->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>
