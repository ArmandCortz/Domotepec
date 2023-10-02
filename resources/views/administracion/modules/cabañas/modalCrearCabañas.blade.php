<div class="modal fade" id="crearCabaña" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="crearCabaña" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: rgb(176, 176, 176)">
                <h5 class="modal-title" id="exampleModalLabel">Crear Cabaña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('cabañas.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="nombre">Nombre de la Cabaña</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus placeholder="Nombre de la Cabaña">
                        @error('nombre')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ubicacion">Ubicación</label>
                        <input type="text" class="form-control @error('ubicacion') is-invalid @enderror" id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}" required autocomplete="ubicacion" placeholder="Ubicación">
                        @error('ubicacion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sucursal">Sucursal</label>
                        <select class="form-control @error('sucursal') is-invalid @enderror" id="sucursal" name="sucursal" required>
                            <!-- Opciones del select -->
                            <option value="1">Sucursal 1</option>
                            <option value="2">Sucursal 2</option>
                            <!-- Agrega más opciones según tus necesidades -->
                        </select>
                        @error('sucursal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3" placeholder="Descripción">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
