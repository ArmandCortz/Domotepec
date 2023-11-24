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
                            <h5 class="text-center" style="color: red">
                                ¿Estas seguro de querer eliminar al usuario
                                con los siguientes datos?</h5>
                            <br>
                            <div class="row mb-3">
                                <label for="name-{{ $user->id }}"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombre:') }}</label>

                                <div class="col-md-6">
                                    <input id="name-{{ $user->id }}" type="text"
                                        name="name-{{ $user->id }}"
                                        class="form-control"
                                        value="{{ $user->name }}"
                                        disabled readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email-{{ $user->id }}"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Correo:') }}</label>

                                <div class="col-md-6">
                                    <input id="email-{{ $user->id }}" type="text"
                                        name="email-{{ $user->id }}"
                                        class="form-control"
                                        value="{{ $user->email }}"
                                        disabled readonly>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button"
                                    class="btn btn-outline-success"
                                    data-dismiss="modal">Cancelar</button>
                                <form
                                    action="{{ route('users.destroy', $user->id) }}"
                                    method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-outline-danger">Eliminar</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>