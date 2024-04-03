<div>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-break">Koverae</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form wire:submit.prevent="sendEmail">
        <div class="modal-body position-relative">

          <div class="k_form_renderer k_form_nosheet k_form_editable d-block">

              <div class="k_inner_group">
                <div class="d-flex" style="margin-bottom: 8px;">
                    <!-- Input Label -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">
                        <label class="k_form_label">
                            Destinataires :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <input type="text" wire:model.blur="email" class="k_input" style="padding: 1px 0 0; width: 25%" id="date_0">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        <div class="w-75 d-flex">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $recipient_emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="badge rounded-pill cursor-pointer k_web_settings_users" style="background-color: #097274;">
                                < <?php echo e($email); ?> >
                                <i class="bi bi-x cancelled_icon" wire:click.prevent="removeEmail(<?php echo e($email); ?>)" wire:target="removeEmail(<?php echo e($email); ?>)" data-bs-toggle="tooltip" data-bs-placement="right" title="Retirer"></i>
                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            <span wire:loading wire:target="addEmail">...</span>
                        </div>
                    </div>
                </div>
                  <div class="d-flex" style="margin-bottom: 8px;">
                      <!-- Input Label -->
                      <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">
                          <label class="k_form_label">
                              Sujet :
                          </label>
                      </div>
                      <!-- Input Form -->
                      <div class="k_cell k_wrap_input flex-grow-1">
                          <input type="text" wire:model="subject" class="k_input" style="padding: 1px 0 0" id="date_0">
                          <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                  </div>

                  <div class="note-editable koverae-editable-editor koverae-editor" contenteditable="true" id="body_0" wire:model="content" >
                      <?php echo $content; ?>

                  </div>

              </div>

              

              <div class="k_inner_group">
                <div class="d-flex" style="margin-bottom: 8px;">
                    <!-- Input Label -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">
                        <label class="k_form_label">
                            Modèle d'email :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <select wire:model.blur="template_id" class="k_input" style="padding: 1px 10px 1px 0; width: 372px;" id="model_0">
                            <option value=""></option>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($t->id); ?>"><?php echo e($t->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </select><!--[if BLOCK]><![endif]--><?php $__errorArgs = ['template_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>

          </div>
        </div>
        <div class="modal-footer justify-content-around justify-content-sm-start flex-wrap gap-1 w-100">
          <footer>
              <button  type="submit" wire:target="sendEmail" class="btn primary">Envoyer <span wire:loading>...</span></button>

              <button class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          </footer>
        </div>
      </form>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/livewire/modal/email/send-by-mail.blade.php ENDPATH**/ ?>