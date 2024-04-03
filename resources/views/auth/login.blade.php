@extends('layouts.auth')

@section('title', 'Konnectez-vous')
@section('content')
<div class="k_website_login container flex-grow-1 card mt-5 shadow">
    <span class="k_logo mx-auto mt-4" style="background-image: url('{{ asset('assets/images/logo/logo-1.png')}}'); background-size: cover;"></span>
    <div class="card-body">
        <div class="k-alert alert-info text-center">
            <p>
                Accédez à vos instances et gérez-les à partir de ce compte Koverae.
            </p>
        </div>
        <form method="POST" action="{{ route('login') }}" class="k_login_form">
            @csrf

            <div class="mb-3 field-login">
                <label for="phone" class="fom-label">
                    {{ __('Numéro de téléphone') }}
                </label>
                <input name="phone" required class="form-control" type="tel" id="phone" placeholder="Votre numéro de téléphone">
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div class="col-12 py-2 field-password koverae_password_revear">
                <label for="password" class="fom-label">
                    {{ __('Mot de passe') }}
                </label>
                <input class="form-control" name="password" type="password" id="password"
                    required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                {{-- <button class="btn btn-secondary">
                    <i class="bi bi-eye"></i>
                </button> --}}
            </div>

            <div class="k_login_buttons clearfix text-center gap-1 d-grid mb-1 pt-3">
                <button class="btn btn-primary float-start text-uppercase">
                    {{ __('Me konnecter') }}
                </button>

                <div class="links-container">
                    <a href="" class="login-link">{{ __("Vous n'êtes pas un Kover ?") }}</a>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="reset-link">{{ __('Réinitialiser le mot de passe') }}</a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
