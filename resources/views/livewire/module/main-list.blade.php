<div class="row justify-content-center text-center">
    @foreach($modules as $module)
        @if(module($module->slug))
        <div class="col-3 col-md-2 ml-2 k_draggable k_app cursor-pointer">
            <a wire:click.prevent="openApp({{ $module->id }})" class="k_menuitem d-flex flex-column text-decoration-none justify-content-start align-items-center w-100 rounded">
                <img src="{{ asset('assets/images/apps/'.$module->icon.'.png') }}" alt="" class="k_app_icon rounded">

                <div class="k_caption w-100 text-center text-truncate mt-2">
                    {{ $module->name }}
                </div>
            </a>
        </div>
        @endif
    @endforeach
</div>

{{-- <div class="row">
    @foreach($modules as $module)
        @if(module($module->slug))
        <div class="col-lg-2  mb-3">
            <img src="{{ asset('assets/images/apps/'.$module->icon.'.png') }}" height="70px" alt="Point de vente" class="rounded-1">
            <div class="nowrap mt-2">
                {{ $module->name }}
            </div>
        </div>
        @endif
    @endforeach
</div> --}}
