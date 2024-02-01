<div>
    <div class="table-responsive" style="margin-top: 10px;">
        <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
                <tr>
                    <th><button class="table-sort" data-sort="sort-name"><?php echo e(__('Nom du Produit')); ?></button></th>
                    <th><button class="table-sort" data-sort="sort-name"><?php echo e(__('Description')); ?></button></th>
                    <th><button class="table-sort" data-sort="sort-name"><?php echo e(__('Quantité')); ?></button></th>
                    <th><button class="table-sort" data-sort="sort-name"><?php echo e(__('Prix unitaire')); ?></button></th>
                    <th><button class="table-sort" data-sort="sort-name"><?php echo e(__('Réduction')); ?></button></th>
                    <th><button class="table-sort" data-sort="sort-name"><?php echo e(__('Taxe')); ?></button></th>
                    <th><button class="table-sort" data-sort="sort-name"><?php echo e(__('Hors Taxe')); ?></button></th>
                    <th><button class="table-sort" data-sort="sort-name"><?php echo e(__('Subtotal')); ?></button></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php if($cart_items->isNotEmpty()): ?>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="k_field_list_row">
                        <td class="k_field_list">
                            <input type="text"  class="k_input" value="<?php echo e($cart_item->name); ?>" />
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="<?php echo e($cart_item->options->description); ?>" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <?php echo $__env->make('livewire.cart.includes.product-cart-quantity', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="<?php echo e(format_currency($cart_item->options->unit_price)); ?>" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="<?php echo e(format_currency($cart_item->options->product_discount)); ?>" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="<?php echo e($cart_item->options->product_tax); ?>" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="<?php echo e(format_currency($cart_item->options->sub_total)); ?>" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="<?php echo e(format_currency($cart_item->options->sub_total)); ?>" class="k_input">
                        </td>
                        <td class="k_field_list cursor-pointer">
                            <span wire:click.prevent="removeItem('<?php echo e($cart_item->rowId); ?>')">
                                <i class="bi bi-trash"></i>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $inputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="k_field_list_row">
                        <td class="k_field_list">
                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('search.search-input-text', ['special' => $key]);

$__html = app('livewire')->mount($__name, $__params, '14Kqfi9', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="description.<?php echo e($value); ?>" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="number" wire:model="qty.<?php echo e($value); ?>" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="unit_price.<?php echo e($value); ?>" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="tax.<?php echo e($value); ?>" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="tax_exclusion.<?php echo e($value); ?>" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="tax_exclusion.<?php echo e($value); ?>" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="subtotal.<?php echo e($value); ?>" class="k_input">
                        </td>
                        <td class="k_field_list cursor-pointer">
                            <span wire:click.prevent="remove(<?php echo e($key); ?>)">
                                <i class="bi bi-trash"></i>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                <!--[if BLOCK]><![endif]--><?php if($status == 'posted'): ?>
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        &nbsp;
                    </td>
                </tr>
                <?php else: ?>
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <span wire:click.prevent="add(<?php echo e($i); ?>)" class=" cursor-pointer" href="avoid:js">
                            <i class="bi bi-plus-circle"></i> Ajouter un produit
                        </span>
                    </td>
                </tr>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

    <!-- Note and total part -->
    <div class="k_group row align-items-start mt-2 mt-md-0">

        <div class="k_inner_group col-lg-8">
            <div class="k_cell flex-grow-0 flex-sm-grow-0">
                <div class="note-editable" id="note_1">
                    <textarea wire:model="term" id="term" style="width: 75%; padding-left: 5px; padding-top:10px;" id="" cols="30" rows="5" class="k_input textearea" placeholder="Termes & conditions">
                        <?php echo $term; ?>

                    </textarea>
                </div>
            </div>
        </div>

        <div class="k_inner_group k_subtotal_footer col-lg-4 right">
            <div class="k_cell flex-grow-1 flex-sm-grow-0">

                <?php if($global_tax > 0): ?>
                    <!-- Taxes -->
                    <td class="k_td_label">
                        <label for="" class="k_text_label k_tax_total_label">
                            <?php echo e(__('Taxe')); ?> (<?php echo e($global_tax); ?>%) :
                        </label>
                    </td>

                    <td class="k_list_monetary">
                        <span>
                            (+) <?php echo e(format_currency(Cart::instance($cart_instance)->tax())); ?>

                        </span>
                    </td>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                <!-- Reduction
                <td class="k_td_label">
                    <label for="" class="k_text_label k_tax_total_label">
                        <?php echo e(__('Réduction')); ?> (<?php echo e($global_discount); ?>%) :
                    </label>
                </td>

                <td class="k_list_monetary">
                    <span>
                        (-) <?php echo e(format_currency(0)); ?>

                    </span>
                </td>
                -->
                <!--[if BLOCK]><![endif]--><?php if($shipping): ?>
                    <!-- Livraison -->
                    <td class="k_td_label">
                        <label for="" class="k_text_label k_tax_total_label">
                            <?php echo e(__('Livraison')); ?> :
                        </label>
                    </td>

                    <td class="k_list_monetary">
                        <input type="hidden" value="<?php echo e($shipping); ?>" name="shipping_amount">
                        <span>
                            (+) <?php echo e($shipping); ?>

                        </span>
                    </td>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                <td class="k_td_label">
                    <label for="" class="k_text_label k_tax_total_label">
                        <b><?php echo e(__('Total')); ?></b> :
                    </label>
                </td>

                <?php
                    $total_with_shipping = Cart::instance($cart_instance)->subtotal()
                ?>

                <td class="k_list_monetary">
                    <span>
                        (=) <?php echo e($total_with_shipping); ?>

                    </span>
                </td>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/livewire/cart/product-cart.blade.php ENDPATH**/ ?>