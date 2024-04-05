<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ current_company()->name }} - @yield('title') | Koverae</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo/favicon.ico')}}" />

    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>
    @laravelPWA
    @include('includes.main-css')
    @include('includes.main-js')

    @livewireStyles
    @livewireScripts

    @livewire('wire-elements-modal')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>
<body>

    <script src="{{ asset('assets/dist/js/demo-theme.min.js')}}?1668287865" data-navigate-track></script>
    <div class="page">
      <!-- Navbar -->
      @include('layouts.navbar')
      <!-- Navbar -->


        <div class="page-wrapper">

            <!-- Page header -->
            @yield('breadcrumb')

            <!-- Page body -->
            @yield('content')

            <!-- Footer -->
            {{-- <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                  <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-lg-auto ms-lg-auto">
                      <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item"><a href="./docs/" class="link-secondary">{{__('Documentation')}}</a></li>
                        <li class="list-inline-item"><a href="./license.html" class="link-secondary">{{__('License')}}</a></li>
                      </ul>
                    </div>
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                      <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                          Copyright &copy; 2023
                          <a href="." class="link-secondary">Koverae</a>.
                          {{ __('Tous droits réservés') }}
                        </li>
                        <li class="list-inline-item">
                          <a href="./changelog.html" class="link-secondary" rel="noopener">
                            v-beta
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
            </footer> --}}

        </div>

    </div>
</body>
</html>
