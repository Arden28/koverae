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

<div class="table-responsive">
    <table class="table card-table table-vcenter text-nowrap datatable">
        <thead class="order-table">
            <tr class="order-tr">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->columns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--[if BLOCK]><![endif]--><?php if($column->table === $value->key): ?>
                    <th class="cursor-pointer">
                        <?php echo e($column->label); ?>

                    </th>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                <th></th>
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php if($value->data): ?>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $value->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="k_field_list_row">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->columns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="k_field_list">
                    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $column->component] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => $model[$column->key],'id' => $model->id]); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
                </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <tr class="k_field_list_row">
                <td class="k_field_list" style="height: 35px;">
                    <span class="cursor-pointer" href="avoid:js">

                    </span>
                </td>
            </tr>
            <tr class="k_field_list_row">
                <td class="k_field_list">
                    <span class="cursor-pointer " href="avoid:js">
                        <i class="bi bi-plus-circle"></i> <?php echo e(__('Add a line')); ?>

                    </span>
                </td>
            </tr>

        </tbody>
    </table>
    
</div>
<?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/form/tab/table/simple.blade.php ENDPATH**/ ?>