<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">

    <li class="nav-item" data-turbolinks>
        <a class="nav-link kover-navlink" style="margin-right: 5px;" href="{{ route('main', ['subdomain' => current_company()->domain_name]) }}">
          <span class="nav-link-icon d-md-none d-lg-inline-block">
            <img class="custom-image" src="{{ asset('assets/images/apps/pos.png') }}" alt="">
          </span>
          <span class="nav-link-title">
              {{ __('Point de ventes') }}
          </span>
        </a>
    </li>

    <li class="nav-item" data-turbolinks>
        <a class="nav-link kover-navlink" wire:navigate style="margin-right: 5px;" href="{{ route('pos.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
          <span class="nav-link-title">
              {{ __('Tableau de bord') }}
          </span>
        </a>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              {{ __('Commandes') }}
          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="{{ route('pos.orders', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Commandes') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Paiements') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('contacts.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Clients') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Sessions') }}
                    </a>

                </div>
            </div>
        </div>
    </li>

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
                    <a class="dropdown-item" wire:navigate href="{{ route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Combinaisons') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Listes de prix') }}
                    </a>

                </div>
            </div>
        </div>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              {{ __('Analyses') }}
          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="{{ route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Commandes') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Rapport de session') }}
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
                    <a class="dropdown-item" wire:navigate href="{{ route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Paramètres') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Moyen de paiement') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Pièces/Billets') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('pos.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Point de ventes') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Plans de pièces') }}
                    </a>
                </div>
            </div>
        </div>
    </li>
</div>
