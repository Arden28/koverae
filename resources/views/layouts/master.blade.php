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

        </div>

    </div>
    
</body>
</html>
