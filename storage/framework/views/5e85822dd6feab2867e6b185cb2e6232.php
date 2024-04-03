<div>
    <?php $__env->startSection('title', 'Aperçu de l\'inventaire'); ?>

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row">
                <!-- Notify -->
                <?php echo $__env->make('notify::components.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $operations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4" style="margin-bottom: 5px;" style="border-left: 2px solid #0E6163">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-2 align-items-center">
                                <div class="col-12 flex">
                                    <div class="col-10">
                                        <h4 class="card-title m-0">
                                            <a wire:navigate href="<?php echo e(route('inventory.operation-types.show', ['type' => $o->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>"><?php echo e($o->name); ?></a>
                                        </h4>
                                        <div class="small mt-1">
                                            <span class="badge"><i class="bi bi-building"></i> <?php echo e(current_company()->name); ?></span>
                                            <!--[if BLOCK]><![endif]--><?php if(settings()->has_storage_locations): ?>
                                            <span class="badge"><i class="bi bi-building"></i> entrepôt: <?php echo e($o->warehouse->name); ?></span>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="dropdown">
                                            <a href="#" class="btn-action text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a wire:navigate href="<?php echo e(route('inventory.operation-types.show', ['type' => $o->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                                                    <i class="bi bi-gear"></i> <?php echo e(__('Configuration')); ?>

                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="col-auto">
                                        <a wire:navigate href="<?php echo e(route('inventory.operation-transfers.index', ['subdomain' => current_company()->domain_name, 'type' => $o->operation_type,'status' => 'ready', 'menu' => current_menu()])); ?>" class="btn btn-primary">
                                             <?php echo e($o->operationTransfers()->isOperationType($o->id)->isWating()->count()); ?> <?php echo e(__('à traiter')); ?>

                                        </a>
                                        <!--[if BLOCK]><![endif]--><?php if($o->operationTransfers()->isOperationType($o->id)->isWating()->isLate()->count() >= 1 ): ?>
                                            <span class="col-auto">
                                                <?php echo e($o->operationTransfers()->isOperationType($o->id)->isWating()->isLate()->count()); ?> en retard
                                            </span>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Inventory\Resources/views/livewire/overview.blade.php ENDPATH**/ ?>