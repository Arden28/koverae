<div>
    <!-- App Settings block -->
    <div class="app_settings_block">


        <!-- Employee -->
        <div id="employees" class="setting_block">
            <h2>Employés</h2>
            <div class="row mt16 k_settings_container">

                <!-- Presence Control -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Contrôle de présence</span>
                            </div>
                        </div>
                        <div class="mt16">
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Cette valeur est appliquée par défaut sur tous les nouveaux produits. Ceci peut être modifié dans la fiche du produit.">
                                <!-- Based on attendances -->
                                <div>
                                    <div class="form-check k_radio_item">
                                        <input type="checkbox" class="form-check-input k_radio_input" name="weight" id="on_invitation" />
                                        <label class="form-check-label k_form_label" for="on_invitation">
                                            <?php echo e(__('Basé sur les présences')); ?>

                                        </label>
                                    </div>
                                </div>
                                <!-- Based on the status in the system -->
                                <div>
                                    <div class="form-check k_radio_item">
                                        <input type="checkbox" class="form-check-input k_radio_input" name="weight" id="on_invitation" />
                                        <label class="form-check-label k_form_label" for="on_invitation">
                                            <?php echo e(__('Basé sur le statut dans le système')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Skills Managements -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Gestion des compétences</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Enrichissez les profils des employés avec des compétences et des CV
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Advanced Presence Control -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Contrôle de présence avancé</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Par défaut, les nouveaux utilisateurs auront les droits d'accès les plus élevés pour toutes les apps installées.">
                                <span>
                                    Écran de rapport de présence, contrôle de l'e-mail et de l'adresse IP.
                                </span>
                            </div>
                        </div>
                        <div class="mt16">
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Cette valeur est appliquée par défaut sur tous les nouveaux produits. Ceci peut être modifié dans la fiche du produit.">
                                <!-- Based on number of emails sent -->
                                <div>
                                    <div class="form-check k_radio_item">
                                        <input type="checkbox" class="form-check-input k_radio_input" name="weight" id="on_invitation" />
                                        <label class="form-check-label k_form_label" for="on_invitation">
                                            <?php echo e(__('Basé sur le nombre d\'e-mails envoyés')); ?>

                                        </label>
                                    </div>
                                </div>
                                <!-- Based on the IP address -->
                                <div>
                                    <div class="form-check k_radio_item">
                                        <input type="checkbox" class="form-check-input k_radio_input" name="weight" id="on_invitation" />
                                        <label class="form-check-label k_form_label" for="on_invitation">
                                            <?php echo e(__('Basé sur l\'adresse IP')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Remote Work -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Travail à distance</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Possibilité de sélectionner un type de colis dans les commandes clients et de forcer une quantité qui est un multiple du nombre d'unités par colis.">
                                <span>
                                    Affichez les paramètres de travail à distance pour chaque employé et des rapports dédiés. Les icônes de présence seront mises à jour avec le lieu de travail distant.
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Work Organisation -->
        <div id="work-organisation" class="setting_block">
            <h2>Organisation du travail</h2>
            <div class="row mt16 k_settings_container">

                <!-- Work hours -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Horaires de travail</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Définir un horaire d'entreprise par défaut pour gérer le temps de travail de vos employés
                                </span>
                            </div>
                        </div>
                        <div class="mt16 ps-3">
                            <select name="digest" id="">
                                <option value="40_per_week">Standard 40 heures/semaine</option>
                                <option selected value="60_per_week">Medium 60 heures/semaine</option>
                            </select>
                            <i class="bi bi-arrow-right-short cursor-pointer fw-bold"></i>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Employee update rights -->
        <div id="update-right" class="setting_block">
            <h2>Droits de mise à jour des employés</h2>
            <div class="row mt16 k_settings_container">

                <!-- Employee Editing -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Mise à jour</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Permettre aux employés de mettre à jour leurs propres données
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Settings\Resources/views/livewire/module/employee.blade.php ENDPATH**/ ?>