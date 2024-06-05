@props([
    'value',
])
@if($this->category && $this->category->products)
<!-- Routes -->
<div class="form-check k_radio_item" id="capsule">
    <i class="k_button_icon bi bi-list-task"></i>
    <a style="text-decoration: none;" title="{{ $value->help }}" wire:navigate href="#" >
        <span class="k_horizontal_span">{{ $value->label }}</span>
        <span class="stat_value d-none d-lg-flex">
            {{ $this->category->products->count() }}
        </span>
    </a>
</div>

@endif
