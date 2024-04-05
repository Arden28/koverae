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
    $customer = \Modules\Contact\Entities\Contact::find($value);
?>
<!--[if BLOCK]><![endif]--><?php if(isset($customer)): ?>
<div>
    <a style="text-decoration: none" wire:navigate href="<?php echo e(route('contacts.show' , ['subdomain' => current_company()->domain_name, 'contact' => $customer->id, 'menu' => current_menu() ])); ?>"  tabindex="-1">
        <?php echo e($customer->name); ?>

    </a>
</div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/columns/common/customer.blade.php ENDPATH**/ ?>