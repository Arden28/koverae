<div class="navbar-expand-md d-print-none">
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="navbar navbar-light">
        <div class="container-xl">
          <ul class="navbar-nav">

            <li class="nav-item page-module">
                <a class="btn" style="margin-right: 5px;" wire:navigate href="<?php echo e(route('main', ['subdomain' => current_company()->domain_name])); ?>" >
                  <span class="nav-link-title">
                      <i class="bi bi-arrow-left-square" style="width: 16px; height: 16px;" ></i>
                  </span>
                </a>
            </li>

            <li class="nav-item dropdown" data-turbolinks>
                <a class="btn dropdown-toggle" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-title">
                      <?php echo e(__('Employés')); ?>

                  </span>
                </a>
                <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                        <!-- Left Side -->
                        <div class="dropdown-menu-column">
                            <a class="dropdown-item" wire:navigate href="<?php echo e(route('employee.index', ['subdomain' => current_company()->domain_name])); ?>">
                                <?php echo e(__('Employés')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item" data-turbolinks>
                <a class="btn" wire:navigate style="margin-right: 5px;" href="<?php echo e(route('employee.department.index', ['subdomain' => current_company()->domain_name])); ?>">
                  <span class="nav-link-title">
                      <?php echo e(__('Départements')); ?>

                  </span>
                </a>
            </li>

            <li class="nav-item dropdown" data-turbolinks>
                <a class="btn dropdown-toggle" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-title">
                      <?php echo e(__('Configuration')); ?>

                  </span>
                </a>
                <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                        <!-- Left Side -->
                        <div class="dropdown-menu-column">
                            <a class="dropdown-item" wire:navigate href="<?php echo e(route('settings.general', ['subdomain' => current_company()->domain_name, 'page' => 'employee'])); ?>">
                                <?php echo e(__('Paramètre')); ?>

                            </a>

                            <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                              <?php echo e(__('Employé')); ?>

                            </a>
                            <div class="dropdown-menu">
                              <a wire:navigate href="<?php echo e(route('employee.department.index', ['subdomain' => current_company()->domain_name])); ?>" class="dropdown-item">
                                <?php echo e(__('Départements')); ?>

                              </a>
                              <a wire:navigate href="<?php echo e(route('employee.workplaces.index', ['subdomain' => current_company()->domain_name])); ?>" class="dropdown-item">
                                <?php echo e(__('Lieux de travail')); ?>

                              </a>
                              <!--
                              <a href="./cards-masonry.html" class="dropdown-item">
                                <?php echo e(__('Raison de départ')); ?>

                              </a>
                                -->
                            </div>

                            <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                              <?php echo e(__('Recrutement')); ?>

                            </a>
                            <div class="dropdown-menu">
                              <a wire:navigate href="<?php echo e(route('employee.jobs.index', ['subdomain' => current_company()->domain_name])); ?>" class="dropdown-item">
                                <?php echo e(__('Emplois')); ?>

                              </a>
                              
                            </div>

                        </div>
                    </div>
                </div>
            </li>


          </ul>
          
          <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
            <form action="./" method="get" autocomplete="off" novalidate>
              <div class="input-icon">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
                </span>
                <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Employee\Resources/views/layouts/navbar-menu.blade.php ENDPATH**/ ?>