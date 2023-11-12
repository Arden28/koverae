<div>
    @section('title', 'Clients')
    <div class="page-body d-print-none">
        <div class="container-fluid">
            <!-- Notify -->
            @include('notify::components.notify')
            <div class="row">
                <!-- Table -->
                <div class="col-12">
                    <div class="card">
                        <!-- Control panel view -->
                        <div class="k_control_panel_main d-flex flex-wrap flex-grow-2 flex-nowrap justify-content-between align-items-start gap-5">
                            <!-- Breadcumb -->
                            <div class="k_control_panel_breadcumbs d-flex align-items-center gap-1 order-0 h-lg-100">
                                <a wire:navigate href="{{ route('contacts.create', ['subdomain' => current_company()->domain_name ]) }}" class="btn btn-outline-primary k_form_button_create">
                                    {{ __('Nouveau') }}
                                </a>
                                <div class="bread d-flex gap-1 text-truncate">
                                    <span class="min-w-0 text-truncate" style="font-size: 17px; font-weight: 500;">
                                        {{ __('Clients') }}
                                    </span>
                                </div>
                            </div>
                            <!-- Control Panel Navigation -->
                            <div class="k_control_panel_navigation d-flex flex-wrap align-items-center justify-content-end gap-l-1 gap-xl-5 order-1 order-lg-2 flex-grow-1">
                                <!-- Pagination -->
                                <nav class="k_pager align-items-center d-flex gap-2">
                                    <span class="k_page_counter">
                                        <!-- Page value -->
                                        <span class="k_page_value d-inline-block border-bottom border-transparent mb-n1">
                                            1-10
                                        </span>
                                        <span>
                                            /
                                        </span>
                                        <span class="k_page_limit">
                                            10
                                        </span>
                                    </span>
                                    <span class="k_cp_switch_buttons btn-group d-print-none">
                                        <button class="btn btn-secondary k-paginate-arrow">
                                            <i class="bi bi-arrow-left"></i>
                                        </button>
                                        <button class="btn btn-secondary k-paginate-arrow">
                                            <i class="bi bi-arrow-right"></i>
                                        </button>
                                    </span>
                                </nav>
                                <!-- Display panel buttons -->
                                <div class="k_cp_switch_buttons d-print-none d-none d-xl-inline-flex btn-group">
                                    <!-- List view -->
                                    <button wire:click="changeView('lists')" class="k_switch_view btn btn-secondary k_list {{ $view == 'lists' ? 'active' : '' }}">
                                        <i class="bi bi-list-task"></i>
                                    </button>
                                    <!-- Kanban view -->
                                    <button wire:click="changeView('kanban')" class="k_switch_view btn btn-secondary k_kanban {{ $view == 'kanban' ? 'active' : '' }}">
                                        <i class="bi bi-kanban"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Search Form -->
                            <div class="k_searchview form-control d-print-contents d-flex align-items-center py-1">
                                <div class="k_searchview_icon d-print-none ki ki_search me-2">
                                    <i class="bi bi-search"></i>
                                </div>
                                <input type="search" class="k_searchview_input flex-grow-1 w-auto border-0">
                                <button class=" dropdown-toggle btn btn-outline-secondary k_searchview_dropdown_toggle caret-blue-100 rounded-start-0"></button>
                            </div>
                        </div>
                        @if($view == 'lists')
                        <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <thead>
                            <tr>
                                <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                                <th><button class="table-sort" data-sort="sort-name">{{ __("Nom") }}</button></th>
                                <th><button class="table-sort" data-sort="sort-name">{{ __('Téléphone') }}</button></th>
                                <th><button class="table-sort" data-sort="sort-name">{{ __('Email') }}</button></th>
                                <th><button class="table-sort" data-sort="sort-name">{{ __('Ville') }}</button></th>
                                <th><button class="table-sort" data-sort="sort-name">{{ __('Pays ') }}</button></th>
                                <th><button class="table-sort" data-sort="sort-name">{{ __('Tags') }}</button></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $c)
                                <tr>
                                    <td><input wire:model.blur="selectedEmployees" value="{{ $c->id }}" class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                                    <td>
                                        <a style="text-decoration: none" wire:navigate href="{{ route('contacts.show', ['contact' => $c->id, 'subdomain' => current_company()->domain_name]) }}"  tabindex="-1">
                                            {{ $c->name }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $c->phone }}
                                    </td>
                                    <td>
                                        {{ $c->email }}
                                    </td>
                                    <td>
                                        {{ $c->city }}
                                    </td>
                                    <td>
                                        {{ $c->country }}
                                    </td>
                                    <td class="text-end">
                                        <span class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                            {{ __('Exporter') }}
                                            </a>
                                            <a href="#" wire:click="selectedId({{ $c->id }})" data-bs-toggle="modal" data-bs-target="#employee-{{ $c->id }}" class="dropdown-item text-danger">
                                                {{ __('Supprimer') }}
                                            </a>
                                        </div>
                                        </span>
                                    </td>
                                </tr>
                                <!-- Delete Modal -->
                                <div wire:ignore class="modal modal-blur fade" id="employee-{{ $c->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="modal-status bg-danger"></div>
                                        <div class="modal-body text-center py-4">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                                        <h3>{{ __("Êtes vous sûr de vouloir supprimer le devis ". $c->reference.' ?') }}</h3>
                                        <div class="text-muted">{{ __('En supprimant cet devis, toutes ses actions dans votre entreprise seront effacées.') }}</div>
                                        </div>
                                        <div class="modal-footer">
                                        <div class="w-100">
                                            <div class="row">
                                            <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                                {{ __('Annuler') }}
                                                </a></div>
                                            <div class="col"><a wire:click.prevent="delete({{ $c->id }})" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                                {{ __('Supprimer') }}
                                                </a></div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            {{ $contacts->links() }}
                        </div>
                    @endif




                    </div>
                </div>
                <!-- <livewire:table.data-table :modelInstance="'\Modules\Sales\Entities\Sale'" />-->
            </div>
        </div>
    </div>
</div>
