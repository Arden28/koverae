<div>
    <div class="position-relative">
        <input type="text" wire:model.live="query" id="product_0" class="k_input caret-black dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" placeholder="Tapez pour trouver votre produit">
    </div>
    <div wire:loading class="card position-absolute mt-1 border-0" style="z-index: 1;left: 0;right: 0; width: auto;">
        <div class="card-body shadow">
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only"></span>
                </div>
            </div>
        </div>
    </div>
    <!--[if BLOCK]><![endif]--><?php if(!empty($query)): ?>
        <div wire:click="resetQuery" class=" h-100" style="left: 0; top: 0; right: 0; bottom: 0;z-index: 1;"></div>
        <!--[if BLOCK]><![endif]--><?php if($search_results->isNotEmpty()): ?>
            <div class="card position-absolute mt-1" style="z-index: 2;left: 0;right: 0;border: 0;">
                <div class="card-body shadow">
                    <ul class="list-group list-group-flush">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $search_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item list-group-item-action">
                                <a wire:click="resetQuery" wire:click.prevent="selectProduct(<?php echo e($result); ?>)" href="#">
                                    <?php echo e($result->product_name); ?> | <?php echo e($result->product_code); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($search_results->count() >= $how_many): ?>
                             <li class="list-group-item list-group-item-action text-center">
                                 <a wire:click.prevent="loadMore" class="btn btn-primary btn-sm" href="#">
                                     <?php echo e(__('Plus de résultats')); ?> <i class="bi bi-arrow-down-circle"></i>
                                 </a>
                             </li>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    </ul>
                </div>
            </div>
        <?php else: ?>
            <div class="card position-absolute mt-1 border-0" style="z-index: 1;left: 0;right: 0;">
                <div class="card-body shadow">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-action">
                            <span class=" cursor-pointer" href="avoid:js">
                                <i class="bi bi-plus-circle"></i> <?php echo e(__('Créer')); ?> "<?php echo e($query); ?>"
                            </span>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <span class=" cursor-pointer" href="avoid:js">
                                <i class="bi bi-plus-circle"></i> <?php echo e(__('Créer & modifier')); ?> "<?php echo e($query); ?>"
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/livewire/search/search-input-text.blade.php ENDPATH**/ ?>