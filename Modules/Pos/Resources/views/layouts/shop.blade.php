<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title') - Koverae</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo/favicon.ico')}}" />
    <!-- CSS files -->
    <link href="{{ asset('assets/dist/css/tabler.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-flags.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-payments.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-vendors.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/demo.min.css')}}?1668287865" rel="stylesheet"/>

    @livewireStyles
    <wireui:scripts />
    <script src="https://unpkg.com/alpinejs" defer></script>

    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>
    @include('includes.main-css')
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    @include('includes.main-js')
  </head>
  <body >
    <script src="{{ asset('assets/dist/js/demo-theme.min.js')}}?1668287865"></script>
    <div class="page">

      <!-- Navbar -->
      <header class="navbar navbar-expand-md navbar-dark navbar-overlap d-print-none">
        <div class="container-fluid">
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="js:avoid">
                <img src="{{ asset('assets/images/logo/logo-white-gd.png') }}" alt="Koverae" class="navbar-brand-image">
            </a>
          </h1>

          <div class="navbar-nav flex-row order-md-last">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <i class="bi bi-list" style="font-size: 25px; line-height: 29px; color: white;"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <a href="{{ route('pos.ui.orders', ['subdomain' => current_company()->domain_name, 'pos' => current_pos()->id, 'session' =>current_pos()->sessions()->isOpened()->first()->unique_token]) }}" class="dropdown-item">Commandes <span class="badge bg-success"></span>
                <a href="#" class="dropdown-item">Verrouiller</a>
                <a href="{{ route('pos.index', ['subdomain' => current_company()->domain_name, 'menu' => 7]) }}" class="dropdown-item">Back-end</a>
                <a onclick="Livewire.dispatch('openModal', {component: 'pos::modal.close-session-modal', arguments: {session: {{ current_pos()->sessions()->isOpened()->first()->id }} }})" class="dropdown-item cursor-pointer">Fermer la session</a>
              </div>
            </div>
          </div>
          {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> --}}
        </div>
      </header>

      <div class="page-wrapper">
        <!-- Page header -->
        @yield('breadcrumb')

        <!-- Page body -->
        <div class="page-body">
            @yield('content')
        </div>

        {{-- <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2023
                    <a href="#" class="link-secondary">Koverae</a>.
                    Tous droits réservés.
                  </li>
                  <li class="list-inline-item">
                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                      v1.0.0-beta16
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer> --}}

      </div>
    </div>

	{{-- <script>
		function toggleFullscreen() {
			var element = document.getElementById("fullscreen-section");
			element.classList.toggle("active");
		}
	</script> --}}

    <!-- Modal -->
    <livewire:modal.simple-modal />

    @livewireScripts
    @livewire('wire-elements-modal')

    </body>
</html>
