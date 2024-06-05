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
<div class="container h-auto d-lg-flex" >
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <br>
    </div>
    <!-- Input Form -->
    <div class="h-auto k_cell k_wrap_input flex-grow-1 text-muted">
        <!--[if BLOCK]><![endif]--><?php if($this->product_type == 'consumable' ): ?>
        <span style="margin: 0 0 0 30px;">
            Les produits stockables sont des articles physiques pour lesquels les quantités en stock sont gérées
            <br />
            Vous pouvez les facturer avant qu'ils ne soient livrés.
        </span>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        
    </div>
</div>

<?php /**PATH D:\My Laravel Project\koverae-app\resources\views/components/inputs/product/comment-type-product.blade.php ENDPATH**/ ?>