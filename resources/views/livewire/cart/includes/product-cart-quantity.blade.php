<form wire:submit.prevent="updateQuantity('{{ $cart_item->rowId }}', '{{ $cart_item->id }}')">
    <input type="number" wire:target="updateQuantity('{{ $cart_item->rowId }}', '{{ $cart_item->id }}')"" wire:model.lazy="quantity.{{ $cart_item->id }}" wire:key="{{ $cart_item->id }}" class="k_input" value="{{ $cart_item->qty }}" min="1">
</form>
