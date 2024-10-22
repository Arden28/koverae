<div>
    <!-- Table -->
    <div class="table-responsive w-100">
        <table class="table card-table text-nowrap">
            <thead class="order-table">
                <tr class="order-tr">
                    <th><button class="table-sort">{{ __('Produit') }}</button></th>
                    <th><button class="table-sort">{{ __('Description') }}</button></th>
                    <th><button class="table-sort">{{ __('Date Prévue') }}</button></th>
                    <th><button class="table-sort">{{ __("Date D'échéance") }}</button></th>
                    <th><button class="table-sort">{{ __('Demande') }}</button></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inputs as $key => $value)
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        {{-- <livewire:search.search-input-text wire:model.live="inputs.{{ $key }}.product" :key="$key" /> --}}
                        <select wire:model.live="inputs.{{ $key }}.product" id="" class="k_input" {{ $this->blocked ? 'disabled' : '' }}>
                            <option value=""></option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                        @error("inputs.{{ $key }}.product") <span class="text-danger">{{ $message }}</span> @enderror
                    </td>
                    <td class="k_field_list">
                        <input type="text" wire:model.blur="inputs.{{ $key }}.description" class="k_input" id="cart-input" {{ $this->blocked ? 'disabled' : '' }}>
                    </td>
                    <td class="k_field_list">
                        <input type="datetime-local" wire:model.blur="inputs.{{ $key }}.schedule_date" class="k_input" id="cart-input" {{ $this->blocked ? 'disabled' : '' }}>
                    </td>
                    <td class="k_field_list">
                        <input type="datetime-local" wire:model.blur="inputs.{{ $key }}.deadline_date" class="k_input" {{ $this->blocked ? 'disabled' : '' }}>
                    </td>
                    <td class="k_field_list">
                        <input type="number" wire:model.blur="inputs.{{ $key }}.demand" class="k_input" {{ $this->blocked ? 'disabled' : '' }}>
                    </td>
                    {{-- <td class="k_field_list">
                        {{ $inputs[$key]['quantity'] * 2 }} {{ $inputs[$key]['product'] }} : {{ $inputs[$key]['quantity'] * 50 }}
                    </td> --}}
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
