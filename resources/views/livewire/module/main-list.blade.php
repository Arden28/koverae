<div class="row">

    @foreach($modules as $module)
        @if(module($module->slug))
        <div class="col-3 col-md-2 k_draggable p-1 p-md-2 cursor-pointer">
            <a wire:click.prevent="openApp({{ $module->id }})" class="k_app k_menuitem d-flex flex-column justify-content-start align-items-center w-100 rounded">
                <img src="{{ asset('assets/images/apps/'.$module->icon.'.png') }}" alt="" class="k_app_icon rounded">

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
        <a href="{{ route('settings.general', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}" class="k_app k_menuitem d-flex flex-column justify-content-start align-items-center w-100 rounded">
            <img src="{{ asset('assets/images/apps/settings.png') }}" alt="" class="k_app_icon rounded">

            <div class="k_caption w-100 text-center text-truncate mt-2">
                Paramètre
            </div>
        </a>
    </div>
</div>
