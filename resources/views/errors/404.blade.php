@extends('layouts.error')

@section('code', '404 😵')

@section('title', __('Page Introuvable'))

@section('image')
    <img src="{{ asset('assets/images/illustrations/errors/undraw_sign_in_e6hj.svg') }}" height="128" alt="">
@endsection

@section('message', __('Désolé, mais la page que vous cherchez est introuvable.'))
