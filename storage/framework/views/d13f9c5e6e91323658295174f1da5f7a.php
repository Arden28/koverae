<div id="laravel-notify z-index-10">
    <!--[if BLOCK]><![endif]--><?php if(session()->has('notify.message')): ?>

        <?php echo $__env->make('notify::notifications.toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('notify::notifications.smiley', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('notify::notifications.drakify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('notify::notifications.connectify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('notify::notifications.emotify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

    <?php echo e(session()->forget('notify.message')); ?>


    <script>
        var notify = {
            timeout: "<?php echo e(config('notify.timeout')); ?>",
        }
    </script>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\vendor\mckenziearts\laravel-notify\src/../resources/views/components/notify.blade.php ENDPATH**/ ?>