<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">

    <li class="nav-item" data-turbolinks>
        <a class="nav-link kover-navlink" style="margin-right: 5px;" href="{{ route('main', ['subdomain' => current_company()->domain_name]) }}">
          <span class="nav-link-icon d-md-none d-lg-inline-block">
            <img class="custom-image" src="{{ asset('assets/images/apps/dashboards.png') }}" alt="">
          </span>
          <span class="nav-link-title">
              {{ __('Tableaux de bord') }}
          </span>
        </a>
    </li>

    <li class="nav-item" data-turbolinks>
        <a class="nav-link kover-navlink" wire:navigate style="margin-right: 5px;" href="{{ route('dashboards.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
          <span class="nav-link-title">
              {{ __('Tableaux de bords') }}
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
                    <a class="dropdown-item" wire:navigate href="{{ route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}">
                        {{ __('Tableaux de bord') }}
                    </a>

                </div>
            </div>
        </div>
    </li>
</div>
