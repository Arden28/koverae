@props([
    'value',
    'data'
])

<div class="tab-pane active" id="{{ $value->key }}" wire:ignore>
    <div class="row">
        <!-- Left Side -->
        <div class="k_work_employee_main col-md-8 col-lg-8 flex-grow-0">

            @foreach($this->groups() as $group)
                @if($group->tab == $value->key)
                    <x-dynamic-component
                        :component="$group->component"
                        :value="$group"
                    >
                    </x-dynamic-component>
                @endif
            @endforeach
        </div>

        <!-- Right Side -->
        <div class="k_employee_right col-lg-4 px-0 ps-lg-5 pe-lg-4" style="border-left: 1px solid #D8DADD">
            <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                {{ __('Organigramme') }}
            </div>
            <div class="k_field_widget k_readonly_modifer position-relative">
                <div class="k-alert alert-azure">
                    <b>{{ __('Aucun ordre hiérarchique') }}</b>
                    <p>{{ __('Cet employé n\'a pas de responsable ni de subordonnés.') }}</p>
                </div>
            </div>
        </div>


    </div>
</div>
