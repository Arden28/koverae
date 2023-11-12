<div>
    <!-- Notify -->
    @include('notify::components.notify')
    <div class="k_form_sheet_bg">
        <!-- Status bar -->
        <div class="k_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">

            <div id="statusbar" class="k_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">

                @if($status == 'draft')
                <button type="button" wire:click.prevent="confirm({{ $invoice->id }})" wire:target="confirm({{ $invoice->id }})" class="btn btn-primary primary">
                    <span>
                        {{ __('Confirmer') }}
                    </span>
                </button>

                <button type="button" wire:click="justSendQT()" id="top-button" class="btn btn-secondary">
                    <span>
                        {{ __('Aperçu') }}
                    </span>
                </button>

                <button type="button" wire:click.prevent="canceled({{ $invoice->id }})" wire:target="canceled({{ $invoice->id }})" id="top-button" class="btn btn-danger">
                    <span>
                        {{ __('Annuler') }}
                    </span>
                </button>
                @elseif($status == 'posted')

                <button type="button" id="top-button" class="btn btn-dark primary">
                    <span>
                        {{ __('Envoyer & Imprimer') }}
                    </span>
                </button>

                @include('sales::livewire.sale.invoice.partials.add-payment-button')

                <button type="button" id="top-button" class="btn btn-secondary">
                    <span>
                        {{ __('Aperçu') }}
                    </span>
                </button>

                <button type="button" id="top-button" class="btn btn-secondary">
                    <span>
                        {{ __('Avoir') }}
                    </span>
                </button>

                <button type="button" wire:click.prevent="draft({{ $invoice->id }})" wire:target="draft({{ $invoice->id }})" id="top-button" class="btn btn-secondary">
                    <span>
                        {{ __('Remettre en brouillon') }}
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

                <button type="button" class="btn btn-secondary-outline  k_arrow_button {{ $status == 'draft' ? 'current' : '' }}">
                    <span>
                        {{ __('Brouillon') }}
                    </span>
                </button>

                <button type="button" class="btn btn-secondary-outline  k_arrow_button {{ $status == 'posted' ? 'current' : '' }}">
                    <span>
                        {{ __('Comptabilisé') }}
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
        <form wire:submit.prevent="updateInvoice({{ $invoice->id }})">
            @csrf
            <!-- Sheet Card -->
            <div class="k_form_sheet position-relative">

                @include('sales::livewire.sale.invoice.partials.payment-status-ribbon')

                <div class="row justify-content-between position-relative w-100 m-0 mb-2">

                    <!-- Sale's assets -->
                    @if($invoice->sale_id)
                    <div class="k_horizontal_asset">
                        <!-- Invoice -->
                        <div class="form-check k_radio_item">
                            <i class="k_button_icon bi bi-pencil-square"></i>
                            <a style="text-decoration: none solid;" wire:navigate href="{{ route('sales.show', ['subdomain' => current_company()->domain_name, 'sale' => $invoice->sale_id]) }}">
                                <span class="k_horizontal_span">{{ __('Ventes') }} (1)</span>
                            </a>
                        </div>
                    </div>
                    @endif

                    <!-- title-->
                    <div class="ke_title mw-75 pe-2 ps-0" id="new-title">

                        <!-- Name -->
                        <h1 class="d-flex flex-row align-items-center">
                            @if($status == 'draft')
                                {{ __('Brouillon') }}
                            @else
                                {{ $reference }}
                            @endif

                            <!-- Special buttons -->
                            <div class="btn-group">
                                <button type="button" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-gear-fill fa-xs"></i>
                                </button>
                                <ul class="dropdown-menu">
                                {{-- <li><a class="dropdown-item" href="#"><i class="bi bi-copy"></i>{{ __('Dupliquer') }}</a></li> --}}
                                <li>
                                    <a class="dropdown-item"
                                    wire:click="delete({{ $invoice->id }})"
                                    wire:confirm.prompt="Are you sure you want to delete this post?"
                                 href="#"><i class="bi bi-trash"></i> {{ __('Supprimer') }}</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">{{ __('Générer un lien de paiement') }}</a></li>
                                <li><a class="dropdown-item" href="#">{{ __('Partager') }}</a></li>
                                <li><a class="dropdown-item" href="#">{{ __('Changer en Avoir / Facture') }}</a></li>
                                </ul>
                            </div>

                            <div wire:dirty>
                                <button type="button" wire:click="updateInvoice({{ $invoice->id }})" wire:target="updateInvoice({{ $invoice->id }})" title="Sauvegarder les changements...."><i class="bi bi-cloud-arrow-up-fill fa-xs"></i></button>
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
                                @if($status == 'draft')
                                <select wire:model="customer" class="k_input" id="customer_0">
                                    <option value=""></option>
                                    @foreach ($contacts as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                                @else
                                <span class="cursor-pointer" style="font-weight: 500; color: rgb(9, 112, 140);" id="customer_0">{{ $customer_name }}</span>
                                @endif
                                @error('customer') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                    <!-- Right Side -->
                    <div class="k_inner_group col-md-6 col-lg-6">

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Date -->
                            <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                <label class="k_form_label">
                                    {{ __("Date de facturation") }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                @if($status == 'draft')
                                <input type="datetime-local" wire:model="date" class="k_input" id="date_0">
                                @else
                                <span class="cursor-pointer" id="customer_0">{{ \Carbon\Carbon::parse($date)->format('d/m/Y H:i:s') }}</span>
                                @endif
                                @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Payment Reference -->
                            <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                <label class="k_form_label">
                                    {{ __("Référence du paiement") }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <input type="text" wire:model="payment_reference" class="k_input" id="payment_reference_0">
                                @error('payment_reference') <span class="text-danger">{{ $message }}</span> @enderror
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

                        @if(module('accounting'))
                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Date -->
                            <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                <label class="k_form_label">
                                    {{ __("Journal") }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                @if($status == 'draft')
                                <select wire:model="invoice_journal" class="k-autocomplete-input-0 k_input" id="invoice_journal_0">
                                    <option></option>
                                    @foreach ($journals as $j)
                                        <option value="{{ $j->id }}">{{ $j->name }}</option>
                                    @endforeach
                                </select>
                                @else
                                <span class="cursor-pointer" id="customer_0">{{ $journal_name }}</span>
                                @endif
                                @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        @endif


                    </div>
                </div>

                <div class="k_notebokk_headers">
                    <!-- Tab Link -->
                    <ul class="nav nav-tabs flex-row flex-nowrap" data-bs-toggle="tabs">
                        <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#order">{{ __('Ligne de facture') }}</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link d-none" data-bs-toggle="tab" href="#optional-product">{{ __('Produits Optionnel') }}</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#other">{{ __('Autres Informations') }}</a>
                        </li>
                    </ul>
                </div>

                <!-- Tab Content -->

                    <!-- Order Table -->
                    <div class="tab-pane active show" id="order">
                        <!-- Order Table -->
                        <livewire:cart.product-cart :cartInstance="'sale'" :data="$invoice" :status="$status"/>
                    </div>

                    <!-- Others Informations -->
                    <div class="tab-pane" id="other">
                        <div class="row align-items-start">

                            <!-- Left Side -->
                            <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        {{ __('Facture') }}
                                    </div>
                                </div>

                                <!-- Sales Team -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                        <label class="k_form_label">
                                            {{ __("Equipe commerciale") }} :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="sales_team" class="k_input" id="sales_team_1">
                                            <option></option>
                                            @foreach ($sales_teams as $t)
                                            <option value="{{ $t->id }}" :wire:key="$loop->index" {{ $sales_team == $t->id ? 'selected' : '' }}>
                                                {{ $t->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('sales_team') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <!-- Seller -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                        <label class="k_form_label">
                                            {{ __("Commercial(e)") }} :
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
                                </div>

                                <!-- Bank Account -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                        <label class="k_form_label">
                                            {{ __("Compte bancaire du destinataire") }} :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <input type="text" wire:model="bank_account_id" class="k_input" id="bank_account_id_0">
                                        @error('bank_account_id') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <!-- Date -->
                                    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                        <label class="k_form_label">
                                            {{ __("Date de livraison") }} :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <input type="date" wire:model="shipping_date" {{ $status == 'posted' ? 'disabled' : '' }} class="k_input" id="shipping_date_0">
                                        @error('shipping_date') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                            </div>
                            <!-- Right Side -->
                            {{-- <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        {{ __('Comptabilité') }}
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

                            </div> --}}

                        </div>
                    </div>

                    <!-- summary -->
                    {{-- <div class="tab-pane" id="summary">
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
                    </div> --}}
            </div>
        </form>

    </div>
    @include('sales::livewire.sale.invoice.includes.invoice-payment-modal')
</div>
