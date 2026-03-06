<section>
    <p class="text-secondary small mb-4">
        Una vez que elimines tu cuenta, todos sus recursos y datos serán eliminados permanentemente.
        Antes de eliminar, descarga cualquier información que desees conservar.
    </p>

    <!-- Botón para abrir el modal de confirmación -->
    <button type="button" class="btn btn-solid-red" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
        Eliminar cuenta
    </button>

    <!-- Modal de confirmación -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">¿Estás seguro de eliminar tu cuenta?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <p class="small text-secondary">
                            Una vez eliminada, toda la información asociada a la cuenta será irreversible.
                            Por favor, ingresa tu contraseña para confirmar.
                        </p>
                        <div class="mb-3">
                            <label for="delete-password" class="form-label fw-bold">Contraseña</label>
                            <input type="password" class="form-control" id="delete-password" name="password" 
                                   placeholder="Tu contraseña actual" required>
                            @error('password', 'userDeletion')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-solid-red">Eliminar definitivamente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>