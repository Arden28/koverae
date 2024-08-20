<div>
    <!-- Table -->
    <div class="mb-2 table-responsive w-100">
        <table class="table card-table text-nowrap">
            <thead class="order-table">
                <tr class="order-tr">
                    <th><button class="table-sort"><?php echo e(__('translator::inventory.form.product.cart.supplier.name')); ?></button></th>
                    <th><button class="table-sort"><?php echo e(__('translator::inventory.form.product.cart.supplier.quantity')); ?></button></th>
                    <th><button class="table-sort"><?php echo e(__('translator::inventory.form.product.cart.supplier.price')); ?></button></th>
                    <th><button class="table-sort"><?php echo e(__('translator::inventory.form.product.cart.supplier.delivery-lead-time')); ?></button></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $inputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <select wire:model.blur="inputs.<?php echo e($key); ?>.supplier" id="" class="k_input">
                            <option value=""></option>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </select>
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ["inputs.<?php echo e($key); ?>.supplier"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                    <td class="k_field_list">
                        <input type="number" wire:model.blur="inputs.<?php echo e($key); ?>.quantity" min class="k_input">
                    </td>
                    <td class="k_field_list">
                        <input type="number" wire:model.blur="inputs.<?php echo e($key); ?>.price" min class="k_input">
                    </td>
                    <td class="k_field_list">
                        <input type="number" wire:model.blur="inputs.<?php echo e($key); ?>.delay" class="k_input">
                    </td>
                    
                    <td class="cursor-pointer k_field_list">
                        <span wire:click.prevent="remove(<?php echo e($key); ?>)">
                            <i class="bi bi-trash"></i>
                        </span>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <span wire:click.prevent="add(<?php echo e($i); ?>)" class="cursor-pointer " href="avoid:js">
                            <i class="bi bi-plus-circle"></i> <?php echo e(__('translator::inventory.form.product.cart.supplier.add-line')); ?>

                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH D:\My Laravel Startup\koverae\Modules/Inventory\Resources/views/livewire/cart/product-supplier-cart.blade.php ENDPATH**/ ?>