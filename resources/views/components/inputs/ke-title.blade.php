@props([
    'value',
    'data'
])
<span for="" class="k_form_label font-weight-bold">{{ $value->label }}</span>
<h1 class="d-flex flex-row align-items-center">
    <input type="{{ $value->type }}"wire:model="{{ $value->model }}" class="k_input" id="name_k" placeholder="{{ $value->placeholder }}">
    @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
</h1>
