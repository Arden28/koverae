<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?> | Koverae</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/images/logo/favicon.ico')); ?>" />

    <!-- CSS files -->
    <link href="<?php echo e(asset('assets/dist/css/tabler.min.css')); ?>?1668287865" rel="stylesheet"/>
    <link href="<?php echo e(asset('assets/dist/css/tabler-vendors.min.css')); ?>?1668287865" rel="stylesheet"/>
    <link href="<?php echo e(asset('assets/css/style.css')); ?>?1668287864" rel="stylesheet"/>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
      </style>
</head>
<body>

    <main class="page-content">
        <div class="d-flex justify-center">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

</body>
</html>
<?php /**PATH D:\My Laravel Project\koverae-app\resources\views/layouts/auth.blade.php ENDPATH**/ ?>