<form wire:submit.prevent="updateQuantity('<?php echo e($cart_item->rowId); ?>', '<?php echo e($cart_item->id); ?>')" wire:ignore>
    <?php echo csrf_field(); ?>
    
    <input type="number" wire:model.defer="quantity.<?php echo e($cart_item->id); ?>" class="k_input" value="<?php echo e($cart_item->qty); ?>" min="1" />
</form>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/livewire/cart/includes/product-cart-quantity.blade.php ENDPATH**/ ?>