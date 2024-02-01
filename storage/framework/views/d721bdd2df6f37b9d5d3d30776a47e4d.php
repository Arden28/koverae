<div>
    <div class="position-relative">
        <input type="text" class="k_input cursor-text" placeholder="Tapez pour trouver votre produit"
        wire:model.live="query" />
    </div>
    <div class="position-absolute">
        <ul class="dropdown-menu show" id="customDropdown" style="display: none;">
            <li class="dropdown-item" wire:loading  wire:offline.remove>
                <div class="spinner-border" style="color: #017E84; height: 15px; width: 15px; margin-right: 5px;" role="status">
                    <span class="sr-only"></span>
                </div>
                <span>En cours de chargement</span>
            </li>
            <li class="dropdown-item" wire:offline>
                <div class="spinner-border" style="color: #017E84; height: 15px; width: 15px; margin-right: 5px;" role="status">
                    <span class="sr-only"></span>
                </div>
                <span>Vous êtes hors ligne</span>
            </li>
            <!--[if BLOCK]><![endif]--><?php if(!empty($searchResults)): ?>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $searchResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="dropdown-item cursor-pointer" wire:click.prevent="select('<?php echo e($result); ?>')" wire:target="select('<?php echo e($result); ?>')" wire:loading.remove>
                    <?php echo e($result); ?>

                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
            <?php elseif($query == ''): ?>
                <?php
                    $attribute =  reset($this->searchAttributes);
                ?>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->model::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="dropdown-item cursor-pointer" wire:click.prevent="select('<?php echo e($m->$attribute); ?>')" wire:target="select('<?php echo e($m->$attribute); ?>')" wire:loading.remove>
                    <?php echo e($m->$attribute); ?>

                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
            <?php elseif(empty($searchResults)): ?>
                <li class="dropdown-item cursor-pointer" wire:loading.remove>
                    Ajouter <?php echo e($query); ?>

                </li>
            <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
        </ul>
    </div>
</div>

    <?php
        $__scriptKey = '3734081985-0';
        ob_start();
    ?>
    <script>
        // Toggle dropdown menu visibility when the input field is clicked
        document.getElementById('dynamic').addEventListener('click', function(event) {
            var dropdown = document.getElementById('customDropdown');
            dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
            event.stopPropagation(); // Prevent event propagation to avoid immediate hiding
        });

        // Hide dropdown menu when clicking outside of the input and dropdown
        document.addEventListener('click', function(event) {
            var dropdown = document.getElementById('customDropdown');
            var input = document.getElementById('dynamic'); // Ensure the correct input ID is used

            if (!dropdown.contains(event.target) && event.target !== input) {
                dropdown.style.display = 'none';
            }
        });
    </script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/livewire/search/dynamic-search-dropdown.blade.php ENDPATH**/ ?>