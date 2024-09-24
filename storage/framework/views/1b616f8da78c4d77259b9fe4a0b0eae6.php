<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
    <li class="nav-item" data-turbolinks>
        <a class="nav-link kover-navlink" style="margin-right: 5px;" href="<?php echo e(route('main', ['subdomain' => current_company()->domain_name])); ?>">
          <span class="nav-link-icon d-md-none d-lg-inline-block">
            <img class="custom-image" src="<?php echo e(asset('assets/images/apps/invoice.png')); ?>" alt="">
          </span>
          <span class="nav-link-title">
            <?php echo e(__('translator::invoicing.navbar.module')); ?>

          </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link kover-navlink" wire:navigate href="<?php echo e(route('invoices.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" style="margin-right: 5px;">
          <span class="nav-link-title">
            <?php echo e(__('translator::invoicing.navbar.overview')); ?>

          </span>
        </a>
    </li>
    
    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
            <?php echo e(__('translator::invoicing.navbar.vendor.name')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('contacts.titles.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::invoicing.navbar.vendor.bills')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('contacts.tags.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::invoicing.navbar.vendor.refunds')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('contacts.industries.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::invoicing.navbar.vendor.payments')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('contacts.industries.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::invoicing.navbar.vendor.products')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('contacts.industries.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::invoicing.navbar.vendor.vendors')); ?>

                    </a>
                </div>
            </div>
        </div>
    </li>
    
    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
            <?php echo e(__('translator::invoicing.navbar.customer.name')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('contacts.titles.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::invoicing.navbar.customer.invoices')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('contacts.tags.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::invoicing.navbar.customer.credit-notes')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('contacts.industries.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::invoicing.navbar.customer.payments')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('contacts.industries.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::invoicing.navbar.customer.customers')); ?>

                    </a>
                </div>
            </div>
        </div>
    </li>
    
    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
            <?php echo e(__('translator::invoicing.navbar.analytic.name')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <div class="dropend">
                        <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          <?php echo e(__('translator::invoicing.navbar.analytic.partner.name')); ?>

                        </a>
                        <div class="dropdown-menu">
                            <a wire:navigate href="<?php echo e(route('contacts.countries.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                              <?php echo e(__('translator::invoicing.navbar.analytic.partner.follow-ups')); ?>

                            </a>
                        </div>
                    </div>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('contacts.titles.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::invoicing.navbar.analytic.invoice-analytics')); ?>

                    </a>
                </div>
            </div>
        </div>
    </li>
    

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
            <?php echo e(__('translator::invoicing.navbar.configuration.name')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('settings.general', ['subdomain' => current_company()->domain_name, 'view' => 'invoicing', 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::invoicing.navbar.configuration.settings')); ?>

                    </a>
                    <div class="dropend">
                        <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          <?php echo e(__('translator::invoicing.navbar.configuration.invoicing.name')); ?>

                        </a>
                        <div class="dropdown-menu">
                            <a wire:navigate href="<?php echo e(route('invoices.payment-terms.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                              <?php echo e(__('translator::invoicing.navbar.configuration.invoicing.payment-terms')); ?>

                            </a>
                            <a wire:navigate href="<?php echo e(route('invoices.reminder-levels.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                                <?php echo e(__('translator::invoicing.navbar.configuration.invoicing.follow-ups')); ?>

                            </a>
                            <a wire:navigate href="<?php echo e(route('invoices.incoterms.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                                <?php echo e(__('translator::invoicing.navbar.configuration.invoicing.incoterms')); ?>

                            </a>
                        </div>
                    </div>

                    <div class="dropend">
                        <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          <?php echo e(__('translator::invoicing.navbar.configuration.bank.name')); ?>

                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="<?php echo e(route('contacts.banks.accounts.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__('translator::invoicing.navbar.configuration.bank.bank-accounts')); ?>

                          </a>
                        </div>
                    </div>

                    <div class="dropend">
                        <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          <?php echo e(__('translator::invoicing.navbar.configuration.accounting.name')); ?>

                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="<?php echo e(route('contacts.banks.accounts.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__('translator::invoicing.navbar.configuration.accounting.taxes')); ?>

                          </a>
                          <a wire:navigate href="<?php echo e(route('contacts.banks.accounts.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__('translator::invoicing.navbar.configuration.accounting.journals')); ?>

                          </a>
                          <a wire:navigate href="<?php echo e(route('contacts.banks.accounts.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__('translator::invoicing.navbar.configuration.accounting.currencies')); ?>

                          </a>
                          <a wire:navigate href="<?php echo e(route('contacts.banks.accounts.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__('translator::invoicing.navbar.configuration.accounting.fiscal-positions')); ?>

                          </a>
                        </div>
                    </div>

                    <div class="dropend">
                        <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          <?php echo e(__('translator::invoicing.navbar.configuration.online-payment.name')); ?>

                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="<?php echo e(route('contacts.banks.accounts.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__('translator::invoicing.navbar.configuration.online-payment.providers')); ?>

                          </a>
                          <a wire:navigate href="<?php echo e(route('contacts.banks.accounts.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__('translator::invoicing.navbar.configuration.online-payment.methods')); ?>

                          </a>
                        </div>
                    </div>

                    <div class="dropend">
                        <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          <?php echo e(__('translator::invoicing.navbar.configuration.management.name')); ?>

                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="<?php echo e(route('contacts.banks.accounts.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__('translator::invoicing.navbar.configuration.management.product-management')); ?>

                          </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </li>
    
</div>
<?php /**PATH D:\My Laravel Startup\koverae\Modules/Invoicing\Resources/views/layouts/navbar-menu.blade.php ENDPATH**/ ?>