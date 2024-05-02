<div>
    <?php $__env->startSection('title', 'Applications'); ?>

    <?php $__env->startSection('styles'); ?>
        <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
          body::-webkit-scrollbar {
              display: none;
          }

          /* Hide scrollbar for IE, Edge, and Firefox */
          body {
              -ms-overflow-style: none;  /* IE and Edge */
              scrollbar-width: none;  /* Firefox */
          }
          .app-sidebar{
            overflow-y: auto;
          }
          .panel-category:hover{
            background-color: #D8DADD;
          }
          .panel-category.selected{
            background-color: #E6F2F3;
          }
            .app{
                background-color: white;
                padding: 8px 8px 8px 8px;
                height: 120px;
                width: 340px;
                min-height: auto;
                min-width: auto;
                display: flex;
                border: 1px solid #D8DADD;
            }
            .app .app_desc{
                height: 77px;
                width: 280px;
                padding: 0 0 0 10px;
                min-height: auto;
            }
            .app .app_desc .k_kanban_record_title{
                font-weight: bold;
                font-size: 15.6px;
            }
            .app .app_icon{
                height: 40px;
                width: 40px;
            }
        </style>
    <?php $__env->stopSection(); ?>

    <div class="page-body h-100 m-0">
      <div class="container-fluid">
        <div class="row g-4">
            <!-- Side Bar -->
          <div class="col-md-2 bg-white app-sidebar flex-grow-0 flex-shrink-0 h-screen mb-5 bg-view overflow-auto position-relative pe-1 ps-3">
            <form action="./" method="get" autocomplete="off" novalidate class="sticky-top">
              <header class="form-label pt-3 font-weight-bold text-uppercase"> <b><i class="bi bi-folder"></i> Industries</b></header>
              <ul class="mb-4 ml-2">
                <li class="text-decoration-none panel-category py-1 pe-0 ps-0 cursor-pointer">
                  <?php echo e(__('Vente au détail')); ?>

                </li>
                <li class="text-decoration-none panel-category py-1 pe-0 ps-0 cursor-pointer">
                  <?php echo e(__('Fabrication')); ?>

                </li>
                <li class="text-decoration-none panel-category py-1 pe-0 ps-0 cursor-pointer">
                  <?php echo e(__('Organisation')); ?>

                </li>
              </ul>

              <header class="form-label pt-3 font-weight-bold text-uppercase"> <b><i class="bi bi-folder"></i> Applications</b></header>
              <ul class="mb-4 ml-2">
                <li class="text-decoration-none panel-category <?php echo e($this->cat == 'all' ? 'selected' : ''); ?> py-1 pe-0 ps-0 cursor-pointer">
                  <?php echo e(__('Toutes le applications')); ?>

                </li>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $app_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li wire:click="category(<?php echo e($category->slug); ?>)" class="text-decoration-none <?php echo e($this->cat == $category->slug ? 'selected' : ''); ?> panel-category py-1 pe-0 ps-0 cursor-pointer">
                  <?php echo e($category->name); ?>

                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
              </ul>

            </form>
          </div>
          <!-- Apps List -->
          <div class="col-12 col-md-12 col-lg-10 h-screen">
            <div class="row gap-1">
                <!-- App -->
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="app mt-1 col-12 col-md-12 col-lg-4">
                    <img src="<?php echo e(asset('assets/images/apps/'.$app->icon.'.png')); ?>" height="40px" width="40px" alt="" class="app_icon rounded">
                    <div class="app_desc">
                        <h4 class="k_kanban_record_title">
                            <?php echo e($app->short_name); ?>

                        </h4>
                        <span class="text-muted small">
                            <?php echo e(str($app->description, 10)); ?>

                        </span>
                        <div class="app_action d-flex flex-wrap justify-content-between">
                            <!--[if BLOCK]><![endif]--><?php if(module($app->slug) == false): ?>
                            <button class="btn btn-primary button_immediate_installation" wire:loading.attr="disabled" wire:target="install(<?php echo e($app->id); ?>)" wire:click="install(<?php echo e($app->id); ?>)">
                                <?php echo e(__('Installer')); ?>

                            </button>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <a href="" class="btn btn-secondary float-end">
                                <?php echo e(__('En savoir plus')); ?>

                            </a>
                        </div>
                    </div>
                    <div class="col-2 text-right">
                        <div class="dropdown">
                            <a href="#" class="btn-action text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item"><?php echo e(__("Info sur l'app")); ?></a>
                                <?php if(module($app->slug)): ?>
                                <li wire:click="uninstall(<?php echo e($app->slug); ?>)" class="dropdown-item cursor-pointer">
                                    <?php echo e(__('Désintaller')); ?>

                                </li>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/App\Resources/views/livewire/overview.blade.php ENDPATH**/ ?>