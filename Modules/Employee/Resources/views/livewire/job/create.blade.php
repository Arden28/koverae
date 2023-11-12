<div>
    @include('notify::components.notify')
    <div class="k_form_sheet_bg">
        <!-- Notify -->
        <form wire:submit.prevent="storeJob()">
            @csrf
            <!-- Status bar -->
            <div class="k_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">

                <div id="statusbar" class="k_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">

                    <button type="button" wire:click="new()" id="top-button" class="btn btn-primary">
                        <span>
                            {{ __('Nouveau') }}
                        </span>
                    </button>

                    <button type="submit" wire:target="storeJob()" id="top-button" class="btn btn-primary">
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

                    <!-- title-->
                <div class="ke_title mw-75 pe-2 ps-0">
                    <!-- Name -->
                    <h1 class="d-flex flex-row align-items-center">
                        <input type="text"wire:model="title" class="k_input" id="name_k" placeholder="ex: Directeur commercial">
                    </h1>

                </div>

                </div>

                <div class="k_notebokk_headers">
                    <!-- Tab Link -->
                    <ul class="nav nav-tabs flex-row flex-nowrap" data-bs-toggle="tabs">
                        <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#recruitment">{{ __('Recrutement') }}</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#summary">{{ __('Description') }}</a>
                        </li>
                    </ul>
                </div>
                <!-- Tab Content -->

                    <!-- Professionnal -->
                    <div class="tab-pane active show" id="recruitment">
                        <div class="row">

                            <div class="row align-items-start">

                                <!-- Right Side -->
                                <div class="k_inner_group col-lg-6">

                                    <!-- separator -->
                                    <div class="g-col-sm-2">
                                        <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                            {{ __('Recrutement') }}
                                        </div>
                                    </div>

                                    <!-- Input Form Label -->
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            {{ __('Département') }} :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                        <select wire:model="department" class="k-autocomplete-input k_input" id="department_id_0">
                                            <option value=""></option>
                                            @foreach($departments as $d)
                                                <option value="{{ $d->id }}">{{ $d->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('department') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- JobType -->
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            {{ __('Type de poste') }} :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                        <select wire:model="job_type" class="k-autocomplete-input k_input" id="job_id_0">
                                            <option value=""></option>
                                            @foreach($job_types as $j)
                                                <option value="{{ $j->id }}">{{ $j->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('job_type') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                </div>

                                <!-- Left Side -->
                                <div class="k_inner_group col-lg-6">

                                    <!-- separator -->
                                    <div class="g-col-sm-2">
                                        <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                            {{ __('Recrutement') }}
                                        </div>
                                    </div>

                                    <!-- Newers -->
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            {{ __('Cible') }} :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                        <div class="row">
                                            <input type="text" wire:model="newers" style="width: 50%;" class="k_input col-6">
                                            <span class="col-6" style="width: 50%; margin: 0 0 12px 0;">{{ __('nouveaux employés') }}</span>
                                        </div>
                                        @error('newers') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

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
                                    <textarea wire:model="description" id="" cols="30" rows="10" class="k_input" placeholder="Décrivez le poste ici 🥲"></textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>

                        </div>
                    </div>

            </div>
        </form>

    </div>
</div>
