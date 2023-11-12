@extends('layouts.master')

@section('title', __('Ajouter un département'))

@section('content')
<div>
    <livewire:employee::department.create />
</div>
@endsection
