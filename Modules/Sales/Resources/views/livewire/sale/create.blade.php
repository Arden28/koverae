<div>
    @section('title', __('translator::sales.form.sale.page-title-new'))

    <!-- Notify -->
    @include('notify::components.notify')
    <form wire:submit.prevent="storeSale()">
        @csrf
        <!-- Status bar -->
        <div class="pb-2 mb-0 k_form_statusbar position-relative d-flex justify-content-between mb-md-2 pb-md-0">

            <div id="statusbar" class="flex-wrap gap-1 k_statusbar_buttons d-flex align-items-center align-content-around">

                <button type="button"  class="btn btn-primary primary">
                    <span>
                        {{ __('Créer une facture') }}
                    </span>
                </button>

                <button type="button" id="top-button" class="btn btn-secondary">
                    <span>
                        {{ __('Envoyer par email') }}
                    </span>
                </button>

                <button type="button" id="top-button" class="btn btn-secondary">
                    <span>
                        {{ __('Aperçu') }}
                    </span>
                </button>

                <button type="submit" id="top-button" class="btn btn-danger">
                    <span>
                        {{ __('Annuler') }}
                    </span>
                </button>

                <!-- Dropdown button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">{{ __('Créer une facture') }}</a></li>
                    <li><a class="dropdown-item" href="#">{{ __('Envoyé pa email') }}</a></li>
                    <li><a class="dropdown-item" href="#">{{ __('Aperçu') }}</a></li>
                    <li><a class="dropdown-item" href="#">{{ __('Annuler') }}</a></li>
                    <!--<li><hr class="dropdown-divider"></li>-->
                    </ul>
                </div>
            </div>

            <div id="statusbar" class="k_statusbar_buttons_arrow d-flex align-items-center align-content-around ">

                <button type="button" class="btn btn-secondary-outline  k_arrow_button {{ $status == 'quotation' ? 'current' : '' }}">
                    <span>
                        {{ __('Devis') }}
                    </span>
                </button>

                <button type="button" class="btn btn-secondary-outline  k_arrow_button {{ $status == 'sent' ? 'current' : '' }}">
                    <span>
                        {{ __('Envoyé') }}
                    </span>
                </button>

                <button type="button" class="btn btn-secondary-outline k_arrow_button {{ $status == 'sale_order' ? 'current' : '' }}">
                    <span>
                        {{ __('Bon de commande') }}
                    </span>
                </button>

            </div>
        </div>
        <!-- Sheet Card -->
        <div class="k_form_sheet_bg position-relative">
            <div class="m-0 mb-2 row justify-content-between position-relative w-100">
                <!-- title-->
                <div class="ke_title mw-75 pe-2 ps-0" id="new-title">
                    <!-- Name -->
                    <h1 class="flex-row d-flex align-items-center">
                        {{__('Nouvelle vente')}}
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

                    <!-- Customer -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __('Client') }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                        <input type="text" wire:model="customer" class="k_input" placeholder="{{ __('Tapez le nom du client') }}">
                        @error('customer') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                </div>
                <!-- Right Side -->
                <div class="k_inner_group col-md-6 col-lg-6">

                    <!-- Date -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __("Date") }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                        <input type="date" wire:model.lazy="date" class="k_input" id="date_0" value="{{ now()->format('d-m-Y') }}">
                        @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Expiration Date -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __("Date d'expiration") }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                        <input type="date" wire:model="expected_date" class="k_input" id="expected_date_0">
                        @error('expected_date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Payment Terms -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __("Modalités de paiement") }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                        <select wire:model="payment_term" class="k-autocomplete-input-0 k_input" id="company_id_0">
                            <option value="immediate_payment">{{ __('Paiement Immédiat') }}</option>
                            <option value="7_days">{{ __('7 Jours') }}</option>
                            <option value="15_days">{{ __('15 Jours') }}</option>
                            <option value="21_days">{{ __('21 Jours') }}</option>
                            <option value="30_days">{{ __('30 Jours') }}</option>
                            <option value="15_days">{{ __('45 Jours') }}</option>
                            <option value="end_of_next_month">{{ __('Fin du mois suivant') }}</option>
                        </select>
                        @error('payment_term') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                </div>
            </div>

            <div class="k_notebokk_headers">
                <!-- Tab Link -->
                <ul class="flex-row nav nav-tabs flex-nowrap" data-bs-toggle="tabs">
                    <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#order">{{ __('Commande') }}</a>
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
                    <livewire:cart.product-cart :cartInstance="'sale'"/>
                </div>

                <!-- Others Informations -->
                <div class="tab-pane" id="other">
                    <div class="row align-items-start">

                        <!-- Left Side -->
                        <div class="k_inner_group col-lg-6">
                            <!-- separator -->
                            <div class="g-col-sm-2">
                                <div class="mt-4 mb-3 k_horizontal_separator text-uppercase fw-bolder small">
                                    {{ __('Ventes') }}
                                </div>
                            </div>

                            <!-- Seller -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Commercial(e)') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
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
                                    {{ __('Equipe commerciale') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <select wire:model="sales_team" class="k_input" id="sales_team_1">
                                    <option value="sales">
                                        {{ __('Ventes') }}
                                    </option>
                                </select>
                                @error('sales_team') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Sales Team -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Tags') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
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
                                <div class="mt-4 mb-3 k_horizontal_separator text-uppercase fw-bolder small">
                                    {{ __('Livraison') }}
                                </div>
                            </div>

                            <!-- Delivery policies -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Politique de livraison') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
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
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Date de livraison') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input wire:model="shipping_date" type="date" class="k_input" id="shipping_date_1" />
                                @error('shipping_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>

                        <!-- Right Side -->
                        <div class="k_inner_group col-lg-6">
                            <!-- separator -->
                            <div class="g-col-sm-2">
                                <div class="mt-4 mb-3 k_horizontal_separator text-uppercase fw-bolder small">
                                    {{ __('Tracking') }}
                                </div>
                            </div>

                            <!-- Opportunities -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Opportunité') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input wire:model="opportunities" class="k_input" id="seller_1">
                                @error('opportunities') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Campaign -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Campagne') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input wire:model="campaign" class="k_input" id="campaign_1" />
                                @error('campaign') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Moyen -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Moyen') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <select wire:model="delivery_mode" class="k_input" id="delivery_mode_1" >
                                    <option value=""></option>
                                    <option value="banner">{{ __('Bannière') }}</option>
                                    <option value="email">{{ __('Email') }}</option>
                                    <option value="facebook">{{ __('Facebook') }}</option>
                                    <option value="google">{{ __('Google') }}</option>
                                    <option value="linkedin">{{ __('LinkedIn') }}</option>
                                    <option value="television">{{ __('Télévision') }}</option>
                                    <option value="x">{{ __('X') }}</option>
                                    <option value="phone">{{ __('Téléphone') }}</option>
                                    <option value="website">{{ __('Site web') }}</option>
                                </select>
                                @error('delivery_mode') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Source -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Source') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <select wire:model="source" class="k_input" id="source_1" >
                                    <option value=""></option>
                                    <option value="lead_recall">{{ __('Lead Recall') }}</option>
                                    <option value="search_engine">{{ __('Search engine') }}</option>
                                    <option value="newsletter">{{ __('Newsletter') }}</option>
                                    <option value="sms">{{ __('SMS') }}</option>
                                    <option value="whatsapp">{{ __('WhatsApp') }}</option>
                                    <option value="television">{{ __('Télévision') }}</option>
                                    <option value="x">{{ __('X') }}</option>
                                    <option value="facebook">{{ __('Facebook') }}</option>
                                    <option value="linkedin">{{ __('LinkedIn') }}</option>
                                    <option value="instagram">{{ __('Instagram') }}</option>
                                    <option value="website">{{ __('Site web') }}</option>
                                </select>
                                @error('source') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>
                    </div>
                </div>
        </div>
    </form>
</div>
