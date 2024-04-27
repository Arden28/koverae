<div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">
            <?php echo e(__("Mettre à jour la quantité de ")); ?> <b><?php echo e($product->product_internal_reference ? '['.$product->product_internal_reference.']' : $product->product_name); ?></b>
        </h5>
        <span class="btn-close" wire:click="$dispatch('closeModal')"></span>
      </div>
      <div class="modal-body">
        
        <div class="k_form_nosheet">
            <p>
                La quantité actuelle de <b><?php echo e($product->product_internal_reference ? '['.$product->product_internal_reference.']' : $product->product_name); ?></b> est de <b><?php echo e($product->product_quantity); ?> <?php echo e($product->unit->name); ?></b>
            </p>

            <div class="k_inner_group col-md-12 col-lg-12 mt-2">

                <!-- Quantity -->
                <div class="d-flex" style="margin-bottom: 8px;">
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            <?php echo e(__("Quantité")); ?> :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <input type="text" wire:model="quantity" class="k_input pl-0" id="quantity_0">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>

            </div>
        </div>
      </div>
      <div class="modal-footer p-0">
        <button class="btn btn-secondary" wire:click="$dispatch('closeModal')"><?php echo e(__('Ignorer')); ?></button>
        <button class="btn btn-primary" wire:click.prevent="updateQty"><?php echo e(__('Confirmer')); ?></button>
      </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Inventory\Resources/views/livewire/modal/update-quantity-modal.blade.php ENDPATH**/ ?>