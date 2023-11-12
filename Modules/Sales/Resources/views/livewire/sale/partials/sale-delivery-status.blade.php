@if ($s->shipping_status == 'Shipped')
    <span class="badge bg-info">
       {{ __('Livrée') }}
    </span>
@elseif($s->shipping_status == 'Pending')
    <span class="badge bg-primary">
        {{ __('En cours') }}
    </span>
@else

@endif
