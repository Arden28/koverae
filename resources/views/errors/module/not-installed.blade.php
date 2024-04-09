@extends('layouts.error')

@section('code', 'Oups 🤐')

@section('title', __("Application non installée 🤐!"))

@section('image')
<img src="{{ asset('assets/images/illustrations/errors/missing-element.svg') }}" height="350px" alt="">
@endsection

@section('message', __("Désolé. L'application ". $module->name." n'est pas installé pour votre entreprise"))
