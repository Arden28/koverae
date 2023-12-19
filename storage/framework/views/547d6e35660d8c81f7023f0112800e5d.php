<?php $__env->startSection('title', 'Konnectez-vous'); ?>
<?php $__env->startSection('content'); ?>
<div class="k_website_login container flex-grow-1 card mt-5 shadow">
    <span class="k_logo mx-auto mt-4" style="background-image: url('<?php echo e(asset('assets/images/logo/logo-1.png')); ?>'); background-size: cover;"></span>
    <div class="card-body">
        <div class="k-alert alert-info text-center">
            <p>
                Accédez à vos instances et gérez-les à partir de ce compte Koverae.
            </p>
        </div>
        <form method="POST" action="<?php echo e(route('login')); ?>" class="k_login_form">
            <?php echo csrf_field(); ?>

            <div class="mb-3 field-login">
                <label for="phone" class="fom-label">
                    <?php echo e(__('Numéro de téléphone')); ?>

                </label>
                <input name="phone" required class="form-control" type="tel" id="phone" placeholder="Votre numéro de téléphone">
                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('phone'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('phone')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
            </div>

            <div class="col-12 py-2 field-password koverae_password_revear">
                <label for="password" class="fom-label">
                    <?php echo e(__('Mot de passe')); ?>

                </label>
                <input class="form-control" name="password" type="password" id="password"
                    required autocomplete="current-password">
                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('password'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                
            </div>

            <div class="k_login_buttons clearfix text-center gap-1 d-grid mb-1 pt-3">
                <button class="btn btn-primary float-start">
                    <?php echo e(__('ME KONNECTER')); ?>

                </button>

                <div class="links-container">
                    <a href="" class="login-link"><?php echo e(__("Vous n'êtes pas un Kover ?")); ?></a>
                    <?php if(Route::has('password.request')): ?>
                    <a href="<?php echo e(route('password.request')); ?>" class="reset-link"><?php echo e(__('Réinitialiser le mot de passe')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/auth/login.blade.php ENDPATH**/ ?>