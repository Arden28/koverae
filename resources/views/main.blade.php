<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> --}}

    <title>{{ current_company()->name }} - Koverae</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo/favicon.ico')}}" />
    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link href="{{ asset('/assets/css/style.css')}}?166828781425" rel="stylesheet"/>

    @livewireStyles
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar k_main_navbar">
        <!-- Content on the left side of the navbar -->

        <!-- Content on the right side of the navbar -->
        <div class="button-navbar">
            <!-- Were buttons -->
            <button id="chatButton" class="dropdown-toggle">
                <i class="bi bi-chat-text">
                    <span class="k-notification-badge">3</span>
                </i>
                <span class="k-mail-messaging">

                </span>
            </button>
            <button id="alarmButton" class="dropdown-toggle">
                <i class="bi bi-stopwatch">
                    <span class="k-notification-badge">5</span>
                </i>
            </button>
            <button class="dropdown-toggle">
                <img src="{{ asset('assets/images/profile/user_default.png') }}" alt="" class="k_avatar rounded">
            </button>
        </div>
        <!-- Add the side navigation panel -->
        <div id="sideNav" class="side-navigation-panel">
            <!-- Close icon -->
            <i id="closeIcon" class="bi bi-x-circle" style="top: 10px; right: 10px;"></i>
            <!-- ... Contents of the side navigation ... -->
        </div>

    </nav>
    <div class="k_home_menu col-auto">
        {{-- <div class="k_home_menu overflow-auto h-100"> --}}
        <div class="container justify-content-center">

                @if(Auth::user()->hasVerifiedEmail())
                <div class="database_expiration_panel">
                    <span class="k_instance_register_main">
                        Votre base de données sera désactivée dans 3h. <a href="{{ route('verification.notice') }}">Confirmez votre adresse mail</a>
                    </span>
                </div>
                @elseif(subscribed(Auth::user()->team->id)->isOnTrial())
                <div class="database_expiration_panel">
                    <span class="k_instance_register_main">
                        Votre essai gratuit expire dans <b>{{ Auth::user()->team->getTrialPeriodRemainingUsageIn('day') }} jours</b>. L'abonnement choisi débutéra immédiatement après la fin de votre essai.
                    </span>
                </div>
                @endif
            <div class="row">

                @foreach($modules as $module)
                    @if(module($module->slug))
                    <div class="col-3 col-md-2 k_draggable p-1 p-md-2">
                        <a href="{{ route($module->link, ['subdomain' => $subdomain]) }}" class="k_app k_menuitem d-flex flex-column justify-content-start align-items-center w-100 rounded">
                            <img src="{{ asset('assets/images/apps/'.$module->slug.'.png') }}" alt="" class="k_app_icon rounded">

                            <div class="k_caption w-100 text-center text-truncate mt-2">
                                {{ $module->name }}
                            </div>
                        </a>
                    </div>
                    @endif
                @endforeach

                <div class="col-3 col-md-2 k_draggable p-1 p-md-2">
                    <a href="" class="k_app k_menuitem d-flex flex-column justify-content-start align-items-center w-100 rounded">
                        <img src="{{ asset('assets/images/apps/todo.png') }}" alt="" class="k_app_icon rounded">

                        <div class="k_caption w-100 text-center text-truncate mt-2">
                            Todo
                        </div>
                    </a>
                </div>
                <div class="col-3 col-md-2 k_draggable p-1 p-md-2">
                    <a href="{{ route('settings.general', ['subdomain' => $subdomain]) }}" class="k_app k_menuitem d-flex flex-column justify-content-start align-items-center w-100 rounded">
                        <img src="{{ asset('assets/images/apps/settings.png') }}" alt="" class="k_app_icon rounded">

                        <div class="k_caption w-100 text-center text-truncate mt-2">
                            Paramètre
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
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
