<div>
    <div class="form-group mb-2">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="bi bi-search text-primary"></i>
                </div>
            </div>
            <input wire:keydown.escape="resetQuery" wire:model.debounce.500ms="query" type="text" class="form-control" placeholder="Tapez le nom du produit ou son code....">
        </div>
    </div>

    <!--[if BLOCK]><![endif]--><?php if(!empty($query)): ?>
        <div wire:click="resetQuery" class="position-fixed w-100 h-100" style="left: 0; top: 0; right: 0; bottom: 0;z-index: 1;"></div>
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
                        <!--[if BLOCK]><![endif]--><?php if($search_results->count() >= $how_many): ?>
                             <li class="list-group-item list-group-item-action text-center">
                                 <a wire:click.prevent="loadMore" class="btn btn-primary btn-sm" href="#">
                                     <?php echo e(__('Plus de résultats')); ?> <i class="bi bi-arrow-down-circle"></i>
                                 </a>
                             </li>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </ul>
                </div>
            </div>
        <?php else: ?>
            <div class="card position-absolute mt-1 border-0" style="z-index: 1;left: 0;right: 0;">
                <div class="card-body shadow">
                    <div class="alert alert-warning mb-0">
                        <?php echo e(__('Aucun produit trouvé')); ?>....
                    </div>
                </div>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <!-- Loading -->
    <div class="k-loading cursor-pointer pb-1" wire:loading>
        <p>En cours de chargement ...</p>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/livewire/search/input-search.blade.php ENDPATH**/ ?>