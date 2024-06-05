@extends('translator::layouts.master')

@section('content')
    <h1>{{ __('translator::sales.module') }}</h1>

    <p>{{ __('translator::messages.example', ['module' => config('translator.name')]) }} </p>
@endsection
