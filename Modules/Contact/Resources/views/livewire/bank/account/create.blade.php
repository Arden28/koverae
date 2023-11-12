<div>
    @section('title', __('Nouveau compte bancaire'))

    <div class="k_form_sheet_bg">
        <form wire:submit.prevent="storeBankAccount()">
            <!-- Status bar -->
            <div class="k_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">

                <div id="statusbar" class="k_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                    <button type="button" id="top-button" class="btn btn-secondary">
                        <span>
                            {{ __('Nouveau') }}
                        </span>
                    </button>

                    <button type="submit" id="top-button" class="btn btn-secondary">
                        <span wire:loading.remove wire:target="storeBankAccount()">
                            <i class="bi bi-cloud-arrow-up"></i>{{ __('Enregistrer') }}
                        </span>
                        <span wire:loading wire:target="storeBankAccount()">
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
                                    {{ __("Numéro de compte") }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-grow-1">
                                <input type="text" wire:model="account_number" class="k_input" id="account_number_0">
                                @error('account_number') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Bank ID -->
                            <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Banque') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-grow-1">
                                <select class="k-autocomplete-input-0 k_input" wire:model="bank" id="bag_id_0">
                                    <option value=""></option>
                                    @foreach($banks as $b)
                                        <option {{ $b->id == $bank ? 'selected' : '' }} value="{{ $b->id }}">{{ $b->name }}</option>
                                    @endforeach
                                </select>
                                @error('bank') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- BIC / SWIFT -->
                            <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                <label class="k_form_label">
                                    {{ __("Nom du titulaire du compte") }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-grow-1">
                                <input type="text" wire:model="account_holder_name" class="k_input" id="account_holder_name_0">
                                @error('account_holder_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Holder ID -->
                            <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Titulaire du compte') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-grow-1">
                                <select class="k-autocomplete-input-0 k_input" wire:model="account_holder" id="account_holder_id_0">
                                    <option value=""></option>
                                    @foreach($contacts as $h)
                                        <option {{ $h->id == $account_holder ? 'selected' : '' }} value="{{ $h->id }}">{{ $h->name }}</option>
                                    @endforeach
                                </select>
                                @error('account_holder') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>


                    </div>

                    <!-- Right Side -->
                    {{-- <div class="k_inner_group col-md-6 col-lg-6">

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Email -->
                            <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                <label class="k_form_label">
                                    {{ __("Effectuer des transactions") }}
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-grow-1">
                                <input type="email" wire:model="email" placeholder="ex: example@votrebanque.cg" class="k_input" id="email_0">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div> --}}

                </div>
            </div>
        </form>

    </div>
</div>
