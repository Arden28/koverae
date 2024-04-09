<div>
    <?php $__env->startSection('title', 'Tableaux de bord'); ?>

    <?php $__env->startSection('styles'); ?>
        <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
          body::-webkit-scrollbar {
              display: none;
          }

          /* Hide scrollbar for IE, Edge, and Firefox */
          body {
            overflow-y: hidden;
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
          }
          .app-sidebar{
            height: 90vh;
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

    <div class="page-body h-screen m-0">
      <div class="container-fluid h-screen">
        <div class="row g-4 h-screen">
            <!-- Side Bar -->
            <div class="col-md-2 bg-white app-sidebar flex-grow-0 flex-shrink-0 h-screen mb-5 bg-view overflow-auto position-relative pe-1 ps-3">
                <form action="./" method="get" autocomplete="off" novalidate class="sticky-top">

                <?php $__currentLoopData = $dashboards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--[if BLOCK]><![endif]--><?php if(dashboard_installed($dash->slug)->count() >= 1): ?>
                    <header class="form-label pt-3 font-weight-bold text-uppercase"> <b><i class="bi bi-folder"></i> <?php echo e($dash->name); ?></b></header>
                    <ul class="mb-2 ml-2">
                        <!--[if BLOCK]><![endif]--><?php if($dash->appDashboards()): ?>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $dash->appDashboards()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!--[if BLOCK]><![endif]--><?php if(dashboard($app->slug)): ?>
                                <li class="text-decoration-none panel-category <?php echo e($app->slug == $this->view ? 'selected' : ''); ?> py-1 pe-0 ps-0 cursor-pointer" wire:click="changeDash('<?php echo e($app->slug); ?>')" wire:target="changeDash">
                                <?php echo e($app->name); ?>

                                </li>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </ul>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                </form>
            </div>
            <!-- Apps Dashboard -->
            <div class="col-12 col-md-12 col-lg-10 h-screen">
                <!--[if BLOCK]><![endif]--><?php if($this->view == 'sales_dashboard'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboards::dashboard-app.sales-dashboard', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3919853329-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php elseif($this->view == 'products_dashboard'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboards::dashboard-app.products-dashboard', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3919853329-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php elseif($this->view == 'pos_dashboard'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboards::dashboard-app.pos-dashboard', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3919853329-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php elseif($this->view == 'invoices_dashboard'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboards::dashboard-app.invoices-dashboard', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3919853329-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
      </div>
    </div>
    <!-- Loading -->
    <div class="k-loading cursor-pointer pb-1" wire:loading>
        <p>En cours de chargement ...</p>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Dashboards\Resources/views/livewire/overview.blade.php ENDPATH**/ ?>