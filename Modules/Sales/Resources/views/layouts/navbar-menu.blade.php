<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">

    <li class="nav-item page-module">
        <a class="nav-link kover-navlink" style="margin-right: 5px;" href="{{ route('main', ['subdomain' => current_company()->domain_name]) }}" >
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <img class="custom-image" src="{{ asset('assets/images/apps/sales.png') }}" alt="">
            </span>
          <span class="nav-link-title">
              {{ __('translator::sales.navbar.module') }}
          </span>
        </a>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
            {{ __('translator::sales.navbar.orders.name') }}
          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="{{ route('sales.quotations.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('translator::sales.navbar.orders.quotation') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('sales.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('translator::sales.navbar.orders.order') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('sales.customers.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('translator::sales.navbar.orders.customer') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('sales.teams.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('translator::sales.navbar.orders.teams') }}
                    </a>
                </div>
            </div>
        </div>
    </li>

    <!-- To invoice -->
    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
            {{ __('translator::sales.navbar.to_invoice.name') }}
          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="{{ route('sales.index', ['subdomain' => current_company()->domain_name, 'to' => 'to_invoice', 'menu' => current_menu()]) }}">
                        {{ __('translator::sales.navbar.to_invoice.orders') }}
                    </a>
                </div>
            </div>
        </div>
    </li>

    <!-- Products -->
    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
            {{ __('translator::sales.navbar.product.name') }}
          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="{{ route('inventory.products.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('translator::sales.navbar.product.products') }}
                    </a>
                    @if(settings()->has_variant)
                    <a class="dropdown-item" wire:navigate href="{{ route('inventory.products.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('translator::sales.navbar.product.variants') }}
                    </a>
                    @endif
                    @if(settings()->has_pricelist_check)
                    <a class="dropdown-item" wire:navigate href="{{ route('sales.pricelists.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('translator::sales.navbar.product.pricelists') }}
                    </a>
                    @endif
                    @if(settings()->has_sale_program)
                    <a class="dropdown-item" wire:navigate href="{{ route('sales.programs.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('translator::sales.navbar.product.discounts') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('sales.programs.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('translator::sales.navbar.product.giftcards') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </li>

    <!-- Report -->
    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
            {{ __('translator::sales.navbar.report.name') }}
          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="{{ route('sales.analysis', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('translator::sales.navbar.report.sales') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="#">
                        {{ __('translator::sales.navbar.report.sellers') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="#">
                        {{ __('translator::sales.navbar.report.customers') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="#">
                        {{ __('translator::sales.navbar.report.products') }}
                    </a>
                </div>
            </div>
        </div>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
            {{ __('translator::sales.navbar.configuration.name') }}
          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="{{ route('settings.general', ['subdomain' => current_company()->domain_name, 'page' => 'sales', 'menu' => current_menu()]) }}">
                        {{ __('translator::sales.navbar.configuration.setting') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('sales.teams.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('translator::sales.navbar.configuration.sales_teams') }}
                    </a>

                    <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                        {{ __('translator::sales.navbar.configuration.orders.name') }}
                    </a>
                    <div class="dropdown-menu">
                      <a wire:navigate href="#" class="dropdown-item">
                        {{ __('translator::sales.navbar.configuration.orders.tags') }}
                      </a>
                    </div>
                    <div class="dropend">
                        <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            {{ __('translator::sales.navbar.configuration.products.name') }}
                        </a>
                        <div class="dropdown-menu">
                            <a wire:navigate href="{{ route('purchases.products.categories.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                                {{ __('translator::sales.navbar.configuration.products.categories') }}
                            </a>
                            @if(settings()->has_variant)
                            <a wire:navigate href="{{ route('purchases.products.categories.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                                {{ __('translator::sales.navbar.configuration.products.attributes') }}
                            </a>
                            @endif
                        </div>
                    </div>
                    <!-- Has uom-->
                    @if(settings()->has_uom)
                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          {{ __('Unités de mesure') }}
                        </a>
                        <div class="dropdown-menu">
                            <a wire:navigate href="{{ route('purchases.products.categories.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                              {{ __("Catégories UdM") }}
                            </a>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </li>
</div>
