@extends('layouts.auth')

@section('title', 'Log in to your Koverae account')

@section('content')
<div class="shadow k_website_login card">
    <span class="mx-auto h-100 k_logo" style="background-image: url('{{ asset('assets/images/logo/logo-black.png')}}'); background-size: cover;"></span>
    <div class="card-body">
        <div class="text-center k-alert alert-info">
            <p>
                {{ __('Access and manage your instances from this Koverae account.') }}
            </p>
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('login') }}" class="k_login_form">
            @csrf

            <div class="mb-3 field-login">
                <label for="phone" class="fom-label">
                    {{ __('Phone Number') }}
                </label>
                <input name="phone" required id="phone" class="form-control" type="tel" style="width: 318px; min-width: auto;" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                <div class="alert alert-info" style="display: none;"></div>
            </div>

            <div class="py-2 col-12 field-password koverae_password_revear">
                <label for="password" class="fom-label">
                    {{ __('Password') }}
                </label>
                <input class="form-control" name="password" type="password" id="password" placeholder="Your password"
                    required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="clearfix gap-1 pt-3 mb-1 text-center k_login_buttons d-grid">
                <button class="btn btn-primary float-start text-uppercase">
                    {{ __('Konnect In') }}
                </button>

                <div class="links-container">
                    <a href="https://koverae.com/?utm_source=koverae&utm_medium=platform&utm_campaign=self" target="__blank" class="login-link">{{ __("You are not a Kover ?") }}</a>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="reset-link">{{ __('You forgot your password ?') }}</a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
