
<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="navbar navbar-light">
        <div class="container-xl">
          <ul class="navbar-nav module-nav">

            <li class="nav-item page-module">
                <a class="btn" style="margin-right: 5px;" wire:navigate href="{{ route('main', ['subdomain' => current_company()->domain_name]) }}" >
                  <span class="nav-link-title">
                      <i class="bi bi-arrow-left-square" style="width: 16px; height: 16px;" ></i>
                  </span>
                </a>
            </li>

            {{-- <li class="nav-item page-module">
                <a class="btn" style="margin-right: 5px;" href="" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <img class="custom-image" src="{{ asset('assets/images/apps/settings.png') }}" alt="">
                  </span>
                  <span class="nav-link-title">
                      {{ __('Paramètres') }}
                  </span>
                </a>
            </li>

            @foreach (modules() as $module)
                @if(module($module->slug))
                    <li class="nav-item">
                        <a class="btn" style="margin-right: 5px;" wire:navigate href="{{ route('settings.general', ['subdomain' => current_company()->domain_name, 'page' => $module->slug]) }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <img class="custom-image" src="{{ asset('assets/images/apps/'.$module->slug.'.png') }}" alt="">
                            </span>
                            <span class="nav-link-title">
                                {{ $module->name }}
                            </span>
                        </a>
                    </li>
                @endif
            @endforeach --}}

          </ul>


        </div>
      </div>
    </div>
  </div>
