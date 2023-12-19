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

            <li class="nav-item">
                <a class="btn" wire:navigate href="<?php echo e(route('contacts.index', ['subdomain' => current_company()->domain_name])); ?>" style="margin-right: 5px;">
                  <span class="nav-link-title">
                      <?php echo e(__('Contacts')); ?>

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
                            <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
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
                            <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
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


          </ul>

        </div>
      </div>
    </div>
  </div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Contact\Resources/views/layouts/navbar-menu.blade.php ENDPATH**/ ?>