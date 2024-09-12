<div>
    <?php $__env->startSection('title', 'Applications'); ?>

    <?php $__env->startSection('styles'); ?>
        <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        body{
            overflow-y: hidden;
        }
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
            height: 100vh;
          }
          .panel-category:hover{
            background-color: #D8DADD;
          }
          .panel-category.selected{
            background-color: #E6F2F3;
          }
            .app{
                height: auto;
                /* width: 340px; */
                min-height: 115px;
                min-width: auto;
                display: flex;
            }
            .app .app_desc{
                height: 77px;
                width: 280px;
                padding: 0 0 0 10px;
                min-height: auto;
            }
            /* .app .app_desc .k_kanban_record_title{
                font-weight: bold;
                font-size: 15.6px;
            } */
            .app .app_icon{
                height: 40px;
                width: 40px;
            }
        </style>
    <?php $__env->stopSection(); ?>

    <div class="">
      <div class="container-fluid">
        <div class="row g-3">
            <!-- Side Bar -->
          <div class="flex-grow-0 flex-shrink-0 mb-5 overflow-auto bg-white d-none d-lg-block col-md-2 app-sidebar bg-view position-relative pe-1 ps-3">
            <form action="./" method="get" autocomplete="off" novalidate class="sticky-top">
              

              <header class="pt-3 form-label font-weight-bold text-uppercase"> <b><i class="bi bi-folder"></i> Applications</b></header>
              <ul class="mb-4 ml-2">
                <li class="text-decoration-none panel-category <?php echo e($cat == 'all' ? 'selected' : ''); ?> py-1 pe-0 ps-0 cursor-pointer" wire:click="changeCat('all')">
                  <?php echo e(__('All')); ?>

                </li>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $app_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li wire:click="changeCat('<?php echo e($category->slug); ?>')" class="text-decoration-none <?php echo e($cat == $category->slug ? 'selected' : ''); ?> panel-category py-1 pe-0 ps-0 cursor-pointer">
                  <?php echo e($category->name); ?>

                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
              </ul>

            </form>
          </div>
          <!-- Apps List -->
          <div class="p-2 overflow-auto col-12 col-md-12 col-lg-10" style="height: 100vh;">
            <div class="row">
                <!-- App -->
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mt-2 col-sm-6 col-md-4 col-lg-4">
                    <div class="p-2 bg-white app d-flex position-relative" style="max-height: auto;">
                        <img src="<?php echo e(asset('assets/images/apps/'.$app->icon.'.png')); ?>" style="height: 45px; width: 45px;" alt="" class="m-2 rounded">
                        <div class="app_desc">
                            <h4 class="k_kanban_record_title">
                                <?php echo e($app->short_name); ?>

                            </h4>
                            <span class="text-muted ">
                                <?php echo e(str($app->description, 10)); ?>

                            </span>
                            <div class="flex-wrap app_action d-flex justify-content-between">
                                <!--[if BLOCK]><![endif]--><?php if(module($app->slug) == false): ?>
                                <button class="rounded btn btn-primary" wire:loading.attr="disabled" wire:target="install(<?php echo e($app->id); ?>)" wire:click="install(<?php echo e($app->id); ?>)"><i class="bi bi-download font-weight-bold" style="margin-right: 4px;"></i> <span><?php echo e(__('Install')); ?></span></button>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                
                                
                            </div>
                        </div>
                        <div class="" style="position: absolute; top: 10px; right: 10px;">
                            <div class="dropdown">
                                <a href="#" class="btn-action text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="1" /><circle cx="12" cy="19" r="1" /><circle cx="12" cy="5" r="1" /></svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item"><?php echo e(__("Info sur l'app")); ?></a>
                                    <?php if(module($app->slug)): ?>
                                    <li wire:loading.attr="disabled" wire:target="uninstall('<?php echo e($app->slug); ?>')" wire:click="uninstall('<?php echo e($app->slug); ?>')" class="cursor-pointer dropdown-item">
                                        <?php echo e(__('Désintaller')); ?>

                                    </li>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                </div>
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
<?php /**PATH D:\My Laravel Startup\koverae\Modules/App\Resources/views/livewire/overview.blade.php ENDPATH**/ ?>