@props([
    'value',
    'data'
])

<div class="k_kanban_view k_field_X2many">
    <div class="mb-4 k_x2m_control_panel d-empty-none">
        <button class="btn btn-secondary">
            {{ __('Add') }}
        </button>
    </div>
    <div class="flex-wrap k_kanban_renderer align-items-start d-flex justify-content-start">
        <!-- Address -->
        {{-- <div class="mb-1 k_kanban_card">
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
        </div> --}}
    </div>
</div>
