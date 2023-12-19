<!--[if BLOCK]><![endif]--><?php if(isset($this->payment_status) && $this->payment_status == 'Paid'): ?>
    <div class="box col-9">
        <div class="k-folded-ribbon success">
            <span class="word">
                <?php echo e(__('Payé')); ?>

            </span>
        </div>
    </div>
<?php elseif(isset($this->payment_status) && $this->payment_status == 'Partial'): ?>
    <div class="box col-9">
        <div class="k-folded-ribbon pending">
            <span class="word">
                <?php echo e(__('Partiel')); ?>

            </span>
        </div>
    </div>
<?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Sales\Resources/views/livewire/sale/invoice/partials/payment-status-ribbon.blade.php ENDPATH**/ ?>