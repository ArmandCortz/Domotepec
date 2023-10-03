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
                                        class="btn btn-outline-danger"
                                        data-dismiss="modal">Cancelar</button>
                                    <button type="submit"
                                        class="btn btn-outline-primary">Guardar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>