<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value',
    'id'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value',
    'id'
]); ?>
<?php foreach (array_filter(([
    'value',
    'id'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div>
    <!--[if BLOCK]><![endif]--><?php if($value == 'manufacture'): ?>
     <span>
      <?php echo e(__('Fabriquer ce produit')); ?>

     </span>
    <?php elseif('subcontracting'): ?>
    <span>
     <?php echo e(__('Sous-traitant')); ?>

    </span>
    <?php else: ?>
    <span>
     <?php echo e(__('Kit')); ?>

    </span>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div><?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/columns/common/bom-type.blade.php ENDPATH**/ ?>