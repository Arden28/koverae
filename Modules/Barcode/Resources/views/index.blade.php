@extends('barcode::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('barcode.name') !!}</p>
@endsection
