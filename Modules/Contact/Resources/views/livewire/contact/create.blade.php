<div>
    @section('title', $name ?? __('Nouveau Contact'))

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:contact::navbar.control-panel.contact-form-panel />
    @endsection

    <div class="k_form_sheet_bg">
        <!-- Notify -->
        @include('notify::components.notify')
        <form wire:submit.prevent="storeContact()">
            @csrf
            <!-- Status bar -->
            <div class="k_form_statbar position-relative d-flex justify-content-between align-items-center mb-0 mb-md-2 pb-2 pb-md-0">

                <div id="statusbar" class="k_statsbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">

                    @if(module('crm'))
                    <button type="button" id="opportunity" class="btn ke_stat_button btn-outline-secondary flex-grow-1 flex-lg-grow-0">
                        <i class="k_button_icon bi bi-star-fill"></i>
                        <div class="div">
                            <span class="k_stat_text">
                                {{ __('Opportunités') }}
                            </span>
                            <span class="k_stat_info">
                                0
                            </span>
                        </div>
                    </button>
                    @endif

                    @if(module('sales'))
                    <button type="button" id="sale" class="btn ke_stat_button btn-outline-secondary flex-grow-1 flex-lg-grow-0">
                        <i class="k_button_icon bi bi-currency-dollar"></i>
                        <div class="div">
                            <span class="k_stat_text">
                                {{ __('Ventes') }}
                            </span>
                            <span class="k_stat_info">
                                0
                            </span>
                        </div>
                    </button>
                    @endif

                    @if(module('purchase') || module('inventory'))
                    <button type="button" id="purchase" class="btn ke_stat_button btn-outline-secondary flex-grow-1 flex-lg-grow-0">
                        <i class="k_button_icon bi bi-credit-card-fill"></i>
                        <div class="div">
                            <span class="k_stat_text">
                                {{ __('Achats') }}
                            </span>
                            <span class="k_stat_info">
                                0
                            </span>
                        </div>
                    </button>
                    @endif

                    @if(module('employee'))
                    <button type="button" id="employee" class="btn ke_stat_button employee btn-outline-secondary flex-grow-1 flex-lg-grow-0">
                        <i class="k_button_icon bi bi-person-fill"></i>
                        <div class="div">
                            <span class="k_stat_text">
                                {{ __('Employé') }}
                            </span>
                            <span class="k_stat_info">
                                0
                            </span>
                        </div>
                    </button>
                    @endif

                    <!-- Dropdown button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                        </button>
                        <ul class="dropdown-menu">

                        @if(module('employee'))
                        <li class="dropdown-item ke_stat_button btn-outline-light list flex-grow-1 flex-lg-grow-0 employee d-none" href="#">
                            <i class="k_button_icon bi bi-credit-person-fill"></i>
                            <div class="div">
                                <span class="k_stat_text">
                                    {{ __('Employé') }}
                                </span>
                                <span class="k_stat_info">
                                        0
                                </span>
                            </div>
                        </li>
                        @endif

                        @if(module('purchase') || module('inventory'))
                        <li class="dropdown-item ke_stat_button btn-outline-light list flex-grow-1 flex-lg-grow-0 purchase d-none" href="#">
                            <i class="k_button_icon bi bi-credit-card-fill"></i>
                            <div class="div">
                                <span class="k_stat_text">
                                    {{ __('Achat') }}
                                </span>
                                <span class="k_stat_info">
                                        0
                                </span>
                            </div>
                        </li>
                        @endif

                        @if(module('purchase'))
                        <li class="dropdown-item ke_stat_button btn-outline-light list flex-grow-1 flex-lg-grow-0" href="#">
                            <i class="k_button_icon bi bi-truck"></i>
                            <div class="div">
                                <span class="k_stat_text">
                                    {{ __('Taux de ponctualité') }}
                                </span>
                                <span class="k_stat_info">
                                    0
                                </span>
                            </div>
                        </li>
                        @endif
                        <li class="dropdown-item ke_stat_button btn-outline-light list flex-grow-1 flex-lg-grow-0" href="#">
                            <i class="k_button_icon bi bi-list-task"></i>
                            <div class="div">
                                <span class="k_stat_text">
                                    {{ __('Dette') }}
                                </span>
                                <span class="k_stat_info">
                                    0
                                </span>
                            </div>
                        </li>
                        <li class="dropdown-item ke_stat_button btn-outline-light list flex-grow-1 flex-lg-grow-0" href="#">
                            <i class="k_button_icon bi bi-pencil-square"></i>
                            <div class="div">
                                <span class="k_stat_text">
                                    {{ __('Facturé') }}
                                </span>
                                <span class="k_stat_info">
                                    0
                                </span>
                            </div>
                        </li>
                        <li class="dropdown-item ke_stat_button btn-outline-light list flex-grow-1 flex-lg-grow-0" href="#">
                            <i class="k_button_icon bi bi-pencil-square"></i>
                            <div class="div">
                                <span class="k_stat_text">
                                    {{ __('Factures Fournisseur') }}
                                </span>
                                <span class="k_stat_info">
                                    0
                                </span>
                            </div>
                        </li>
                        <!--<li><hr class="dropdown-divider"></li>-->
                        </ul>
                    </div>
                </div>

            </div>
            <!-- Sheet Card -->
            <div class="k_form_sheet position-relative">
                <div class="row justify-content-between position-relative w-100 m-0 mb-2">
                    <!-- title-->
                    <div class="ke_title mw-75 pe-2 ps-0">
                        <!-- Indiviaul Or Company -->
                        <div class="k_horizontal">
                            <div class="form-check k_radio_item">
                                <input type="radio" class="form-check-input k_radio_input" value="1" wire:model="is_company" id="enterprise" wire:click="$set('is_company', true)" />
                                <label class="form-check-label k_form_label" for="enterprise">
                                    {{ __('Entreprise') }}
                                </label>
                            </div>
                            <div class="form-check k_radio_item">
                                <input type="radio" class="form-check-input k_radio_input" value="0" wire:model="is_company" id="individual" wire:click="$set('is_company', false)" />
                                <label class="form-check-label k_form_label" for="individual">
                                    {{ __('Particulier') }}
                                </label>
                            </div>
                            <div class="form-check k_radio_item" wire:dirty>
                                <button type="submit" wire:target="storeContact()" title="Sauvegarder les changements...."><i class="bi bi-cloud-arrow-up-fill fa-xs" style="font-size: 19px;"></i></button>
                            </div>

                        </div>
                        <!-- Name -->
                        <h1 class="d-flex flex-row align-items-center">
                            <input type="text"wire:model="name" class="k_input" id="name_k" placeholder="ex: MASSAMBA Judie Brelle">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </h1>
                        <!-- Job Title -->
                        @if(!$is_company)
                            <h2 wire:transition>
                                <input type="text" wire:model="company_name" class="k_input" id="company_name" placeholder="{{ __("Nom de l'entreprise") }}">
                            </h2>
                        @endif

                    </div>
                    <!-- Employee Avatar -->
                    <div class="k_employee_avatar m-0 p-0">
                        <!-- Image Uploader -->
                        <img src="{{ asset('assets/images/people/default_avatar.png') }}" alt="" class="img img-fluid">
                        <!-- <small class="k_button_icon">
                            <i class="bi bi-circle text-success align-middle"></i>
                        </small>-->
                        <!-- Image selector -->
                        <div class="select-file d-flex position-absolute justify-content-between w100 bottom-0">
                            <button class="k_select_file_button btn btn-light border-0 rounded-circle m-1 p-1">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="k_select_file_button btn btn-light border-0 rounded-circle m-1 p-1">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <!-- Left Side -->
                    <div class="k_inner_group col-md-6 col-lg-6">
                        <!-- Adresse -->
                        <div class="k_address_format">
                            <div class="row">
                                <div class="col-12" style="margin-bottom: 10px;">
                                    <input type="text" wire:model="street" id="street" class="k_input" placeholder="Rue 1....">
                                    @error('street') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-12" style="margin-bottom: 10px;">
                                    <input type="text" wire:model="street2" id="street2_0" class="k_input" placeholder="Rue 2......">
                                    @error('street2') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                                    <input type="text" wire:model="city" id="city_0" class="k_input" placeholder="Ville">
                                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                                    <select wire:model="state" class="k_input" id="state_id_0">
                                        <option value="">{{ __('Département') }}</option>
                                    </select>
                                    @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                                    <input type="text" wire:model="zip" id="zip_0" class="k_input" placeholder="Code postal">
                                    @error('zip') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-12" style="margin-bottom: 10px;">
                                    <select wire:model="country" class="k_input" id="country_id_0">
                                        <option value="">{{ __('Pays') }}</option>
                                    </select>
                                    @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>

                        </div>

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('ID Taxe') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <input type="text" wire:model="tax_id" class="k_input" id="tax_id_0" >
                                @error('tax_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Right Side -->
                    <div class="k_inner_group col-md-6 col-lg-6">

                        @if(!$is_company)
                        <div class="d-flex" wire:transition style="margin-bottom: 8px;">
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Profession') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <input type="text" wire:model="job" class="k_input" id="job_0" placeholder="ex: Directeur Commercial">
                                @error('job') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        @endif

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Téléphone') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <input type="tel" wire:model="phone" class="k_input" id="mobile_phone_0" placeholder="ex: +242069481592">
                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Mobile') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <input type="tel" wire:model="mobile" class="k_input" id="work_phone_0" placeholder="ex: +242069481592">
                                @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Email') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <input type="email" wire:model="email" class="k_input" id="work_email_0" placeholder="ex: nom@example.com">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Site internet') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <input type="text" wire:model="website" class="k_input" id="website_0" placeholder="ex: https://www.koverae.com">
                                @error('website') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        @if(!$is_company)
                        <div class="d-flex" wire:transition style="margin-bottom: 8px;">
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Titre') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                {{-- <input type="text" wire:model="title" class="k-autocomplete-input k_input" id="title_0" />
                                <datalist id="title_0">
                                  <option label='label1' value='value1'>
                                  <option label='label2' value='value2'>
                               </datalist> --}}
                                <select wire:model="title" class="k-autocomplete-input k_input select2" id="company_id_0">
                                    <option value=""></option>
                                </select>
                                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        @endif

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Tags') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <select wire:model="tags" class="k-autocomplete-input-0 k_input" id="company_id_0">
                                    <option value=""></option>
                                </select>
                                @error('tags') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                </div>

                <div class="k_notebokk_headers">
                    <!-- Tab Link -->
                    <ul class="nav nav-tabs flex-row flex-nowrap" data-bs-toggle="tabs">
                        <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#contacts">{{ __('Adresses & Contacts') }}</a>
                        </li>
                        @if(module('accounting'))
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#accounting">{{ __('Comptabilité') }}</a>
                            </li>
                        @endif
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#sale-purchase">{{ __('Ventes & Achats') }}</a>
                        </li>
                        @if($is_company)
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#fiscal">{{ __('Informations Fiscales') }}</a>
                        </li>
                        @endif
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#note">{{ __('Note interne') }}</a>
                        </li>
                    </ul>
                </div>
                <!-- Tab Content -->

                    <!-- Contacts -->
                    <div class="tab-pane active show" id="contacts">
                        <div class="k_kanban_view k_field_X2many">
                            <div class="k_x2m_control_panel d-empty-none mb-4">
                                <button class="btn btn-secondary">
                                    {{ __('Ajouter') }}
                                </button>
                            </div>
                            <div class="k_kanban_renderer align-items-start d-flex flex-wrap justify-content-start">

                                <div class="k_kanban_card">
                                    <!-- Content -->
                                    <div class="k_kanban_card_content">
                                        <img class="k_kanban_image k_image_62_cover" src="{{ asset('assets/images/people/default_avatar.png') }}">
                                        <div class="k_kanban_details">
                                            <strong class="k_kanban_record_title">
                                                <span>Arden BOUET</span>
                                            </strong>
                                            <div class="d-flex align-items-baseline text-break">
                                                <i class="bi bi-envelope"></i>
                                                <span>laudbouetoumoussa@koverae.com</span>
                                            </div>
                                            <div class="d-flex align-items-baseline text-break">
                                                <i class="bi bi-phone"></i>
                                                <span>+242064074926</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="k_kanban_card">
                                    <!-- Content -->
                                    <div class="k_kanban_card_content">
                                        <img class="k_kanban_image k_image_62_cover" src="{{ asset('assets/images/apps/default.png') }}">
                                        <div class="k_kanban_details">
                                            <strong class="k_kanban_record_title">
                                                <span>Arden BOUET</span>
                                            </strong>
                                            <div class="d-flex align-items-baseline text-break">
                                                <i class="bi bi-envelope"></i>
                                                <span>laudbouetoumoussa@koverae.com</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- accounting -->
                    <div class="tab-pane" id="accounting">
                        <div class="row align-items-start">

                            <!-- Left Side -->
                            <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        {{ __('Comptes Bancaires') }}
                                    </div>
                                </div>
                                <div class="table-responsive" style="margin-top: 10px;">
                                    <table class="table card-table table-vcenter text-nowrap datatable">
                                        <thead>
                                            <tr>
                                                <th><button class="table-sort" data-sort="sort-name">{{ __('Numéro de compte') }}</button></th>
                                                <th><button class="table-sort" data-sort="sort-name">{{ __('Banque') }}</button></th>
                                                <th><button class="table-sort" data-sort="sort-name">{{ __("Envoie d'argent") }}</button></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><span><i class="bi bi-plus-circle"></i> {{ __('Ajouter') }}</span></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td> <span style="color: white;">New</span> </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- Right Side -->
                            <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        {{ __('Ecritures Comptables') }}
                                    </div>
                                </div>

                                <!-- Customer -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            {{ __('Compte Client') }} :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="account_receivable" class="k_input" id="account_receivable_1">*
                                            <option value=""></option>
                                        </select>
                                        @error('account_receivable') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <!-- Supplier -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            {{ __('Compte Fournisseur') }} :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="account_payable" class="k_input" id="account_payable_1">*
                                            <option value=""></option>
                                        </select>
                                        @error('account_payable') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <!-- Sale Purchase -->
                    <div class="tab-pane" id="sale-purchase">
                        <div class="row align-items-start">

                            <!-- Left Side -->
                            <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        {{ __('Ventes') }}
                                    </div>
                                </div>

                                <!-- Employee Type -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            {{ __('Commercial') }} :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="seller" class="k_input" id="seller_1">*
                                            <option value=""></option>
                                        </select>
                                        @error('seller') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <!-- Payment Terms -->
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            {{ __("Modalités de paiement") }} :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="text-break k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="sale_payment_term" class="k-autocomplete-input-0 k_input" id="company_id_0">
                                            <option value="immediate_payment">{{ __('Paiement Immédiat') }}</option>
                                            <option value="7_days">{{ __('7 Jours') }}</option>
                                            <option value="15_days">{{ __('15 Jours') }}</option>
                                            <option value="21_days">{{ __('21 Jours') }}</option>
                                            <option value="30_days">{{ __('30 Jours') }}</option>
                                            <option value="45_days">{{ __('45 Jours') }}</option>
                                            <option value="end_of_next_month">{{ __('Fin du mois suivant') }}</option>
                                        </select>
                                        @error('sale_payment_term') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                            </div>
                            <!-- Right Side -->
                            <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        {{ __('Achats') }}
                                    </div>
                                </div>

                                <!-- Buyer -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            {{ __('Acheteur') }} :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="buyer" class="k_input" id="buyer_1">*
                                            <option value=""></option>
                                        </select>
                                        @error('buyer') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <!-- Payment Terms -->
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            {{ __("Modalités de paiement") }} :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="text-break k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="purchase_payment_term" class="k-autocomplete-input-0 k_input" id="company_id_0">
                                            <option value="immediate_payment">{{ __('Paiement Immédiat') }}</option>
                                            <option value="7_days">{{ __('7 Jours') }}</option>
                                            <option value="15_days">{{ __('15 Jours') }}</option>
                                            <option value="21_days">{{ __('21 Jours') }}</option>
                                            <option value="30_days">{{ __('30 Jours') }}</option>
                                            <option value="45_days">{{ __('45 Jours') }}</option>
                                            <option value="end_of_next_month">{{ __('Fin du mois suivant') }}</option>
                                        </select>
                                        @error('purchase_payment_term') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- fiscal info -->
                    <div class="tab-pane" id="fiscal">

                    </div>

                    <!-- note -->
                    <div class="tab-pane" id="note">
                        <!-- Description -->
                        <div class="text-break k_cell k_wrap_input ">
                            <textarea wire:model="note" id="" cols="30" rows="30" class="k_input textearea text-word-break" placeholder="Note interne"></textarea>
                            @error('note') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

            </div>
        </form>

    </div>
</div>
