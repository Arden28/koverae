<div>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-break">{{ __('translator::components.modals.salesperson.title-add') }}</h4>
        <span class="btn-close" wire:click="$dispatch('closeModal')"></span>
      </div>
      <div class="modal-body position-relative">
        <div class="table-responsive">
            <table class="table text-nowrap datatable">
                <thead class="list-table">
                <tr class="list-tr">
                    <th class="w-1"><input class="m-0 align-middle cursor-pointer form-check-input" type="checkbox" aria-label="Select all invoices" onclick="checkStatus(this)"></th>
                    <th>{{ __('translator::components.modals.salesperson.tables.add-table.name') }}</th>
                    <th>{{ __('translator::components.modals.salesperson.tables.add-table.email') }}</th>
                    <th>{{ __('translator::components.modals.salesperson.tables.add-table.last-log') }}</th>
                    <th>{{ __('translator::components.modals.salesperson.tables.add-table.status') }}</th>
                </tr>
                </thead>
                <tbody class="bg-white ">
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <input class="m-0 align-middle cursor-pointer form-check-input" type="checkbox" wire:click="addItem('{{ $user->id }}')" onclick="checkStatus(this)">
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->last_logged_in_at }}
                        </td>
                        <td>
                            {{ $user->status }}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            @if(count($users) == 0)
            <div class="mt-2 bg-white empty k_nocontent_help" style="height: 100px;">
                <p class="empty-title">No record found</p>
                <p class="empty-subtitle">Adjust your filter or create new record</p>
            </div>
            @endif
        </div>
      </div>
      <div class="flex-wrap gap-1 modal-footer justify-content-around justify-content-sm-start w-100">
        <footer class="gap-1">
            <button wire:click.prevent="perform" wire:target="perform" {{ count($this->ids) >= 1 ? '' : 'disabled' }} class="btn btn-primary">{{ __('translator::components.modals.salesperson.buttons.select') }} <i class="bi bi-check-all"></i> <span wire:target="perform" wire:loading>...</span></button>
            <span class="btn btn-primary" onclick="Livewire.dispatch('openModal', {component: 'sales::modal.create-sales-person-modal', arguments: {team: {{ $this->team->id }}} } )">{{ __('translator::components.modals.salesperson.buttons.new') }}</span>
            <span class="btn btn-secondary" wire:click="$dispatch('closeModal')" wire:target="$dispatch('closeModal')">{{ __('translator::components.modals.salesperson.buttons.close') }}</span>
        </footer>
      </div>
    </div>
</div>
