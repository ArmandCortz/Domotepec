<div class="modal fade" id="modal-eliminar-{{ $cabaña->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modal-perfilLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <div class="container text-center">
                    <h1 class="modal-title" id="modal-perfilLabel">Eliminar
                        Cabaña</h1>
                </div>
                <button type="button" class="close" style="color:white;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="card-body">
                        <h5 class="text-center" style="color: red">
                            ¿Estas seguro de querer eliminar la Cabaña
                            con los siguientes datos?</h5>
                        <br>
                        <div class="row row-cols-2">
                            <div class="col">
                                <div class="row mb-3">
                                    <label for="nombre-{{ $cabaña->id }}"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                    <div class="col-md-8">
                                        <input id="nombre-{{ $cabaña->id }}" type="text"
                                            class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                            value="{{ $cabaña->nombre }}" autocomplete="nombre" autofocus disabled>

                                        @error('nombre')
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
                            <form action="{{ route('cabañas.destroy', $cabaña->id) }}" method="POST"
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
