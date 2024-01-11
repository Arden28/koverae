@props([
    'value',
    'data'
])
@php
    if ($this->category) {
        $categories = \Modules\Inventory\Entities\Category::isCompany(current_company()->id)->where('id', '!=', $this->category->id)->get();
    }else {
        $categories = \Modules\Inventory\Entities\Category::isCompany(current_company()->id)->get();
    }
@endphp
<span for="" class="k_form_label font-weight-bold">{{ $value->label }}</span>
<h1 class="d-flex flex-row align-items-center">
    <input type="{{ $value->type }}"wire:model="{{ $value->model }}" class="k_input" id="name_k" placeholder="{{ $value->placeholder }}">
    @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
</h1>
<div class="k_inner_group" style="margin: 5px 0 0 0">
    <div class="d-flex" style="margin-bottom: 8px;">
        <!-- Input Label -->
        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">
            <label class="k_form_label">
                {{ __('Catégorie parent') }}
            </label>
        </div>
        <!-- Input Form -->
        <div class="k_cell k_wrap_input flex-grow-1">
            <select wire:model="parent" id="parent_id" class="k_input" style="width: 25%;">
                <option value=""></option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach

            </select>
            @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
</div>
