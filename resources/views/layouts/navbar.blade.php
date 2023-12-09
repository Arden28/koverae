
<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
        <a href="">
            <img src="{{ asset('assets/images/logo/logo-black-gd.png') }}" alt="Koverae POS" class="navbar-brand-image">
          {{-- <img src="./dist/img/logo/logo.svg" width="320" height="120"  alt="POS" class="navbar-brand-image"> --}}
        </a>
      </h1>
      <div class="navbar-nav flex-row order-md-last">
        <div class="d-none d-md-flex">
          <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="{{ __('Mode Sombre') }}" data-bs-toggle="tooltip"
            data-bs-placement="bottom">
            <i class="bi bi-moon" style="font-size: 15px;"></i>
          </a>
          <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="{{ __('Mode Clair') }}" data-bs-toggle="tooltip"
            data-bs-placement="bottom">
            <i class="bi bi-brightness-high" style="font-size: 15px;"></i>
          </a>
          {{-- Translate --}}
          {{-- <div class="nav-item dropdown d-none d-md-flex me-3">
            <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">

              <i class="bi bi-translate" style="font-size: 15px;"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">
                    {{ __('Langues') }} : {{ Config::get('languages')[App::getLocale()] }}
                  </h5>
                </div>
                <div class="list-group list-group-flush list-group-hoverable">

                    @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                                <div class="col text-truncate">
                                    <a href="{{ route('lang.switch', $lang) }}" class="text-body d-block">
                                        {{$language}}
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <a href="" class="list-group-item-actions">
                                        <i class="bi bi-app-indicator mr-2 text-danger"></i>
                                    </a>
                                </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
              </div>
            </div>
          </div> --}}

        </div>
        {{-- Companies --}}

        @php
            $companies = Auth::user()->allCompanies();
        @endphp
          @can('access_companies')
          <div class="nav-item dropdown d-none d-md-flex me-3">
              <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">

              <i class="bi bi-building" style="font-size: 15px;"></i>
                  @if($companies->count() > 1)
                      <span class="badge bg-red">
                          {{ $companies->count() }}
                      </span>
                  @endif
              </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
              <div class="card">
                  <div class="card-header">
                  <h3 class="card-title">
                      @if($companies->count() > 1)
                      {{ __('Mes Entreprises') }}
                      @else
                      {{ __('Mon Entreprise') }}
                      @endif

                  </h3>
                  </div>
                  <div class="list-group list-group-flush list-group-hoverable">
                      @forelse ($companies as $company)
                          <div class="list-group-item">
                              <div class="row align-items-center">
                                  <div class="col-auto">
                                  @if(Auth::user()->currentCompany->id == $company->id)
                                      <span class="status-dot status-dot-animated bg-green d-block"></span>
                                  @endif

                                  </div>
                                  <div class="col text-truncate text-muted text-truncate mt-n1">
                                      <a class="text-body d-block">
                                        <span class="avatar avatar-sm" style="background-image: url({{ Auth::user()->currentCompany->getFirstMediaUrl('avatars') }})"></span>
                                          {{ $company->name }}
                                      </a>
                                  </div>
                                  <div class="col-auto">
                                      {{-- When the Company Id == the current connected Company --}}
                                      @if(Auth::user()->currentCompany->id == $company->id)
                                          <a href="" class="list-group-item-actions">
                                              <i class="bi bi-eye mr-1 text-primary"></i>
                                          </a>
                                      @else
                                          <a class="list-group-item-actions">
                                              <i class="bi bi-broadcast-pin mr-1 text-primary"></i>
                                          </a>
                                      @endif
                                  </div>
                              </div>
                          </div>

                      @empty
                          <div class="list-group-item">
                              <div class="row align-items-center">
                                  <div class="col-auto">
                                      <p class="col text-truncate">
                                          {{ __('Vous n\'avez aucune entreprise.') }}
                                      </p>
                                  </div>
                              </div>
                          </div>
                      @endforelse

                  </div>
              </div>
              </div>
          </div>
          @endcan

        {{-- User --}}
        <div class="nav-item dropdown">
          <a href="#" class="nav-link d-flex lh-1 text-reset p-0 placeholder-glow" data-bs-toggle="dropdown" aria-label="Open user menu">
            {{-- <img class="avatar avatar-sm"  src="{{ auth()->user()->getFirstMediaUrl('avatars') }}" alt="Profile Image"> --}}
            <span class="avatar avatar-sm" style="background-image: url({{ auth()->user()->getFirstMediaUrl('avatars') }})"></span>
            <div class="d-none d-xl-block ps-2">
                <div>
                    {{ trim(strrchr(auth()->user()->name, ' ')) }}
                </div>
              <div class="mt-1 small text-muted">
                <span class="font-italic">{{ __('En Ligne') }} <i class="bi bi-circle-fill text-success" style="font-size: 11px;"></i></span>
              </div>

            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <a href="" class="dropdown-item">
                {{ __('Mon Profile') }}
            </a>
            <div class="dropdown-divider"></div>
            {{--
            <a href="{{ route('subby.index') }}" class="dropdown-item">
                {{ __('Mes abonnements') }}
            </a>
            <div class="dropdown-divider"></div> --}}

            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                {{ __('Me déconnecter') }}
            </a>
            <form id="logout-form" action="" method="POST" class="d-none">
                @csrf
            </form>

          </div>
        </div>
      </div>

    </div>
</header>
