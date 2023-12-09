@props([
    'value',
    'data'
])
<h1 class="d-flex flex-row align-items-center">
    <input type="{{ $value->type }}"wire:model="{{ $value->model }}" class="k_input" id="name_k" placeholder="{{ $value->placeholder }}">
</h1>
