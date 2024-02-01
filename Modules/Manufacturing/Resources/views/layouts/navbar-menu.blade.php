<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">

    <li class="nav-item page-module">
        <a class="nav-link kover-navlink" style="margin-right: 5px;" wire:navigate href="{{ route('main', ['subdomain' => current_company()->domain_name]) }}" >
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <img class="custom-image" src="{{ asset('assets/images/apps/mrp.png') }}" alt="">
            </span>
          <span class="nav-link-title">
              {{ __('Fabrication') }}
          </span>
        </a>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              {{ __('Opérations') }}
          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a wire:navigate href="{{ route('inventory.operation-transfers.index', ['subdomain' => current_company()->domain_name, 'type' => 'delivery', 'menu' => current_menu()]) }}" class="dropdown-item">
                      {{ __('Ordres de fabrications') }}
                    </a>
                    <a wire:navigate href="{{ route('inventory.operation-transfers.index', ['subdomain' => current_company()->domain_name, 'type' => 'delivery', 'menu' => current_menu()]) }}" class="dropdown-item">
                      {{ __('Ordres de déconstructions') }}
                    </a>
                    <a wire:navigate href="{{ route('inventory.operation-transfers.index', ['subdomain' => current_company()->domain_name, 'type' => 'delivery', 'menu' => current_menu()]) }}" class="dropdown-item">
                      {{ __('Ordres de rebuts') }}
                    </a>

                </div>
            </div>
        </div>
    </li>

    <!-- Products -->
    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              {{ __('Produits') }}
          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="{{ route('inventory.products.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Produits') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('inventory.products.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Nomenclatures') }}
                    </a>
                </div>
            </div>
        </div>
    </li>

    <!-- Analytics -->
    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              {{ __('Rapport') }}
          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="{{ route('sales.index', ['subdomain' => current_company()->domain_name, 'to' => 'to_invoice', 'menu' => current_menu()]) }}">
                        {{ __('Analyse de la production') }}
                    </a>
                </div>
            </div>
        </div>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              {{ __('Configuration') }}
          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="{{ route('settings.general', ['subdomain' => current_company()->domain_name, 'view' => 'manufacturing', 'menu' => current_menu()]) }}">
                        {{ __('Paramètre') }}
                    </a>
                </div>
            </div>
        </div>
    </li>

</div>
