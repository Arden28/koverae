<div>
    <?php $__env->startSection('title', 'Paramètres'); ?>

    <?php $__env->startSection('styles'); ?>
        <style>
            body {
                /* Disable the default page scrollbar */
                /* overflow: hidden; */
            }
        </style>
    <?php $__env->stopSection(); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings::navbar.setting-panel', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-673188745-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php $__env->stopSection(); ?>

        <!-- Settings -->
        <div class="k-row">
            <!-- Left Sidebar -->
            <div class="settings_tab border-end">

                <!-- Paramètre Généraux -->
                <div class="tab cursor-pointer <?php echo e($view == 'general' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('general')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block">
                        <img src="<?php echo e(asset('assets/images/apps/settings.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        <?php echo e(__('General Setting')); ?>

                    </span>
                </div>

                <!-- Sales -->
                <!--[if BLOCK]><![endif]--><?php if(module('sales')): ?>
                <div class="tab cursor-pointer <?php echo e($view == 'sales' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('sales')" wire:target="changePanel('sales')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="<?php echo e(asset('assets/images/apps/sales.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        <?php echo e(__('Sales')); ?>

                    </span>
                </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Sales -->
                <!--[if BLOCK]><![endif]--><?php if(module('crm')): ?>
                <div class="tab cursor-pointer <?php echo e($view == 'crm' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('crm')" wire:target="changePanel('crm')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="<?php echo e(asset('assets/images/apps/crm.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        <?php echo e(__('CRM')); ?>

                    </span>
                </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Calendar -->
                <!--[if BLOCK]><![endif]--><?php if(module('calendar')): ?>
                <div class="tab cursor-pointer <?php echo e($view == 'calendar' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('calendar')" wire:target="changePanel('calendar')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="<?php echo e(asset('assets/images/apps/calendar.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        <?php echo e(__('Calendar')); ?>

                    </span>
                </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Purchase -->
                <!--[if BLOCK]><![endif]--><?php if(module('purchase')): ?>
                <div class="tab cursor-pointer <?php echo e($view == 'purchase' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('purchase')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="<?php echo e(asset('assets/images/apps/purchase.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        <?php echo e(__('Purchase')); ?>

                    </span>
                </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Inventory -->
                <!--[if BLOCK]><![endif]--><?php if(module('inventory')): ?>
                <div class="tab cursor-pointer <?php echo e($view == 'inventory' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('inventory')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="<?php echo e(asset('assets/images/apps/inventory.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        <?php echo e(__('Inventory')); ?>

                    </span>
                </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Invoicing -->
                <!--[if BLOCK]><![endif]--><?php if(module('invoice')): ?>
                <div class="tab cursor-pointer <?php echo e($view == 'invoicing' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('invoicing')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="<?php echo e(asset('assets/images/apps/invoice.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        <?php echo e(__('Invoicing')); ?>

                    </span>
                </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Employee -->
                <!--[if BLOCK]><![endif]--><?php if(module('manufacturing')): ?>
                <div class="tab cursor-pointer <?php echo e($view == 'manufacturing' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('manufacturing')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="<?php echo e(asset('assets/images/apps/mrp.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        <?php echo e(__('Manufacturing')); ?>

                    </span>
                </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Employee -->
                <!--[if BLOCK]><![endif]--><?php if(module('employee')): ?>
                <div class="tab cursor-pointer <?php echo e($view == 'employee' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('employee')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="<?php echo e(asset('assets/images/apps/employee.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        <?php echo e(__('Employee')); ?>

                    </span>
                </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <!-- Point Of Sale -->
                <!--[if BLOCK]><![endif]--><?php if(module('pos')): ?>
                <div class="tab cursor-pointer <?php echo e($view == 'pos' ? 'selected' : ''); ?>" wire:click.prevent="changePanel('pos')">
                    <!-- App Icon -->
                    <div class="icon d-none d-md-block" >
                        <img src="<?php echo e(asset('assets/images/apps/pos.png')); ?>" alt="">
                    </div>
                    <!-- App Name -->
                    <span class="app_name">
                        <?php echo e(__('Point Of Sales')); ?>

                    </span>
                </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

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

$__html = app('livewire')->mount($__name, $__params, 'lw-673188745-1', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('sales::settings.sales-setting', ['company' => current_company()->id]);

$__html = app('livewire')->mount($__name, $__params, 'lw-673188745-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php elseif($view == 'crm' AND module('crm')): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('crm::settings.crm-setting', ['setting' => settings()]);

$__html = app('livewire')->mount($__name, $__params, 'lw-673188745-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php elseif($view == 'calendar' AND module('calendar')): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('calendar::settings.calendar-setting', ['setting' => settings()]);

$__html = app('livewire')->mount($__name, $__params, 'lw-673188745-4', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php elseif($view == 'calendar' AND module('calendar')): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('calendar::settings.crm-setting', ['setting' => settings()]);

$__html = app('livewire')->mount($__name, $__params, 'lw-673188745-5', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('purchase::settings.purchase-setting', ['company' => current_company()->id]);

$__html = app('livewire')->mount($__name, $__params, 'lw-673188745-6', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('inventory::settings.inventory-setting', ['company' => current_company()->id]);

$__html = app('livewire')->mount($__name, $__params, 'lw-673188745-7', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php elseif($view == 'manufacturing'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('manufacturing::settings.manufacturing-setting', ['company' => current_company()->id]);

$__html = app('livewire')->mount($__name, $__params, 'lw-673188745-8', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php elseif($view == 'invoicing'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('invoicing::settings.invoicing-setting', ['setting' => settings()]);

$__html = app('livewire')->mount($__name, $__params, 'lw-673188745-9', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php elseif($view == 'employee'): ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('employee::seetings.employee-setting', ['setting' => settings()]);

$__html = app('livewire')->mount($__name, $__params, 'lw-673188745-10', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php elseif($view == 'pos'): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pos::settings.pos-setting', ['setting' => settings()]);

$__html = app('livewire')->mount($__name, $__params, 'lw-673188745-11', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php else: ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings::settings.general', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-673188745-12', $__slots ?? [], get_defined_vars());

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
<?php /**PATH D:\My Laravel Startup\koverae\Modules/Settings\Resources/views/livewire/general-setting.blade.php ENDPATH**/ ?>