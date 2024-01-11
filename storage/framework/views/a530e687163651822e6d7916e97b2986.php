<div>
    <div class="k_control_panel d-flex flex-column gap-3 gap-lg-1 px-3 pt-2 pb-3">
      <div class="k_control_panel_main d-flex flex-wrap flex-nowrap justify-content-between align-items-lg-start gap-5 flex-grow-1">
          <!-- Breadcrumbs -->
          <div class="k_control_panel_breadcrumbs d-flex align-items-center gap-1 order-0 h-lg-100">
              <!-- Create Button -->
              <!--[if BLOCK]><![endif]--><?php if($this->new): ?>
              <a href="<?php echo e($new); ?>" wire:navigate class="btn btn-outline-primary k_form_button_create">
                  Nouveau
              </a>
              <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                <?php
                    $filteredBreadcrumbs = array_filter($breadcrumbs, function($breadcrumb) {
                        return $breadcrumb['url'] && $breadcrumb['url'] != route('main', ['subdomain' => current_company()->domain_name]) && $breadcrumb['label'] != 'Inventory' && $breadcrumb['url'] != url()->current();
                    });
                ?>
                <div class="k_last_breadcrumb_item active gap-2 align-items-center min-w-0 lh-sm">
                    <!--[if BLOCK]><![endif]--><?php if($filteredBreadcrumbs): ?>
                        <!--[if BLOCK]><![endif]--><?php if($showBreadcrumbs): ?>
                        <span>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $filteredBreadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!--[if BLOCK]><![endif]--><?php if($breadcrumb['url']): ?>
                                <a href="<?php echo e($breadcrumb['url']); ?>" wire:navigate class="fw-bold text-truncate text-decoration-none">
                                    <?php echo e($loop->index > 0 ? "/" : ''); ?><?php echo e($breadcrumb['label']); ?>

                                </a>
                                <?php else: ?>
                                <a class="fw-bold text-truncate text-decoration-none" aria-current="page">
                                    <?php echo e($breadcrumb['label']); ?> <?php echo e(config('inventory.config.name')); ?>

                                </a>
                                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                        </span>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    <div class="d-flex gap-1 text-truncate">
                        <span class="min-w-0 text-truncate">
                            <?php echo e($this->currentPage); ?>

                        </span>
                        <div class="k_cp_action_menus d-flex align-items-center pe-2 gap-1">
                            <div class="k_dropdown dropdown lh-1 dropdown-no-caret" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear"></i>
                            </div>
                            <ul class="k_dropdown_menu dropdown-menu lh-base">
                                <li class="dropdown-item cursor-pointer">
                                    <i class="bi bi-copy"></i> <?php echo e(__('Dupliquer')); ?>

                                </li>
                                <li class="dropdown-item cursor-pointer">
                                    <i class="bi bi-trash"></i> <?php echo e(__('Supprimer')); ?>

                                </li>
                            </ul>
                        </div>
                        <!--[if BLOCK]><![endif]--><?php if($this->showIndicators): ?>
                        <div class="k_form_status_indicator_buttons d-flex">
                            <button wire:click.prevent="saveUpdate()" wire:target="saveUpdate()" class="k_form_button_save btn-light rounded-1 py-0 px-1 lh-sm">
                                <i class="bi bi-cloud-arrow-up-fill"></i>
                            </button>
                            <button class="k_form_button_save btn-light py-0 px-1 lh-sm">
                                <i class="bi bi-arrow-return-left"></i>
                            </button>
                        </div>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
          </div>

          <!-- Actions / Search Bar -->
          <div class="k_panel_control_actions d-flex align-items-center justify-content-start order-2 order-lg-1 w-100 w-lg-auto justify-content-lg-around">

          </div>

          <!-- Navigations -->
          <div class="k_control_panel_navigation d-flex flex-wrap flex-md-wrap align-items-center justify-content-end gap-l-1 gap-xl-5 order-1 order-lg-2 flex-grow-1">
            <!-- Pagination -->
            <!--[if BLOCK]><![endif]--><?php if($showPagination): ?>
                <?php echo e($this->data()->links()); ?>

            <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
            <!-- End Pagination -->

            <!-- Display panel buttons -->
            <div class="k_cp_switch_buttons d-print-none d-none d-xl-inline-flex btn-group">
                <!-- Button view -->
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->switchButtons(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $switchButton): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $switchButton->component] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => $switchButton]); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
            </div>
          </div>
      </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/livewire/navbar/control-panel.blade.php ENDPATH**/ ?>