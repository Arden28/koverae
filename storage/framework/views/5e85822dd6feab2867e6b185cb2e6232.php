<div>
    <?php $__env->startSection('title', 'Aperçu de l\'inventaire'); ?>

    
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row">
                <!-- Notify -->
                <?php echo $__env->make('notify::components.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                    <button class="btn btn-blue"> <?php echo e(__('A traiter')); ?></button>
                                </div>

                                <div class="col-auto">
                                    <div class="dropdown">
                                        <a href="#" class="btn-action text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a wire:navigate href="" class="dropdown-item">
                                                <i class="bi bi-gear"></i> <?php echo e(__('Configuration')); ?>

                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#department" class="dropdown-item text-danger">
                                                <i class="bi bi-trash"></i>
                                                <?php echo e(__('Supprimer')); ?>

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
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Inventory\Resources/views/livewire/overview.blade.php ENDPATH**/ ?>