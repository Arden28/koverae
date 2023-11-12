@extends('layouts.master')

@section('title', __('Tableaux de bord'))

@section('content')
<div class="page-body d-print-none">
    <div class="container-fluid">
        <div class="row">
            <livewire:dashboards::dashboard.lists />
        </div>
    </div>
</div>
@endsection
