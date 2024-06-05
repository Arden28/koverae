@props([
    'value',
    'data'
])
                    <!-- Members -->
                    <div class="tab-pane active show" id="members">

                        <div class="h-auto k_kanban_view k_field_X2many">
                            <div class="mb-2 k_x2m_control_panel d-empty-none">
                                <span onclick="Livewire.dispatch('openModal', {component: 'sales::modal.add-sales-person-modal', arguments: {team: {{ $this->team }} } } )" class="btn btn-secondary">
                                    {{ __('translator::sales.form.team.tabs.add-member-button') }}
                                </span>
                            </div>
                            <div class="flex-wrap k_kanban_renderer align-items-start d-flex justify-content-start">

                                @if($this->members)
                                @foreach($this->members as  $member)
                                <div class="k_kanban_card" onclick="Livewire.dispatch('openModal', {component: 'sales::modal.open-sales-person-modal', arguments: {person: {{ $member->id }} } } )" wire:key="{{ $member->id }}">
                                    <!-- Content -->
                                    <div class="k_kanban_card_content">
                                        <img class="k_kanban_image k_image_62_cover" src="{{ asset('assets/images/apps/default.png') }}">
                                        <div class="k_kanban_details">
                                            <strong class="k_kanban_record_title">
                                                <span>{{ $member->user->name }}</span>
                                            </strong>
                                            <div class="d-flex align-items-baseline text-break">
                                                <i class="bi bi-envelope"></i>
                                                <a class="text-black text-decoration-none" href="mailto:{{ $member->user->email }}">{{ $member->user->email }}</a>
                                            </div>
                                            <div class="d-flex align-items-baseline text-break">
                                                <i class="bi bi-telephone"></i>
                                                <a class="text-black text-decoration-none" href="tel:{{ $member->user->phone }}">{{ $member->user->phone }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif

                            </div>
                        </div>

                    </div>
