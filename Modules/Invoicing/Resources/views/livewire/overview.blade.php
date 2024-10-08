<div>
    @section('title', 'Overview | Invoicing')

    <!-- Control Panel -->
    @section('control-panel')
    <livewire:invoicing::navbar.control-panel.overview-panel />
    @endsection

    <div class="container-fluid">
        <div class="pb-4 row">
            <!-- Vendor Bills -->
            <div class="mt-2 col-sm-6 col-md-6 col-lg-6">
                <div class="p-2 bg-white app d-flex position-relative" style="border-left: 3px solid #0E6163;">
                    <div class="app_desc">
                        <h4 class="k_kanban_record_title" id="kanban-record-title">
                            {{ __('Vendor Bills') }}
                        </h4>
                        <span class="text-muted ">
                            {{ __('Make payments effortlessly') }}
                        </span>
                    </div>
                    <div class="" style="position: absolute; top: 10px; right: 10px;">
                        <div class="dropdown">
                            <a href="#" class="btn-action text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">{{ __("Info sur l'app") }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Customer Invoices -->
            <div class="mt-2 col-sm-6 col-md-6 col-lg-6">
                <div class="p-2 bg-white app d-flex position-relative" style="border-left: 3px solid #0E6163;">
                    <div class="app_desc">
                        <h4 class="k_kanban_record_title" id="kanban-record-title">
                            {{ __('Customer Invoices') }}
                        </h4>
                        <span class="text-muted ">
                            {{ __('Receive payments online. Send digital invoices.') }}
                        </span>
                    </div>
                    <div class="" style="position: absolute; top: 10px; right: 10px;">
                        <div class="dropdown">
                            <a href="#" class="btn-action text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">{{ __("Configuration") }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
