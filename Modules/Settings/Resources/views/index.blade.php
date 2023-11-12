@extends('layouts.master')

@section('title', __('Paramètres'))

@section('breadcrumb')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
                {{ __('Paramètes Généraux') }}
            </h2>
        </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div>
        <livewire:settings::general />
    </div>
@endsection
