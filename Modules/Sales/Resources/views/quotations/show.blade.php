@extends('layouts.master')

@section('title', $q->reference)

@section('content')
    <livewire:sales::quotation.show :quotation="$q" />
@endsection
