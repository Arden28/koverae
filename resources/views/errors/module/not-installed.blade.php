@extends('layouts.error')

@section('code', '403 🤐')

@section('title', __("Application non installée 🤐!"))

@section('image')
    <img src="{{ asset('assets/images/illustrations/errors/undraw_bug_fixing_oc7a.svg') }}" height="128" alt="">
@endsection

@section('message', __("Désolé. L'application ". $module->name." n'est pas installé pour votre entreprise"))
