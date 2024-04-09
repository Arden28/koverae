@extends('layouts.error')

{{-- @section('code', '🤕') --}}

@section('title', __('Server Error'))

@section('image')
<img src="{{ asset('assets/images/illustrations/errors/torn-file.svg') }}" height="350px" alt="">
@endsection

@section('message', __("Une erreur c'est produite de notre côté. Si le problème persiste, veuillez contacter notre service kovers(clients)."))
