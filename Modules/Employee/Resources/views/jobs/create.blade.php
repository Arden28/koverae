@extends('layouts.master')

@section('title', __('Ajouter un emploi'))

@section('content')
<div>
    <livewire:employee::job.create />
</div>
@endsection
