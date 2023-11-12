@extends('layouts.master')

@section('title', __('Ajouter un lieu de travail'))

{{-- @section('breadcrumb')
<div class="k_control_panel_main d-flex flex-wrap flex-grow-2 flex-nowrap justify-content-between align-items-start gap-5">
    <div class="k_control_panel_breadcumbs d-flex align-items-center gap-1 order-0 h-lg-100">
        <button class="btn btn-outline-primary k_form_button_create">
            {{ __('Nouveau') }}
        </button>
        <br>
        <div class="bread d-flex gap-1 text-truncate">
            <span class="min-w-0 text-truncate" style="font-size: 17px; font-weight: 500;">
                 {{ __('Départements') }}
            </span>
        </div>
    </div>
</div>
@endsection --}}

@section('content')
<div>
    <livewire:employee::workplace.create />
</div>
@endsection
