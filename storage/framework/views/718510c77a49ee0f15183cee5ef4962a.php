<div>
    <!-- Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Control panel view -->
                <div class="k_control_panel_main d-flex flex-wrap flex-grow-2 flex-nowrap justify-content-between align-items-start gap-5">
                    <!-- Breadcumb -->
                    <div class="k_control_panel_breadcumbs d-flex align-items-center gap-1 order-0 h-lg-100">
                        <a wire:navigate href="<?php echo e($this->createRoute()); ?>" class="btn btn-outline-primary k_form_button_create">
                            <?php echo e(__('Nouveau')); ?>

                        </a>
                        <div class="bread d-flex gap-1 text-truncate">
                            <span class="min-w-0 text-truncate" style="font-size: 17px; font-weight: 500;">
                                <?php echo e($this->headerName()); ?>

                            </span>
                        </div>
                    </div>
                    <!-- Control Panel Navigation -->
                    <div class="k_control_panel_navigation d-flex flex-wrap align-items-center justify-content-end gap-l-1 gap-xl-5 order-1 order-lg-2 flex-grow-1">
                        <!-- Pagination -->
                        <?php echo e($this->data()->links()); ?>

                        <!-- End Pagination -->

                        <!-- Display panel buttons -->
                        <div class="k_cp_switch_buttons d-print-none d-none d-xl-inline-flex btn-group">
                            <!-- List view -->
                            <button wire:click="changeView('lists')" class="k_switch_view btn btn-secondary k_list <?php echo e($view == 'lists' ? 'active' : ''); ?>">
                                <i class="bi bi-list-task"></i>
                            </button>
                            <!-- Kanban view -->
                            <button class="k_switch_view btn btn-secondary k_kanban <?php echo e($view == 'kanban' ? 'active' : ''); ?>">
                                <i class="bi bi-kanban"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Search Form -->
                    <?php if(count($ids) >= 1): ?>
                    <!-- Action Bar Button -->
                    <div class="d-flex gap-1 k-action-bar">
                        <span class="list-group-item d-flex align-items-center pe-0 py-0 rounded-1 lh-1">
                            <?php echo e(count($ids)); ?> Sélectionné(s)
                            <a wire:click="emptyArray" wire:taget="emptyArray" class="k_list_unselect_all py-0 cursor-pointer">
                                <i class="bi bi-x"></i>
                            </a>
                        </span>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-sliders"></i> &nbsp;&nbsp; <b>Actions</b>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i> &nbsp;&nbsp; Imprimer</a></li>
                              <li><a class="dropdown-item" href="#"><i class="bi bi-upload"></i> &nbsp;&nbsp; Exporter</a></li>
                              <li><a class="dropdown-item" href="#"><i class="bi bi-copy"></i> &nbsp;&nbsp; Dupliquer</a></li>
                              <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> &nbsp;&nbsp; Supprimer</a></li>
                            </ul>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="k_searchview form-control d-print-contents d-flex align-items-center py-1">
                        <div class="k_searchview_icon d-print-none ki ki_search me-2">
                            <i class="bi bi-search"></i>
                        </div>
                        <input type="search" class="k_searchview_input flex-grow-1 w-auto border-0">
                        <button class=" dropdown-toggle btn btn-outline-secondary k_searchview_dropdown_toggle caret-blue-100 rounded-start-0"></button>
                    </div>
                    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                </div>
                <!-- Table Field -->
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                        <tr>
                            <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->columns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th wire:click="sort('<?php echo e($column->key); ?>')" class="cursor-pointer">
                                    <?php echo e($column->label); ?>

                                    <!-- Sort By -->
                                    <!--[if BLOCK]><![endif]--><?php if($sortBy === $column->key): ?>
                                      <!--[if BLOCK]><![endif]--><?php if($sortDirection === 'asc'): ?>
                                        <i class="bi bi-arrow-up-short"></i>
                                      <?php else: ?>
                                      <i class="bi bi-arrow-down-short"></i>
                                      <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                                    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                                </th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                                <th class="cursor-pointer">

                                </th>
                        </tr>
                        </thead>
                        <tbody>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->data(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <input class="form-check-input m-0 align-middle" type="checkbox" wire:model.defer="ids.<?php echo e($row->id); ?>" wire:click="toggleCheckbox(<?php echo e($row->id); ?>)" wire:loading.attr="disabled" defer>
                                </td>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->columns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td>
                                    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $column->component] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => $row[$column->key],'id' => $row->id]); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
                                </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                                <td class="text-end">
                                    <span class="dropdown">
                                    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">
                                        <?php echo e(__('Exporter')); ?>

                                        </a>
                                        <a href="#" wire:click="delete(<?php echo e($row->id); ?>)" wire:confirm="Êtes-vous sûr de vouloir supprimer cet enregistrement ?" class="dropdown-item text-danger">
                                            <?php echo e(__('Supprimer')); ?>

                                        </a>
                                    </div>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>
                </div>
                <!-- Was Pagination -->
                <div class="card-footer d-flex align-items-center">
                </div>
            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/livewire/table/table.blade.php ENDPATH**/ ?>