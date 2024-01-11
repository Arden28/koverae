<div>
    <!-- Modal -->
    <div class="modal fade" wire:ignore id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Générer une facture')); ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="k_wrap_label text-break text-900">
                <label class="k_form_label">
                    <?php echo e(__('Créer une facture')); ?>

                </label>
            </div>
            <div class="k_inner_group">
                <div class="k_cell k_wrap_input flex-grow-1">
                    <div class="form-check k_radio_item">
                        <input type="radio" class="form-check-input k_radio_input" value="1" wire:model="regular" id="regular" />
                        <label class="form-check-label k_form_label" for="regular">
                            <?php echo e(__('Facture régulière')); ?>

                        </label>
                    </div>

                    <div class="form-check k_radio_item">
                        <input type="radio" class="form-check-input k_radio_input" value="1" wire:model="down_percentage" id="down_percentage" />
                        <label class="form-check-label k_form_label" for="down_percentage">
                            <?php echo e(__('Acompte (pourcentage)')); ?>

                        </label>
                    </div>

                    <div class="form-check k_radio_item">
                        <input type="radio" class="form-check-input k_radio_input" value="1" wire:model="down_amount" id="down_amount" />
                        <label class="form-check-label k_form_label" for="down_amount">
                            <?php echo e(__('Acompte (montant fixe)')); ?>

                        </label>
                    </div>
                </div>
            </div>

            <div class="k_inner_group">

                <div class="d-flex" style="margin-bottom: 8px;">
                    <!-- Input Form Label -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            <?php echo e(__("Montant de l'acompte")); ?> :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <input type="text" wire:model="down_payment" class="k_input" id="down_payment_0" >
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['down_payment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>

                <div class="d-flex" style="margin-bottom: 8px;">
                    <!-- Payment Terms -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            <?php echo e(__("Compte de revenue")); ?> :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="text-break k_cell k_wrap_input flex-grow-1">
                        <select wire:model="income_account_id" class="k-autocomplete-input-0 k_input" id="company_id_0">
                            <option></option>
                        </select>
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['income_account_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>

                <div class="d-flex" style="margin-bottom: 8px;">
                    <!-- Input Form Label -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            <?php echo e(__("Taxe")); ?> :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <input type="text" wire:model="customer_tax" class="k_input" id="customer_tax_0" >
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['customer_tax'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" style="background-color: gray;" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" style="background-color: black;" class="btn btn-dark"><?php echo e(__('Créer un brouillon')); ?></button>
          </div>
        </div>
      </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Sales\Resources/views/livewire/sale/invoice/set-invoice.blade.php ENDPATH**/ ?>