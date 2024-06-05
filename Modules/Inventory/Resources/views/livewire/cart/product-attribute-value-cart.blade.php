<div>
    <!-- Table -->
    <div class="mb-2 table-responsive w-100 ">
        <table class="table card-table text-nowrap">
            <thead class="order-table">
                <tr class="order-tr">
                    <th><button class="table-sort">{{ __('Valeur') }}</button></th>
                    <th><button class="table-sort">{{ __('Prix supplémentaire') }}</button></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inputs as $key => $value)
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <input type="number" wire:model.blur="inputs.{{ $key }}.name" min class="k_input" {{ $this->blocked ? 'disabled' : '' }}>
                        @error("inputs.{{ $key }}.name") <span class="text-danger">{{ $message }}</span> @enderror
                    </td>
                    <td class="k_field_list">
                        <input type="number" wire:model.blur="inputs.{{ $key }}.price" min class="k_input" {{ $this->blocked ? 'disabled' : '' }}>
                    </td>
                    <td class="cursor-pointer k_field_list {{ $this->blocked ? 'd-none' : '' }}">
                        <span wire:click.prevent="remove({{$key}})">
                            <i class="bi bi-trash"></i>
                        </span>
                    </td>
                </tr>
                @endforeach
                <tr class="k_field_list_row {{ $this->blocked ? 'd-none' : '' }}">
                    <td class="k_field_list">
                        <span wire:click.prevent="add({{$i}})" class="cursor-pointer " href="avoid:js">
                            <i class="bi bi-plus-circle"></i> Ajouter une ligne
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
