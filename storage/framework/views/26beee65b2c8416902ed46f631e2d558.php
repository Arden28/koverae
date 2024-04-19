<div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel"><?php echo e(__("Pas assez en stock ?")); ?></h5>
        <span class="btn-close" wire:click="$dispatch('closeModal')"></span>
      </div>
      <div class="modal-body">
        <div class="k_form_nosheet">
            <p>
                La quantité actuelle de <?php echo e($product->reference ? '['.$product->reference.']' : ''); ?> <b><?php echo e($product->product_name); ?></b> est de <?php echo e($product->product_quantity); ?> <?php echo e($product->unit->name); ?>

            </p>

            <div class="k_inner_group col-md-6 col-lg-6 mt-2">

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

                <!-- Schedule Date -->
                <div class="d-flex" style="margin-bottom: 8px;">
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            <?php echo e(__("Date prévue")); ?> :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <input type="datetime-local" wire:model="schedule_date" class="k_input" style="padding-left: 5px;" id="schedule_date_0">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['schedule_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>

                <!-- Route -->
                <div class="d-flex" style="margin-bottom: 8px;">
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            <?php echo e(__("Route à emprunter")); ?> :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <select wire:model="route" class="k-autocomplete-input-0 k_input" id="route">
                            <option></option>
                            <option value="purchase"><?php echo e(__('Acheter')); ?></option>
                            <!--[if BLOCK]><![endif]--><?php if(module('manufacturing')): ?>
                            <option value="manufacture"><?php echo e(__('Fabriquer')); ?></option>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        </select>
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['route'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>

                <!-- Suppliers -->
                <div class="d-flex" style="margin-bottom: 8px;">
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            <?php echo e(__("Fournisseur")); ?> :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <select wire:model="supplier" class="k-autocomplete-input-0 k_input" id="supplier">
                            <option></option>
                        </select>
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['supplier'];
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
      <div class="modal-footer">
        <button class="btn btn-secondary" wire:click="$dispatch('closeModal')">Close</button>
        <button class="btn btn-primary">Send message</button>
      </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Inventory\Resources/views/livewire/modal/update-quatity-modal.blade.php ENDPATH**/ ?>