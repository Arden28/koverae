<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">

    <li class="nav-item" data-turbolinks>
        <a class="nav-link kover-navlink" style="margin-right: 5px;" href="{{ route('main', ['subdomain' => current_company()->domain_name]) }}" wire:navigate>
          <span class="nav-link-icon d-md-none d-lg-inline-block">
            <img class="custom-image" src="{{ asset('assets/images/apps/purchase.png') }}" alt="">
          </span>
          <span class="nav-link-title">
              {{ __('Achat') }}
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
                    <a class="dropdown-item" wire:navigate href="{{ route('purchases.requests.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Demandes de prix') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('purchases.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Bons de commande') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('purchases.blankets.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Contrat-cadres') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('purchases.vendors.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Fournisseurs') }}
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
                    <a class="dropdown-item" wire:navigate href="#">
                        {{ __('Produits') }}
                    </a>
                    @if(settings()->has_variant)
                    <a class="dropdown-item" wire:navigate href="#">
                        {{ __('Variantes Produits') }}
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
              {{ __('Analyse') }}
          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="{{ route('sales.quotations.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Achat') }}
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
                    <a class="dropdown-item" wire:navigate href="{{ route('settings.general', ['subdomain' => current_company()->domain_name, 'menu' => current_menu(), 'view' => 'purchase']) }}">
                        {{ __('Paramètre') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="#">
                        {{ __('Listes de prix fournisseurs') }}
                    </a>
                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          {{ __('Produits') }}
                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="{{ route('purchases.products.categories.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __('Catégories produits') }}
                          </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </li>

</div>
