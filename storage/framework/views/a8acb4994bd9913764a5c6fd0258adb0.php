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

<div class="d-flex" style="margin-bottom: 8px;">
    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
        <label class="k_form_label">
            <?php echo e($value->label); ?> :
        </label>
    </div>
    <div class="k_address_format">
        <div class="row">
            <div class="col-12" style="margin-bottom: 10px;">
                <input type="text" wire:model="street" id="street" class="k_input" placeholder="Rue 1....">
            </div>
            <div class="col-12" style="margin-bottom: 10px;">
                <input type="text" wire:model="street2" id="street2_0" class="k_input" placeholder="Rue 2......">
            </div>
            <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                <input type="text" wire:model="city" id="city_0" class="k_input" placeholder="Ville">
            </div>
            <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                <select name="" class="k_input" id="state_id_0">
                    <option value=""><?php echo e(__('Département')); ?></option>
                </select>
            </div>
            <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                <input type="text" wire:model="zip" id="zip_0" class="k_input" placeholder="Code postal">
            </div>
            <div class="col-12" style="margin-bottom: 10px;">
                <select name="" class="k_input" id="country_id_0">
                    <option value=""><?php echo e(__('Pays')); ?></option>
                </select>
            </div>

        </div>

    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/inputs/select/address.blade.php ENDPATH**/ ?>