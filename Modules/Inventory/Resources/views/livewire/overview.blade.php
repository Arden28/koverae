<div>
    @section('title', 'Aperçu de l\'inventaire')

    {{-- <div class="page-body d-print-none k_kanban_renderer d-flex align-content-start justify-content-start flex-wrap">
        <div class="row">

            <div class="ke_kanban_color_0 container col-4">
                <div class="k_primary">
                    <span>
                        Receipt
                    </span>
                    <button>
                    </button>
                </div>
            </div>

            <div class="ke_kanban_color_0 container col-4">
                <div class="k_primary">
                    <span>
                        Receipt
                    </span>
                    <button>
                    </button>
                </div>
                <div class="container k_kanban_card_content">
                    <div class="col-6 k_kanban_primary_left">
                        <button class="ke_kaban_action_button">
                            <span>
                                0 en cours
                            </span>
                        </button>
                    </div>
                    <div class="col-6 k_kanban_primary_right">
                    </div>
                </div>
            </div>
            <div class="ke_kanban_color_0 container col-4">
                <div class="k_primary">
                    <span>
                        Receipt
                    </span>
                    <button>
                    </button>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row">
                <!-- Notify -->
                @include('notify::components.notify')
                <div class="col-md-4" style="margin-bottom: 5px;">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-2 align-items-center">
                                <div class="col">
                                    <h4 class="card-title m-0">
                                        <a wire:navigate href="">Reception</a>
                                    </h4>
                                    <div class="small mt-1">
                                        <span class="badge"><i class="bi bi-building"></i> Reception</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-blue"> {{ __('A traiter') }}</button>
                                </div>

                                <div class="col-auto">
                                    <div class="dropdown">
                                        <a href="#" class="btn-action text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a wire:navigate href="" class="dropdown-item">
                                                <i class="bi bi-gear"></i> {{ __('Configuration') }}
                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#department" class="dropdown-item text-danger">
                                                <i class="bi bi-trash"></i>
                                                {{ __('Supprimer') }}
                                            </a>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
