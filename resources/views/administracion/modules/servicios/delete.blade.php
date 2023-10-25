<div class="modal fade" id="modal-eliminar-{{ $servicio->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modal-perfilLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <div class="container text-center">
                    <h1 class="modal-title" id="modal-perfilLabel">Eliminar
                        Servicio</h1>
                </div>
                <button type="button" class="close" style="color:white;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="card-body">
                        <h5 class="text-center" style="color: red">
                            ¿Estas seguro de querer eliminar el servicio
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
                                            value="{{ $servicio->nombre }}" autocomplete="nombre" autofocus disabled>

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
                                        class="col-md-4 col-form-label text-md-end">{{ __('Sucursal') }}</label>

                                    <div class="col-md-8">
                                        <select id="sucursal" name="sucursal"
                                            class="form-control @error('sucursal') is-invalid @enderror"
                                            autocomplete="sucursal" disabled>
                                            @foreach ($sucursales as $sucursal)
                                                <option value="{{ $sucursal->id }}"
                                                    {{ $sucursal->id == $servicio->sucursal ? 'selected' : '' }}>
                                                    {{ $sucursal->nombre }} </option>
                                            @endforeach

                                        </select>

                                        @error('sucursal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col">
                                <div class="row mb-3">
                                    <label for="costo"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Costo') }}</label>

                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input id="costo" type="number"
                                                class="form-control @error('costo') is-invalid @enderror" name="costo"
                                                value="{{ $servicio->costo }}" step="0.01" min="0.01"
                                                autocomplete="costo" disabled autofocus>
                                        </div>

                                        @error('costo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                </div>
                            </div>
                            <div class="col">
                                <div class="row mb-3">
                                    <label for="estado"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Estado') }}</label>

                                    <div class="col-md-8">
                                        <select id="estado" name="estado"
                                            class="form-control @error('estado') is-invalid @enderror"
                                            autocomplete="estado" autofocus disabled>
                                            <option value="1" {{ $servicio->estado == '1' ? 'selected' : '' }}>
                                                Activo</option>
                                            <option value="2" {{ $servicio->estado == '2' ? 'selected' : '' }}>
                                                Inactivo
                                            </option>
                                        </select>

                                        @error('estado')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            {{-- <div class="col">
                                <div class="row mb-3">
                                    <label for="sucursal"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Empresa') }}</label>

                                    <div class="col-md-8">
                                        <select id="empresa" name="empresa"
                                            class="form-control @error('empresa') is-invalid @enderror"
                                            autocomplete="empresa" disabled>
                                            <option value="" selected disabled>Selecciona una empresa</option>

                                            @foreach ($empresas as $empresa)
                                                <option value="{{ $sucursal->id }}"
                                                    {{ $empresa->id == $servicio->sucursal ? 'selected' : '' }}>
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
                            </div> --}}
                            <div class="col col-12">
                                <div class="row mb-3">
                                    <label for="nombre"
                                        class="col-md-2 col-form-label text-md-end">{{ __('Descripción') }}</label>

                                    <div class="col-md-10">
                                        <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                                            rows="6" autocomplete="descripcion" disabled autofocus placeholder="Escribe una descripcion para el servicio">{{ $servicio->descripcion }}</textarea>

                                        @error('descripcion')
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
                            <form action="{{ route('bienes.destroy', $servicio->id) }}" method="POST"
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
