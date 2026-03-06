@php
    use Illuminate\Support\Facades\Auth;
@endphp

<section>
    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" 
                   value="{{ old('name', Auth::user()->name) }}" required autofocus>
            @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-bold">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" 
                   value="{{ old('email', Auth::user()->email) }}" required>
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror

            @if (Auth::user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! Auth::user()->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="small text-secondary">
                        Tu correo no ha sido verificado.
                        <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline">
                            Reenviar verificación
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <div class="alert alert-success alert-auto-hide mt-2 p-2 small">
                            Se ha enviado un nuevo enlace de verificación.
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-solid-red">Guardar</button>
            @if (session('status') === 'profile-updated')
                <div class="alert alert-success alert-auto-hide mb-0 py-2 px-3 small">
                    Guardado.
                </div>
            @endif
        </div>
    </form>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="d-none">
        @csrf
    </form>
</section>