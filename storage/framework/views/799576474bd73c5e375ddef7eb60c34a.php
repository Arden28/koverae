<div>
    <?php $__env->startSection('title', __('Nouvelle équipe')); ?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sales::form.sales-team-form', []);

$__html = app('livewire')->mount($__name, $__params, 'DbK6AlA', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Sales\Resources/views/livewire/team/create.blade.php ENDPATH**/ ?>