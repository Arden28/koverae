@props([
    'value',
    'data'
])
                    <!-- Members -->
                    <div class="tab-pane active show" id="members" wire:ignore>

                        <div class="k_kanban_view k_field_X2many">
                            <div class="k_x2m_control_panel d-empty-none mb-4">
                                <button class="btn btn-secondary">
                                    {{ __('Ajouter un membre') }}
                                </button>
                            </div>
                            <div class="k_kanban_renderer align-items-start d-flex flex-wrap justify-content-start">

                                <div class="k_kanban_card">
                                    <!-- Content -->
                                    <div class="k_kanban_card_content">
                                        <img class="k_kanban_image k_image_62_cover" src="{{ asset('assets/images/apps/default.png') }}">
                                        <div class="k_kanban_details">
                                            <strong class="k_kanban_record_title">
                                                <span>Arden BOUET</span>
                                            </strong>
                                            <div class="d-flex align-items-baseline text-break">
                                                <i class="bi bi-envelope"></i>
                                                <span>laudbouetoumoussa@koverae.com</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
