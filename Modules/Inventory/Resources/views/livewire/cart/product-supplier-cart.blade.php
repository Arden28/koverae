<div>
    <!-- Table -->
    <div class="mb-2 table-responsive w-100">
        <table class="table card-table text-nowrap">
            <thead class="order-table">
                <tr class="order-tr">
                    <th><button class="table-sort">{{ __('translator::inventory.form.product.cart.supplier.name') }}</button></th>
                    <th><button class="table-sort">{{ __('translator::inventory.form.product.cart.supplier.quantity') }}</button></th>
                    <th><button class="table-sort">{{ __('translator::inventory.form.product.cart.supplier.price') }}</button></th>
                    <th><button class="table-sort">{{ __('translator::inventory.form.product.cart.supplier.delivery-lead-time') }}</button></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inputs as $key => $value)
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <select wire:model.blur="inputs.{{ $key }}.supplier" id="" class="k_input">
                            <option value=""></option>
                            @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        @error("inputs.{{ $key }}.supplier") <span class="text-danger">{{ $message }}</span> @enderror
                    </td>
                    <td class="k_field_list">
                        <input type="number" wire:model.blur="inputs.{{ $key }}.quantity" min class="k_input">
                    </td>
                    <td class="k_field_list">
                        <input type="number" wire:model.blur="inputs.{{ $key }}.price" min class="k_input">
                    </td>
                    <td class="k_field_list">
                        <input type="number" wire:model.blur="inputs.{{ $key }}.delay" class="k_input">
                    </td>
                    {{-- <td class="k_field_list">
                        {{ $inputs[$key]['quantity'] * 2 }} {{ $inputs[$key]['supplier'] }} : {{ $inputs[$key]['quantity'] * 50 }}
                    </td> --}}
                    <td class="cursor-pointer k_field_list">
                        <span wire:click.prevent="remove({{$key}})">
                            <i class="bi bi-trash"></i>
                        </span>
                    </td>
                </tr>
                @endforeach
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <span wire:click.prevent="add({{$i}})" class="cursor-pointer " href="avoid:js">
                            <i class="bi bi-plus-circle"></i> {{ __('translator::inventory.form.product.cart.supplier.add-line') }}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
