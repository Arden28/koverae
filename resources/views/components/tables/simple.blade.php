@props([
    'value',
    'data'
])

<div class="table-responsive">
    <table class="table card-table table-vcenter text-nowrap datatable">
        <thead class="order-table">
            <tr class="order-tr">
                @foreach($this->columns() as $column)
                    @if($column->table === $value->key)
                    <th class="cursor-pointer">
                        {{ $column->label }}
                    </th>
                    @endif
                @endforeach
                <th></th>
            </tr>
        </thead>
        <tbody>
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
