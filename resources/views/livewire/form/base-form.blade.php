<div>
    <div class="k_form_sheet_bg h-auto">
        <!-- Status bar -->
        <div class="k_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 mt-md-2 pb-2 pb-md-0">

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
                <button type="button" class="btn buttons dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Action
                </button>
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

            <!-- Status Bar -->
            @if($this->statusBarButtons())
            <div id="status-bar" class="k_statusbar_buttons_arrow d-flex align-items-center align-content-around ">

                @foreach($this->statusBarButtons() as $status_button)
                <x-dynamic-component
                    :component="$status_button->component"
                    :value="$status_button"
                    :status="$status"
                >
                </x-dynamic-component>
                @endforeach
            </div>
            @endif
        </div>
        <form wire:submit.prevent="{{ $this->form() }}">
            @csrf
            <!-- Sheet Card -->
            <div class="k_form_sheet position-relative">

                @include('sales::livewire.sale.invoice.partials.payment-status-ribbon')

                <div class="row justify-content-between position-relative w-100 m-0 mb-2">
                    {{-- <span class="k_form_label">
                        Demande de prix
                    </span> --}}
                    @if($this->capsules())
                    <div class="k_horizontal_asset" id="k_horizontal_capsule">
                        @foreach($this->capsules() as $capsule)
                        <x-dynamic-component
                            :component="$capsule->component"
                            :value="$capsule"
                            :status="$status"
                        >
                        </x-dynamic-component>
                        @endforeach
                    </div>
                    @endif
                    <!-- title-->
                    @if($this->reference)
                    <div class="ke_title mw-75 pe-2 ps-0" id="new-title">
                        <!-- Name -->
                        <h1 class="d-flex flex-row align-items-center">
                            {{ $this->reference }}
                            <!-- Special buttons -->
                            {{-- <div class="btn-group">
                                <button type="button" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-gear-fill fa-xs"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach($this->actionButtons() as $action_button)
                                    <x-dynamic-component
                                        :component="$action_button->component"
                                        :value="$action_button"
                                        :status="$status"
                                    >
                                    </x-dynamic-component>
                                    @endforeach
                                </ul>
                            </div>

                            <div wire:dirty>
                                <button type="submit" wire:target="{{ $this->form() }}" wire:loading.remove title="Sauvegarder les changements...."><i class="bi bi-cloud-arrow-up-fill fa-xs"></i></button>
                                <button type="submit" wire:loading class="disabled" title="Sauvegarder les changements....">...</button>
                            </div> --}}

                        </h1>
                    </div>
                    @endif

                    @if (session()->has('message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                <span>{{ session('message') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
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
                                    {{-- :date="$this->date" --}}
                                >
                                </x-dynamic-component>
                            @endif
                        @endforeach
                    </div>
                </div>

                @if($this->tabs())
                <div class="k_notebokk_headers">
                    <!-- Tab Link -->
                    <ul class="nav nav-tabs flex-row flex-nowrap" data-bs-toggle="tabs">
                        @foreach ($this->tabs() as $tab)
                        <li class="nav-item">
                            <a class="nav-link {{ $tab->key == 'order' || $tab->key == 'purchase' || $tab->key == 'invoice' ? 'active' : '' }}" data-bs-toggle="tab" href="#{{ $tab->key }}">{{ $tab->label }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- Tabs content -->

                @foreach ($this->tabs() as $tab)
                <x-dynamic-component
                    :component="$tab->component"
                    :value="$tab"
                    :cartInstance="'{{ $cartInstance }}'"
                >
                </x-dynamic-component>
                @endforeach

            </div>

        </form>

    </div>
</div>
