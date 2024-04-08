<?php $__env->startSection('styles'); ?>
    <style>
    </style>
<?php $__env->stopSection(); ?>
<div>
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="fs-2 fw-semi-bold"><?php echo e(__('Fermer la session')); ?></h2>
        <span class="fs-4 fw-bolder text-end text-right justify-content-end">
            Total <?php echo e($session->orders()->count()); ?> commandes: <?php echo e(format_currency($session->orders()->sum('total_amount') / 100)); ?>

        </span>
      </div>
      <div class="modal-body position-relative overflow-y-auto">
        <table class="session-table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <div class="notes-container d-flex flex-column flex-sm-row gap-3 border-top">
            <div class="closing-notes-container d-flex flex-column flex-grow-1 mt-3 pt-8 align-items-start">
                <label for="" class="form-label">Note de fermeture</label>
                <textarea name="" id="" cols="10" rows="5" class="closing-notes form-control">

                </textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer justify-content-around justify-content-sm-start flex-wrap gap-1 w-100">
        <footer class="d-flex gap-2">
            <button class="btn btn-primary primary" data-dismiss="modal">Fermer</button>
            <button class="btn btn-secondary" data-dismiss="modal">Ignorer</button>
            <button class="btn btn-secondary" data-dismiss="modal"><i class="bi bi-file-earmark-arrow-down mr-2"></i> Ventes du jour</button>
        </footer>
      </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Pos\Resources/views/livewire/modal/close-session-modal.blade.php ENDPATH**/ ?>