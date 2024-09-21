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
<!--[if BLOCK]><![endif]--><?php if($value->data['parent']): ?>
<div class="d-flex" style="margin-bottom: 8px;" wire:transition.duration.300ms>
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <!--[if BLOCK]><![endif]--><?php if($value->label): ?>
        <label class="k_form_label">
            <?php echo e($value->label); ?>

            <!--[if BLOCK]><![endif]--><?php if($value->help): ?>
                <sup><i class="bi bi-question-circle-fill" style="color: #0E6163" data-toggle="tooltip" data-placement="top" title="<?php echo e($value->help); ?>"></i></sup>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </label>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">

        <!--[if BLOCK]><![endif]--><?php if($value->type == 'select'): ?>
        <select wire:model.blur="<?php echo e($value->model); ?>" id="<?php echo e($value->model); ?>" class="k_input">
            <option value=""></option>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $value->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value); ?>"><?php echo e($text); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </select>
        <?php elseif($value->type == 'textarea'): ?>
        <textarea wire:model.blur="<?php echo e($value->model); ?>" class="border textearea k_input" placeholder="<?php echo e($value->placeholder); ?>" id="description" <?php echo e($this->blocked ? 'disabled' : ''); ?>>
            <?php echo $value->model; ?>

        </textarea>
        <?php else: ?>
        <input type="<?php echo e($value->type); ?>" wire:model.blur="<?php echo e($value->model); ?>" class="p-0 k_input" placeholder="<?php echo e($value->placeholder); ?>" id="<?php echo e($value->key); ?>" <?php echo e($this->blocked ? 'disabled' : ''); ?>>
        <!--[if BLOCK]><![endif]--><?php $__errorArgs = [$value->model];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    </div>
</div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->

<?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/form/input/depends.blade.php ENDPATH**/ ?>