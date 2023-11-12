<div>
    <div class="k_form_sheet_bg">
        <form wire:submit.prevent="store()">
            <!-- Status bar -->
            <div class="k_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">

                <div id="statusbar" class="k_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                    <button type="button" id="top-button" class="btn btn-secondary">
                        <span>
                            {{ __('Nouveau') }}
                        </span>
                    </button>

                    <button type="submit" id="top-button" class="btn btn-secondary">
                        <span wire:loading.remove wire:target="store()">
                            <i class="bi bi-cloud-arrow-up"></i>{{ __('Enregistrer') }}
                        </span>
                        <span wire:loading wire:target="store()">
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

                        <!-- Department Title -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                {{ __('Nom du département') }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <input type="text" wire:model="name" class="k_input" id="department_0">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Manager -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                {{ __('Manager') }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <select class="k-autocomplete-input-0 k_input" wire:model="manager" id="user_id_0">
                                <option value=""></option>
                                @foreach($employees as $e)
                                    <option {{ $e->id == $manager ? 'selected' : '' }} value="{{ $e->id }}">{{ $e->user->name }}</option>
                                @endforeach
                            </select>
                            @error('manager') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Parent ID -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                {{ __('Département parent') }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <select class="k-autocomplete-input-0 k_input" wire:model="parent" id="department_id_0">
                                <option value=""></option>
                                @foreach($departments as $d)
                                    <option {{ $d->id == $parent ? 'selected' : '' }} value="{{ $d->id }}">{{ $d->name }}</option>
                                @endforeach
                            </select>
                            @error('parent') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Society -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                {{ __('Entreprise') }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <select class="k-autocomplete-input-0 k_input" wire:model="company" id="company_id_0">
                                <option value=""></option>
                                <option value="{{ current_company()->id }}">{{ current_company()->name }}</option>
                            </select>
                            @error('company') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>

                </div>
            </div>
        </form>

    </div>
</div>
