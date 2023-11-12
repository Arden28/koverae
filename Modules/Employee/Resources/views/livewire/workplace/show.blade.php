<div>
    <div class="k_form_sheet_bg">
        <!-- Notify -->
        @include('notify::components.notify')

        <form wire:submit.prevent="update({{ $workplace->id }})">
            <!-- Status bar -->
            <div class="k_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">

                <div id="statusbar" class="k_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                    <button wire:click="newRecord()" wire:target="newRecord()" id="top-button" class="btn btn-secondary">
                        <span>
                            {{ __('Nouveau') }}
                        </span>
                    </button>

                    <button type="submit" id="top-button" class="btn btn-secondary">
                        <span wire:loading.remove wire:target="update({{ $workplace->id }})">
                            <i class="bi bi-cloud-arrow-up"></i>{{ __('Enregistrer') }}
                        </span>
                        <span wire:loading wire:target="update({{ $workplace->id }})">
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
                        <li><a class="dropdown-item" href="#">{{ __('Nouveau') }}</a></li>
                        <li><a wire:click="update({{ $workplace->id }})" class="dropdown-item">{{ __('Enregistrer') }}</a></li>
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

                        <!-- Workplace Title -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                {{ __('Lieu de travail') }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <input type="text" wire:model="title" class="k_input" id="workplace_0">
                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Icon -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                {{ __('Icon couverture') }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <input type="text" wire:model="icon" class="k_input" id="icon_0">
                            @error('icon') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>

                </div>
            </div>
        </form>

    </div>
</div>
