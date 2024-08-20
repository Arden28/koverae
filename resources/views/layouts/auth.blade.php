<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Koverae</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo/favicon.ico')}}" />

    <!-- CSS files -->
    <link href="{{ asset('assets/dist/css/tabler.min.css?'.time())}}" rel="stylesheet"/>
    {{-- <link href="{{ asset('assets/dist/css/tabler-vendors.min.css?'.time())}}" rel="stylesheet"/> --}}
    <link href="{{ asset('assets/css/style.css?'.time())}}" rel="stylesheet"/>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
      </style>
</head>
<body>
    <main class="page-content">
        <div class="justify-content-lg-center d-flex">
            @yield('content')
        </div>
    </main>
</body>
</html>
