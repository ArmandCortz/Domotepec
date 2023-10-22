<div class="modal fade" id="crearSucursalModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="crearSucursalModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: rgb(176, 176, 176)">
                <h5 class="modal-title" id="exampleModalLabel" style="">Crear Sucursal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('sucursales.store') }}">
                    @csrf
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="empresa" class="sr-only">Empresa</label>
                        <select class="form-control @error('empresa') is-invalid @enderror" id="empresa"
                            name="empresa" required>
                            <option value="" selected disabled>Selecciona una empresa</option>
                            @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->nombre }}"
                                    @if (old('empresa') == $empresa->id) selected @endif>
                                    {{ $empresa->nombre }}</option>
                            @endforeach
                        </select>
                        @error('empresa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mx-sm-3 mb-2">
                        <label for="nombre" class="sr-only">Nombre de la Sucursal</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                            name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus
                            placeholder="Nombre de la Sucursal">
                        @error('nombre')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mx-sm-3 mb-2">
                        <label for="direccion" class="sr-only">Dirección</label>
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror"
                            id="direccion" name="direccion" value="{{ old('direccion') }}" required
                            autocomplete="direccion" placeholder="Dirección">
                        @error('direccion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mx-sm-3 mb-2">
                        <label for="telefono" class="sr-only">Teléfono</label>
                        <input type="tel" class="form-control @error('telefono') is-invalid @enderror"
                            id="telefono" style="width: 100%" name="telefono" required>
                        @error('telefono')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mx-sm-3 mb-2">
                        <label for="gerente" class="sr-only">Gerente</label>
                        <input type="text" class="form-control @error('gerente') is-invalid @enderror" id="gerente"
                            name="gerente" value="{{ old('gerente') }}" required autocomplete="gerente"
                            placeholder="Gerente">
                        @error('gerente')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!-- Otros campos relevantes para una sucursal hotelera -->


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
