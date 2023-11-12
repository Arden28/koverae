<div>
    <div class="page-body d-print-none">
        <div class="container-fluid">
            <div class="row">

                <!-- Employees view -->
                @if($view == 'kanban')
                    @foreach($employees as $employee)
                        <div class="col-md-4" style="margin-bottom: 5px;">
                            <div class="card">
                            <div class="card-body">
                                <div class="row g-2 align-items-center">
                                <div class="col-auto">
                                    <span class="avatar k-user-avatar avatar-lg"></span>
                                </div>
                                <div class="col">
                                    <h4 class="card-title m-0">
                                    <a wire:navigate href="{{ route('employee.show', ['subdomain' => current_company()->domain_name, 'epID' => $employee->id]) }}">{{ $employee->user->name }}</a>
                                    </h4>
                                    <div class="text-muted">
                                        {{ $employee->position }}
                                    </div>
                                    <div class="small mt-1">
                                    <span class="badge">{{ $employee->job->title }}</span>
                                    </div>
                                    <div class="small mt-1">
                                    <span class="badge bg-green"></span> Online
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="dropdown">
                                    <a href="#" class="btn-action" data-bs-toggle="dropdown" aria-expanded="false">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#" class="dropdown-item">Import</a>
                                        <a href="#" class="dropdown-item">Export</a>
                                        <a href="#" class="dropdown-item">Download</a>
                                        <a href="#" wire:click="selectedId({{ $employee->id }})" data-bs-toggle="modal" data-bs-target="#employee-{{ $employee->id }}" class="dropdown-item text-danger">
                                            {{ __('Supprimer') }}
                                        </a>
                                    </div>
                                    </div>
                                </div>

                                </div>
                            </div>
                            </div>
                        </div>

                        <div wire:ignore class="modal modal-blur fade" id="employee-{{ $employee->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-status bg-danger"></div>
                                <div class="modal-body text-center py-4">
                                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                                <h3>{{ __("Êtes vous sûr de vouloir supprimer l'employé ". $employee->user->name.' ?') }}</h3>
                                <div class="text-muted">{{ __('En supprimant cet employé, toutes ses actions dans votre entreprise seront effacées.') }}</div>
                                </div>
                                <div class="modal-footer">
                                <div class="w-100">
                                    <div class="row">
                                    <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                        {{ __('Annuler') }}
                                        </a></div>
                                    <div class="col"><a wire:click.prevent="delete({{ $employee->id }})" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                        {{ __('Supprimer') }}
                                        </a></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                @elseif($view == 'lists')
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                        <a wire:navigate href="{{ route('employee.create', ['subdomain' => current_company()->domain_name ]) }}" class="btn btn-outline-primary k_form_button_create">
                            {{ __('Nouveau') }}
                        </a>
                        <h3 class="card-title" style="font-size: 17px; font-weight: 500;">
                            {{ __('Employés') }}
                        </h3>
                    </div>
                    <div class="card-body border-bottom py-3">
                      <div class="d-flex">
                        <div class="text-muted">
                          {{ __('Afficher') }}
                          <div class="mx-2 d-inline-block">
                            <input type="text" wire:model.blur="show" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                          </div>
                          {{ __('entrées') }}
                        </div>
                        <div class="ms-auto text-center text-muted">
                          <div class="ms-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                          </div>
                        </div>
                        <div class="ms-auto text-muted">
                            <button class="btn"><i class="bi bi-cloud-arrow-up"></i> Export</button>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                          <tr>
                            <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                            <th><button class="table-sort" data-sort="sort-name">{{ __("Nom de l'employé") }}</button></th>
                            <th><button class="table-sort" data-sort="sort-name">{{ __('Téléphone de travail') }}</button></th>
                            <th><button class="table-sort" data-sort="sort-name">{{ __('Email de tavail ') }}</button></th>
                            <th><button class="table-sort" data-sort="sort-name">{{ __('Activité') }}</button></th>
                            <th><button class="table-sort" data-sort="sort-name">{{ __('Département') }}</button></th>
                            <th><button class="table-sort" data-sort="sort-name">{{ __('Position') }}</button></th>
                            <th><button class="table-sort" data-sort="sort-name">{{ __('Manager') }}</button></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                              <td><input wire:model.blur="selectedEmployees" value="{{ $employee->id }}" class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                              <td><a wire:navigate href="{{ route('employee.show', ['subdomain' => current_company()->domain_name, 'epID' => $employee->id]) }}"  tabindex="-1">{{ $employee->user->name }}</a></td>
                              <td>
                                <a href="tel:{{ $employee->user->phone }}">
                                    {{ $employee->user->phone }}
                                </a>
                              </td>
                              <td>
                                <a href="mailto:{{ $employee->user->email }}">
                                    {{ $employee->user->email }}
                                </a>
                              </td>
                              <td>
                                <span class="badge bg-success me-1"></span> {{ __('En ligne') }}
                              </td>
                              <td>
                                <a wire:navigate href="{{ route('employee.department.show', ['subdomain' => current_company()->domain_name, 'dpID' => $employee->department_id]) }}">
                                    {{ $employee->department->name }}
                                </a>
                              </td>
                              <td>
                                {{ $employee->job->title }}
                              </td>
                              <td>/</td>
                              <td class="text-end">
                                <span class="dropdown">
                                  <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">
                                      {{ __('Exporter') }}
                                    </a>
                                    <a href="#" wire:click="selectedId({{ $employee->id }})" data-bs-toggle="modal" data-bs-target="#employee-{{ $employee->id }}" class="dropdown-item text-danger">
                                        {{ __('Supprimer') }}
                                    </a>
                                  </div>
                                </span>
                              </td>
                            </tr>
                            <!-- Delete Modal -->
                            <div wire:ignore class="modal modal-blur fade" id="employee-{{ $employee->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="modal-status bg-danger"></div>
                                    <div class="modal-body text-center py-4">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                                    <h3>{{ __("Êtes vous sûr de vouloir supprimer l'employé ". $employee->user->name.' ?') }}</h3>
                                    <div class="text-muted">{{ __('En supprimant cet employé, toutes ses actions dans votre entreprise seront effacées.') }}</div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="w-100">
                                        <div class="row">
                                        <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                            {{ __('Annuler') }}
                                            </a></div>
                                        <div class="col"><a wire:click.prevent="delete({{ $employee->id }})" class="btn btn-danger w-100" data-bs-dismiss="modal">
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
                        {{ $employees->links() }}
                    </div>
                    </div>
                </div>
                @endif

                <!-- Modify employee -->

            </div>
        </div>
    </div>

</div>
