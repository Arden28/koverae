<div class="bg-white row app_list">
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
        {{-- <div class="ml-2 cursor-pointer col-3 col-md-2 k_draggable k_app">
            <a wire:click.prevent="openApp({{ $module->id }})" class="rounded k_menuitem d-flex flex-column text-decoration-none justify-content-start align-items-center w-100">
                <img src="{{ asset('assets/images/apps/'.$module->icon.'.png') }}" alt="" class="rounded k_app_icon">

                <div class="mt-2 text-center k_caption w-100 text-truncate">
                    {{ $module->name }}
                </div>
            </a>
        </div> --}}
        @endif
    @endforeach
</div>

{{-- <div class="row">
    @foreach($modules as $module)
        @if(module($module->slug))
        <div class="mb-3 col-lg-2">
            <img src="{{ asset('assets/images/apps/'.$module->icon.'.png') }}" height="70px" alt="Point de vente" class="rounded-1">
            <div class="mt-2 nowrap">
                {{ $module->name }}
            </div>
        </div>
        @endif
    @endforeach
</div> --}}
