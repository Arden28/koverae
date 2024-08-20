<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ current_company()->name }} - Koverae</title>
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo/favicon.ico')}}" />
        <!-- CoreUI CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" crossorigin="anonymous">
        <link href="{{ asset('assets/dist/css/tabler.min.css')}}?166828782"  rel="stylesheet"/>
        <link rel="stylesheet" href="{{ asset('assets/css/main.css?'.time()) }}">
        <link href="{{ asset('/assets/css/style.css?'.time())}}" rel="stylesheet"/>

        @laravelPWA
        @livewireStyles
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>
    <body>

        <!-- Header -->

        <!-- Logo -->
        <div class="text-center centered-logo justify-content-center align-items-center" style="height: 60px;margin: 0 0 8px 0;">
            <img src="{{ asset('assets/images/logo/logo-black-gd.png') }}" alt="Koverae Logo" class="navbar-brand-image" style="height: 45px">
        </div>
        <div class="overflow-x-hidden k_home_menu">
            <div class="container mb-2 text-center justify-content-center align-items-center">

                <div class="database_expiration_panel">
                    <span class="k_instance_register_main">
                        Votre essai gratuit expire dans <b>{{ Auth::user()->team->getTrialPeriodRemainingUsageIn('day') }} jours</b>. L'abonnement choisi débutéra immédiatement après la fin de votre essai.
                    </span>
                </div>

                <livewire:module.main-list />
            </div>
        </div>

        <!-- Tabler Core -->
        <script src="{{ asset('assets/dist/js/tabler.min.js')}}?1668287865" ></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const chatButton = document.getElementById("chatButton");
                const sideNav = document.getElementById("sideNav");
                const closeIcon = document.getElementById("closeIcon");

                // Function to open the side navigation panel
                function openNav() {
                    sideNav.classList.add("active");
                }

                // Function to close the side navigation panel
                function closeNav() {
                    sideNav.classList.remove("active");
                }

                // Toggle navigation panel on button click
                chatButton.addEventListener("click", function () {
                    openNav();
                });

                // Close navigation panel on close icon click
                closeIcon.addEventListener("click", function () {
                    closeNav();
                });

                // Close navigation panel on clicking outside of it
                document.addEventListener("click", function (event) {
                    if (!sideNav.contains(event.target) && !chatButton.contains(event.target)) {
                        closeNav();
                    }
                });
            });
        </script>

        @livewireScripts
    </body>
</html>
