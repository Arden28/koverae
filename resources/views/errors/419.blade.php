@extends('layouts.error')

@section('code', '👾')

@section('title', __('Page Expired'))

@section('image')
<img src="{{ asset('assets/images/illustrations/errors/expire-session.svg') }}" height="350px" alt="">
@endsection

@section('message', __('La page à expiré, essayer de recharger la page. Si le problème persiste, veuillez contacter notre service kovers.'))
