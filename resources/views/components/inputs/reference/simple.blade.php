@props([
    'value',
    'data'
])
@if($this->reference)
<h1 class="d-flex flex-row align-items-center">

    {{ $this->reference }}
    <!-- Special buttons -->
    {{-- <div class="btn-group">
        <button type="button" class="" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-gear-fill fa-xs"></i>
        </button>
        <ul class="dropdown-menu">
            @foreach($this->actionButtons() as $action_button)
            <x-dynamic-component
                :component="$action_button->component"
                :value="$action_button"
                :status="$status"
            >
            </x-dynamic-component>
            @endforeach
        </ul>
    </div>

    <div wire:dirty>
        <button type="submit" wire:target="{{ $this->form() }}" wire:loading.remove title="Sauvegarder les changements...."><i class="bi bi-cloud-arrow-up-fill fa-xs"></i></button>
        <button type="submit" wire:loading class="disabled" title="Sauvegarder les changements....">...</button>
    </div> --}}
</h1>
@endif
