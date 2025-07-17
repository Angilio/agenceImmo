@extends('admin.base')

@section('title', 'Modifier le profil')

@section('content')
<section class="container-fluid mt-4 ">

    {{-- ✅ Informations du profil --}}
    <section class="container mt-4 ">
        <div>
            <h2 class="h5">
                {{ __('Profile Information') }}
            </h2>
            <p class="mt-2 text-muted">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </div>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="space-y-4 bg-white p-4 rounded shadow-lg max-w-2xl mx-auto space-y-5">
            @csrf
            @method('patch')

            <div class="form-group mb-3">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                @if ($errors->get('name'))
                    <div class="invalid-feedback">
                        @foreach ($errors->get('name') as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="prenoms">{{ __('Prenoms') }}</label>
                <input id="prenoms" name="prenoms" type="text" class="form-control" value="{{ old('prenoms', $user->prenoms) }}" required autofocus autocomplete="name" />
                @if ($errors->get('prenoms'))
                    <div class="invalid-feedback">
                        @foreach ($errors->get('prenoms') as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="email" />
                @if ($errors->get('email'))
                    <div class="invalid-feedback">
                        @foreach ($errors->get('email') as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2">
                        <p class="text-muted">
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification" class="btn btn-link p-0">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <div class="alert alert-success mt-2">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save') }}
                </button>

                @if (session('status') === 'profile-updated')
                    <div class="alert alert-success mt-2">
                        {{ __('Saved.') }}
                    </div>
                @endif
            </div>
        </form>
    </section>

    {{-- 🔐 Mise à jour du mot de passe --}}
    <section class="mt-3 container">
        <div>
            <h2 class="h5">
                {{ __('Update Password') }}
            </h2>
            <p class="mt-2 text-muted">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </div>

        <form method="post" action="{{ route('password.update') }}" class="space-y-4 bg-white p-4 rounded shadow-lg max-w-2xl mx-auto space-y-5">
            @csrf
            @method('put')
            <div>
                @if (session('status') === 'password-updated')
                    <div class="alert alert-success mt-2">
                        {{ __('Saved.') }}
                    </div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="current_password">{{ __('Current Password') }}</label>
                <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                @if ($errors->updatePassword->get('current_password'))
                    <div class="invalid-feedback">
                        @foreach ($errors->updatePassword->get('current_password') as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="password">{{ __('New Password') }}</label>
                <input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />
                @if ($errors->updatePassword->get('password'))
                    <div class="invalid-feedback">
                        @foreach ($errors->updatePassword->get('password') as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                @if ($errors->updatePassword->get('password_confirmation'))
                    <div class="invalid-feedback">
                        @foreach ($errors->updatePassword->get('password_confirmation') as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </section>

    {{-- ⚠️ Suppression du compte --}}
    <section class="mt-3">
        <div>
            <h2 class="h5">
                {{ __('Delete Account') }}
            </h2>
            <p class="mt-2 text-muted">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>
        </div>

        <button class="btn btn-danger" data-toggle="modal" data-target="#confirmUserDeletionModal">
            {{ __('Delete Account') }}
        </button>

        {{-- Modal confirmation de suppression --}}
        <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" role="dialog" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-div">
                        <h5 class="modal-title" id="confirmUserDeletionModalLabel">{{ __('Are you sure you want to delete your account?') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-muted">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>
                        <div class="form-group">
                            <input id="delete-user-password" name="password" type="password" class="form-control" placeholder="Password" />
                            @if ($errors->userDeletion->get('password'))
                                <div class="invalid-feedback">
                                    @foreach ($errors->userDeletion->get('password') as $message)
                                        <p>{{ $message }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <form method="post" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
