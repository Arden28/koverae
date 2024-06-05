@props([
    'value',
    'data'
])
@php
    if ($this->location) {
        $locations = \Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation::isCompany(current_company()->id)->where('id', '!=', $this->location->id)->get();
    }else {
        $locations = \Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation::isCompany(current_company()->id)->get();
    }
@endphp
<span for="" class="k_form_label font-weight-bold">{{ $value->label }}</span>
<h1 class="flex-row d-flex align-items-center">
    <input type="{{ $value->type }}"wire:model="{{ $value->model }}" class="k_input" id="name_k" placeholder="{{ $value->placeholder }}" {{ $this->blocked ? 'disabled' : '' }}>
    @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
</h1>
<div class="k_inner_group" style="margin: 5px 0 0 0">
    <div class="d-flex" style="margin-bottom: 8px;">
        <!-- Input Label -->
        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
            <label class="k_form_label">
                {{ __('Emplacement parent') }}
            </label>
        </div>
        <!-- Input Form -->
        <div class="k_cell k_wrap_input flex-grow-1">
            <select wire:model="parent" id="parent_id" class="k_input" style="width: 25%;" {{ $this->blocked ? 'disabled' : '' }}>
                <option value=""></option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach

            </select>
            @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
</div>
