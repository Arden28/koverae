<!--[if BLOCK]><![endif]--><?php if(session()->get('notify.model') === 'smiley'): ?>
    <div class="notify fixed inset-0 flex items-end justify-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
        <div
            x-data="{ show: <?php if(session()->get('notify.model') === 'smiley'): ?> true <?php else: ?> false <?php endif; ?> }"
            x-init="setTimeout(() => { show = true }, 750)"
            x-show="show"
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'pointer-events-auto max-w-sm w-full shadow-lg rounded-lg',
                'bg-white' => config('notify.theme') === 'light',
                'bg-slate-800' => config('notify.theme') !== 'light',
            ]); ?>"
        >
            <div class="relative rounded-lg shadow-xs overflow-hidden">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="inline-flex items-center text-white text-2xl shrink-0">
                            <?php if(session()->get('notify.type') === 'success'): ?> <span>👍</span> <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <?php if(session()->get('notify.type') === 'error'): ?> <span>🙅🏽‍♂️</span> <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <div class="ml-6 w-0 flex-1">
                            <?php if (isset($component)) { $__componentOriginale9b581dc05ef4a3314acaf019b8c9b87 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale9b581dc05ef4a3314acaf019b8c9b87 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'notify::components.notify-content','data' => ['content' => session()->get('notify.message')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('notify::notify-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['content' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session()->get('notify.message'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale9b581dc05ef4a3314acaf019b8c9b87)): ?>
<?php $attributes = $__attributesOriginale9b581dc05ef4a3314acaf019b8c9b87; ?>
<?php unset($__attributesOriginale9b581dc05ef4a3314acaf019b8c9b87); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale9b581dc05ef4a3314acaf019b8c9b87)): ?>
<?php $component = $__componentOriginale9b581dc05ef4a3314acaf019b8c9b87; ?>
<?php unset($__componentOriginale9b581dc05ef4a3314acaf019b8c9b87); ?>
<?php endif; ?>
                        </div>
                        <div class="ml-4 shrink-0 flex">
                            <?php if (isset($component)) { $__componentOriginal5448586831e9ee86f99a37b39f8fb162 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5448586831e9ee86f99a37b39f8fb162 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'notify::components.button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('notify::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5448586831e9ee86f99a37b39f8fb162)): ?>
<?php $attributes = $__attributesOriginal5448586831e9ee86f99a37b39f8fb162; ?>
<?php unset($__attributesOriginal5448586831e9ee86f99a37b39f8fb162); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5448586831e9ee86f99a37b39f8fb162)): ?>
<?php $component = $__componentOriginal5448586831e9ee86f99a37b39f8fb162; ?>
<?php unset($__componentOriginal5448586831e9ee86f99a37b39f8fb162); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\vendor\mckenziearts\laravel-notify\src/../resources/views/notifications/smiley.blade.php ENDPATH**/ ?>