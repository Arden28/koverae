@props([
    'value',
])

@php
    $types = \Modules\Inventory\Entities\Operation\OperationType::isCompany(current_company()->id)->get();
@endphp

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Journal -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label" for="location">
            {{ $value->label }}
            @if($value->help)
                <sup><i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="{{ $value->help }}"></i></sup>
            @endif :
        </label>
    </div>
    <div class="k_cell k_wrap_input flex-grow-1" {{ $this->blocked ? 'disabled' : '' }}>
        <select wire:model="{{ $value->model }}" id="" class="k_input">
            <option value=""></option>
            @foreach($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
