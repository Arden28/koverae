<div>
    <div class="k_form_sheet_bg">

        @if (session()->has('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    <span>{{ session('message') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <div class="k_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">
            <!-- Action Bar -->
            @if($this->actionBarButtons())
                <div id="action-bar" class="k_statusbar_buttons d-none d-lg-flex align-items-center align-content-around flex-wrap gap-1">

                    @foreach($this->actionBarButtons() as $action)
                    <x-dynamic-component
                        :component="$action->component"
                        :value="$action"
                        :status="$status"
                    >
                    </x-dynamic-component>
                    @endforeach

                </div>
                <!-- Dropdown button -->
                <div class="btn-group d-lg-none">
                    <span class="btn btn-dark buttons dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                    </span>
                    <ul class="dropdown-menu">
                        @foreach($this->actionBarButtons() as $action)
                        <x-dynamic-component
                            :component="$action->component"
                            :value="$action"
                            :status="$status"
                        >
                        </x-dynamic-component>
                        @endforeach
                        <!--<li><hr class="dropdown-divider"></li>-->
                    </ul>
                </div>
            @endif

        </div>
        <form wire:submit.prepend="{{ $this->form() }}">
            @csrf
            <!-- Sheet Card -->
            <div class="k_form_sheet position-relative">
                <!-- Capsule -->
                @if(count($this->capsules()) >= 1)
                <div class="k_horizontal_asset overflow-x-auto overflow-y-hidden mb-md-4" id="k_horizontal_capsule">
                    @foreach($this->capsules() as $capsule)
                    <x-dynamic-component
                        :component="$capsule->component"
                        :value="$capsule"
                    >
                    </x-dynamic-component>
                    @endforeach
                </div>
                @endif
                <!-- title-->
                <div class="row justify-content-between position-relative w-100  m-0 mb-2">
                    <div class="ke_title mw-75 pe-2 ps-0">
                        @foreach($this->inputs() as $input)
                            @if($input->position == 'top-title' && $input->tab == 'none')
                                <x-dynamic-component
                                    :component="$input->component"
                                    :value="$input"
                                >
                                </x-dynamic-component>
                            @endif
                        @endforeach

                    </div>
                    <!-- Employee Avatar -->
                    <div class="k_employee_avatar m-0 p-0">
                        <!-- Image Uploader -->
                        @if($this->photo != null)
                        <img src="{{ $this->photo->temporaryUrl() }}" alt="image" class="img img-fluid">
                        @elseif($this->image_path)
                        <img src="{{ Storage::disk('public')->url($this->image_path) }}" alt="image" class="img img-fluid">
                        @else
                        <img src="{{ asset('assets/images/people/default_avatar.png') }}" alt="image" class="img img-fluid">
                        @endif
                        <!-- <small class="k_button_icon">
                            <i class="bi bi-circle text-success align-middle"></i>
                        </small>-->
                        <!-- Image selector -->
                        <div class="select-file d-flex position-absolute justify-content-between w100 bottom-0">
                            <span class="k_select_file_button btn btn-light border-0 rounded-circle m-1 p-1" onclick="document.getElementById('photo').click();">
                                <i class="bi bi-pencil"></i>
                                <input type="file" wire:model="photo" id="photo" style="display: none;" />
                            </span>
                            @if($this->photo || $this->image_path)
                            <span class="k_select_file_button btn btn-light border-0 rounded-circle m-1 p-1" wire:click="$cancelUpload('photo')" wire:target="$cancelUpload('photo')">
                                <i class="bi bi-trash"></i>
                            </span>
                            @endif
                        </div>
                        @error('photo') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <!-- checkboxes -->
                    @if($this->checkboxes)
                    <div class="p-0">
                        <!-- checkbox -->
                        <span class="d-inline-block">
                            <div class="k-checkbox form-check">
                                <input type="checkbox" wire:model="can_be_sold" class="form-check-input cursor-pointer" id="sale_1">
                                <label for="sale_1" class="k_form_label cursor-pointer">Peût être vendu</label>
                            </div>
                        </span>
                        <!-- checkbox -->
                        <span class="d-inline-block">
                            <div class="k-checkbox form-check">
                                <input type="checkbox" wire:model="can_be_purchased" class="form-check-input cursor-pointer" id="purchase_0">
                                <label for="purchase_0" class="k_form_label cursor-pointer">Peût être acheté</label>
                            </div>
                        </span>

                        <!-- checkbox -->
                        <span class="d-inline-block d-none">
                            <div class="k-checkbox form-check">
                                <input type="checkbox" wire:model="can_be_subscribed" class="form-check-input cursor-pointer" id="reccuring_0">
                                <label for="purchase_0" class="k_form_label cursor-pointer">Réccurent</label>
                            </div>
                        </span>

                        <!-- checkbox -->
                        <span class="d-inline-block d-none">
                            <div class="k-checkbox form-check">
                                <input type="checkbox" wire:model="can_be_rented" class="form-check-input cursor-pointer" id="rent_1">
                                <label for="purchase_0" class="k_form_label cursor-pointer">Peût être loué</label>
                            </div>
                        </span>
                    </div>
                    @endif
                </div>

                <!-- Top Form -->
                <div class="row">
                    <!-- Left Side -->
                    <div class="k_inner_group col-md-6 col-lg-6">

                        @foreach($this->inputs() as $input)
                            @if($input->position == 'left' && $input->tab == 'none')
                                <x-dynamic-component
                                    :component="$input->component"
                                    :value="$input"
                                >
                                </x-dynamic-component>
                            @endif
                        @endforeach

                    </div>
                    <!-- Right Side -->
                    <div class="k_inner_group col-md-6 col-lg-6">

                        @foreach($this->inputs() as $input)
                            @if($input->position == 'right' && $input->tab == 'none')
                                <x-dynamic-component
                                    :component="$input->component"
                                    :value="$input"
                                >
                                </x-dynamic-component>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Tab Link -->
                @if($this->tabs())
                <div class="k_notebokk_headers">
                    <ul class="nav nav-tabs d-flex overflow-y-hidden overflow-x-auto" data-bs-toggle="tabs">
                        @foreach ($this->tabs() as $tab)
                        <li class="nav-item">
                            <a class="nav-link {{ $tab->key == 'work_info' || $tab->key == 'general' ? 'active' : '' }} {{ $tab->condition ? 'd-none' : '' }}" data-bs-toggle="tab" href="#{{ $tab->key }}">{{ $tab->label }}</a>
                        </li>
                        @endforeach
                      </ul>
                </div>

                @endif

                <!-- Tabs content -->
                @if($this->tabs())
                    @foreach ($this->tabs() as $tab)
                    <x-dynamic-component
                        :component="$tab->component"
                        :value="$tab"
                    >
                    </x-dynamic-component>
                    @endforeach
                @endif


            </div>
        </form>
    </div>
    {{-- <div class="k-chatter mt-2 px-1 py-1">
        <div class="k-chatter-top position-sticky top-0 gap-2">
            <!-- Topbar -->
            <div class="k-chatter-topbar d-flex flex-shrink-0 flex-grow-0 px-3 overflow-x-auto">
                <button class="btn btn-primary">Envoyer un message</button>
                <span class="btn btn-secondary" style="margin-left: 5px;">
                    Prendre des notes
                </span>
                <div class="k-chatter-topbar-grow w-50 flex-grow-1 pe-2">

                </div>
                <div class="d-flex flex-grow-1 right">
                    <button class="btn btn-link"><i class="bi bi-paperclip" style="font-size: 18px;"></i></button>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Loading -->
    <div class="k-loading cursor-pointer pb-1" wire:loading>
        <p>En cours de chargement ...</p>
    </div>
</div>
