@extends('layouts.master')

@section('title', __('Employés'))

{{-- @section('breadcrumb')
<div class="k_control_panel_main d-flex flex-wrap flex-grow-2 flex-nowrap justify-content-between align-items-start gap-5">
    <div class="k_control_panel_breadcumbs d-flex align-items-center gap-1 order-0 h-lg-100">
        <a wire:navigate href="{{ route('employee.create', ['subdomain' => current_company()->domain_name ]) }}" class="btn btn-outline-primary k_form_button_create">
            {{ __('Nouveau') }}
        </a>
        <br>
        <div class="bread d-flex gap-1 text-truncate">
            <span class="min-w-0 text-truncate" style="font-size: 17px; font-weight: 500;">
                 {{ __('Employés') }}
            </span>
        </div>
    </div>
</div>
@endsection --}}

@section('content')
<div>
    <livewire:employee::employees.employee />
</div>
@endsection

@push('page_scripts')
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
        const list = new List('table-default', {
            sortClass: 'table-sort',
            listClass: 'table-tbody',
            valueNames: [ 'sort-name', 'sort-type', 'sort-city', 'sort-score',
                { attr: 'data-date', name: 'sort-date' },
                { attr: 'data-progress', name: 'sort-progress' },
                'sort-quantity'
            ]
        });
        })
    </script> --}}
@endpush
