@props([
    'value',
])

@php
    $locations = \Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation::isCompany(current_company()->id)->get();
@endphp

@if(settings()->has_storage_locations)
<div class="d-flex" style="margin-bottom: 8px;">
    <!-- UoM -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label" for="location">
            {{ $value->label }}
            @if($value->help)
                <sup><i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="{{ $value->help }}"></i></sup>
            @endif :
        </label>
    </div>
    <div class="k_cell k_wrap_input flex-grow-1">
        <select wire:model.blur="{{ $value->model }}" id="" class="k_input">
            <option value=""></option>
            @foreach($locations as $location)
                @if($location->parent)
                    <option value="{{ $location->id }}">{{ $location->parent->name }}/{{ $location->name }}</option>
                @else
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endif
            @endforeach
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
@endif
