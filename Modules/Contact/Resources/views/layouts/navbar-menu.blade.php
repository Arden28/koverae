<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">

    <li class="nav-item" data-turbolinks>
        <a class="nav-link kover-navlink" style="margin-right: 5px;" href="{{ route('main', ['subdomain' => current_company()->domain_name]) }}">
          <span class="nav-link-icon d-md-none d-lg-inline-block">
            <img class="custom-image" src="{{ asset('assets/images/apps/contact.png') }}" alt="">
          </span>
          <span class="nav-link-title">
            {{ __('translator::contacts.navbar.module') }}
          </span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link kover-navlink" wire:navigate href="{{ route('contacts.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" style="margin-right: 5px;">
          <span class="nav-link-title">
            {{ __('translator::contacts.navbar.contacts') }}
          </span>
        </a>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
            {{ __('translator::contacts.navbar.configuration.name') }}
          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="{{ route('contacts.titles.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('translator::contacts.navbar.configuration.honorifics') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('contacts.tags.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('translator::contacts.navbar.configuration.contact-labels') }}
                    </a>
                    <a class="dropdown-item" wire:navigate href="{{ route('contacts.industries.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('translator::contacts.navbar.configuration.industries') }}
                    </a>
                    <div class="dropend">
                        <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          {{ __('translator::contacts.navbar.configuration.localization.name') }}
                        </a>
                        <div class="dropdown-menu">
                            <a wire:navigate href="{{ route('contacts.countries.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                              {{ __('translator::contacts.navbar.configuration.localization.country-groups') }}
                            </a>
                            <a wire:navigate href="{{ route('contacts.countries.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                                {{ __('translator::contacts.navbar.configuration.localization.countries') }}
                            </a>
                            <a wire:navigate href="{{ route('contacts.countries.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                                {{ __('translator::contacts.navbar.configuration.localization.states') }}
                            </a>
                        </div>
                    </div>

                    <div class="dropend">
                        <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          {{ __('translator::contacts.navbar.configuration.bank-accounts.name') }}
                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="{{ route('contacts.banks.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __('translator::contacts.navbar.configuration.bank-accounts.banks') }}
                          </a>
                          <a wire:navigate href="{{ route('contacts.banks.accounts.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __('translator::contacts.navbar.configuration.bank-accounts.bank-accounts') }}
                          </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </li>

</div>
