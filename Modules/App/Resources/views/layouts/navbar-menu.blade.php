<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
    <li class="nav-item" data-turbolinks>
        <a class="nav-link kover-navlink" style="margin-right: 5px;" href="{{ route('main', ['subdomain' => current_company()->domain_name]) }}">
          <span class="nav-link-icon d-md-none d-lg-inline-block">
            <img class="custom-image" src="{{ asset('assets/images/apps/apps.png') }}" alt="">
          </span>
          <span class="nav-link-title">
              {{ __('Applications') }}
          </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link kover-navlink" wire:navigate href="{{ route('apps.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" style="margin-right: 5px;">
          <span class="nav-link-title">
              {{ __('Applications') }}
          </span>
        </a>
    </li>

</div>
