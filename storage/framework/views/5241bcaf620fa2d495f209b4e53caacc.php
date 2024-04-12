<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value',
    'data'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value',
    'data'
]); ?>
<?php foreach (array_filter(([
    'value',
    'data'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="table-responsive" style="margin-top: 10px;">
    <table class="table card-table table-vcenter text-nowrap datatable">
        <thead class="list-table">
            <tr class="list-tr">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->columns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th class="cursor-pointer">
                        <?php echo e($column->label); ?>

                    </th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr class="k_field_list_row">
                <td class="k_field_list">
                    <span class=" cursor-pointer" href="avoid:js">
                        <i class="bi bi-plus-circle"></i> Ajouter une ligne
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/tables/simple.blade.php ENDPATH**/ ?>