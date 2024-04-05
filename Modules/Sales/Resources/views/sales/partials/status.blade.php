@if ($s->status == 'to_invoice')
    <span class="badge bg-info rounded-0">
       {{ __('A facturer') }}
    </span>
@elseif($s->status == 'partial')
    <span class="badge bg-primary rounded-pill">
        {{ __('Partielle') }}
    </span>
@else
    <span class="badge bg-success rounded-pill">
        {{ __('Facturé') }}
    </span>
@endif
