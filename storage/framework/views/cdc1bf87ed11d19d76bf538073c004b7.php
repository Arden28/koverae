<div>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-break"><?php echo e(__('Enregistrer un paiement')); ?></h4>
        
      </div>
      <form wire:submit.prevent="registerPayment(<?php echo e($invoice->id); ?>)">
        <div class="modal-body position-relative">
          <div class="k_form_renderer k_form_sheet">

            <div class="row">

                <div class="k_inner_group col-md-6 col-lg-6">

                    <div class="d-flex" style="margin-bottom: 8px;">
                        <!-- Date -->
                        <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                            <label class="k_form_label">
                                <?php echo e(__("Journal")); ?> :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="k_cell k_wrap_input flex-grow-1">
                            <select wire:model="journal" class="k-autocomplete-input-0 k_input" id="journal">
                                <option value=""></option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $journals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e($j->id == 1 ? 'selected' : ''); ?> value="<?php echo e($j->id); ?>"><?php echo e($j->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->

                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['journal'];
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
                        <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                            <label class="k_form_label">
                                <?php echo e(__("Mode de paiement")); ?> :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="k_cell k_wrap_input flex-grow-1">
                            <select wire:model="invoice_payment_method" class="k-autocomplete-input-0 k_input" id="company_id_0">
                                <option value=""></option>
                                <option selected value="manual"><?php echo e(__('Manuel')); ?></option>
                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['invoice_payment_method'];
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
                <!-- Left -->
                <div class="k_inner_group col-md-6 col-lg-6">

                    <div class="d-flex" style="margin-bottom: 8px;">
                        <!-- Payment Reference -->
                        <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                            <label class="k_form_label">
                                <?php echo e(__("Montant")); ?> :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="k_cell k_wrap_input flex-grow-1">
                            <input type="text" wire:model="amount" class="k_input" id="amount_0">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['amount'];
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
                        <!-- Payment Reference -->
                        <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                            <label class="k_form_label">
                                <?php echo e(__("Date de paiement")); ?> :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="k_cell k_wrap_input flex-grow-1">
                            <input type="date" wire:model="payment_date" class="k_input" id="payment_date_0">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['payment_date'];
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
                        <!-- Payment Reference -->
                        <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                            <label class="k_form_label">
                                <?php echo e(__("Memo")); ?> :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="k_cell k_wrap_input flex-grow-1">
                            <input type="text" wire:model="payment_note" class="k_input" id="payment_note_0">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['payment_note'];
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

          </div>
        </div>
        <div class="modal-footer justify-content-around justify-content-sm-start flex-wrap gap-1 w-100">
          <footer>
              <button type="submit" wire:target="registerPayment(<?php echo e($invoice->id); ?>)" class="btn btn-primary">Envoyer <p wire:loading wire:target="registerPayment(<?php echo e($invoice->id); ?>)">...</p></button>

              <button class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          </footer>
        </div>
      </form>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Invoicing\Resources/views/livewire/modal/invoice/register-payment.blade.php ENDPATH**/ ?>