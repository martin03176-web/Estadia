<section>
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="current_password" class="form-label fw-bold">Contraseña actual</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
            @error('current_password', 'updatePassword')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-bold">Nueva contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
            @error('password', 'updatePassword')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label fw-bold">Confirmar contraseña</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            @error('password_confirmation', 'updatePassword')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-solid-red">Guardar</button>
            @if (session('status') === 'password-updated')
                <div class="alert alert-success alert-auto-hide mb-0 py-2 px-3 small">
                    Guardado.
                </div>
            @endif
        </div>
    </form>
</section>