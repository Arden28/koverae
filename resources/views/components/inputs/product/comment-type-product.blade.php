@props([
    'value',
    'data'
])
<div class="container h-auto d-lg-flex" >
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <br>
    </div>
    <!-- Input Form -->
    <div class="h-auto k_cell k_wrap_input flex-grow-1 text-muted">
        @if($this->product_type == 'consumable' )
        <span style="margin: 0 0 0 30px;">
            Les produits stockables sont des articles physiques pour lesquels les quantités en stock sont gérées
            <br />
            Vous pouvez les facturer avant qu'ils ne soient livrés.
        </span>
        @endif
        {{-- @if($this->product_type == 'storable' )
        <span style="margin: 0 0 0 30px;">
            Les produits stockables sont des articles physiques pour lesquels les quantités en stock sont gérées
            <br />
            Vous pouvez les facturer avant qu'ils ne soient livrés.
        </span>
        @elseif($this->product_type == 'consumable')
        <span>
            Les consommables sont des produits physiques dont vous ne gérez pas le niveau de stock : ils sont toujours disponibles.
            <br>
            @if($this->invoice_policy == 'ordered')
            Vous pouvez les facturer avant qu'ils ne soient livrés.
            @elseif($this->invoice_policy == 'delivered')
            Facturez après livraison, en fonction des quantités livrées, non commandées.
            @endif
        </span>
        @elseif($this->product_type == 'service' || $this->product_type == 'booking_fee')
        <span style="">
            Facturez les quantités commandées dès que ce service est vendu.
        </span>
        @endif --}}
    </div>
</div>

