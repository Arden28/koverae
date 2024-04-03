@section('styles')
    <style>
        .refund-list:hover{
            background-color: #03565B;
            color: white;
        }
        .table .active{
            background-color: #03565B;
            color: white;
        }
    </style>
@endsection
<div>
    <div class="d-print-none controls align-items-center d-flex justify-content-between mt-1 mt-lg-0 p-2 bg-400">
        <div class="buttons d-flex gap-2">
            <a href="{{ route('pos.ui', ['subdomain' => current_company()->domain_name, 'pos' => $pos->id, 'session' =>$pos->sessions()->isOpened()->first()->unique_token]) }}" class="btn btn-secondary-outline">
                <i class="bi bi-skip-backward-fill"></i> <span class="ml-3">Retour</span>
            </a>
            <a href="{{ route('pos.ui', ['subdomain' => current_company()->domain_name, 'pos' => $pos->id, 'session' =>$pos->sessions()->isOpened()->first()->unique_token]) }}" class="btn btn-primary primary">
                {{ __('Nouvelle commande') }}
            </a>
        </div>
    </div>
    <div class="row overflow-hidden">
        <div class="d-print-none col-md-8 orders overflow-y-auto">
            <table class="table bg-white overflow-y-auto">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Numéro de commande</th>
                    <th scope="col">Client</th>
                    <th scope="col">Caissier</th>
                    <th scope="col">Total</th>
                    <th scope="col">Payé</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr class="cursor-pointer refund-list {{ $this->selected == $order->id ? 'active' : '' }}" wire:click="selectOrder({{ $order->id }})" wire:loading.class="bg-gray">
                        <th scope="row">{{ receipt_number($order->reference) }}</th>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ $order->cashier->user->name }}</td>
                        <td>{{ format_currency($order->total_amount / 100) }}</td>
                        <td>{{ format_currency($order->paid_amount / 100) }}</td>
                        <td>
                            @if($order->payment_status == 'unpaid')
                                {{ __('Non payé') }}
                            @elseif($order->payment_status == 'paid')
                                {{ __('Payé') }}
                            @else
                                {{ __('Partiellement payé') }}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Checkout -->
        <div class="col-md-4">
            <livewire:pos::display.refund :pos="$pos" />
        </div>
    </div>
</div>
