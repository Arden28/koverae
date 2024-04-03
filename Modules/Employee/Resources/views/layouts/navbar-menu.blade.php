<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">

    <li class="nav-item" data-turbolinks>
        <a class="nav-link kover-navlink" style="margin-right: 5px;" href="{{ route('main', ['subdomain' => current_company()->domain_name]) }}">
          <span class="nav-link-icon d-md-none d-lg-inline-block">
            <img class="custom-image" src="{{ asset('assets/images/apps/employee.png') }}" alt="">
          </span>
          <span class="nav-link-title">
              {{ __('Employé') }}
          </span>
        </a>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              {{ __('Employés') }}
          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="{{ route('employee.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Employés') }}
                    </a>
                </div>
            </div>
        </div>
    </li>

    <li class="nav-item" data-turbolinks>
        <a class="nav-link kover-navlink" wire:navigate style="margin-right: 5px;" href="{{ route('employee.department.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
          <span class="nav-link-title">
              {{ __('Départements') }}
          </span>
        </a>
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
                    <a class="dropdown-item" wire:navigate href="{{ route('settings.general', ['subdomain' => current_company()->domain_name, 'page' => 'employee', 'menu' => current_menu()]) }}">
                        {{ __('Paramètre') }}
                    </a>

                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          {{ __('Employé') }}
                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="{{ route('employee.department.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __('Départements') }}
                          </a>
                          <a wire:navigate href="{{ route('employee.workplaces.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __('Lieux de travail') }}
                          </a>
                          <!--
                          <a href="./cards-masonry.html" class="dropdown-item">
                            {{ __('Raison de départ') }}
                          </a>
                            -->
                        </div>
                    </div>

                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          {{ __('Recrutement') }}
                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="{{ route('employee.jobs.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="dropdown-item">
                            {{ __('Emplois') }}
                          </a>
                          {{-- <a wire:navigate href="{{route('employee.jobTypes.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])}}" class="dropdown-item">
                            {{ __("Type d'emploi") }}
                          </a> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </li>
</div>
