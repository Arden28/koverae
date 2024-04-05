<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value',
    'status'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value',
    'status'
]); ?>
<?php foreach (array_filter(([
    'value',
    'status'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
    <!--[if BLOCK]><![endif]--><?php if($status == 'posted' && $this->invoice->due_amount >= 1 ): ?>
    <div>
        <button class="d-none d-lg-inline-flex" type="button" onclick="Livewire.dispatch('openModal', {component: 'modal.invoice.register-payment', arguments: { invoice: <?php echo e($this->invoice); ?>}} )"  id="top-button" class="btn btn-primary <?php echo e($status == $value->primary ? 'primary' : ''); ?>">
            <span>
                <?php echo e($value->label); ?>

            </span>
        </button>
        <li class="d-lg-none"><a class="dropdown-item" onclick="Livewire.dispatch('openModal', {component: 'modal.invoice.register-payment', arguments: { invoice: <?php echo e($this->invoice); ?>}} )"><?php echo e($value->label); ?></a></li>
    </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/button/action-bar/invoice/register-payment.blade.php ENDPATH**/ ?>