<div>
    <div class="k_form_sheet_bg">
        <!-- Notify -->
        <x-notify::notify />
        <form wire:submit.prevent="update({{ $team->id }})">
            @csrf
            <!-- Status bar -->
            <div class="k_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">

                <div id="statusbar" class="k_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">

                    <button type="button" wire:click="new()" id="top-button" class="btn btn-primary">
                        <span>
                            {{ __('Nouveau') }}
                        </span>
                    </button>

                    <button type="submit" wire:target="update({{ $team->id }})" id="top-button" class="btn btn-primary">
                        <span>
                            <i class="bi bi-cloud-arrow-up"></i>
                            {{ __('Enregistrer') }}
                        </span>
                    </button>

                    <!-- Dropdown button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                        </button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">{{ __('Nouveau') }}</a></li>
                        <li><a class="dropdown-item" href="#">{{ __('Enregistrer') }}</a></li>
                        <!--<li><hr class="dropdown-divider"></li>-->
                        </ul>
                    </div>
                </div>

            </div>
            <!-- Sheet Card -->
            <div class="k_form_sheet position-relative">
                <div class="row justify-content-between position-relative w-100 m-0 mb-2">

                    <!-- name-->
                    <div class="ke_title mw-75 pe-2 ps-0">
                        <!-- Name -->
                        <h1 class="d-flex flex-row align-items-center">
                            <input type="text"wire:model="name" class="k_input" id="name_k" placeholder="ex: Afrique Centrale">
                        </h1>

                    </div>

                    <!-- Right Side -->
                    <div class="k_inner_group col-lg-6">

                        <!-- separator -->
                        <div class="g-col-sm-2">
                            <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                {{ __("Détails de l'équipe") }}
                            </div>
                        </div>

                        <!-- Input Form Label -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                {{ __("Chef d'équipe") }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <select wire:model="leader" class="k-autocomplete-input k_input" id="leader_id_0">
                                <option value=""></option>
                                @foreach($leaders as $l)
                                    <option {{ $l->user->id == $leader ? 'selected' : '' }} value="{{ $l->user_id }}">{{ $l->user->name }}</option>
                                @endforeach
                            </select>
                            @error('leader') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Alias -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                {{ __('Alias de messagerie') }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <div class="row">
                                <input type="text" wire:model="alias" style="width: 50%;" class="k_input col-6">
                                <span class="col-6" style="width: 50%; margin: 0 0 12px 0;">{{ '@'.$domain_email }}</span>
                            </div>
                            @error('alias') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Invoice Target -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                {{ __('Objectif de facturation') }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <div class="row">
                                <input type="text" wire:model="invoice_target" style="width: 50%;" class="k_input col-6">
                                <span class="col-6" style="width: 50%; margin: 0 0 12px 0;">/ {{ __('Mois') }}</span>
                            </div>
                            @error('invoice_target') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>

                </div>

                <div class="k_notebokk_headers">
                    <!-- Tab Link -->
                    <ul class="nav nav-tabs flex-row flex-nowrap" data-bs-toggle="tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#members">{{ __('Membres') }}</a>
                        </li>
                    </ul>
                </div>
                <!-- Tab Content -->

                    <!-- Members -->
                    <div class="tab-pane active show" id="members">
                        <div class="k_kanban_view k_field_X2many">
                            <div class="k_x2m_control_panel d-empty-none mb-4">
                                <button class="btn btn-secondary">
                                    {{ __('Ajouter un membre') }}
                                </button>
                            </div>
                            <div class="k_kanban_renderer align-items-start d-flex flex-wrap justify-content-start">

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

            </div>
        </form>

    </div>
</div>
