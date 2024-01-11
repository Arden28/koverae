<div>
    <?php $__env->startSection('title', 'Paramètres'); ?>

    <?php $__env->startSection('styles'); ?>
        <style>
            body {
                /* Disable the default page scrollbar */
                overflow: hidden;
            }
        </style>
    <?php $__env->stopSection(); ?>

        <!-- Settings -->
        <div class="k-row">
            <!-- Left Sidebar -->
            <div class="settings_tab h-100 border-end">

                <!-- Paramètre Généraux -->
                <div class="tab cursor-pointer <?php echo e($view == 'general' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('general')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block">
                        <img src="<?php echo e(asset('assets/images/apps/settings.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Paramètre Généraux
                    </span>
                </div>

                <!-- Sales -->
                <!--[if BLOCK]><![endif]--><?php if(module('sales')): ?>
                <div class="tab cursor-pointer <?php echo e($view == 'sales' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('sales')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="<?php echo e(asset('assets/images/apps/sales.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Ventes
                    </span>
                </div>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                <!-- Purchase -->
                <!--[if BLOCK]><![endif]--><?php if(module('purchase')): ?>
                <div class="tab cursor-pointer <?php echo e($view == 'purchase' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('purchase')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="<?php echo e(asset('assets/images/apps/purchase.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Achat
                    </span>
                </div>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                <!-- Inventory -->
                <!--[if BLOCK]><![endif]--><?php if(module('inventory')): ?>
                <div class="tab cursor-pointer <?php echo e($view == 'inventory' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('inventory')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="<?php echo e(asset('assets/images/apps/inventory.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Inventaire
                    </span>
                </div>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                <!-- Invoicing -->
                <!--[if BLOCK]><![endif]--><?php if(module('invoicing')): ?>
                <div class="tab cursor-pointer <?php echo e($view == 'invoicing' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('invoicing')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="<?php echo e(asset('assets/images/apps/invoice.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Facturation
                    </span>
                </div>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                

                <!-- Employee -->
                <!--[if BLOCK]><![endif]--><?php if(module('employee')): ?>
                <div class="tab cursor-pointer <?php echo e($view == 'employee' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('employee')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="<?php echo e(asset('assets/images/apps/employee.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Personnel
                    </span>
                </div>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                <!-- Point Of Sale -->
                <!--[if BLOCK]><![endif]--><?php if(module('pos')): ?>
                <div class="tab cursor-pointer <?php echo e($view == 'pos' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('pos')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="<?php echo e(asset('assets/images/apps/pos.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        Point de vente
                    </span>
                </div>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

            </div>

            <!-- Right Sidebar -->
            <div class="settings">
                <!-- General Settings -->

                <!--[if BLOCK]><![endif]--><?php if($view == 'general'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings::module.general', []);

$__html = app('livewire')->mount($__name, $__params, 'mkl37l7', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php elseif($view == 'sales'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings::module.sales', []);

$__html = app('livewire')->mount($__name, $__params, 'TNYevZS', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php elseif($view == 'purchase'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings::module.purchase', []);

$__html = app('livewire')->mount($__name, $__params, 'aexJKJH', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php elseif($view == 'inventory'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings::module.inventory', []);

$__html = app('livewire')->mount($__name, $__params, 'gRERlF2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php elseif($view == 'invoicing'): ?>

                <?php elseif($view == 'employee'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings::module.employee', []);

$__html = app('livewire')->mount($__name, $__params, '9AKrKHt', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php elseif($view == 'pos'): ?>

                <?php else: ?>

                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>


    

</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Settings\Resources/views/livewire/general-setting.blade.php ENDPATH**/ ?>