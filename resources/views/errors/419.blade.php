@extends('layouts.error')

@section('code', '419 👾')

@section('title', __('Page Expired'))

@section('image')
    <img src="{{ asset('assets/images/illustrations/errors/undraw_bug_fixing_oc7a.svg') }}" height="128" alt="">
@endsection

@section('message', __('La page à expiré, essayer de recharger la page. Si le problème persiste, veuillez contacter le service client.'))
