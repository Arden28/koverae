<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row">
                <!-- Notify -->
                <?php echo $__env->make('notify::components.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Department view -->
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4" style="margin-bottom: 5px;">
                        <div class="card">
                        <div class="card-body">
                            <div class="row g-2 align-items-center">
                            <div class="col">
                                <h4 class="card-title m-0">
                                <a wire:navigate href="<?php echo e(route('employee.department.show', ['subdomain' => current_company()->domain_name, 'dpID' => $department->id])); ?>"><?php echo e($department->name); ?></a>
                                </h4>
                                <div class="small mt-1">
                                <span class="badge"><i class="bi bi-building"></i> <?php echo e($department->company->name); ?></span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-blue"><?php echo e($department->employees()->count()); ?> <?php echo e(__('employé(s)')); ?></button>
                            </div>

                            <div class="col-auto">
                                <div class="dropdown">
                                    <a href="#" class="btn-action text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a wire:navigate href="<?php echo e(route('employee.department.show', ['subdomain' => current_company()->domain_name, 'dpID' => $department->id])); ?>" class="dropdown-item">
                                            <i class="bi bi-gear"></i> <?php echo e(__('Configuration')); ?>

                                        </a>
                                        <a href="#" wire:click="selectedId(<?php echo e($department->id); ?>)" data-bs-toggle="modal" data-bs-target="#department-<?php echo e($department->id); ?>" class="dropdown-item text-danger">
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

                    <div wire:ignore class="modal modal-blur fade" id="department-<?php echo e($department->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-status bg-danger"></div>
                            <div class="modal-body text-center py-4">
                              <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                              <h3><?php echo e(__('Êtes vous sûr de vouloir supprimer le département '. $department->name.'')); ?></h3>
                              <div class="text-muted"><?php echo e(__('En supprimant ce département, vous ne pourrez plus faire marche arrière.')); ?></div>
                            </div>
                            <div class="modal-footer">
                              <div class="w-100">
                                <div class="row">
                                  <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                      <?php echo e(__('Annuler')); ?>

                                    </a></div>
                                  <div class="col"><a wire:click.prevent="delete(<?php echo e($department->id); ?>)" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                      <?php echo e(__('Supprimer')); ?>

                                    </a></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->

            </div>
        </div>
    </div>


</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Employee\Resources/views/livewire/department/lists.blade.php ENDPATH**/ ?>