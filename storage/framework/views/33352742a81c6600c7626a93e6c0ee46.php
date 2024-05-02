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
<?php
    $bom = \Modules\Manufacturing\Entities\BOM\BillOfMaterial::find($value);
?>
<!--[if BLOCK]><![endif]--><?php if(isset($bom)): ?>
<div>
    <a style="text-decoration: none" wire:navigate href="#"  tabindex="-1">
        <?php echo e($bom->name); ?>

    </a>
</div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/columns/common/bom.blade.php ENDPATH**/ ?>