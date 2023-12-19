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
                    <!-- Members -->
                    <div class="tab-pane active show" id="members">

                        <div class="k_kanban_view k_field_X2many">
                            <div class="k_x2m_control_panel d-empty-none mb-4">
                                <button class="btn btn-secondary">
                                    <?php echo e(__('Ajouter un membre')); ?>

                                </button>
                            </div>
                            <div class="k_kanban_renderer align-items-start d-flex flex-wrap justify-content-start">

                                <div class="k_kanban_card">
                                    <!-- Content -->
                                    <div class="k_kanban_card_content">
                                        <img class="k_kanban_image k_image_62_cover" src="<?php echo e(asset('assets/images/apps/default.png')); ?>">
                                        <div class="k_kanban_details">
                                            <strong class="k_kanban_record_title">
                                                <span>Arden BOUET</span>
                                            </strong>
                                            <div class="d-flex align-items-baseline text-break">
                                                <i class="bi bi-envelope"></i>
                                                <span>laudbouetoumoussa@koverae.com</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/tabs/member.blade.php ENDPATH**/ ?>