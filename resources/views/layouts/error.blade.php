<!DOCTYPE HTML>

<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{ current_company()->name }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo/favicon.ico')}}" />

    <!-- CSS files -->
    <link href="{{ asset('assets/dist/css/tabler.min.css')}}?1668287865" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    @livewireStyles

    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>
  </head>
  <body >
    <div class="bg-white page">
      <div class="page-wrapper">
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl d-flex flex-column justify-content-center">
            <div class="k_nocontent_help empty">
              <div class="">
                @yield('image')
              </div>
              <p class="empty-title">
                @yield('code', __('Oh non !'))
              </p>
              <p class="empty-subtitle text-muted">
                @yield('message')
              </p>
              <div class="empty-action">
                {{-- @auth --}}
                <a  wire:navigate href="{{ route('main', ['subdomain' => current_company()->domain_name]) }}" class="gap-1 btn btn-primary font-weight-bold" style="background-color: #3d6a6b;">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <i class="mr-2 bi bi-house"></i>
                  <span class="ml-4">{{ __("Retouner à l'acceuil") }}</span>
                </a>
                {{-- @endauth --}}
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js" defer></script>
    @livewireScripts
  </body>
</html>
