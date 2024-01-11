<li class="nav-item" data-turbolinks>
    <a class="nav-link kover-navlink" style="margin-right: 5px;" href="<?php echo e(route('main', ['subdomain' => current_company()->domain_name])); ?>" wire:navigate>
      <span class="nav-link-icon d-md-none d-lg-inline-block">
        <img class="custom-image" src="<?php echo e(asset('assets/images/apps/contact.png')); ?>" alt="">
      </span>
      <span class="nav-link-title">
          <?php echo e(__('Contact')); ?>

      </span>
    </a>
</li>


<li class="nav-item">
    <a class="nav-link kover-navlink" wire:navigate href="<?php echo e(route('contacts.index', ['subdomain' => current_company()->domain_name])); ?>" style="margin-right: 5px;">
      <span class="nav-link-title">
          <?php echo e(__('Contacts')); ?>

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
                <a class="dropdown-item" wire:navigate href="<?php echo e(route('contacts.titles.index', ['subdomain' => current_company()->domain_name])); ?>">
                    <?php echo e(__('Titres honorifiques')); ?>

                </a>
                <a class="dropdown-item" wire:navigate href="<?php echo e(route('contacts.industries.index', ['subdomain' => current_company()->domain_name])); ?>">
                    <?php echo e(__('Industries')); ?>

                </a>
                <a class="dropdown-item" wire:navigate href="<?php echo e(route('contacts.tags.index', ['subdomain' => current_company()->domain_name])); ?>">
                    <?php echo e(__('Etiquettes')); ?>

                </a>
                <hr>
                <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <?php echo e(__('Localisation')); ?>

                </a>
                <div class="dropdown-menu">
                  <a wire:navigate href="<?php echo e(route('contacts.countries.index', ['subdomain' => current_company()->domain_name])); ?>" class="dropdown-item">
                    <?php echo e(__('Pays')); ?>

                  </a>
                  <a wire:navigate href="<?php echo e(route('employee.department.index', ['subdomain' => current_company()->domain_name])); ?>" class="dropdown-item">
                    <?php echo e(__('Etats Fed.')); ?>

                  </a>
                  <a wire:navigate href="<?php echo e(route('employee.department.index', ['subdomain' => current_company()->domain_name])); ?>" class="dropdown-item">
                    <?php echo e(__('Groupe de Pays')); ?>

                  </a>
                </div>
                <hr>
                <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <?php echo e(__('Comptes Bancaires')); ?>

                </a>
                <div class="dropdown-menu">
                  <a wire:navigate href="<?php echo e(route('contacts.banks.index', ['subdomain' => current_company()->domain_name])); ?>" class="dropdown-item">
                    <?php echo e(__('Banques')); ?>

                  </a>
                  <a wire:navigate href="<?php echo e(route('contacts.banks.accounts.index', ['subdomain' => current_company()->domain_name])); ?>" class="dropdown-item">
                    <?php echo e(__('Comptes bancaires')); ?>

                  </a>
                </div>

            </div>
        </div>
    </div>
</li>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Contact\Resources/views/layouts/navbar-menu.blade.php ENDPATH**/ ?>