@extends('layouts.error')

@section('code', '500 🤕')

@section('title', __('Server Error'))

@section('image')
    <img src="{{ asset('assets/images/illustrations/errors/undraw_bug_fixing_oc7a.svg') }}" height="128" alt="">
@endsection

@section('message', __('Something went wrong. Call the dev!!!'))
