<!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" crossorigin="anonymous">

<!-- CSS files -->
    <link href="{{ asset('assets/dist/css/tabler.min.css')}}?1668287865"  rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-vendors.min.css')}}?1668287865" rel="stylesheet"/>
    <link href="{{ asset('/assets/css/style.css')}}?1668287814215" rel="stylesheet"/>

<!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Dropezone CSS -->
    <!--<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">-->

@yield('styles')

@yield('third_party_stylesheets')

@bukStyles(true)

@notifyCss

@stack('page_css')
