<div>
    <div class="gap-3 px-3 k_control_panel d-flex flex-column gap-lg-1 sticky-top">
      <div class="flex-wrap gap-5 k_control_panel_main d-flex flex-nowrap justify-content-between align-items-lg-start flex-grow-1">
          <!-- Breadcrumbs -->
          <div class="gap-1 k_control_panel_breadcrumbs d-flex align-items-center order-0 h-lg-100">
              <!-- Create Button -->
              <!--[if BLOCK]><![endif]--><?php if($this->new): ?>
              <a href="<?php echo e($new); ?>" wire:navigate class="btn btn-outline-primary k_form_button_create">
                  <?php echo e(__('translator::components.control-panel.new')); ?>

              </a>
              <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
              <!--[if BLOCK]><![endif]--><?php if($this->add): ?>
              <a wire:click="add" class="btn btn-outline-primary k_form_button_create">
                  <?php echo e($createButtonLabel); ?>

              </a>
              <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php
                    $filteredBreadcrumbs = array_filter($breadcrumbs, function($breadcrumb) {
                        return $breadcrumb['url'] && $breadcrumb['url'] != route('main', ['subdomain' => current_company()->domain_name]) && $breadcrumb['label'] != 'Inventory' && $breadcrumb['url'] != url()->current();
                    });
                ?>
                <div class="min-w-0 gap-2 k_last_breadcrumb_item active align-items-center lh-sm">
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
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <div class="gap-1 d-flex">
                        <span class="min-w-0 text-truncate " style="height: 19px;">
                            <?php echo e($this->currentPage); ?>

                        </span>
                        <div class="gap-1 k_cp_action_menus d-flex align-items-center pe-2">
                            <div class="k_dropdown dropdown lh-1 dropdown-no-caret" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear" wire:loading.remove></i>
                                <span wire:loading>...</span>
                            </div>
                            <ul class="k_dropdown_menu dropdown-menu lh-base">

                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->actionButtons(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action_button): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $action_button->component] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => $action_button]); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                            </ul>
                        </div>
                        <!--[if BLOCK]><![endif]--><?php if($this->showIndicators): ?>
                        <div class="k_form_status_indicator_buttons d-flex">
                            <button wire:loading.remove wire:click.prevent="saveUpdate()" wire:target="saveUpdate()" class="px-1 py-0 k_form_button_save btn-light rounded-1 lh-sm">
                                <i class="bi bi-cloud-arrow-up-fill"></i>
                            </button>
                            <button wire:click.prevent="resetForm()" wire:loading.remove class="px-1 py-0 k_form_button_save btn-light lh-sm">
                                <i class="bi bi-arrow-return-left"></i>
                            </button>
                            <span wire:loading wire:target="saveUpdate()">...</span>
                        </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
          </div>

          <!-- Actions / Search Bar -->
          <div class="order-2 k_panel_control_actions d-flex align-items-center justify-content-start order-lg-1 w-100 w-lg-auto justify-content-lg-around">

          </div>

          <!-- Navigations -->
          <div class="flex-wrap order-1 k_control_panel_navigation d-flex flex-md-wrap align-items-center justify-content-end gap-l-1 gap-xl-5 order-lg-2 flex-grow-1">
            <!-- Pagination -->
            
            <!-- End Pagination -->

            <!-- Display panel buttons -->
            <div class="k_cp_switch_buttons d-print-none d-xl-inline-flex btn-group">
                <!-- Button view -->
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->switchButtons(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $switchButton): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
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
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
          </div>
      </div>
    </div>
</div>
<?php /**PATH D:\My Laravel Startup\koverae\Modules/App\Resources/views/livewire/components/navbar/control-panel.blade.php ENDPATH**/ ?>