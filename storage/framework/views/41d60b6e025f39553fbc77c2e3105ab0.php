<div>
    <div class="page-body d-print-none">
        <div class="container-fluid">
            <div class="row">

                <!-- Employees view -->
                <!--[if BLOCK]><![endif]--><?php if($view == 'kanban'): ?>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4" style="margin-bottom: 5px;">
                            <div class="card">
                            <div class="card-body">
                                <div class="row g-2 align-items-center">
                                <div class="col-auto">
                                    <span class="avatar k-user-avatar avatar-lg"></span>
                                </div>
                                <div class="col">
                                    <h4 class="card-title m-0">
                                    <a wire:navigate href="<?php echo e(route('employee.show', ['subdomain' => current_company()->domain_name, 'epID' => $employee->id])); ?>"><?php echo e($employee->user->name); ?></a>
                                    </h4>
                                    <div class="text-muted">
                                        <?php echo e($employee->position); ?>

                                    </div>
                                    <div class="small mt-1">
                                    <span class="badge"><?php echo e($employee->job->title); ?></span>
                                    </div>
                                    <div class="small mt-1">
                                    <span class="badge bg-green"></span> Online
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="dropdown">
                                    <a href="#" class="btn-action" data-bs-toggle="dropdown" aria-expanded="false">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#" class="dropdown-item">Import</a>
                                        <a href="#" class="dropdown-item">Export</a>
                                        <a href="#" class="dropdown-item">Download</a>
                                        <a href="#" wire:click="selectedId(<?php echo e($employee->id); ?>)" data-bs-toggle="modal" data-bs-target="#employee-<?php echo e($employee->id); ?>" class="dropdown-item text-danger">
                                            <?php echo e(__('Supprimer')); ?>

                                        </a>
                                    </div>
                                    </div>
                                </div>

                                </div>
                            </div>
                            </div>
                        </div>

                        <div wire:ignore class="modal modal-blur fade" id="employee-<?php echo e($employee->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-status bg-danger"></div>
                                <div class="modal-body text-center py-4">
                                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                                <h3><?php echo e(__("Êtes vous sûr de vouloir supprimer l'employé ". $employee->user->name.' ?')); ?></h3>
                                <div class="text-muted"><?php echo e(__('En supprimant cet employé, toutes ses actions dans votre entreprise seront effacées.')); ?></div>
                                </div>
                                <div class="modal-footer">
                                <div class="w-100">
                                    <div class="row">
                                    <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                        <?php echo e(__('Annuler')); ?>

                                        </a></div>
                                    <div class="col"><a wire:click.prevent="delete(<?php echo e($employee->id); ?>)" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                        <?php echo e(__('Supprimer')); ?>

                                        </a></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                <?php elseif($view == 'lists'): ?>
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                        <a wire:navigate href="<?php echo e(route('employee.create', ['subdomain' => current_company()->domain_name ])); ?>" class="btn btn-outline-primary k_form_button_create">
                            <?php echo e(__('Nouveau')); ?>

                        </a>
                        <h3 class="card-title" style="font-size: 17px; font-weight: 500;">
                            <?php echo e(__('Employés')); ?>

                        </h3>
                    </div>
                    <div class="card-body border-bottom py-3">
                      <div class="d-flex">
                        <div class="text-muted">
                          <?php echo e(__('Afficher')); ?>

                          <div class="mx-2 d-inline-block">
                            <input type="text" wire:model.blur="show" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                          </div>
                          <?php echo e(__('entrées')); ?>

                        </div>
                        <div class="ms-auto text-center text-muted">
                          <div class="ms-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                          </div>
                        </div>
                        <div class="ms-auto text-muted">
                            <button class="btn"><i class="bi bi-cloud-arrow-up"></i> Export</button>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                          <tr>
                            <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                            <th><button class="table-sort" data-sort="sort-name"><?php echo e(__("Nom de l'employé")); ?></button></th>
                            <th><button class="table-sort" data-sort="sort-name"><?php echo e(__('Téléphone de travail')); ?></button></th>
                            <th><button class="table-sort" data-sort="sort-name"><?php echo e(__('Email de tavail ')); ?></button></th>
                            <th><button class="table-sort" data-sort="sort-name"><?php echo e(__('Activité')); ?></button></th>
                            <th><button class="table-sort" data-sort="sort-name"><?php echo e(__('Département')); ?></button></th>
                            <th><button class="table-sort" data-sort="sort-name"><?php echo e(__('Position')); ?></button></th>
                            <th><button class="table-sort" data-sort="sort-name"><?php echo e(__('Manager')); ?></button></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td><input wire:model.blur="selectedEmployees" value="<?php echo e($employee->id); ?>" class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                              <td><a wire:navigate href="<?php echo e(route('employee.show', ['subdomain' => current_company()->domain_name, 'epID' => $employee->id])); ?>"  tabindex="-1"><?php echo e($employee->user->name); ?></a></td>
                              <td>
                                <a href="tel:<?php echo e($employee->user->phone); ?>">
                                    <?php echo e($employee->user->phone); ?>

                                </a>
                              </td>
                              <td>
                                <a href="mailto:<?php echo e($employee->user->email); ?>">
                                    <?php echo e($employee->user->email); ?>

                                </a>
                              </td>
                              <td>
                                <span class="badge bg-success me-1"></span> <?php echo e(__('En ligne')); ?>

                              </td>
                              <td>
                                <a wire:navigate href="<?php echo e(route('employee.department.show', ['subdomain' => current_company()->domain_name, 'dpID' => $employee->department_id])); ?>">
                                    <?php echo e($employee->department->name); ?>

                                </a>
                              </td>
                              <td>
                                <?php echo e($employee->job->title); ?>

                              </td>
                              <td>/</td>
                              <td class="text-end">
                                <span class="dropdown">
                                  <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">
                                      <?php echo e(__('Exporter')); ?>

                                    </a>
                                    <a href="#" wire:click="selectedId(<?php echo e($employee->id); ?>)" data-bs-toggle="modal" data-bs-target="#employee-<?php echo e($employee->id); ?>" class="dropdown-item text-danger">
                                        <?php echo e(__('Supprimer')); ?>

                                    </a>
                                  </div>
                                </span>
                              </td>
                            </tr>
                            <!-- Delete Modal -->
                            <div wire:ignore class="modal modal-blur fade" id="employee-<?php echo e($employee->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="modal-status bg-danger"></div>
                                    <div class="modal-body text-center py-4">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                                    <h3><?php echo e(__("Êtes vous sûr de vouloir supprimer l'employé ". $employee->user->name.' ?')); ?></h3>
                                    <div class="text-muted"><?php echo e(__('En supprimant cet employé, toutes ses actions dans votre entreprise seront effacées.')); ?></div>
                                    </div>
                                    <div class="modal-footer">
                                    <div class="w-100">
                                        <div class="row">
                                        <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                            <?php echo e(__('Annuler')); ?>

                                            </a></div>
                                        <div class="col"><a wire:click.prevent="delete(<?php echo e($employee->id); ?>)" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                            <?php echo e(__('Supprimer')); ?>

                                            </a></div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <?php echo e($employees->links()); ?>

                    </div>
                    </div>
                </div>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                <!-- Modify employee -->

            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Employee\Resources/views/livewire/employees/employee.blade.php ENDPATH**/ ?>