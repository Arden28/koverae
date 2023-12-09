<div>
    @section('title', 'Paramètres')

    @section('styles')
        <style>
            body {
                /* Disable the default page scrollbar */
                overflow: hidden;
            }
        </style>
    @endsection

        <!-- Settings -->
        <div class="k-row">
            <!-- Left Sidebar -->
            <div class="settings_tab h-100 border-end">

                <!-- Paramètre Généraux -->
                <div class="tab cursor-pointer {{ $view == 'general' ? 'selected' : '' }}" wire:click.prevent="changePanel('general')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block">
                        <img src="{{ asset('assets/images/apps/settings.png') }}" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Paramètre Généraux
                    </span>
                </div>

                <!-- Sales -->
                @if(module('sales'))
                <div class="tab cursor-pointer {{ $view == 'sales' ? 'selected' : '' }}" wire:click.prevent="changePanel('sales')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="{{ asset('assets/images/apps/sales.png') }}" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Ventes
                    </span>
                </div>
                @endif

                <!-- Purchase -->
                @if(module('purchase'))
                <div class="tab cursor-pointer {{ $view == 'purchase' ? 'selected' : '' }}" wire:click.prevent="changePanel('purchase')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="{{ asset('assets/images/apps/purchase.png') }}" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Achat
                    </span>
                </div>
                @endif

                <!-- Inventory -->
                @if(module('inventory'))
                <div class="tab cursor-pointer {{ $view == 'inventory' ? 'selected' : '' }}" wire:click.prevent="changePanel('inventory')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="{{ asset('assets/images/apps/inventory.png') }}" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Inventaire
                    </span>
                </div>
                @endif

                <!-- Invoicing -->
                @if(module('invoicing'))
                <div class="tab cursor-pointer {{ $view == 'invoicing' ? 'selected' : '' }}" wire:click.prevent="changePanel('invoicing')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="{{ asset('assets/images/apps/invoice.png') }}" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Facturation
                    </span>
                </div>
                @endif

                {{-- <!-- Project -->
                @if(module('projects'))
                <div class="tab cursor-pointer">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Projets
                    </span>
                </div>
                @endif

                <!-- Sign -->
                @if(module('signature'))
                <div class="tab cursor-pointer">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Signature
                    </span>
                </div>
                @endif

                <!-- Planning -->
                @if(module('planning'))
                <div class="tab cursor-pointer">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Planning
                    </span>
                </div>
                @endif --}}

                <!-- Employee -->
                @if(module('employee'))
                <div class="tab cursor-pointer {{ $view == 'employee' ? 'selected' : '' }}" wire:click.prevent="changePanel('employee')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="{{ asset('assets/images/apps/employee.png') }}" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Personnel
                    </span>
                </div>
                @endif

                <!-- Point Of Sale -->
                @if(module('pos'))
                <div class="tab cursor-pointer {{ $view == 'pos' ? 'selected' : '' }}" wire:click.prevent="changePanel('pos')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="{{ asset('assets/images/apps/pos.png') }}" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Point de vente
                    </span>
                </div>
                @endif

            </div>

            <!-- Right Sidebar -->
            <div class="settings">
                <!-- General Settings -->

                @if($view == 'general')
                    <livewire:settings::module.general />
                @elseif($view == 'sales')
                    <livewire:settings::module.sales />
                @elseif($view == 'purchase')
                    <livewire:settings::module.purchase />
                @elseif($view == 'inventory')
                    <livewire:settings::module.inventory />
                @elseif($view == 'invoicing')

                @elseif($view == 'employee')
                    <livewire:settings::module.employee />
                @elseif($view == 'pos')

                @else

                @endif
            </div>
        </div>


    {{-- <!-- Body -->
    <div class="">
        <div class="row">

            <!-- Utilisateurs -->
            <div class="settings_box" id="users">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-people" style="font-size: 15px;"></i> {{ __('Utilisateurs') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="k_setting_box col-12 col-lg-6 k_searchable_setting">
                                <div class="k_setting_right_pane">
                                    <div class="mt- mt16">
                                        <div class="k_field_char k_readonly_modifier fw">
                                            <span>{{ __('Inviter un utilisateur') }}</span>
                                        </div>
                                        <div class="k_field_text k_readonly_modifier text-muted">
                                            <div class="input-group d-flex">
                                                <input type="email" class="k_input k_user_email text-truncate" wire:model="email" placeholder="Saisissez une adresse email" required>
                                                <div class="input-group-prepend">
                                                    <button wire:click="inviteUser" wire:loading.attr="disabled" type="button" class="btn btn-primary flex-shrink-1">
                                                        <i class="bi bi-person-add"></i> {{ __('Inviter') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="k_setting_box col-12 col-lg-6 k_searchable_setting">
                                <div class="k_setting_right_pane">
                                    <div class="mt- mt16">
                                        <div class="k_field_char k_readonly_modifier fw-bold">
                                            <i class="bi bi-people"></i>
                                            <span>{{ __('1 Utilisateur(s)') }}</span>
                                        </div>

                                        <button class="btn btn-link">
                                            <i class="bi bi-arrow-right"></i>
                                            <span><b>{{ __('Gérer les utilisateurs') }}</b></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Langues -->
            <div class="settings_box" id="languages">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-translate" style="font-size: 15px;"></i> {{ __('Langues') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="k_setting_box col-12 col-lg-6 k_searchable_setting">
                                <div class="k_setting_right_pane">
                                    <div class="mt- mt16">
                                        <div class="k_field_char k_readonly_modifier fw-bold">
                                            <i class="bi bi-translate"></i>
                                            <span>{{ __('1 Langue(s)') }}</span>
                                        </div>
                                        <button class="btn btn-link">
                                            <i class="bi bi-arrow-right"></i>
                                            <span><b>{{ __('Ajouter une langue') }}</b></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Companies -->
            <div class="settings_box" id="companies">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-building" style="font-size: 15px;"></i> {{ __('Société') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="k_setting_box col-12 col-lg-6 k_searchable_setting">
                                <div class="k_setting_right_pane">
                                    <div class="mt- mt16">
                                        <div class="k_field_char k_readonly_modifier fw-bold">
                                            <span>{{ current_company()->name }}</span>
                                        </div>
                                        <div class="k_field_text k_readonly_modifier text-muted">
                                            <span>{{ current_company()->country.' - '. current_company()->city }}</span>
                                        </div>
                                        <a href="{{ route('settings.edit-company', ['subdomain' => current_company()->domain_name, 'company' => current_company()->id]) }}" wire:navigate class="btn btn-link">
                                            <i class="bi bi-arrow-right"></i>
                                            <span><b>{{ __('Mettre à jour ces informations') }}</b></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="k_setting_box col-12 col-lg-6 k_searchable_setting">
                                <div class="k_setting_right_pane">
                                    <div class="mt- mt16">
                                        <div class="k_field_char k_readonly_modifier fw-bold">
                                            <span>1 Société(s)</span>
                                        </div>

                                        <button class="btn btn-link">
                                            <i class="bi bi-arrow-right"></i>
                                            <span>{{ __('Gérer les Sociétés') }}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Koverae Report -->
            <div class="settings_box" id="stats">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-clipboard-data" style="font-size: 15px;"></i> {{ __('Rapports & Analyses') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="k_setting_box col-12 col-lg-6 k_searchable_setting">
                                <div class="k_setting_left_pane">
                                    <div class="k_field_widget k_field_boolean">
                                        <div class="k-checkbox form-check d-inline-block">
                                            <input type="checkbox" checked class="form-check-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="k_setting_right_pane">
                                    <div class="mt- mt16">
                                        <div class="k_field_char k_readonly_modifier fw-bold">
                                            <span>Koverae Report</span>
                                        </div>
                                        <div class="k_field_text k_readonly_modifier text-muted">
                                            <span>{{ __('Recevoir des rapports et analyses quotidiennes sur votre entreprise.') }}</span>
                                        </div>
                                        <a href="{{ route('settings.edit-company', ['subdomain' => current_company()->domain_name, 'company' => current_company()->id]) }}" wire:navigate class="btn btn-link">
                                            <i class="bi bi-arrow-right"></i>
                                            <span><b>{{ __('Configurer les rapports') }}</b></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Koverae Apps -->
            @can('access_applications')
                <div class="col-lg-12" style="padding-bottom: 20px;">
                    @include('utils.alerts')
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0"><i class="bi bi-box" style="font-size: 15px;"></i> {{ __('Applications') }} {{ installed_apps(team(Auth::user()->team->id))->count() }} </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                @foreach(modules() as $module)
                                <div class="col-lg-6" style="padding-bottom: 10px">
                                <div class="card">
                                    <div class="row g-0">
                                        <div class="col-3">
                                            <div class="card-body">
                                                <div class="avatar avatar-md" style="background-image: url(../assets/images/apps/{{ $module->slug }}.png)"></div>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="card-body ps-0">
                                                <div class="row">
                                                    <div class="col">
                                                        <h3 class="mb-0">{{ $module->name }}</h3>
                                                    </div>
                                                    <div class="col-auto fs-3 text-green">
                                                        @if($module->isInstalledBy($team))
                                                            <form wire:prevent="uninstallApp({{ $module->id }})">
                                                                @csrf
                                                                <input type="hidden" wire:model="app_id">
                                                                <button wire:click="uninstallApp({{ $module->id }})" class="btn btn-red" type="submit">
                                                                    <i class="bi bi-trash"></i>
                                                                    {{ __('Désinstaller') }}
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form wire:prevent="installApp({{ $module->id }})">
                                                                @csrf
                                                                <button wire:target="installApp({{ $module->id }})" class="btn btn-primary">{{ __('Installer') }}</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="row">

                                                <div class="col-md">
                                                    <div class="mt-3 list-inline list-inline-dots mb-0 text-muted d-sm-block d-none">
                                                        <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" /><line x1="13" y1="7" x2="13" y2="7.01" /><line x1="17" y1="7" x2="17" y2="7.01" /><line x1="17" y1="11" x2="17" y2="11.01" /><line x1="17" y1="15" x2="17" y2="15.01" /></svg>
                                                            Par <strong>Koverae SARL</strong>
                                                        </div>
                                                        <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                            {!! $module->description !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            @endcan

        </div>
    </div> --}}

</div>
