<div class="navbar-expand-md d-print-none">
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="navbar navbar-light">
        <div class="container-xl">
          <ul class="navbar-nav">

            <li class="nav-item" data-turbolinks>
                <a class="btn" style="margin-right: 5px;" href="{{ route('main', ['subdomain' => current_company()->domain_name]) }}" wire:navigate>
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <img class="custom-image" src="{{ asset('assets/images/apps/purchase.png') }}" alt="">
                  </span>
                  <span class="nav-link-title">
                      {{ __('Achat') }}
                  </span>
                </a>
            </li>

            <li class="nav-item dropdown" data-turbolinks>
                <a class="btn dropdown-toggle" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-title">
                      {{ __('Commandes') }}
                  </span>
                </a>
                <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                        <!-- Left Side -->
                        <div class="dropdown-menu-column">
                            <a class="dropdown-item" wire:navigate href="{{ route('purchases.requests.index', ['subdomain' => current_company()->domain_name]) }}">
                                {{ __('Demandes de prix') }}
                            </a>
                            <a class="dropdown-item" wire:navigate href="{{ route('purchases.index', ['subdomain' => current_company()->domain_name]) }}">
                                {{ __('Bons de commande') }}
                            </a>
                            <a class="dropdown-item" wire:navigate href="{{ route('purchases.blankets.index', ['subdomain' => current_company()->domain_name]) }}">
                                {{ __('Contrat-cadres') }}
                            </a>
                            <a class="dropdown-item" wire:navigate href="{{ route('purchases.vendors.index', ['subdomain' => current_company()->domain_name]) }}">
                                {{ __('Fournisseurs') }}
                            </a>
                        </div>
                    </div>
                </div>
            </li>

            <!-- Products -->
            <li class="nav-item dropdown" data-turbolinks>
                <a class="btn dropdown-toggle" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-title">
                      {{ __('Produits') }}
                  </span>
                </a>
                <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                        <!-- Left Side -->
                        <div class="dropdown-menu-column">
                            <a class="dropdown-item" wire:navigate href="{{ route('sales.quotations.index', ['subdomain' => current_company()->domain_name]) }}">
                                {{ __('Produits') }}
                            </a>
                        </div>
                    </div>
                </div>
            </li>

            <!-- Report -->
            <li class="nav-item dropdown" data-turbolinks>
                <a class="btn dropdown-toggle" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-title">
                      {{ __('Analyse') }}
                  </span>
                </a>
                <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                        <!-- Left Side -->
                        <div class="dropdown-menu-column">
                            <a class="dropdown-item" wire:navigate href="{{ route('sales.quotations.index', ['subdomain' => current_company()->domain_name]) }}">
                                {{ __('Achat') }}
                            </a>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown" data-turbolinks>
                <a class="btn dropdown-toggle" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-title">
                      {{ __('Configuration') }}
                  </span>
                </a>
                <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                        <!-- Left Side -->
                        <div class="dropdown-menu-column">
                            <a class="dropdown-item" wire:navigate href="{{ route('settings.general', ['subdomain' => current_company()->domain_name, 'view' => 'purchase']) }}">
                                {{ __('Paramètre') }}
                            </a>
                            <a class="dropdown-item" wire:navigate href="{{ route('sales.teams.index', ['subdomain' => current_company()->domain_name]) }}">
                                {{ __('Listes de prix fournisseurs') }}
                            </a>

                            <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                              {{ __('Produits') }}
                            </a>
                            <div class="dropdown-menu">
                              <a wire:navigate href="{{ route('employee.department.index', ['subdomain' => current_company()->domain_name]) }}" class="dropdown-item">
                                {{ __('Catégories produits') }}
                              </a>
                            </div>

                        </div>
                    </div>
                </div>
            </li>

          </ul>

        </div>
      </div>
    </div>
  </div>
