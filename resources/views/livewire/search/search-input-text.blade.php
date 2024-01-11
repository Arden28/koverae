<div>
    <div class="position-relative">
        <input type="text" wire:model.live="query" id="product_0" class="k_input caret-black dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" placeholder="Tapez pour trouver votre produit">
    </div>
    <div wire:loading class="card position-absolute mt-1 border-0" style="z-index: 1;left: 0;right: 0; width: auto;">
        <div class="card-body shadow">
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div>
    </div>
    @if(!empty($query))
        <div wire:click="resetQuery" class=" h-100" style="left: 0; top: 0; right: 0; bottom: 0;z-index: 1;"></div>
        @if($search_results->isNotEmpty())
            <div class="card position-absolute mt-1" style="z-index: 2;left: 0;right: 0;border: 0;">
                <div class="card-body shadow">
                    <ul class="list-group list-group-flush">
                        @foreach($search_results as $result)
                            <li class="list-group-item list-group-item-action">
                                <a wire:click="resetQuery" wire:click.prevent="selectProduct({{ $result }})" href="#">
                                    {{ $result->product_name }} | {{ $result->product_code }}
                                </a>
                            </li>
                        @endforeach
                        @if($search_results->count() >= $how_many)
                             <li class="list-group-item list-group-item-action text-center">
                                 <a wire:click.prevent="loadMore" class="btn btn-primary btn-sm" href="#">
                                     {{ __('Plus de résultats') }} <i class="bi bi-arrow-down-circle"></i>
                                 </a>
                             </li>
                        @endif
                    </ul>
                </div>
            </div>
        @else
            <div class="card position-absolute mt-1 border-0" style="z-index: 1;left: 0;right: 0;">
                <div class="card-body shadow">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-action">
                            <span class=" cursor-pointer" href="avoid:js">
                                <i class="bi bi-plus-circle"></i> {{ __('Créer') }} "{{ $query }}"
                            </span>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <span class=" cursor-pointer" href="avoid:js">
                                <i class="bi bi-plus-circle"></i> {{ __('Créer & modifier') }} "{{ $query }}"
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
    @endif

</div>
