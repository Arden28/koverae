<div>
    @section('title', 'Aperçu de l\'inventaire')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row">
                <!-- Notify -->
                @include('notify::components.notify')
                @foreach ($operations as $o)
                <div class="col-md-4" style="margin-bottom: 5px;" style="border-left: 2px solid #0E6163">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-2 align-items-center">
                                <div class="col-12 flex">
                                    <div class="col-10">
                                        <h4 class="card-title m-0">
                                            <a wire:navigate href="{{ route('inventory.operation-types.show', ['type' => $o->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">{{ $o->name }}</a>
                                        </h4>
                                        <div class="small mt-1">
                                            <span class="badge"><i class="bi bi-building"></i> {{ current_company()->name }}</span>
                                            @if(settings()->has_storage_locations)
                                            <span class="badge"><i class="bi bi-building"></i> entrepôt: {{ $o->warehouse->name }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="dropdown">
                                            <a href="#" class="btn-action text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a wire:navigate href="{{ route('inventory.operation-types.show', ['type' => $o->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                                                    <i class="bi bi-gear"></i> {{ __('Configuration') }}
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="col-auto">
                                        <a wire:navigate href="{{ route('inventory.operation-transfers.index', ['subdomain' => current_company()->domain_name, 'type' => $o->operation_type,'status' => 'ready', 'menu' => current_menu()]) }}" class="btn btn-primary">
                                             {{ $o->operationTransfers()->isOperationType($o->id)->isWating()->count() }} {{ __('à traiter') }}
                                        </a>
                                        @if($o->operationTransfers()->isOperationType($o->id)->isWating()->isLate()->count() >= 1 )
                                            <span class="col-auto">
                                                {{ $o->operationTransfers()->isOperationType($o->id)->isWating()->isLate()->count() }} en retard
                                            </span>
                                        @endif
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
