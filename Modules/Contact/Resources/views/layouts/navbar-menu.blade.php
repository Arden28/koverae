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

            <li class="nav-item">
                <a class="btn" wire:navigate href="{{ route('contacts.index', ['subdomain' => current_company()->domain_name]) }}" style="margin-right: 5px;">
                  <span class="nav-link-title">
                      {{ __('Contacts') }}
                  </span>
                </a>
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
                            <a class="dropdown-item" wire:navigate href="{{ route('contacts.titles.index', ['subdomain' => current_company()->domain_name]) }}">
                                {{ __('Titres honorifiques') }}
                            </a>
                            <a class="dropdown-item" wire:navigate href="{{ route('contacts.industries.index', ['subdomain' => current_company()->domain_name]) }}">
                                {{ __('Industries') }}
                            </a>
                            <a class="dropdown-item" wire:navigate href="{{ route('contacts.tags.index', ['subdomain' => current_company()->domain_name]) }}">
                                {{ __('Etiquettes') }}
                            </a>
                            <hr>
                            <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                              {{ __('Localisation') }}
                            </a>
                            <div class="dropdown-menu">
                              <a wire:navigate href="{{ route('contacts.countries.index', ['subdomain' => current_company()->domain_name]) }}" class="dropdown-item">
                                {{ __('Pays') }}
                              </a>
                              <a wire:navigate href="{{ route('employee.department.index', ['subdomain' => current_company()->domain_name]) }}" class="dropdown-item">
                                {{ __('Etats Fed.') }}
                              </a>
                              <a wire:navigate href="{{ route('employee.department.index', ['subdomain' => current_company()->domain_name]) }}" class="dropdown-item">
                                {{ __('Groupe de Pays') }}
                              </a>
                            </div>
                            <hr>
                            <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                              {{ __('Comptes Bancaires') }}
                            </a>
                            <div class="dropdown-menu">
                              <a wire:navigate href="{{ route('contacts.banks.index', ['subdomain' => current_company()->domain_name]) }}" class="dropdown-item">
                                {{ __('Banques') }}
                              </a>
                              <a wire:navigate href="{{ route('contacts.banks.accounts.index', ['subdomain' => current_company()->domain_name]) }}" class="dropdown-item">
                                {{ __('Comptes bancaires') }}
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
