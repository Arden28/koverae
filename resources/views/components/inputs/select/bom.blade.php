@props([
    'value',
    'data'
])

@php
    $boms = \Modules\Manufacturing\Entities\BOM\BillOfMaterial::isCompany(current_company()->id)->get()
@endphp

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Customer -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label" for="bom">
            {{ $value->label }}
        </label>
    </div>
    <div class="k_cell k_wrap_input flex-grow-1">
        <select wire:model.change="{{ $value->model }}" id="" class="k_input" {{ $this->blocked ? 'disabled' : '' }}>
            <option value=""></option>
            @foreach($boms as $bom)
            <option value="{{ $bom->id }}">{{ $bom->name }}</option>
            @endforeach
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
