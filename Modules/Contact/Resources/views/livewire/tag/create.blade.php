<div>
    @section('title', __('Nouvelle étiquette'))

    <div class="k_form_sheet_bg">
        <form wire:submit.prevent="storeTag()">
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

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Department Title -->
                            <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                <label class="k_form_label">
                                    {{ __("Nom") }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-grow-1">
                                <input type="text" wire:model="name" class="k_input" id="name_0">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Color -->
                            <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Couleur') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-1">
                                <input type="color" wire:model="color" class="k_input" id="color_0">
                                @error('color') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Parent ID -->
                            <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Etiquette parent') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-grow-1">
                                <select class="k-autocomplete-input-0 k_input" wire:model="parent" id="tag_id_0">
                                    <option value=""></option>
                                    @foreach($tags as $t)
                                        <option {{ $t->id == $parent ? 'selected' : '' }} value="{{ $t->id }}">{{ $t->name }}</option>
                                    @endforeach
                                </select>
                                @error('parent') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </form>

    </div>
</div>
