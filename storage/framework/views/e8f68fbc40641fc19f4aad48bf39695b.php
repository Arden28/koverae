<div>
    <!-- App Settings block -->
    <div class="app_settings_block">


        <!-- Invite User -->
        <div id="invite-user" class="setting_block">
            <h2>Utilisateurs</h2>
            <div class="row mt16 k_settings_container">
                <!-- Box -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <form wire:submit.prevent="sendInvitation">
                            <?php echo csrf_field(); ?>
                            <div>
                                <p class="k_form_label">
                                    Inviter un utilisateur
                                </p>
                                <div class="d-flex">
                                    <input type="text" wire:model="friend_email" class="k_input k_user_emails mt-8 text-truncate" placeholder="Entrez l'adresse e-mail">
                                    <button type="submit" wire:target="sendInvitation" style="background-color: #017E84" class="btn btn-primary k_web_settings_invite flex-shrink-0">
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
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                            <div class="mt16">
                                <p class="k_form_label">
                                    Invitations en attentes :
                                </p>
                                <div class="d-block">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $pending_invitations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invitation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="badge rounded-pill cursor-pointer k_web_settings_users">
                                        <?php echo e($invitation->email); ?>

                                        <i wire:click.prevent="deleteInvitation(<?php echo e($invitation->id); ?>)" wire:confirm="Êtes-vous sûr de vouloir annuler l'invitation de <?php echo e($invitation->email); ?> ?" class="bi bi-x cancelled_icon" data-bs-toggle="tooltip" data-bs-placement="right" title="Annuler l'invitation de <?php echo e($invitation->email); ?>"></i>
                                    </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                                    <div wire:loading>
                                        ......
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- Box -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <i class="bi bi-people-fill inline-block"></i>
                            <div class="k_field_widget k_field_integer inline-block k_read_only modify w-auto ps-3 fw-bold">
                                <span>1</span>
                            </div>
                            <span>Utilisateur actifs</span>

                            <a href="" title="documentation" class="k_doc_link">
                                <i class="bi bi-question-circle-fill"></i>
                            </a>
                            <br>
                            <a wire:navigate href="<?php echo e(route('settings.users', ['subdomain' => current_company()->domain_name])); ?>" class="btn btn-link k_web_settings_access_rights outline-none">
                                <i class="bi bi-arrow-right k_button_icon"></i> <span>Gérer les utilisateurs</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Languages -->
        <div id="languages" class="setting_block">
            <h2>Langues</h2>
            <div class="row mt16 k_settings_container">
                <!-- Box -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="w-50">
                                <i class="bi bi-translate inline-block"></i>
                                <div class="k_field_widget k_field_integer inline-block k_read_only modify w-auto ps-3 fw-bold">
                                    <span>1</span>
                                </div>
                                <span>Langue(s)</span>
                            </div>

                            <button class="btn btn-link k_web_settings_access_rights">
                                <i class="bi bi-plus k_button_icon"></i> <span>Ajouter une langue</span>
                            </button>
                            <br>
                            <br>
                            <button class="btn btn-link k_web_settings_access_rights">
                                <i class="bi bi-arrow-right k_button_icon"></i> <span>Gérer les langues</span>
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Companies -->
        <div id="companies" class="setting_block">
            <h2>Entreprises</h2>
            <div class="row mt16 k_settings_container">

                <!-- Company -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="w-50">
                                <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                    <span><?php echo e(current_company()->name); ?></span>
                                </div>
                                <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                    <span><?php echo e(current_company()->country); ?></span>
                                </div>
                            </div>

                            <button class="btn btn-link k_web_settings_access_rights">
                                <i class="bi bi-arrow-right k_button_icon"></i> <span>Mettre à jour</span>
                            </button>
                        </div>
                    </div>

                </div>

                <!-- Companies -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_integer inline-block k_read_only modify w-auto ps-3 fw-bold">
                                <span>1</span>
                            </div>
                            <span><b>Entreprise</b></span>
                            <div class="mt8" style="height: 23px;">
                                <button class="btn btn-link outline-none">
                                    <i class="bi bi-arrow-right k_button_icon"></i> <span>Gérer les entreprises</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Document Layout -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div>
                                <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                    <span>Mise en page des documents</span>
                                </div>
                                <div class="k_field_widget k_field_text k_read_only modify w-100 ps-3 text-muted">
                                    <p>Choisissez la mise en page de vos documents</p>
                                </div>
                            </div>

                            <button class="btn btn-link k_web_settings_access_rights">
                                <i class="bi bi-arrow-right k_button_icon"></i> <span>Configurer</span>
                            </button>
                        </div>
                    </div>

                </div>

                <!-- Email template -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div>
                                <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                    <span>Modèle E-mail</span>
                                </div>
                                <div class="k_field_widget k_field_text k_read_only modify w-100 ps-3 text-muted">
                                    <p>Personnalisez l'apparence et la convivialité des e-mails automatisés</p>
                                </div>
                            </div>

                            <button class="btn btn-link k_web_settings_access_rights">
                                <i class="bi bi-arrow-right k_button_icon"></i> <span>Configurer</span>
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Unit of Measures -->
        <div id="units_of_measure" class="setting_block">
            <h2>Unités de mesure</h2>
            <div class="row mt16 k_settings_container">

                <!-- Weight -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div>
                                <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                    <span>Poids</span>
                                </div>
                                <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                    <span><?php echo e(__('Définissez votre unité de mesure du poids.')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-12">
                            <div class="k_field_widget k_field_radio k_light_label ps-3">
                                <div class="k_horizontal">
                                    <div class="form-check k_radio_item">
                                        <input type="radio" class="form-check-input k_radio_input" wire:model="weight" id="kg" value="kg"/>
                                        <label class="form-check-label k_form_label" for="kg">
                                            <?php echo e(__('Kg')); ?>

                                        </label>
                                    </div>
                                    <div class="form-check k_radio_item">
                                        <input type="radio" class="form-check-input k_radio_input" wire:model="weight" id="ib" value="ib"/>
                                        <label class="form-check-label k_form_label" for="ib">
                                            <?php echo e(__('Ib')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Volume -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div>
                                <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                    <span>Volume</span>
                                </div>
                                <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                    <span><?php echo e(__('Définissez votre unité de mesure du volume.')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-12">
                            <div class="k_field_widget k_field_radio k_light_label ps-3">
                                <div class="k_horizontal">
                                    <div class="form-check k_radio_item">
                                        <input type="radio" class="form-check-input k_radio_input" wire:model="volume" id="ft3" value="ft3"/>
                                        <label class="form-check-label k_form_label" for="ft">
                                            <?php echo e(__('ft')); ?><sup>3</sup>
                                        </label>
                                    </div>
                                    <div class="form-check k_radio_item">
                                        <input type="radio" class="form-check-input k_radio_input" wire:model="volume" id="cm3"/>
                                        <label class="form-check-label k_form_label" for="cm">
                                            <?php echo e(__('cm')); ?><sup>3</sup>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Digest Email -->
        <div id="digest-email" class="setting_block">
            <h2>Statistiques</h2>
            <div class="row mt16 k_settings_container">
                <!-- Box -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" wire:model="digest_available" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Email de rapport</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>Ajouter de nouveaux utilisateurs en tant que destinataires d'un e-mail périodique avec des indicateurs clés de performance</span>
                            </div>
                        </div>
                        <div class="mt16 ps-3">
                            <span>Modèles :</span>
                            <select name="digest" id="">
                                <option value="koverae_digest">Koverae Digest</option>
                            </select>
                            <i class="bi bi-arrow-right-short cursor-pointer fw-bold"></i>
                        </div>
                        <div class="mt14">
                            <button class="btn btn-link k_web_settings_access_rights">
                                <i class="bi bi-arrow-right k_button_icon"></i> <span>Configurer</span>
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Permission -->
        <div id="permission" class="setting_block">
            <h2>Permissions</h2>
            <div class="row mt16 k_settings_container">

                <!-- Customer Portal -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" wire:model="kover_portal" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Compte Client</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Laissez vos clients se connecter pour voir leurs documents
                                </span>
                            </div>
                        </div>
                        <div class="mt-12">
                            <div class="k_field_widget k_field_radio k_light_label ps-3">
                                <div class="k_horizontal">
                                    <div class="form-check k_radio_item">
                                        <input type="radio" class="form-check-input k_radio_input" wire:model="kover_portal_type" id="on_invitation" value="on_invitation" />
                                        <label class="form-check-label k_form_label" for="on_invitation" data-bs-toggle="tooltip" data-bs-placement="right" title="Sur invitation">
                                            <?php echo e(__('Invitation')); ?>

                                        </label>
                                    </div>
                                    <div class="form-check k_radio_item">
                                        <input type="radio" class="form-check-input k_radio_input" wire:model="kover_portal_type" id="free_signup" value="free_signup"/>
                                        <label class="form-check-label k_form_label" for="free_signup" data-bs-toggle="tooltip" data-bs-placement="right" title="Inscription gratuite">
                                            <?php echo e(__('Gratuit')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt16">
                            <button class="btn btn-link k_web_settings_access_rights">
                                <i class="bi bi-arrow-right k_button_icon"></i> <span>Droits d'accès par défaut</span>
                            </button>
                        </div>
                    </div>

                </div>

                <!-- Default Access rights -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" wire:model="has_all_rights_access" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Droits d'accès par défaut</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Par défaut, les nouveaux utilisateurs auront les droits d'accès les plus élevés pour toutes les apps installées.">
                                <span>
                                    Définir des droits d'accès personnalisés pour les nouveaux utilisateurs
                                </span>
                            </div>
                        </div>
                        <!--[if BLOCK]><![endif]--><?php if($has_all_rights_access): ?>
                        <div class="mt14">
                            <button class="btn btn-link k_web_settings_access_rights">
                                <i class="bi bi-arrow-right k_button_icon"></i> <span>Droits d'accès par défaut</span>
                            </button>
                        </div>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>

                </div>

                <!-- Password Reset -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" wire:model="reset_password" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Réinitialisation du mot de passe</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Par défaut, les nouveaux utilisateurs auront les droits d'accès les plus élevés pour toutes les apps installées.">
                                <span>
                                    Activer la réinitialisation du mot de passe depuis la page de connexion
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Import / Export -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" wire:model="can_import_from_xls" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Importer / Exporter</span>
                                <a href="" title="documentation" class="k_doc_link">
                                    <i class="bi bi-question-circle-fill"></i>
                                </a>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Autoriser les utilisateurs à importer des données à partir de fichiers CSV/XLS/XLSX
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Developer -->
        <div id="developer" class="setting_block">
            <h2>Développeur</h2>
            <div class="row mt16 k_settings_container">

                <!-- Developer -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <a href="https://developer.koverae.com" class="d-block cursor-pointer">
                                Activer le mode développeur
                            </a>
                            <a href="https://developer.koverae.com" class="d-block cursor-pointer">
                                Consulter la documentation
                            </a>
                            <a href="https://developer.koverae.com" target="_blank" class="d-block cursor-pointer">
                                Créer un compte <strong>développeur</strong>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Settings\Resources/views/livewire/module/general.blade.php ENDPATH**/ ?>