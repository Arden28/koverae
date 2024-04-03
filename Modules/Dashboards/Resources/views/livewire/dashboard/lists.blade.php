<div>
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a class="btn btn-outline-primary k_form_button_create">
                {{ __('Nouveau') }}
            </a>
            <h3 class="card-title" style="font-size: 17px; font-weight: 500;">
                {{ __('Tableau de bord') }}
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
                <th><button class="table-sort" data-sort="sort-name">{{ __("Nom du tableau") }}</button></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach($dashboards as $dash)
                <tr>
                  <td><input wire:model.blur="selectedEmployees" value="{{ $dash->id }}" class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                  <td><a wire:navigate href="{{ route('employee.show', ['subdomain' => current_company()->domain_name, 'employee' => $dash->id, 'menu' => current_menu()]) }}"  tabindex="-1">{{ $dash->name }}</a></td>
                  <td class="text-end">
                    <span class="dropdown">
                      <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">
                          {{ __('Exporter') }}
                        </a>
                        <a href="#" wire:click="selectedId({{ $dash->id }})" data-bs-toggle="modal" data-bs-target="#employee-{{ $dash->id }}" class="dropdown-item text-danger">
                            {{ __('Supprimer') }}
                        </a>
                      </div>
                    </span>
                  </td>
                </tr>
                <!-- Delete Modal -->
                <div wire:ignore class="modal modal-blur fade" id="employee-{{ $dash->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-status bg-danger"></div>
                        <div class="modal-body text-center py-4">
                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                        <h3>{{ __("Êtes vous sûr de vouloir supprimer le tableau ". $dash->name.' ?') }}</h3>
                        </div>
                        <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                            <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                {{ __('Annuler') }}
                                </a></div>
                            <div class="col"><a wire:click.prevent="delete({{ $dash->id }})" class="btn btn-danger w-100" data-bs-dismiss="modal">
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
            {{ $dashboards->links() }}
        </div>
        </div>
    </div>
</div>
