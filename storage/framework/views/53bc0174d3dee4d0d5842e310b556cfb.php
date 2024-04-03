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
<!--[if BLOCK]><![endif]--><?php if($this->product_type): ?>
<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">
        <br>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1 text-muted">
        <!--[if BLOCK]><![endif]--><?php if($this->product_type == 'storable'): ?>
        <span style="margin: 0 0 0 30px;">
            Les produits stockables sont des articles physiques pour lesquels les quantités en stock sont gérées
            <br />
            Vous pouvez les facturer avant qu'ils ne soient livrés.
        </span>
        <?php elseif($this->product_type == 'consumable'): ?>
        <span style="margin: 0 0 0 30px;">
            Les consommables sont des produits physiques dont vous ne gérez pas le niveau de stock : ils sont toujours disponibles.
            <br>
            <!--[if BLOCK]><![endif]--><?php if($this->invoice_policy == 'ordered'): ?>
            Vous pouvez les facturer avant qu'ils ne soient livrés.
            <?php elseif($this->invoice_policy == 'delivered'): ?>
            Facturez après livraison, en fonction des quantités livrées, non commandées.
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </span>
        <?php elseif($this->product_type == 'service' || $this->product_type == 'booking_fee'): ?>
        <span style="">
            Facturez les quantités commandées dès que ce service est vendu.
        </span>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>
<br><br>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->

<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/inputs/product/comment-type-product.blade.php ENDPATH**/ ?>