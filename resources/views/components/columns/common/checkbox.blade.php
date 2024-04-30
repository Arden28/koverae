@props([
    'value',
])

<div class="k-checkbox form-check d-inline-block">
    <input type="checkbox" class="form-check-input" disabled {{ $value === true ? 'checked' : '' }} value="{{ $value }}" style="color: #0E6163" onclick="checkStatus(this)">
</div>
