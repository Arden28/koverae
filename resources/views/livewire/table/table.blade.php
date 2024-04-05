<div>
    <!-- Table -->
    <div class="table-responsive mb-2">
        <table class="table card-table table-vcenter text-nowrap datatable">
            <thead class="list-table">
            <tr class="list-tr">
                <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                @foreach($this->columns() as $column)
                    <th wire:click="sort('{{ $column->key }}')" class="cursor-pointer">
                        {{ $column->label }}
                        <!-- Sort By -->
                        @if($sortBy === $column->key)
                          @if ($sortDirection === 'asc')
                            <i class="bi bi-arrow-up-short"></i>
                          @else
                          <i class="bi bi-arrow-down-short"></i>
                          @endif
                        @endif
                    </th>
                @endforeach
                    <th class="cursor-pointer">

                    </th>
            </tr>
            </thead>
            <tbody class=" bg-white">
                @foreach($this->data() as $row)
                <tr class="cursor-pointer">
                    <td>
                        <input class="form-check-input m-0 align-middle" type="checkbox" wire:model.defer="ids.{{ $row->id }}" wire:click="toggleCheckbox({{ $row->id }})" wire:loading.attr="disabled" defer>
                    </td>
                    @foreach($this->columns() as $column)
                    <td>
                        <x-dynamic-component
                            :component="$column->component"
                            :value="$row[$column->key]"
                            :id="$row->id"
                        >
                        </x-dynamic-component>
                    </td>
                    @endforeach
                    <td class="text-end">
                        <span class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">
                            {{ __('Exporter') }}
                            </a>
                            <a href="#" wire:click="delete({{ $row->id }})" wire:confirm="Êtes-vous sûr de vouloir supprimer cet enregistrement ?" class="dropdown-item text-danger">
                                {{ __('Supprimer') }}
                            </a>
                        </div>
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card-footer d-flex align-items-end ms-auto w-100">
            {{ $this->data()->links() }}
        </div>
    </div>

</div>
