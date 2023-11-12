<div>
    @section('title', $reference)

    <!-- Notify -->
    @include('notify::components.notify')
    <div class="k_form_sheet_bg">
        <!-- Status bar -->
        <div class="k_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">

            <div id="statusbar" class="k_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">

                @if($status <> 'canceled')
                @if($sale->invoices()->count() == 0)
                <button type="button" wire:click.prevent="createInvoice({{ $sale->id }})" class="btn btn-primary primary">
                    <span>
                        {{ __('Créer une facture') }}
                    </span>
                </button>
                @endif

                <button type="button" wire:click="justSendQT()" id="top-button" class="btn btn-secondary {{ $sale->invoices()->count() >= 1 ? 'primary' : '' }}">
                    <span>
                        {{ __('Envoyer par email') }}
                    </span>
                </button>

                <button type="button" id="top-button" class="btn btn-secondary">
                    <span>
                        {{ __('Aperçu') }}
                    </span>
                </button>

                <button type="button" wire:click.prevent="canceled({{ $sale->id }})" wire:target="canceled({{ $sale->id }})" id="top-button" class="btn btn-danger">
                    <span>
                        {{ __('Annuler') }}
                    </span>
                </button>
                @else
                <button type="button" id="top-button" class="btn btn-secondary">
                    <span>
                        {{ __('Définir un devis') }}
                    </span>
                </button>

                <button type="button" id="top-button" class="btn btn-secondary">
                    <span>
                        {{ __('Aperçu') }}
                    </span>
                </button>
                @endif

                <!-- Dropdown button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                    </button>
                    <ul class="dropdown-menu">
                    @if($status <> 'canceled')
                        <li><a class="dropdown-item" href="#">{{ __('Créer une facture') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('Envoyer par email') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('Aperçu') }}</a></li>
                        @if($status == 'sent')
                        <li><a class="dropdown-item" href="#">{{ __('Annuler') }}</a></li>
                        @endif
                    @else
                        <li><a class="dropdown-item" href="#">{{ __('Définir sur devis') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('Aperçu') }}</a></li>
                    @endif
                    <!--<li><hr class="dropdown-divider"></li>-->
                    </ul>
                </div>
            </div>

            <div id="statusbar" class="k_statusbar_buttons_arrow d-flex align-items-center align-content-around ">

                <button type="button" class="btn btn-secondary-outline  k_arrow_button">
                    <span>
                        {{ __('Devis') }}
                    </span>
                </button>

                <button type="button" class="btn btn-secondary-outline  k_arrow_button">
                    <span>
                        {{ __('Envoyé') }}
                    </span>
                </button>

                <button type="button" class="btn btn-secondary-outline k_arrow_button {{ $status != 'canceled' ? 'current' : '' }}">
                    <span>
                        {{ __('Bon de commande') }}
                    </span>
                </button>

                @if($status == 'canceled')
                <button type="button" class="btn btn-danger-outline k_arrow_button {{ $status == 'canceled' ? 'current' : '' }}">
                    <span>
                        {{ __('Annulé') }}
                    </span>
                </button>
                @endif

            </div>
        </div>
        <form wire:submit.prevent="updateSale({{ $sale->id }})">
            @csrf
            <!-- Sheet Card -->
            <div class="k_form_sheet position-relative">
                <div class="row justify-content-between position-relative w-100 m-0 mb-2">

                    <!-- Sale's assets -->
                    <div class="k_horizontal_asset">
                        @if(count($invoices) >= 1)
                        <!-- Invoice -->
                        <div class="form-check k_radio_item">
                            <i class="k_button_icon bi bi-pencil-square"></i>
                            <a style="text-decoration: none;" wire:navigate href="{{ route('sales.invoices.show', ['subdomain' => current_company()->domain_name, 'sale' => $sale->id, 'invoice' => $sale->invoices()->first()->id]) }}">
                                <span class="k_horizontal_span">{{ __('Factures') }} (1)</span>
                            </a>
                        </div>
                        @endif
                    </div>

                    <!-- title-->
                    <div class="ke_title mw-75 pe-2 ps-0" id="new-title">

                        <!-- Name -->
                        <h1 class="d-flex flex-row align-items-center">
                            {{ $reference }}

                            <!-- Special buttons -->
                            <div class="btn-group">
                                <button type="button" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-gear-fill fa-xs"></i>
                                </button>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" wire:confirm="hello"><i class="bi bi-copy"></i>{{ __('Dupliquer') }}</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> {{ __('Supprimer') }}</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">{{ __('Générer un lien de paiement') }}</a></li>
                                <li><a class="dropdown-item" href="#">{{ __('Partager') }}</a></li>
                                <li><a class="dropdown-item" href="#">{{ __('Changer de client') }}</a></li>
                                </ul>
                            </div>
                            <div wire:dirty>
                                <button type="button" wire:click="updateSale({{ $sale->id }})" wire:target="updateSale({{ $sale->id }})" title="Sauvegarder les changements...."><i class="bi bi-cloud-arrow-up-fill fa-xs"></i></button>
                            </div>

                        </h1>
                    </div>

                    @if (session()->has('message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                <span>{{ session('message') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="row">
                    <!-- Left Side -->
                    <div class="k_inner_group col-md-6 col-lg-6">

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Customer -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Client') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <span class="cursor-pointer" style="font-weight: 500; color: rgb(9, 112, 140);" id="customer_0">{{ $customer_name }}</span>
                                @error('customer') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                    <!-- Right Side -->
                    <div class="k_inner_group col-md-6 col-lg-6">

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Date -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __("Date") }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <input type="date" wire:model="date" class="k_input" id="date_0">
                                @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Payment Terms -->
                            <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                <label class="k_form_label">
                                    {{ __("Modalités de paiement") }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <select wire:model="payment_term" class="k-autocomplete-input-0 k_input" id="company_id_0">
                                    <option value="immediate_payment">{{ __('Paiement Immédiat') }}</option>
                                    <option value="7_days">{{ __('7 Jours') }}</option>
                                    <option value="15_days">{{ __('15 Jours') }}</option>
                                    <option value="21_days">{{ __('21 Jours') }}</option>
                                    <option value="30_days">{{ __('30 Jours') }}</option>
                                    <option value="45_days">{{ __('45 Jours') }}</option>
                                    <option value="end_of_next_month">{{ __('Fin du mois suivant') }}</option>
                                </select>
                                @error('payment_term') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                </div>

                <div class="k_notebokk_headers">
                    <!-- Tab Link -->
                    <ul class="nav nav-tabs flex-row flex-nowrap" data-bs-toggle="tabs">
                        <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#order">{{ __('Commande') }}</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link d-none" data-bs-toggle="tab" href="#optional-product">{{ __('Produits Optionnel') }}</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#other">{{ __('Autres Informations') }}</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#summary">{{ __('Notes') }}</a>
                        </li>
                    </ul>
                </div>

                <!-- Tab Content -->

                    <!-- Order Table -->
                    <div class="tab-pane active show" id="order">
                        <!-- Order Table -->
                        <livewire:cart.product-cart :cartInstance="'sale'" :data="$sale"/>
                    </div>

                    <!-- Others Informations -->
                    <div class="tab-pane" id="other">
                        <div class="row align-items-start">

                            <!-- Left Side -->
                            <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        {{ __('Ventes') }}
                                    </div>
                                </div>

                                <!-- Sales Team -->
                                <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('Equipe commerciale') }} :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="k_cell k_wrap_input flex-grow-1">
                                    <select wire:model="sales_team" class="k_input" id="sales_team_1">
                                        @foreach ($sales_teams as $t)
                                        <option value="{{ $t->id }}" {{ $t->id == $sales_team ? 'selected' : '' }}>
                                            {{ $t->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('sales_team') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <!-- Seller -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('Commercial(e)') }} :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="k_cell k_wrap_input flex-grow-1">
                                    <select wire:model="seller" class="k_input" id="seller_1">
                                        <option value="{{ Auth::user()->id }}">
                                            {{ Auth::user()->name }}
                                        </option>
                                    </select>
                                    @error('seller') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <!-- Sales Team -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('Tags') }} :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="k_cell k_wrap_input flex-grow-1">
                                    <select wire:model="tags" class="k_input" id="tags_id_1">
                                        <option></option>
                                    </select>
                                    @error('tags') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>
                            <!-- Right Side -->
                            <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        {{ __('Livraison') }}
                                    </div>
                                </div>

                                <!-- Delivery policies -->
                                <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('Politique de livraison') }} :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="k_cell k_wrap_input flex-grow-1">
                                    <select wire:model="shipping_policy" class="k_input" id="seller_1">
                                        <option value="as_soon_as_possible">
                                            {{ __('Lorsque tous les produits sont prêts') }}
                                        </option>
                                        <option value="after_done">
                                            {{ __('Dès que possible') }}
                                        </option>
                                    </select>
                                    @error('shipping_policy') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <!-- Delivery date -->
                                <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('Date de livraison') }} :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="k_cell k_wrap_input flex-grow-1">
                                    <input wire:model="shipping_date" type="date" class="k_input" id="shipping_date_1" />
                                    @error('shipping_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- summary -->
                    <div class="tab-pane" id="summary">
                        <div class="row align-items-start">

                            <!-- Left Side -->
                            <div class="k_inner_group col-lg-12">
                                <!-- Description -->
                                <div class="text-break k_cell k_wrap_input ">
                                    <textarea wire:model="note" id="" cols="30" rows="10" class="k_input textearea" placeholder="Note interne">
                                        {!! $note !!}
                                    </textarea>
                                    @error('note') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>

                        </div>
                    </div>
            </div>
        </form>

        <livewire:sales::sale.invoice.set-invoice />
    </div>
</div>
