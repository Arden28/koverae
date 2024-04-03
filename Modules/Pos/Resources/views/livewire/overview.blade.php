<div>
    @section('title', 'Point de Ventes')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row">
                <!-- Notify -->
                @include('notify::components.notify')
                @foreach ($pos as $p)
                <div class="col-md-6" style="margin-bottom: 5px;" style="border-left: 2px solid #0E6163">
                    <div class="card">
                        <div class="card-header col-12 flex" style="border-bottom: 0px solid;">
                            <div class="col-10">
                                <h4 class="card-title m-0">
                                    <a wire:navigate href="{{ route('pos.show', ['pos' => $p->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                                        {{ $p->name }}
                                    </a>
                                </h4>
                            </div>
                            <div class="col-2">
                                <div class="dropdown">
                                    <a href="#" class="btn-action text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a wire:navigate href="#" class="dropdown-item">
                                            {{ __('Commandes') }}
                                        </a>
                                        <a wire:navigate href="#" class="dropdown-item">
                                            {{ __('Sessions') }}
                                        </a>
                                        <a wire:navigate href="{{ route('pos.show', ['pos' => $p->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                                            <i class="bi bi-gear"></i> {{ __('Configuration') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-2 align-items-center">
                                <div class="small mt-1" style="padding: 10px 0 10px 0; ">
                                    @if($p->isOpened())
                                    {{-- <a href="{{ route('pos.ui', ['subdomain' => current_company()->domain_name, 'pos' => $p->id, 'session' =>$p->sessions()->isOpened()->first()->unique_token]) }}" class="btn btn-outline-warning"> --}}
                                    <button wire:click.prevent="continueSession({{ $p->id }})" class="btn btn-outline-warning">
                                        Continuer la vente <span wire:loading>...</span>
                                    </button>
                                    <span class="w-auto m-2" style="font-size: 15px;">{{ $p->status == 'inactive' ? 'Fermé' : 'Ouvert' }}</span>
                                    <span class="w-auto m-2" style="font-size: 15px;">{{ \Carbon\Carbon::parse($p->start_date)->format('d-m-Y H:i:s') }}</span>
                                    @else
                                    <button wire:click.prevent="openSession({{ $p->id }})" class="btn btn-outline-primary k-btn-primay">
                                        Nouvelle session <span wire:loading>...</span>
                                    </button>
                                    <span class="w-auto m-2" style="font-size: 15px;">{{ $p->status == 'inactive' ? 'Fermé' : 'Ouvert' }}</span>
                                    <span class="w-auto m-2" style="font-size: 15px;">dd mm YYYY</span>
                                    @endif
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
