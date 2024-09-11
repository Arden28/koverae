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
                        {{ __('General Setting') }}
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
                        {{ __('Sales') }}
                    </span>
                </div>
                @endif

                <!-- Sales -->
                @if(module('crm'))
                <div class="tab cursor-pointer {{ $view == 'crm' ? 'selected' : '' }}" wire:click.prevent="changePanel('crm')" wire:target="changePanel('crm')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="{{ asset('assets/images/apps/crm.png') }}" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        {{ __('CRM') }}
                    </span>
                </div>
                @endif

                <!-- Calendar -->
                @if(module('calendar'))
                <div class="tab cursor-pointer {{ $view == 'calendar' ? 'selected' : '' }}" wire:click.prevent="changePanel('calendar')" wire:target="changePanel('calendar')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="{{ asset('assets/images/apps/calendar.png') }}" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        {{ __('Calendar') }}
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
                        {{ __('Purchase') }}
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
                        {{ __('Inventory') }}
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
                        {{ __('Invoicing') }}
                    </span>
                </div>
                @endif

                <!-- Employee -->
                @if(module('manufacturing'))
                <div class="tab cursor-pointer {{ $view == 'manufacturing' ? 'selected' : '' }}" wire:click.prevent="changePanel('manufacturing')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="{{ asset('assets/images/apps/mrp.png') }}" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        {{ __('Manufacturing') }}
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
                        {{ __('Employee') }}
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
                        {{ __('Point Of Sales') }}
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
                @elseif($view == 'crm' AND module('crm'))
                <livewire:crm::settings.crm-setting :setting="settings()" />
                @elseif($view == 'calendar' AND module('calendar'))
                <livewire:calendar::settings.calendar-setting :setting="settings()" />
                @elseif($view == 'calendar' AND module('calendar'))
                <livewire:calendar::settings.crm-setting :setting="settings()" />
                @elseif($view == 'purchase')
                <livewire:purchase::settings.purchase-setting :company="current_company()->id" />
                @elseif($view == 'inventory')
                    <livewire:inventory::settings.inventory-setting :company="current_company()->id" />
                @elseif($view == 'manufacturing')
                <livewire:manufacturing::settings.manufacturing-setting :company="current_company()->id" />
                @elseif($view == 'invoicing')
                <livewire:invoicing::settings.invoicing-setting :setting="settings()" />
                @elseif($view == 'employee')
                    <livewire:settings::module.employee />
                @elseif($view == 'pos')
                <livewire:pos::settings.pos-setting :setting="settings()" />
                @else
                <livewire:settings::settings.general />
                @endif
            </div>
        </div>


</div>
