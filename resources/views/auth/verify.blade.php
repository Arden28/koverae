@extends('layouts.auth')

@section('title', 'Konnectez-vous')
@section('content')
<div class="k_website_login container flex-grow-1 card mt-5 shadow">
    <span class="k_logo d-block mx-auto mt-4" style="background-image: url('../images/logo/logo.svg')"></span>
    <div class="card-body">
        @if (session('status') == 'verification-link-sent')
        <div class="alert alert-info text-center">
            <p>
                {{ __('Un nouveau lien de vérification a été envoyé à l\'adresse e-mail que vous avez fournie lors de l\'inscription.') }}
            </p>
        </div>
        @else
        <div class="alert alert-info text-center">
            <p>
                {{ __('Thanks for signing up! Veuillez confirmer votre adresse email afin de pouvoir pleinement profiter de Koverae.') }}
            </p>
        </div>
        @endif

        <!-- Session Status -->
        <!--<x-auth-session-status class="mb-4" :status="session('status')" />-->

        <form method="POST" action="{{ route('verification.send') }}" class="k_login_form">
            @csrf

            <!-- Email Address -->
            <!--
            <div class="mb-3 field-login">
                <label for="login" class="fom-label">
                    {{ __('Email') }}
                </label>
                <input class="form-control" type="email" id="login" value="{{ old('email') }}" autofocus placeholder="Votre adresse e-mail">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
                -->
            <div class="k_login_buttons clearfix text-center gap-1 d-grid mb-1 pt-3">
                <button class="btn btn-primary float-start">
                    {{ __('Renvoyer l\'e-mail de vérification') }}
                </button>
                <!--
                <div class="links-container">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="login-link">{{ __("ME DEKONNECTER") }}</a>
                    </form>
                </div>
                -->
            </div>
        </form>
    </div>
</div>
@endsection


{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}
