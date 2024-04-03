<div>
    <?php $__env->startSection('title', 'Point de Ventes'); ?>

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row">
                <!-- Notify -->
                <?php echo $__env->make('notify::components.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $pos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6" style="margin-bottom: 5px;" style="border-left: 2px solid #0E6163">
                    <div class="card">
                        <div class="card-header col-12 flex" style="border-bottom: 0px solid;">
                            <div class="col-10">
                                <h4 class="card-title m-0">
                                    <a wire:navigate href="<?php echo e(route('pos.show', ['pos' => $p->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                                        <?php echo e($p->name); ?>

                                    </a>
                                </h4>
                            </div>
                            <div class="col-2">
                                <div class="dropdown">
                                    <a href="#" class="btn-action text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a wire:navigate href="#" class="dropdown-item">
                                            <?php echo e(__('Commandes')); ?>

                                        </a>
                                        <a wire:navigate href="#" class="dropdown-item">
                                            <?php echo e(__('Sessions')); ?>

                                        </a>
                                        <a wire:navigate href="<?php echo e(route('pos.show', ['pos' => $p->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                                            <i class="bi bi-gear"></i> <?php echo e(__('Configuration')); ?>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-2 align-items-center">
                                <div class="small mt-1" style="padding: 10px 0 10px 0; ">
                                    <!--[if BLOCK]><![endif]--><?php if($p->isOpened()): ?>
                                    
                                    <button wire:click.prevent="continueSession(<?php echo e($p->id); ?>)" class="btn btn-outline-warning">
                                        Continuer la vente <span wire:loading>...</span>
                                    </button>
                                    <span class="w-auto m-2" style="font-size: 15px;"><?php echo e($p->status == 'inactive' ? 'Fermé' : 'Ouvert'); ?></span>
                                    <span class="w-auto m-2" style="font-size: 15px;"><?php echo e(\Carbon\Carbon::parse($p->start_date)->format('d-m-Y H:i:s')); ?></span>
                                    <?php else: ?>
                                    <button wire:click.prevent="openSession(<?php echo e($p->id); ?>)" class="btn btn-outline-primary k-btn-primay">
                                        Nouvelle session <span wire:loading>...</span>
                                    </button>
                                    <span class="w-auto m-2" style="font-size: 15px;"><?php echo e($p->status == 'inactive' ? 'Fermé' : 'Ouvert'); ?></span>
                                    <span class="w-auto m-2" style="font-size: 15px;">dd mm YYYY</span>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Pos\Resources/views/livewire/overview.blade.php ENDPATH**/ ?>