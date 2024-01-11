@props([
    'value',
    'data'
])
    <!-- Left Side -->
    <div class="k_inner_group col-md-12 col-lg-12">
        <!-- separator -->
        <div class="g-col-sm-2">
            <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                    {{ $value->label }}
            </div>
        </div>

        <div class="table-responsive" style="margin-top: 10px;">
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th><button class="table-sort" data-sort="sort-name">{{ __('Action') }}</button></th>
                        <th><button class="table-sort" data-sort="sort-name">{{ __("Emplacement d'origine") }}</button></th>
                        <th><button class="table-sort" data-sort="sort-name">{{ __("Emplacement de destination") }}</button></th>
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

        {{-- @foreach($this->tables() as $table)
            @if($table->group == $value->key)
                <x-dynamic-component
                    :component="$table->component"
                    :value="$table"
                >
                </x-dynamic-component>
            @endif
        @endforeach --}}

        @foreach($this->inputs() as $input)
            @if($input->group == $value->key)
                <x-dynamic-component
                    :component="$input->component"
                    :value="$input"
                >
                </x-dynamic-component>
            @endif
        @endforeach

    </div>


