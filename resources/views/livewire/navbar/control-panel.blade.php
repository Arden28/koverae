<div>
    <div class="k_control_panel d-flex flex-column gap-3 gap-lg-1 px-3 pt-2 pb-3">
      <div class="k_control_panel_main d-flex flex-wrap flex-nowrap justify-content-between align-items-lg-start gap-5 flex-grow-1">
          <!-- Breadcrumbs -->
          <div class="k_control_panel_breadcrumbs d-flex align-items-center gap-1 order-0 h-lg-100">
              <!-- Create Button -->
              @if($this->new)
              <a href="{{ $new }}" wire:navigate class="btn btn-outline-primary k_form_button_create">
                  Nouveau
              </a>
              @endif
                @php
                    $filteredBreadcrumbs = array_filter($breadcrumbs, function($breadcrumb) {
                        return $breadcrumb['url'] && $breadcrumb['url'] != route('main', ['subdomain' => current_company()->domain_name]) && $breadcrumb['label'] != 'Inventory' && $breadcrumb['url'] != url()->current();
                    });
                @endphp
                <div class="k_last_breadcrumb_item active gap-2 align-items-center min-w-0 lh-sm">
                    @if($filteredBreadcrumbs)
                        @if($showBreadcrumbs)
                        <span>
                            @foreach($filteredBreadcrumbs as $breadcrumb)
                                @if($breadcrumb['url'])
                                <a href="{{ $breadcrumb['url'] }}" wire:navigate class="fw-bold text-truncate text-decoration-none">
                                    {{ $loop->index > 0 ? "/" : '' }}{{ $breadcrumb['label'] }}
                                </a>
                                @else
                                <a class="fw-bold text-truncate text-decoration-none" aria-current="page">
                                    {{ $breadcrumb['label'] }} {{ config('inventory.config.name') }}
                                </a>
                                @endif
                            @endforeach
                        </span>
                        @endif
                    @endif
                    <div class="d-flex gap-1 text-truncate">
                        <span class="min-w-0 text-truncate">
                            {{ $this->currentPage }}
                        </span>
                        <div class="k_cp_action_menus d-flex align-items-center pe-2 gap-1">
                            <div class="k_dropdown dropdown lh-1 dropdown-no-caret" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear"></i>
                            </div>
                            <ul class="k_dropdown_menu dropdown-menu lh-base">
                                <li class="dropdown-item cursor-pointer">
                                    <i class="bi bi-copy"></i> {{ __('Dupliquer') }}
                                </li>
                                <li class="dropdown-item cursor-pointer">
                                    <i class="bi bi-trash"></i> {{ __('Supprimer') }}
                                </li>
                            </ul>
                        </div>
                        @if($this->showIndicators)
                        <div class="k_form_status_indicator_buttons d-flex">
                            <button wire:loading.remove wire:click.prevent="saveUpdate()" wire:target="saveUpdate()" class="k_form_button_save btn-light rounded-1 py-0 px-1 lh-sm">
                                <i class="bi bi-cloud-arrow-up-fill"></i>
                            </button>
                            <button wire:click.prevent="resetForm()" wire:loading.remove class="k_form_button_save btn-light py-0 px-1 lh-sm">
                                <i class="bi bi-arrow-return-left"></i>
                            </button>
                            <span wire:loading wire:target="saveUpdate()">...</span>
                        </div>
                        @endif
                    </div>
                </div>
          </div>

          <!-- Actions / Search Bar -->
          <div class="k_panel_control_actions d-flex align-items-center justify-content-start order-2 order-lg-1 w-100 w-lg-auto justify-content-lg-around">

          </div>

          <!-- Navigations -->
          <div class="k_control_panel_navigation d-flex flex-wrap flex-md-wrap align-items-center justify-content-end gap-l-1 gap-xl-5 order-1 order-lg-2 flex-grow-1">
            <!-- Pagination -->
            @if($showPagination)
                {{ $this->data()->links() }}
            @endif
            <!-- End Pagination -->

            <!-- Display panel buttons -->
            <div class="k_cp_switch_buttons d-print-none d-none d-xl-inline-flex btn-group">
                <!-- Button view -->
                @foreach($this->switchButtons() as $switchButton)
                <x-dynamic-component
                    :component="$switchButton->component"
                    :value="$switchButton"
                    {{-- :status="$status" --}}
                >
                </x-dynamic-component>
                @endforeach
            </div>
          </div>
      </div>
    </div>
</div>
