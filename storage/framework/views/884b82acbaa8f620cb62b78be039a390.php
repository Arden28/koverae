<?php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
?>
<div>
    <!--[if BLOCK]><![endif]--><?php if($paginator->hasPages()): ?>
        <nav class="k_pager align-items-center d-flex gap-2">
            <span class="k_page_counter">
                <!-- Page value -->
                <span class="k_page_value d-inline-block border-bottom border-transparent mb-n1">
                    <?php echo e($paginator->firstItem()); ?> - <?php echo e($paginator->lastItem()); ?>

                </span>
                <span>/</span>
                <span class="k_page_limit">
                    <?php echo e($paginator->total()); ?>

                </span>
            </span>
            <span class="k_cp_switch_buttons btn-group d-print-none">
                
                <!--[if BLOCK]><![endif]--><?php if($paginator->onFirstPage()): ?>
                    <button class="btn btn-secondary k-paginate-arrow" disabled>
                        <i class="bi bi-arrow-left"></i>
                    </button>
                <?php else: ?>
                    <button class="btn btn-secondary k-paginate-arrow" wire:click="previousPage" wire:loading.attr="disabled">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                
                <!--[if BLOCK]><![endif]--><?php if($paginator->hasMorePages()): ?>
                    <button class="btn btn-secondary k-paginate-arrow" wire:click="nextPage" wire:loading.attr="disabled">
                        <i class="bi bi-arrow-right"></i>
                    </button>
                <?php else: ?>
                    <button class="btn btn-secondary k-paginate-arrow" disabled>
                        <i class="bi bi-arrow-right"></i>
                    </button>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </span>
        </nav>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH D:\My Laravel Startup\koverae\resources\views/vendor/livewire/k-paginate.blade.php ENDPATH**/ ?>