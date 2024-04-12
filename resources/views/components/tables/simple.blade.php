@props([
    'value',
    'data'
])

<div class="table-responsive" style="margin-top: 10px;">
    <table class="table card-table table-vcenter text-nowrap datatable">
        <thead class="list-table">
            <tr class="list-tr">
                @foreach($this->columns() as $column)
                    <th class="cursor-pointer">
                        {{ $column->label }}
                    </th>
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
