
<div class="mb-4 container-xl">
    <div class="mb-2 row g-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
            {{ __('My Apps') }}
            </h2>
        </div>
    </div>
    <ul class="mb-1 nav nav-bordered">
        <li class="nav-item">
            <a class="nav-link active" id="my-app-tab" data-bs-toggle="tab" data-bs-target="#my-app" type="button" role="tab" aria-controls="my-app" aria-selected="true" ><b>{{ __('My Apps') }}</b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="recently-used-tab" data-bs-toggle="tab" data-bs-target="#recently-used" type="button" role="tab" aria-controls="recently-used" aria-selected="true"><b>{{ __('Recently Used') }}</b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="my-favourite-tab" data-bs-toggle="tab" data-bs-target="#my-favourite" type="button" role="tab" aria-controls="my-favourite" aria-selected="true"><b>{{ __('My Favourites') }}</b></a>
        </li>
    </ul>
    <!-- App -->
    <div class="tab-content" id="nav-tabContent">
        <div class="p-2 mt-3 bg-white rounded shadow app_list tab-pane fade show active" id="my-app" role="tabpanel" aria-labelledby="my-app-tab">
            <div class="row">
                @foreach(modules() as $module)
                    @if(module($module->slug))
                    <div class="pt-2 pb-2 mb-3 rounded cursor-pointer app col-6 col-lg-3">
                        <div class="gap-1 d-flex">
                            <a class="text-decoration-none" wire:click="openApp({{ $module->id }})">
                                <img src="{{ asset('assets/images/apps/'.$module->icon.'.png') }}" height="40px" width="40px" alt="" class="rounded app_icon">
                            </a>
                            <a href="{{ route($module->link, ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="text-decoration-none font-weight-bold" wire:click.prevent="openApp({{ $module->id }})">
                                <span>{{ $module->short_name }}</span>
                            </a>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="p-3 mt-3 bg-white rounded shadow tab-pane fade" id="recently-used" role="tabpanel" aria-labelledby="recently-used-tab">
            {{ __("No applications have been used yet.") }}
        </div>
        <div class="p-3 mt-3 bg-white rounded shadow tab-pane fade" id="my-favourite" role="tabpanel" aria-labelledby="my-favourite-tab">
            {{ __("You don't have Favorites Apps.") }}
        </div>
    </div>

</div>
{{-- <div class="tab-content" id="nav-tabContent">
    <div class="p-2 mt-3 bg-white rounded shadow app_list tab-pane fade show active" id="my-app" role="tabpanel" aria-labelledby="my-app-tab">
        <div class="row">
            @foreach($modules as $module)
                @if(module($module->slug))
                <div class="pt-2 pb-2 mb-3 rounded cursor-pointer app col-6 col-lg-3">
                    <div class="gap-1 d-flex">
                        <a class="text-decoration-none" wire:click="openApp({{ $module->id }})">
                            <img src="{{ asset('assets/images/apps/'.$module->icon.'.png') }}" height="40px" width="40px" alt="" class="rounded app_icon">
                        </a>
                        <a href="{{ route($module->link, ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="text-decoration-none font-weight-bold" wire:click.prevent="openApp({{ $module->id }})">
                            <span>{{ $module->short_name }}</span>
                        </a>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="p-3 mt-3 bg-white rounded shadow tab-pane fade" id="my-favourite" role="tabpanel" aria-labelledby="my-favourite-tab">
        {{ __("You don't have Favorites Apps.") }}
    </div>
</div> --}}

