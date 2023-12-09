@props([
    'value',
    'status'
])
@if($status == 'canceled')
<div>
    <button type="button" class="btn btn-secondary-outline  k_arrow_button">
        <span>
            {{$value->label }}
        </span>
    </button>
</div>
@endif
