<div>
    @section('title', 'Paramètres')

    @section('styles')
        <style>
            body {
                /* Disable the default page scrollbar */
                /* overflow: hidden; */
            }
        </style>
    @endsection

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:settings::navbar.setting-panel />
    @endsection

        <!-- Settings -->
        <div class="k-row">
            <!-- Left Sidebar -->
            <div class="settings_tab border-end">

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
                <div class="tab cursor-pointer {{ $view == 'sales' ? 'selected' : '' }}" wire:click.prevent="changePanel('sales')" wire:target="changePanel('sales')">
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
                @if(module('invoice'))
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
                <livewire:sales::settings.sales-setting :company="current_company()->id" />
                @elseif($view == 'purchase')
                <livewire:purchase::settings.purchase-setting :company="current_company()->id" />
                @elseif($view == 'inventory')
                    <livewire:inventory::settings.inventory-setting :company="current_company()->id" />
                @elseif($view == 'invoicing')

                @elseif($view == 'employee')
                    <livewire:settings::module.employee />
                @elseif($view == 'pos')
                <livewire:settings::settings.general />
                @else
                <livewire:settings::settings.general />
                @endif
            </div>
        </div>


</div>
