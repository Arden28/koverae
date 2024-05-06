<div>
    <!-- Table -->
    <div class="table-responsive card">
        <table class="table card-table text-nowrap">
            <thead class="order-table">
                <tr class="order-tr">
                    <th><button class="table-sort"><?php echo e(__('Produit')); ?></button></th>
                    <th><button class="table-sort"><?php echo e(__('Description')); ?></button></th>
                    <th><button class="table-sort"><?php echo e(__('Quantité')); ?></button></th>
                    <th><button class="table-sort"><?php echo e(__('Prix unitaire')); ?></button></th>
                    <th><button class="table-sort"><?php echo e(__('Hors taxes')); ?></button></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $inputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <select wire:model.lazy="inputs.<?php echo e($index); ?>.product" id="" class="k_input" <?php echo e($this->blocked ? 'disabled' : ''); ?>>
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
                        <input type="text" wire:model.lazy="inputs.<?php echo e($index); ?>.description" class="k_input" <?php echo e($this->blocked ? 'disabled' : ''); ?>>
                    </td>
                    <td class="k_field_list">
                        <input type="number" class="k_input" wire:model.lazy="inputs.<?php echo e($index); ?>.quantity" wire:change="updateSubtotal(<?php echo e($index); ?>)" <?php echo e($this->blocked ? 'disabled' : ''); ?>>
                    </td>
                    <td class="k_field_list">
                        <input type="text" wire:model.lazy="inputs.<?php echo e($index); ?>.price" class="k_input" <?php echo e($this->blocked ? 'disabled' : ''); ?>>
                    </td>
                    <td class="k_field_list">
                        <input type="text" wire:model.lazy="inputs.<?php echo e($index); ?>.subtotal" class="k_input" <?php echo e($this->blocked ? 'disabled' : ''); ?>>
                    </td>
                    <td class="k_field_list cursor-pointer <?php echo e($this->blocked ? 'd-none' : ''); ?>">
                        <span wire:click.prevent="remove(<?php echo e($index); ?>)">
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

    <!-- Note and total part -->
    <div class="k_group row align-items-start mt-2">

        <div class="k_inner_group col-lg-10">
            <div class="k_cell flex-grow-0 flex-sm-grow-0">
                <div class="note-editable" id="note_1">
                    <textarea wire:model="term" id="term" style="width: 75%; padding-left: 5px; padding-top:10px;" id="" cols="30" rows="5" class="k_input textearea" placeholder="Termes & conditions">
                        <?php echo $term; ?>

                    </textarea>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="k_inner_group k_subtotal_footer col-lg-2 right overflow-y-auto h-100">
            <!-- Discount -->
            <!--[if BLOCK]><![endif]--><?php if(settings()->has_discount): ?>
            <div class="discounts-btn mt-2 mb-2 text-end pb-2">
                <span class="btn btn-secondary">
                    Remise
                </span>
            </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <!-- Subtotal -->
            <!--[if BLOCK]><![endif]--><?php if($this->taxes): ?>
            <td class="k_td_label">
                <span>
                    <?php echo e(__('Total HT')); ?> :
                </span>
            </td>

            <td class="k_list_monetary font-weight-bold">
                <span>
                    <?php echo e(format_currency($this->totalHT)); ?>

                </span>
            </td>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <br>
            <!-- Taxes -->
            <!--[if BLOCK]><![endif]--><?php if($this->taxes): ?>
            <td class="k_td_label ml-1">
                <label for="" class="k_text_label k_tax_total_label">
                    <?php echo e(__('Taxe')); ?> <?php echo e(sales_tax()->amount); ?>% :
                </label>
            </td>
            <td class="k_list_monetary">
                <span>
                    <?php echo e(format_currency($this->taxes)); ?>

                </span>
            </td>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <br>

            <!-- Total amount -->
            <td class="k_td_label">
                <label for="" class="k_text_label k_tax_total_label">
                    <?php echo e(__('Total')); ?> :
                </label>
            </td>

            <td class="k_list_monetary">
                <span class="font-weight-bolder">
                    (=) <b><?php echo e(format_currency($this->total)); ?></b>
                </span>
            </td>

        </div>

    </div>
    <!-- Loading -->
    <div class="k-loading cursor-pointer pb-1" wire:loading>
        <p>En cours de chargement ...</p>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Sales\Resources/views/livewire/cart/quotation-cart.blade.php ENDPATH**/ ?>