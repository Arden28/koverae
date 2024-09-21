<div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel"><?php echo e(__('Add Contact')); ?></h5>
        <span class="btn-close" wire:click="$dispatch('closeModal')"></span>
      </div>
      <div class="modal-body">
        <!-- Radio -->
        <div class="k_horizontal">
            <div class="form-check k_radio_item">
            </div>
        </div>
        <div class="k_form_nosheet">
            <p>
                <?php echo e(__('Add Contact')); ?>

            </p>

            
        </div>
      </div>
      <div class="p-0 modal-footer">
        <button class="btn btn-secondary" wire:click="$dispatch('closeModal')"><?php echo e(__('Discard')); ?></button>
        <button class="btn btn-primary" wire:click.prevent="addContact"><?php echo e(__('Save & Close')); ?></button>
      </div>
    </div>
</div>
<?php /**PATH D:\My Laravel Startup\koverae\Modules/Contact\Resources/views/livewire/modal/add-contact-modal.blade.php ENDPATH**/ ?>