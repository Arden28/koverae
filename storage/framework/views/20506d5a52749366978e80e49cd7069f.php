<div>
    <div class="modal-content">
      <div class="modal-header">
        <button class="btn btn-primary" data-dismiss="modal">Créer</button>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body position-relative overflow-y-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr :key="$key">
                    <td wire:click="pick(<?php echo e($customer->id); ?>)" class="cursor-pointer">
                        <?php echo e($customer->name); ?>

                    </td>
                    <td>
                        <?php echo e($customer->street); ?>, <?php echo e($customer->city); ?>

                    </td>
                    <td>
                        <?php echo e($customer->email); ?>

                    </td>
                    <td>
                        <?php echo e($customer->phone); ?>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
      </div>
      <div class="modal-footer justify-content-around justify-content-sm-start flex-wrap gap-1 w-100">
        <footer>
            <button class="btn btn-secondary" data-dismiss="modal">Valider</button>
        </footer>
      </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Pos\Resources/views/livewire/modal/pick-customer-modal.blade.php ENDPATH**/ ?>