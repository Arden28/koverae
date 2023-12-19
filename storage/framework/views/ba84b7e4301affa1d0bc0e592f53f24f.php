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
<div>
    <button type="button" wire:click="<?php echo e($value->action); ?>" wire:target="<?php echo e($value->action); ?>"  id="top-button" class="btn btn-primary <?php echo e($status == $value->primary ? 'primary' : ''); ?>">
        <span>
            <?php echo e($value->label); ?> <p wire:loading wire:target="<?php echo e($value->action); ?>">...</p>
        </span>
    </button>

    <!-- Dropdown button -->
    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Action
        </button>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#"><?php echo e(__('Confirmer')); ?></a></li>
        <li><a class="dropdown-item" href="#"><?php echo e(__('Envoyer par email')); ?></a></li>
        <li><a class="dropdown-item" href="#"><?php echo e(__('Aperçu')); ?></a></li>
        <!--[if BLOCK]><![endif]--><?php if($status == 'sent'): ?>
        <li><a class="dropdown-item" href="#"><?php echo e(__('Annuler')); ?></a></li>
        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
        <!--<li><hr class="dropdown-divider"></li>-->
        </ul>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/button/action-bar/simple.blade.php ENDPATH**/ ?>