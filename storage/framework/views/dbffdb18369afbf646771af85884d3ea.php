<li class="nav-item" data-turbolinks>
    <a class="nav-link kover-navlink" style="margin-right: 5px;" href="<?php echo e(route('main', ['subdomain' => current_company()->domain_name])); ?>" wire:navigate>
      <span class="nav-link-icon d-md-none d-lg-inline-block">
        <img class="custom-image" src="<?php echo e(asset('assets/images/apps/employee.png')); ?>" alt="">
      </span>
      <span class="nav-link-title">
          <?php echo e(__('Employé')); ?>

      </span>
    </a>
</li>

<li class="nav-item dropdown" data-turbolinks>
    <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
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
    <a class="nav-link kover-navlink" wire:navigate style="margin-right: 5px;" href="<?php echo e(route('employee.department.index', ['subdomain' => current_company()->domain_name])); ?>">
      <span class="nav-link-title">
          <?php echo e(__('Départements')); ?>

      </span>
    </a>
</li>

<li class="nav-item dropdown" data-turbolinks>
    <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
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

                <div class="dropend">
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
                </div>

                <div class="dropend">
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
    </div>
</li>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Employee\Resources/views/layouts/navbar-menu.blade.php ENDPATH**/ ?>