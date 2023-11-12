<div>
    @section('title', __('Nouvelle Banque'))

    <div class="k_form_sheet_bg">
        <form wire:submit.prevent="storeBank()">
            <!-- Status bar -->
            <div class="k_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">

                <div id="statusbar" class="k_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                    <button type="button" id="top-button" class="btn btn-secondary">
                        <span>
                            {{ __('Nouveau') }}
                        </span>
                    </button>

                    <button type="submit" id="top-button" class="btn btn-secondary">
                        <span wire:loading.remove wire:target="storeBank()">
                            <i class="bi bi-cloud-arrow-up"></i>{{ __('Enregistrer') }}
                        </span>
                        <span wire:loading wire:target="storeBank()">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only"></span>
                            </div>
                        </span>
                    </button>


                    <!-- Dropdown button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                        </button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{ __('Demande de signature') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('plan de lancement') }}</a></li>
                        <!--<li><hr class="dropdown-divider"></li>-->
                        </ul>
                    </div>
                </div>

            </div>
            <!-- Sheet Card -->
            <div class="k_form_sheet position-relative">
                <div class="row align-items-start position-relative w-100 m-0 mb-2">
                    <!-- Left Side -->
                    <div class="k_inner_group col-md-6 col-lg-6">

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Department Title -->
                            <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                <label class="k_form_label">
                                    {{ __("Nom de la Banque") }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-grow-1">
                                <input type="text" wire:model="name" class="k_input" id="name_0">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- BIC / SWIFT -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-grow-1 text-break text-900">
                                <label class="k_form_label">
                                    {{ __("Code d'identification bancaire") }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-grow-1">
                                <input type="text" wire:model="bic" class="k_input" id="bic_0">
                                @error('bic') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
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


                    </div>

                    <!-- Right Side -->
                    <div class="k_inner_group col-md-6 col-lg-6">

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Email -->
                            <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                <label class="k_form_label">
                                    {{ __("Email") }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-grow-1">
                                <input type="email" wire:model="email" placeholder="ex: example@votrebanque.cg" class="k_input" id="email_0">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                            <div class="d-flex" style="margin-bottom: 8px;">
                                <!-- Tel -->
                                <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                    <label class="k_form_label">
                                        {{ __("Numéro de Téléphone") }} :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-grow-1">
                                    <input type="tel" wire:model="phone" placeholder="ex: +242069481592" class="k_input" id="phone_0">
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="d-flex" style="margin-bottom: 8px;">
                                <!-- Email -->
                                <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                    <label class="k_form_label">
                                        {{ __("Site internet") }} :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-grow-1">
                                    <input type="text" wire:model="website" placeholder="ex: https://www.votrebanque.cg" class="k_input" id="website_0">
                                    @error('website') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
