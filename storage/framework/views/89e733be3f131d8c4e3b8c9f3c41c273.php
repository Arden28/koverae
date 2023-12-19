<script src="<?php echo e(asset('js/app.js')); ?>" crossorigin="anonymous"></script>

<!-- Libs JS -->
<script src="<?php echo e(asset('assets/dist/libs/list.js/dist/list.min.js')); ?>?1668287865" ></script>
<script src="<?php echo e(asset('assets/dist/libs/apexcharts/dist/apexcharts.min.js')); ?>?1668287865" ></script>

<!-- Tabler Core -->
<script src="<?php echo e(asset('assets/dist/js/tabler.min.js')); ?>?1668287865" ></script>
<script src="<?php echo e(asset('assets/dist/js/demo.min.js')); ?>?1668287865" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<!-- Include jQuery (or your preferred JavaScript library) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>

<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('wire-elements-modal');

$__html = app('livewire')->mount($__name, $__params, 'DYMusZT', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

<script>
    Livewire.hook('request', ({ fail }) => {
        fail(({ status, preventDefault }) => {
            if (status === 419) {
                preventDefault()

                confirm('La page à expiré. Veuillez la recharger.')
            }
        })
    })
</script>

<?php echo BladeUIKit\BladeUIKit::outputScripts(true); ?>

<?php echo notifyJs(); ?>



<?php echo $__env->yieldContent('third_party_scripts'); ?>

<!-- Alpine Js -->

<?php echo $__env->yieldPushContent('page_scripts'); ?>

<?php echo $__env->yieldContent('scripts'); ?>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/includes/main-js.blade.php ENDPATH**/ ?>