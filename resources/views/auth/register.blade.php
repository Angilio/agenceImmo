<x-guest-layout>
    <x-auth-card>
        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="w-100">
            @csrf
            @method('POST')
            <div class="mb-4">
                {{-- Name --}}
                <div class="mb-3 w-100">
                    <label for="name" class="form-label">{{ __('Nom') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus >
                    </div>
                </div>

                {{-- Prenoms --}}
                <div class="mb-3 w-100">
                    <label for="prenoms" class="form-label">{{ __('Prénoms') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input id="prenoms" type="text" class="form-control" name="prenoms" value="{{ old('prenoms') }}"  autofocus >
                    </div>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >
                    </div>
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password"  autocomplete="new-password">
                    </div>
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">{{ __('Confirmer le mot de passe') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" >
                    </div>
                </div>

                {{-- Submit --}}
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-person-plus-fill"></i>
                        <span>{{ __('Créer un compte') }}</span>
                    </button>
                </div>

                {{-- Already Registered --}}
                <div class="text-center">
                    <p class="text-muted">
                        Déjà un compte?
                        <a href="{{ route('login') }}">Login</a>
                    </p>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
