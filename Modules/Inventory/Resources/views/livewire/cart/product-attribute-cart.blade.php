<div>
    <!-- Table -->
    <div class="table-responsive w-100 mb-2">
        <table class="table card-table text-nowrap">
            <thead class="order-table">
                <tr class="order-tr">
                    <th><button class="table-sort">{{ __('Attribut') }}</button></th>
                    <th><button class="table-sort">{{ __('Valeurs') }}</button></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inputs as $key => $value)
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <input type="number" wire:model.blur="inputs.{{ $key }}.name" min class="k_input">
                        @error("inputs.{{ $key }}.name") <span class="text-danger">{{ $message }}</span> @enderror
                    </td>
                    <td class="k_field_list">
                        <input type="number" wire:model.blur="inputs.{{ $key }}.values" min class="k_input">
                        @error("inputs.{{ $key }}.values") <span class="text-danger">{{ $message }}</span> @enderror
                    </td>
                    <td class="k_field_list cursor-pointer">
                        <span wire:click.prevent="remove({{$key}})">
                            <i class="bi bi-trash"></i>
                        </span>
                    </td>
                </tr>
                @endforeach
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <span class=" cursor-pointer" href="avoid:js">
                            <i class="bi bi-plus-circle"></i> Ajouter une ligne
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
