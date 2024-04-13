<div>
    <!--[if BLOCK]><![endif]--><?php if($this->isOpen): ?>
    <div class="modal modal-<?php echo e($this->modalMaxWidth()); ?> d-block" tabindex="-1"
        x-show="show"
        x-on:click="closeModalOnClickAway()"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer pb-4">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closeModal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
  </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/livewire/modal/simple-modal.blade.php ENDPATH**/ ?>