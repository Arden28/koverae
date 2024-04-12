<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
    <li class="nav-item" data-turbolinks>
        <a class="nav-link kover-navlink" style="margin-right: 5px;" href="<?php echo e(route('main', ['subdomain' => current_company()->domain_name])); ?>">
          <span class="nav-link-icon d-md-none d-lg-inline-block">
            <img class="custom-image" src="<?php echo e(asset('assets/images/apps/settings.png')); ?>" alt="">
          </span>
          <span class="nav-link-title">
              <?php echo e(__('Paramètres')); ?>

          </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link kover-navlink" wire:navigate href="<?php echo e(route('settings.general', ['view' => 'general', 'subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" style="margin-right: 5px;">
          <span class="nav-link-title">
              <?php echo e(__('Paramètres généraux')); ?>

          </span>
        </a>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              <?php echo e(__('Utilisateurs & Entreprises')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('settings.users', ['subdomain' => current_company()->domain_name])); ?>">
                        <?php echo e(__('Utilisateurs')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="#">
                        <?php echo e(__('Entreprises')); ?>

                    </a>

                </div>
            </div>
        </div>
    </li>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Settings\Resources/views/layouts/navbar-menu.blade.php ENDPATH**/ ?>