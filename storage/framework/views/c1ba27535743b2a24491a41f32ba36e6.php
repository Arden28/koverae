<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value',

]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value',

]); ?>
<?php foreach (array_filter(([
    'value',

]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

                <!-- Box -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting" id="<?php echo e($value->key); ?>">
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <form wire:submit.prevent="sendInvitation">
                            <?php echo csrf_field(); ?>
                            <div>
                                <p class="k_form_label">
                                    <!--[if BLOCK]><![endif]--><?php if($value->icon): ?>
                                        <i class="inline-block bi <?php echo e($value->icon); ?>"></i>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <span class="ml-2"><?php echo e($value->label); ?></span>
                                    <!--[if BLOCK]><![endif]--><?php if($value->help): ?>
                                    <a href="<?php echo e($value->help); ?>" target="__blank" title="documentation" class="k_doc_link">
                                        <i class="bi bi-question-circle-fill"></i>
                                    </a>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </p>
                                <div class="d-flex">
                                    <input type="text" wire:model="friend_email" class="mt-8 k_input k_user_emails text-truncate" placeholder="Entrez l'adresse e-mail">
                                    <button type="submit" wire:target="sendInvitation" style="background-color: #017E84" class="flex-shrink-0 btn btn-primary k_web_settings_invite">
                                        <strong wire:loading.remove>Inviter</strong>
                                        <span wire:loading>...</span>
                                    </button>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['friend_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                            <div class="mt16">
                                <p class="k_form_label">
                                    Invitations en attentes :
                                </p>
                                <div class="d-block">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->pending_invitations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invitation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="cursor-pointer badge rounded-pill k_web_settings_users">
                                        <?php echo e($invitation->email); ?>

                                        <i wire:click.prevent="deleteInvitation(<?php echo e($invitation->id); ?>)" wire:confirm="Êtes-vous sûr de vouloir annuler l'invitation de <?php echo e($invitation->email); ?> ?" class="bi bi-x cancelled_icon" data-bs-toggle="tooltip" data-bs-placement="right" title="Annuler l'invitation de <?php echo e($invitation->email); ?>"></i>
                                    </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                    <div wire:loading>
                                        ......
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div><?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/blocks/boxes/user/invite-user.blade.php ENDPATH**/ ?>