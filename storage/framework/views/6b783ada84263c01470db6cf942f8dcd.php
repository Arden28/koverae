<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value',
]); ?>
<?php foreach (array_filter(([
    'value',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
    $bank = \Modules\Contact\Entities\Bank\Bank::find($value);
?>
<div>
    <a style="text-decoration: none " wire:navigate href="<?php echo e(route('contacts.banks.show', ['bank' => $bank->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>"  tabindex="-1">
        <?php echo e($bank->name ?? ''); ?>

    </a> 
</div>
<?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/table/column/special/bank/simple.blade.php ENDPATH**/ ?>