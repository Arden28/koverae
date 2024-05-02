<div>
    <!-- Table -->
    <div class="table-responsive w-100 mb-2">
        <table class="table card-table text-nowrap">
            <thead class="order-table">
                <tr class="order-tr">
                    <th><button class="table-sort"><?php echo e(__('Conditionnement')); ?></button></th>
                    <th><button class="table-sort"><?php echo e(__('Quantité contenue')); ?></button></th>
                    <th><button class="table-sort"><?php echo e(__('Ventes')); ?></button></th>
                    <th><button class="table-sort"><?php echo e(__('Achats')); ?></button></th>
                    <th><button class="table-sort"><?php echo e(__('Code-barres')); ?></button></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $inputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <input type="text" wire:model.blur="inputs.<?php echo e($key); ?>.name" min class="k_input">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ["inputs.<?php echo e($key); ?>.name"];
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
                        <td class="k_field_list">
                            <input type="checkbox" wire:model.blur="inputs.<?php echo e($key); ?>.saleable" class="form-check-input">
                        </td>
                        <td class="k_field_list">
                            <input type="checkbox" wire:model.blur="inputs.<?php echo e($key); ?>.buyable" class="form-check-input">
                        </td>
                    </td>
                    <td class="k_field_list">
                        <input type="number" wire:model.blur="inputs.<?php echo e($key); ?>.barcode" min class="k_input">
                    </td>
                    <td class="k_field_list cursor-pointer">
                        <span wire:click.prevent="remove(<?php echo e($key); ?>)">
                            <i class="bi bi-trash"></i>
                        </span>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <span wire:click.prevent="add(<?php echo e($i); ?>)" class=" cursor-pointer" href="avoid:js">
                            <i class="bi bi-plus-circle"></i> Ajouter une ligne
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Inventory\Resources/views/livewire/cart/product-packaging-cart.blade.php ENDPATH**/ ?>