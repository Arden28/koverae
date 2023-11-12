@if ($q->status == 'quotation')
    <span class="badge bg-info">
       {{ __('Devis') }}
    </span>
@elseif($q->status == 'sent')
    <span class="badge bg-primary">
        {{ __('Devis envoyé') }}
    </span>
@else
    <span class="badge bg-success">
        {{ __('Bon de commande') }}
    </span>
@endif
