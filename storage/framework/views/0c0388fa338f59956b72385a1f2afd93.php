<div>
    <div class="k_control_panel d-flex flex-column gap-3 gap-lg-1 px-3 pt-2 pb-3">
      <div class="k_control_panel_main d-flex flex-wrap flex-nowrap justify-content-between align-items-lg-start gap-5 flex-grow-1">
          <!-- Breadcrumbs -->
          <div class="k_control_panel_breadcrumbs d-flex align-items-center gap-1 order-0 h-lg-100">
            <div class="k_form_buttons_edit d-flex gap-1">
                <!-- Create Button -->
                <button wire:click="saveUpdate" wire:target="saveUpdate" class="btn btn-primary k_form_button_save">
                    Sauvegarder <span wire:loading wire:target="saveUpdate">...</span>
                </button>
                <!-- Create Button -->
                <button wire:click="cancelUpdate" wire:target="cancelUpdate" class="btn btn-secondary k_form_button_cancel">
                    Annuler <span wire:loading wire:target="cancelUpdate">...</span></span>
                </button>
            </div>
                <div class="k_last_breadcrumb_item active gap-2 align-items-center min-w-0 lh-sm">
                    <div class="d-flex gap-1 text-truncate">
                        <span class="min-w-0 text-truncate" id="current-page">
                            <?php echo e($this->currentPage); ?>

                        </span>
                    </div>
                </div>
          </div>

          <!-- Actions / Search Bar -->
          <div class="k_panel_control_actions d-flex align-items-center justify-content-start order-2 order-lg-1 w-100 w-lg-auto justify-content-lg-around">

          </div>

      </div>
    </div>
</div>
<?php /**PATH D:\My Laravel Project\koverae-app\resources\views/livewire/navbar/template/simple.blade.php ENDPATH**/ ?>