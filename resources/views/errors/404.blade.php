@extends('layouts.error')

{{-- @section('code', '404 😵') --}}

@section('title', __('Page Introuvable'))

@section('image')
    <img src="{{ asset('assets/images/illustrations/errors/404_error.svg') }}" height="350px" alt="">
@endsection

@section('message', __("Pas de panique. Si vous pensez que c'est une erreur de notre part, veuillez nous envoyer un message à cette page."))
