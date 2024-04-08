<div>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-break">Paiement</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form wire:submit="createPos">
        <?php echo csrf_field(); ?>
        <div class="modal-body position-relative">
          <div class="k_form_nosheet">
              <div class="row">

                  <div class="k_inner_group col-md-6 col-lg-6">

                      <!-- Journal -->
                      <div class="d-flex" style="margin-bottom: 8px;">
                          <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                              <label class="k_form_label">
                                  <?php echo e(__("Moyen de paiement")); ?> :
                              </label>
                          </div>
                          <!-- Input Form -->
                          <div class="k_cell k_wrap_input flex-grow-1">
                              <select wire:model="payment_method" class="k-autocomplete-input-0 k_input" id="journal">
                                  <option>Cash</option>

                              </select>
                              <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['journal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                          </div>
                      </div>

                      <!-- Payment method -->
                      <div class="d-flex" style="margin-bottom: 8px;">
                          <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                              <label class="k_form_label">
                                  <?php echo e(__("Montant Total")); ?> :
                              </label>
                          </div>
                          <!-- Input Form -->
                          <div class="k_cell k_wrap_input flex-grow-1">
                              <input type="hidden" wire:model="total">
                              <input wire:model="total_amount" class="k-autocomplete-input-0 k_input" readonly id="total_amount_id_0">
                              <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['total_amount'];
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
                  <div class="k_inner_group col-md-6 col-lg-6">

                      <!-- Amount -->
                      <div class="d-flex" style="margin-bottom: 8px;">
                          <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                              <label class="k_form_label">
                                  <?php echo e(__("Montant reçu")); ?> :
                              </label>
                          </div>
                          <!-- Input Form -->
                          <div class="k_cell k_wrap_input flex-grow-1">
                              <input type="text" wire:model.blur="received_amount" class="k_input" style="width: 50%;" id="received_amount_0">
                              <span style="width: 50%;"><?php echo e($this->received_amount >= $this->total ? 'Monnaie' : 'Reste'); ?>  : <?php echo e(format_currency($this->change_amount)); ?></span>
                              <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['received_amount'];
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
        </div>
        <div class="modal-footer justify-content-around justify-content-sm-start flex-wrap gap-1 w-100">
          <footer>
              
              <button type="submit" class="btn btn-primary" data-dismiss="modal">Valider</button>
          </footer>
        </div>
      </form>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Pos\Resources/views/livewire/modal/checkout-modal.blade.php ENDPATH**/ ?>