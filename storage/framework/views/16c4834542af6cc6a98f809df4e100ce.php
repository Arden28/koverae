<div>
    <!-- Table -->
    <div class="table-responsive card">
        <table class="table card-table text-nowrap">
            <thead class="order-table">
                <tr class="order-tr">
                    <th><button class="table-sort"><?php echo e(__('translator::sales.form.quotation.cart.product')); ?></button></th>
                    <th><button class="table-sort"><?php echo e(__('translator::sales.form.quotation.cart.description')); ?></button></th>
                    <th><button class="table-sort"><?php echo e(__('translator::sales.form.quotation.cart.quantity')); ?></button></th>
                    <th><button class="table-sort"><?php echo e(__('translator::sales.form.quotation.cart.price')); ?></button></th>
                    <th><button class="table-sort"><?php echo e(__('translator::sales.form.quotation.cart.wt')); ?></button></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $inputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <select wire:model.lazy="inputs.<?php echo e($index); ?>.product" wire:change="updateProduct(<?php echo e($index); ?>, $event.target.value)"  id="" class="k_input" <?php echo e($this->blocked ? 'disabled' : ''); ?>>
                            <option value=""></option>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($product->id); ?>"><?php echo e($product->product_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </select>
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ["inputs.<?php echo e($index); ?>.product"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                    <td class="k_field_list">
                        <span><?php echo $this->inputs[$index]['description']; ?></span>
                    </td>
                    <td class="k_field_list">
                        <input type="number" class="k_input" wire:model.lazy="inputs.<?php echo e($index); ?>.quantity" wire:change='updateSubtotal(<?php echo e($index); ?>)' wire:key <?php echo e($this->blocked ? 'disabled' : ''); ?>>
                    </td>
                    <td class="k_field_list">
                        <span><?php echo e($this->inputs[$index]['price']); ?></span>
                    </td>
                    <td class="k_field_list">
                        <span wire:model.lazy="inputs.<?php echo e($index); ?>.subtotal" wire:change='updateSubtotal(<?php echo e($index); ?>)'><?php echo e($this->inputs[$index]['subtotal']); ?></span>
                    </td>
                    <td class="k_field_list cursor-pointer <?php echo e($this->blocked ? 'd-none' : ''); ?>">
                        <span wire:click.prevent="remove(<?php echo e($index); ?>)">
                            <i class="bi bi-trash"></i>
                        </span>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                <tr class="k_field_list_row <?php echo e($this->blocked ? 'd-none' : ''); ?>" wire:ignore>
                    <td class="k_field_list">
                        <span wire:click.prevent="add(<?php echo e($i); ?>)" class="cursor-pointer " href="avoid:js">
                            <i class="bi bi-plus-circle"></i> <?php echo e(__('translator::sales.form.quotation.cart.line')); ?>

                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Note and total part -->
    <div class="mt-2 k_group row align-items-start">

        <div class="k_inner_group col-lg-9">
            <div class="flex-grow-0 k_cell flex-sm-grow-0">
                <div class="note-editable" id="note_1">
                    <textarea wire:model="term" id="term" <?php echo e($this->blocked ? 'disabled' : ''); ?> style="width: 75%; padding-left: 5px; padding-top:10px;" id="" cols="30" rows="7" class="k_input textearea" placeholder="<?php echo e(__('translator::components.carts.summary.conditions')); ?>">
                        <?php echo $term; ?>

                    </textarea>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="overflow-y-auto k_inner_group k_subtotal_footer col-lg-3 right h-100">
            <!-- Discount -->
            <!--[if BLOCK]><![endif]--><?php if(settings()->has_discount): ?>
            <div class="pb-2 mt-2 mb-2 discounts-btn text-end">
                <span class="btn btn-secondary">
                    <?php echo e(__('translator::components.carts.summary.discount')); ?>

                </span>
            </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <!-- Subtotal -->
            <!--[if BLOCK]><![endif]--><?php if($this->taxes): ?>
            <td class="k_td_label">
                <span>
                    <?php echo e(__('translator::components.carts.summary.total_wt')); ?> :
                </span>
            </td>

            <td class="k_list_monetary font-weight-bold">
                <span class="k_total_taxes">
                    <?php echo e(format_currency($this->totalHT)); ?>

                </span>
            </td>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <br>
            <!-- Taxes -->
            <!--[if BLOCK]><![endif]--><?php if($this->taxes): ?>
            <td class="ml-1 k_td_label">
                <label for="" class="k_text_label k_tax_total_label">
                    <?php echo e(__('translator::components.carts.summary.taxes')); ?> :
                </label>
            </td>
            <td class="k_list_monetary">
                <span class="k_total_taxes">
                    <?php echo e(format_currency($this->taxes)); ?>

                </span>
            </td>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <br>

            <!-- Total amount -->
            <td class="k_td_label">
                <label for="" class="k_text_label k_tax_total_label">
                    <?php echo e(__('translator::components.carts.summary.total')); ?> :
                </label>
            </td>

            <td class="k_list_monetary">
                <span class="font-weight-bolder total-price <?php echo e($this->taxes ? 'with-border' : ''); ?>">
                    <?php echo e(format_currency($this->total)); ?>

                </span>
            </td>

        </div>

    </div>
    <!-- Loading -->
    <div class="pb-1 cursor-pointer k-loading" wire:loading>
        <p><?php echo e(__('translator::components.loading.text')); ?></p>
    </div>
</div>
<?php /**PATH D:\My Laravel Startup\koverae\Modules/Sales\Resources/views/livewire/cart/quotation-cart.blade.php ENDPATH**/ ?>