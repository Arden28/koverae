@extends('layouts.error')

@section('code', '403 🤐')

@section('title', __('Unauthorized'))

@section('image')
    <img src="{{ asset('assets/images/illustrations/errors/undraw_bug_fixing_oc7a.svg') }}" height="128" alt="">
@endsection

@section('message', __("Désolé. Vous n'avez pas la permission de visiter cette page."))
