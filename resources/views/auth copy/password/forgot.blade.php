@extends('layouts.auth')

@section('title', 'Konnectez-vous')
@section('content')
<div class="k_website_login container flex-grow-1 card mt-5 shadow">
    <span class="k_logo d-block mx-auto mt-4" style="background-image: url('../images/logo/logo.svg')"></span>
    <div class="card-body">
        <div class="alert alert-info text-center">
            <p>
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="k_login_form">
            @csrf

            <!-- Email Address -->
            <div class="mb-3 field-login">
                <label for="login" class="fom-label">
                    {{ __('Email') }}
                </label>
                <input class="form-control" type="email" id="login" value="{{ old('email') }}" required autofocus placeholder="Votre adresse e-mail">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="k_login_buttons clearfix text-center gap-1 d-grid mb-1 pt-3">
                <button class="btn btn-primary float-start">
                    {{ __('REINITIALISER LE MOT DE PASSE') }}
                </button>

                <div class="links-container">
                    <a href="" class="login-link">{{ __("RETOUR") }}</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

