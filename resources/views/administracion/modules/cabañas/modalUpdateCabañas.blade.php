<div class="modal fade" id="crearCabañaModal{{ $Cabaña->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="crearCabañaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <div class="container text-center">
                    <h1 class="modal-title" id="crearCabañaModalLabel">Editar Cabañas</h1>
                </div>
                <button type="button" class="close" style="color:white;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('cabañas.update', $Cabañas->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="empresa">Empresa:</label>
                                    <input type="text" name="empresa" class="form-control" value="{{ $sucursal->empresa }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre de la Sucursal:</label>
                                    <input type="text" name="nombre" class="form-control" value="{{ $sucursal->nombre }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Dirección:</label>
                                    <input type="text" name="direccion" class="form-control" value="{{ $sucursal->direccion }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Teléfono:</label>
                                    <input type="tel" name="telefono" class="form-control" value="{{ $sucursal->telefono }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="gerente">Gerente:</label>
                                    <input type="text" name="gerente" class="form-control" value="{{ $sucursal->gerente }}" required>
                                </div>
                                <!-- Otros campos relevantes para una sucursal hotelera -->

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
