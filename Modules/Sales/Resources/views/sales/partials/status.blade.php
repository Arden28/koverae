@if ($s->status == 'to_invoice')
    <span class="badge bg-info">
       {{ __('A facturer') }}
    </span>
@elseif($s->status == 'partial')
    <span class="badge bg-primary">
        {{ __('Partielle') }}
    </span>
@else
    <span class="badge bg-success">
        {{ __('Facturé') }}
    </span>
@endif
