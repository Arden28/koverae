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
<!--[if BLOCK]><![endif]--><?php if($this->contact): ?>
<div class="p-2 k_kanban_view">
    <div class="mb-2 k_x2m_control_panel d-empty-none">
        <button class="btn btn-secondary" style="background-color: #0E6163;" onclick="Livewire.dispatch('openModal', {component: 'contact::modal.add-contact-modal', arguments: {owner: <?php echo e($this->contact->id); ?> } } )">
            <?php echo e(__('Add Address / Contact')); ?>

        </button>
    </div>
    <div class="flex-wrap k_kanban_renderer align-items-start d-flex justify-content-start">
        <!-- Address -->
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mb-1 k_kanban_card">
            <!-- Content -->
            <div class="k_kanban_card_content">
                <img class="k_kanban_image k_image_62_cover" src="<?php echo e(asset('assets/images/apps/default.png')); ?>">
                <div class="k_kanban_details">
                    <strong class="cursor-pointer k_kanban_record_title" onclick="Livewire.dispatch('openModal', {component: 'contact::modal.add-contact-modal', arguments: {owner: <?php echo e($this->contact->id); ?>, contact: <?php echo e($address->id); ?> } } )">
                        <span><?php echo e($address->name); ?></span>
                    </strong>
                    <!--[if BLOCK]><![endif]--><?php if($address->email): ?>
                    <div class="d-flex align-items-baseline text-break">
                        <i class="mb-1 mr-2 bi bi-envelope koverae-link" style="margin-right: 10px;"></i>
                        <a href="mailto:<?php echo e($address->email); ?>" class="koverae-link"><?php echo e($address->email); ?></a>
                    </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--><?php if($address->city || $address->country_id || $address->zip): ?>
                    <div class="d-flex align-items-baseline text-break">
                        <i class="mb-1 bi bi-geo koverae-link" style="margin-right: 10px;"></i>
                        <span class="koverae-link"><?php echo e($address->zip); ?>, <?php echo e($address->city); ?>, <?php echo e($address->country->common_name); ?></span>
                    </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--><?php if($address->phone): ?>
                    <div class="d-flex align-items-baseline text-break">
                        <i class="bi bi-phone koverae-link" style="margin-right: 10px;"></i>
                        <a class="koverae-link" href="tel:<?php echo e($address->phone); ?>"><?php echo e($address->phone); ?></a>
                    </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/form/tab/group/special/contact-address.blade.php ENDPATH**/ ?>