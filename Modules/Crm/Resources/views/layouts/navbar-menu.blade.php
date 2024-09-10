<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">

    <li class="nav-item" data-turbolinks>
        <a class="nav-link kover-navlink" style="margin-right: 5px;" href="{{ route('main', ['subdomain' => current_company()->domain_name]) }}">
          <span class="nav-link-icon d-md-none d-lg-inline-block">
            <img class="custom-image" src="{{ asset('assets/images/apps/crm.png') }}" alt="">
          </span>
          <span class="nav-link-title">
              {{ __('CRM') }}
          </span>
        </a>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              {{ __('Sales') }}
          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="{{ route('contacts.titles.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('My Pipelines') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('contacts.industries.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Industries') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('contacts.tags.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Etiquettes') }}
                    </a>
                    <div class="dropend">
                        <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          {{ __('Localisation') }}
                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="{{ route('contacts.countries.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __('Pays') }}
                          </a>
                          {{-- <a wire:navigate href="{{ route('employee.department.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __('Etats Fed.') }}
                          </a>
                          <a wire:navigate href="{{ route('employee.department.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __('Groupe de Pays') }}
                          </a> --}}
                        </div>
                    </div>

                    <div class="dropend">
                        <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          {{ __('Comptes Bancaires') }}
                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="{{ route('contacts.banks.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __('Banques') }}
                          </a>
                          <a wire:navigate href="{{ route('contacts.banks.accounts.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __('Comptes bancaires') }}
                          </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </li>

</div>
