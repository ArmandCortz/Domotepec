<!-- Modal Crear Galería -->
<div class="modal fade" id="crearGaleriaModal" tabindex="-1" role="dialog" aria-labelledby="crearGaleriaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearGaleriaModalLabel">Crear Nueva Galería</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para crear la galería -->
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ubicacion">Ubicación:</label>
                        <input type="text" class="form-control" name="ubicacion" id="ubicacion">
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen:</label>
                        <input type="file" class="form-control-file" name="imagen" id="imagen">
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <div class="form-group">
                        <label for="sucursal">Sucursal:</label>
                        <select class="form-control" name="sucursal" id="sucursal">
                            <!-- Similar a empresa, aquí iteras sobre tus sucursales -->
                            <option value="1">Sucursal 1</option>
                            <option value="2">Sucursal 2</option>
                            <!-- Agregar más opciones según tus datos -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Galería</button>
                </form>
            </div>
        </div>
    </div>
</div>
