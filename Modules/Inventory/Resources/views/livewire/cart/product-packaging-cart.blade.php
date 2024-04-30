<div>
    <!-- Table -->
    <div class="table-responsive w-100 mb-2">
        <table class="table card-table text-nowrap">
            <thead class="order-table">
                <tr class="order-tr">
                    <th><button class="table-sort">{{ __('Conditionnement') }}</button></th>
                    <th><button class="table-sort">{{ __('Quantité contenue') }}</button></th>
                    <th><button class="table-sort">{{ __('Ventes') }}</button></th>
                    <th><button class="table-sort">{{ __('Achats') }}</button></th>
                    <th><button class="table-sort">{{ __('Code-barres') }}</button></th>
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
                        <input type="number" wire:model.blur="inputs.{{ $key }}.quantity" min class="k_input">
                    </td>
                    <td class="k_field_list">
                        <input type="number" wire:model.blur="inputs.{{ $key }}.barcode" min class="k_input">
                    </td>
                    <td class="k_field_list">
                        <input type="checkbox" wire:model.blur="inputs.{{ $key }}.saleable" class="form-check-input">
                    </td>
                    <td class="k_field_list">
                        <input type="checkbox" wire:model.blur="inputs.{{ $key }}.buyable" class="form-check-input">
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
                        <span wire:click.prevent="add({{$i}})" class=" cursor-pointer" href="avoid:js">
                            <i class="bi bi-plus-circle"></i> Ajouter une ligne
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
