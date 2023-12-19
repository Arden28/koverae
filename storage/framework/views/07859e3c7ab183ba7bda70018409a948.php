<div>
    <!-- App Settings block -->
    <div class="app_settings_block">


        <!-- Orders -->
        <div id="orders" class="setting_block">
            <h2>Commandes</h2>
            <div class="row mt16 k_settings_container">

                <!-- Purchase Order Approval -->
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
                                <span>Approbation du bon de commande</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Demander aux gestionnaires d'approuver les commandes supérieures à un montant minimum
                                </span>
                            </div>
                        </div>
                        <div class="mt16 ps-3">
                            <span class=" w-20">Montant minimum :</span>
                            <input type="text" class="k_input w-75">
                        </div>
                    </div>

                </div>

                <!-- Locked confirm orders -->
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
                                <span>Verrouiller les commandes confirmées</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Verrouillez automatiquement les commandes confirmées pour empêcher toute modification
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Warnings -->
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
                                <span>Avertissements</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Recevez des avertissements dans les commandes de produits ou de fournisseurs
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Purchase Agreement -->
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
                                <span>Contrats d'approvisionement</span>
                                <a href="" title="documentation" class="k_doc_link">
                                    <i class="bi bi-question-circle-fill"></i>
                                </a>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Les appels d'offres sont l'endroit où vous souhaitez générer des demandes de devis auprès de plusieurs fournisseurs pour un ensemble de produits donné afin de comparer les offres.">
                                <span>
                                    Gérez vos contrats d'achat (appels d'offres, commandes provisionnelles)
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Receipt Reminder -->
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
                                <span>Rappel de reception</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Rappelez automatiquement la date de réception à vos fournisseurs
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Invoicing -->
        <div id="invoicing" class="setting_block">
            <h2>Facturation</h2>
            <div class="row mt16 k_settings_container">

                <!-- Facturation policy -->
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
                                <span>Contrôle des factures</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Quantités facturées par les fournisseurs
                                </span>
                            </div>
                        </div>
                        <div class="mt16">
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Cette valeur est appliquée par défaut sur tous les nouveaux produits. Ceci peut être modifié dans la fiche du produit.">
                                <!-- What is ordered -->
                                <div>
                                    <div class="form-check k_radio_item">
                                        <input type="radio" class="form-check-input k_radio_input" name="weight" id="on_invitation" />
                                        <label class="form-check-label k_form_label" for="on_invitation">
                                            <?php echo e(__('Quantité commandé')); ?>

                                        </label>
                                    </div>
                                </div>
                                <!-- What is delivered -->
                                <div>
                                    <div class="form-check k_radio_item">
                                        <input type="radio" checked class="form-check-input k_radio_input" name="weight" id="on_invitation" />
                                        <label class="form-check-label k_form_label" for="on_invitation">
                                            <?php echo e(__('Quantité livrée')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- 3-way maching -->
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
                                <span>Correspondance à 3-voies</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Si activé, active la correspondance à 3-voies sur les factures des fournisseurs : l'article doit être reçu pour pouvoir payer la facture.">
                                <span>
                                    Assurez-vous de payer uniquement les factures pour lesquelles vous avez reçu les marchandises que vous avez commandées
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Products -->
        <div id="products" class="setting_block">
            <h2>Produits</h2>
            <div class="row mt16 k_settings_container">

                <!-- Variants -->
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
                                <span>Variantes</span>
                                <a href="" title="documentation" class="k_doc_link">
                                    <i class="bi bi-question-circle-fill"></i>
                                </a>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Acheter des variantes d'un produit en utilisant des attributs (taille, couleur, etc.)
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Products Packagings -->
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
                                <span>Emballages de produits</span>
                                <a href="" title="documentation" class="k_doc_link">
                                    <i class="bi bi-question-circle-fill"></i>
                                </a>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Achetez des produits par multiple du nombre d'unités par colis
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Margins -->
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
                                <span>Unités de mesures</span>
                                <a href="" title="documentation" class="k_doc_link">
                                    <i class="bi bi-question-circle-fill"></i>
                                </a>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Vendre et acheter des produits dans différentes unités de mesure">
                                <span>
                                    Vendre et acheter des produits dans différentes unités de mesure
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Settings\Resources/views/livewire/module/purchase.blade.php ENDPATH**/ ?>