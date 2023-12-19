
<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
        <a href="">
            <img src="<?php echo e(asset('assets/images/logo/logo-black-gd.png')); ?>" alt="Koverae POS" class="navbar-brand-image">
          
        </a>
      </h1>
      <div class="navbar-nav flex-row order-md-last">
        <div class="d-none d-md-flex">
          <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="<?php echo e(__('Mode Sombre')); ?>" data-bs-toggle="tooltip"
            data-bs-placement="bottom">
            <i class="bi bi-moon" style="font-size: 15px;"></i>
          </a>
          <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="<?php echo e(__('Mode Clair')); ?>" data-bs-toggle="tooltip"
            data-bs-placement="bottom">
            <i class="bi bi-brightness-high" style="font-size: 15px;"></i>
          </a>
          
          

        </div>
        

        <?php
            $companies = Auth::user()->allCompanies();
        ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_companies')): ?>
          <div class="nav-item dropdown d-none d-md-flex me-3">
              <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">

              <i class="bi bi-building" style="font-size: 15px;"></i>
                  <?php if($companies->count() > 1): ?>
                      <span class="badge bg-red">
                          <?php echo e($companies->count()); ?>

                      </span>
                  <?php endif; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
              <div class="card">
                  <div class="card-header">
                  <h3 class="card-title">
                      <?php if($companies->count() > 1): ?>
                      <?php echo e(__('Mes Entreprises')); ?>

                      <?php else: ?>
                      <?php echo e(__('Mon Entreprise')); ?>

                      <?php endif; ?>

                  </h3>
                  </div>
                  <div class="list-group list-group-flush list-group-hoverable">
                      <?php $__empty_1 = true; $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                          <div class="list-group-item">
                              <div class="row align-items-center">
                                  <div class="col-auto">
                                  <?php if(Auth::user()->currentCompany->id == $company->id): ?>
                                      <span class="status-dot status-dot-animated bg-green d-block"></span>
                                  <?php endif; ?>

                                  </div>
                                  <div class="col text-truncate text-muted text-truncate mt-n1">
                                      <a class="text-body d-block">
                                        <span class="avatar avatar-sm" style="background-image: url(<?php echo e(Auth::user()->currentCompany->getFirstMediaUrl('avatars')); ?>)"></span>
                                          <?php echo e($company->name); ?>

                                      </a>
                                  </div>
                                  <div class="col-auto">
                                      
                                      <?php if(Auth::user()->currentCompany->id == $company->id): ?>
                                          <a href="" class="list-group-item-actions">
                                              <i class="bi bi-eye mr-1 text-primary"></i>
                                          </a>
                                      <?php else: ?>
                                          <a class="list-group-item-actions">
                                              <i class="bi bi-broadcast-pin mr-1 text-primary"></i>
                                          </a>
                                      <?php endif; ?>
                                  </div>
                              </div>
                          </div>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                          <div class="list-group-item">
                              <div class="row align-items-center">
                                  <div class="col-auto">
                                      <p class="col text-truncate">
                                          <?php echo e(__('Vous n\'avez aucune entreprise.')); ?>

                                      </p>
                                  </div>
                              </div>
                          </div>
                      <?php endif; ?>

                  </div>
              </div>
              </div>
          </div>
          <?php endif; ?>

        
        <div class="nav-item dropdown">
          <a href="#" class="nav-link d-flex lh-1 text-reset p-0 placeholder-glow" data-bs-toggle="dropdown" aria-label="Open user menu">
            
            <span class="avatar avatar-sm" style="background-image: url(<?php echo e(auth()->user()->getFirstMediaUrl('avatars')); ?>)"></span>
            <div class="d-none d-xl-block ps-2">
                <div>
                    <?php echo e(trim(strrchr(auth()->user()->name, ' '))); ?>

                </div>
              <div class="mt-1 small text-muted">
                <span class="font-italic"><?php echo e(__('En Ligne')); ?> <i class="bi bi-circle-fill text-success" style="font-size: 11px;"></i></span>
              </div>

            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <a href="" class="dropdown-item">
                <?php echo e(__('Mon Profile')); ?>

            </a>
            <div class="dropdown-divider"></div>
            

            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                <?php echo e(__('Me déconnecter')); ?>

            </a>
            <form id="logout-form" action="" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
            </form>

          </div>
        </div>
      </div>

    </div>
</header>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>