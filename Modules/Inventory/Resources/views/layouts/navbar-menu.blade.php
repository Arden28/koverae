<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">

    <li class="nav-item page-module">
        <a class="nav-link kover-navlink" style="margin-right: 5px;" href="{{ route('main', ['subdomain' => current_company()->domain_name]) }}" >
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <img class="custom-image" src="{{ asset('assets/images/apps/inventory.png') }}" alt="">
            </span>
          <span class="nav-link-title">
              {{ __('Inventaire') }}
          </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link kover-navlink" style="margin-right: 5px;" wire:navigate href="{{ route('inventory.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" >
          <span class="nav-link-title">
              {{ __("Vue d'ensemble") }}
          </span>
        </a>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              {{ __('Operations') }}
          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <div class="dropend">
                        <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          {{ __('Tranferts') }}
                        </a>
                        <div class="dropdown-menu">
                            <a wire:navigate href="{{ route('inventory.operation-transfers.index', ['subdomain' => current_company()->domain_name, 'type' => 'receipt', 'menu' => current_menu()]) }}" class="dropdown-item">
                                {{ __('Réceptions') }}
                            </a>
                            <a wire:navigate href="{{ route('inventory.operation-transfers.index', ['subdomain' => current_company()->domain_name, 'type' => 'delivery', 'menu' => current_menu()]) }}" class="dropdown-item">
                                {{ __('Livraisons') }}
                            </a>
                            @if(settings()->has_storage_locations)
                            <a wire:navigate href="{{ route('inventory.operation-transfers.index', ['subdomain' => current_company()->domain_name, 'type' => 'internal_transfer', 'menu' => current_menu()]) }}" class="dropdown-item">
                                {{ __('Internes') }}
                            </a>
                            @endif
                            @if(module('manufacturing'))
                            <a wire:navigate href="{{ route('manufacturing.orders.index', ['subdomain' => current_company()->domain_name, 'type' => 'manufacturing', 'menu' => current_menu()]) }}" class="dropdown-item">
                                {{ __('Fabrications') }}
                            </a>
                            @endif
                        </div>
                    </div>

                    <div class="dropend">
                        <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            {{ __('Ajustements') }}
                        </a>
                        <div class="dropdown-menu">
                            <a wire:navigate href="{{ route('inventory.adjustments.physical.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                                {{ __('Inventaire physique') }}
                            </a>
                            <a wire:navigate href="{{ route('inventory.adjustments.scraps.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                                {{ __('Rébuts') }}
                            </a>
                        </div>
                    </div>

                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            {{ __('Approvisionnement') }}
                        </a>
                        <div class="dropdown-menu">
                            <a wire:navigate href="#" class="dropdown-item">
                                {{ __('Réapprovisionnement') }}
                            </a>
                        </div>
                    </div>

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
                        {{ __('Stock') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('sales.index', ['subdomain' => current_company()->domain_name, 'to' => 'to_invoice', 'menu' => current_menu()]) }}">
                        {{ __('Emplacements') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('sales.index', ['subdomain' => current_company()->domain_name, 'to' => 'to_invoice', 'menu' => current_menu()]) }}">
                        {{ __('Historique de mouvements') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('sales.index', ['subdomain' => current_company()->domain_name, 'to' => 'to_invoice', 'menu' => current_menu()]) }}">
                        {{ __('Analyses de mouvement') }}
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
                    <a class="dropdown-item" wire:navigate href="{{ route('settings.general', ['subdomain' => current_company()->domain_name, 'view' => 'inventory', 'menu' => current_menu()]) }}">
                        {{ __('Paramètre') }}
                    </a>

                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          {{ __("Gestion d'entrepôts") }}
                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="{{ route('inventory.warehouses.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __('Entrepôts') }}
                          </a>
                          <a wire:navigate href="{{ route('inventory.operation-types.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __("Types d'opérations") }}
                          </a>
                          @if(settings()->has_storage_locations)
                          <a wire:navigate href="{{ route('inventory.locations.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __('Emplacements') }}
                          </a>
                          @endif
                          @if(settings()->has_storage_locations)
                          <a wire:navigate href="{{ route('inventory.warehouses.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __("Règles d'affectation") }}
                          </a>
                          @endif
                        </div>
                    </div>

                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          {{ __("Produits") }}
                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="{{ route('inventory.products.categories.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __('Catégories de produits') }}
                          </a>
                          @if(settings()->has_package)
                          <a wire:navigate href="{{ route('employee.department.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __("Emballages de produits") }}
                          </a>
                          @endif
                        </div>
                    </div>

                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          {{ __("Unités de mesures") }}
                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="{{ route('employee.department.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __("Catégories d'unité de mesure") }}
                          </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </li>

</div>
