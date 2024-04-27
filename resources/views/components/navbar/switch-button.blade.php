@props([
    'value',
    'data'
])
{{-- <button wire:click="{{ $value->action }}" class="k_switch_view btn btn-secondary {{ $value->key == 'lists' ? 'active' : '' }} k_list">
    <i class="bi {{ $value->icon }}"></i>
</button> --}}

<button class="k_switch_view btn btn-secondary {{ $value->key == 'lists' ? 'active' : '' }} k_list">
    <i class="bi {{ $value->icon }}"></i>
</button>
