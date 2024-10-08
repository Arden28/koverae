@props([
    'value',
    'status'
])
@if($status == 'canceled' || $status == 'cancelled')
<div>
    <button type="button" class="btn btn-secondary-outline  k_arrow_button {{ $status == $value->primary ? 'current' : '' }}"">
        <span>
            {{$value->label }}
        </span>
    </button>
</div>
@endif
