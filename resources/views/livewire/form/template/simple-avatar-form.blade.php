<div>
    <div class="k_form_sheet_bg">
        <div class="k_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">
            <!-- Action Bar -->
            @if($this->actionBarButtons())
            <div id="action-bar" class="k_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">

                @foreach($this->actionBarButtons() as $action)
                <x-dynamic-component
                    :component="$action->component"
                    :value="$action"
                    :status="$status"
                >
                </x-dynamic-component>
                @endforeach

            </div>
            @endif
            {{-- <div id="status-bar" class="k_statusbar_buttons_arrow d-flex align-items-center align-content-around ">
                <a href="{{ $this->new() }}" wire:navigate class="btn btn-link"> Nouveau &nbsp; <i class="bi bi-plus-square"></i></a>
                <button class="btn btn-primary" wire:click.prevent="{{ $this->updateForm() }}" wire:target="{{ $this->updateForm() }}">Sauvegarder</button> <span wire:dirty > Modifications non sauvegardés...</span>
            </div> --}}

        </div>
        <form wire:submit.prepend="{{ $this->form() }}">
            @csrf
            <!-- Sheet Card -->
            <div class="k_form_sheet position-relative">
                <!-- Capsule -->
                @if(count($this->capsules()) >= 1)
                <div class="k_horizontal_asset" id="k_horizontal_capsule">
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
                <div class="row justify-content-between position-relative w-100 m-0 mb-2">
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

                    <!-- checkboxes -->
                    @if($this->checkboxes)
                    <div>
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
                    <ul class="nav nav-tabs flex-row flex-nowrap" data-bs-toggle="tabs">
                        @foreach ($this->tabs() as $tab)
                        <li class="nav-item">
                            <a class="nav-link {{ $tab->key == 'work_info' || $tab->key == 'general' ? 'active' : '' }}" data-bs-toggle="tab" href="#{{ $tab->key }}">{{ $tab->label }}</a>
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
</div>
