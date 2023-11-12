<div class="navbar-expand-md d-print-none">
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="navbar navbar-light">
        <div class="container-xl">
          <ul class="navbar-nav">

            <li class="nav-item page-module">
                <a class="btn" style="margin-right: 5px;" wire:navigate href="{{ route('main', ['subdomain' => current_company()->domain_name]) }}" >
                  <span class="nav-link-title">
                      <i class="bi bi-arrow-left-square" style="width: 16px; height: 16px;" ></i>
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
                            <a class="dropdown-item" wire:navigate href="{{ route('sales.quotations.index', ['subdomain' => current_company()->domain_name]) }}">
                                {{ __('Devis') }}
                            </a>
                            <a class="dropdown-item" wire:navigate href="{{ route('sales.index', ['subdomain' => current_company()->domain_name]) }}">
                                {{ __('Commandes') }}
                            </a>
                            <a class="dropdown-item" wire:navigate href="{{ route('sales.customers.index', ['subdomain' => current_company()->domain_name]) }}">
                                {{ __('Clients') }}
                            </a>
                            <a class="dropdown-item" wire:navigate href="{{ route('sales.teams.index', ['subdomain' => current_company()->domain_name]) }}">
                                {{ __('Equipes commerciales') }}
                            </a>
                        </div>
                    </div>
                </div>
            </li>

            <!-- To invoice -->
            <li class="nav-item dropdown" data-turbolinks>
                <a class="btn dropdown-toggle" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-title">
                      {{ __('A Facturer') }}
                  </span>
                </a>
                <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                        <!-- Left Side -->
                        <div class="dropdown-menu-column">
                            <a class="dropdown-item" wire:navigate href="{{ route('sales.index', ['subdomain' => current_company()->domain_name, 'to' => 'to_invoice']) }}">
                                {{ __('Commandes à facturer') }}
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
                            <a class="dropdown-item" wire:navigate href="{{ route('settings.general', ['subdomain' => current_company()->domain_name, 'page' => 'sales']) }}">
                                {{ __('Paramètre') }}
                            </a>
                            <a class="dropdown-item" wire:navigate href="{{ route('sales.teams.index', ['subdomain' => current_company()->domain_name]) }}">
                                {{ __('Equipes Commerciales') }}
                            </a>

                            <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                              {{ __('Commandes') }}
                            </a>
                            <div class="dropdown-menu">
                              <a wire:navigate href="{{ route('employee.department.index', ['subdomain' => current_company()->domain_name]) }}" class="dropdown-item">
                                {{ __('Etiquettes') }}
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
