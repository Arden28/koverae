<div>
    <div class="k_form_sheet_bg">
        <form wire:submit.prepend="update({{ $department->id }})">
            <!-- Session message -->

            <!-- Status bar -->
            <div class="k_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">

                <div id="statusbar" class="k_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                    <a href="{{ route('employee.department.create', ['subdomain' => current_company()->domain_name]) }}" wire:navigate id="top-button" class="btn btn-primary">
                        <span>
                            {{ __('Nouveau') }}
                        </span>
                    </a>
                    <button type="submit" id="top-button" class="btn btn-secondary">
                        <span wire:loading.remove wire:target="update({{ $department->id }})">
                            <i class="bi bi-cloud-arrow-up"></i>{{ __('Enregistrer') }}
                        </span>
                        <span wire:loading wire:target="update({{ $department->id }})">
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
                        <li><a class="dropdown-item" href="#">{{ __('Enregistrer') }}</a></li>
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
                            <select class="k-autocomplete-input-0 k_input" wire:model.blur="manager" id="user_id_0">
                                <option value="{{ null }}"></option>
                                @foreach($employees as $e)
                                    <option {{ $e->id == $department->head_id ? 'selected' : '' }} value="{{ $e->id }}">{{ $e->user->name }}</option>
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
                            <select class="k-autocomplete-input-0 k_input" wire:model.defer="parent" id="department_id_0">
                                <option value=""></option>
                                @foreach($departments as $d)
                                    <option {{ $d->id == $department->parent_id ? 'selected' : '' }} value="{{ $d->id }}">{{ $d->name }}</option>
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
                            <select class="k-autocomplete-input-0 k_input" id="company_id_0">
                                <option value="">Banéo</option>
                            </select>
                        </div>

                    </div>
                    <!-- Right Side -->
                    <div class="k_widget k_widget_department_chart col-lg-6">
                        <div class="k_hr_department_chart">
                            <div class="k_horizontal_separator mb-3 text-uppercase fw-bolder small">
                                {{ __('Classification de départements') }}
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="department_name ms-2 text-bold">
                                    {{ $department->name }}
                                </span>
                                <a class="badge rounded-pill bg-white border">
                                    <span class="text-black">
                                        {{ count($department->childDepartments) }}
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
