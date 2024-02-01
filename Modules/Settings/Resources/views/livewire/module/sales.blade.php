<div>
    <!-- App Settings block -->
    <div class="app_settings_block">

        <!-- Product Catalog -->
        <div id="product-catalogs" class="setting_block">
            <h2>Catalogue de produit</h2>
            <div class="row mt16 k_settings_container">

                <!-- Customer Portal -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" wire:model.live="variants" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Variantes</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Vendre des variantes d'un produit en utilisant des attributs (taille, couleur, etc.)
                                </span>
                            </div>
                            @if($variants)
                            <button class="btn btn-link">
                                <i class="bi bi-arrow-right"></i>
                                <span><b>{{ __('Attributs') }}</b></span>
                            </button>
                            @endif
                        </div>
                    </div>

                </div>

                <!-- Unit of Measure -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" wire:model.live="uom" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Unité de mesure</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Par défaut, les nouveaux utilisateurs auront les droits d'accès les plus élevés pour toutes les apps installées.">
                                <span>
                                    Vendre et acheter des produits dans différentes unités de mesure
                                </span>
                            </div>
                            @if($uom)
                            <button class="btn btn-link">
                                <i class="bi bi-arrow-right"></i>
                                <span><b>{{ __('Unités de mesure') }}</b></span>
                            </button>
                            @endif
                        </div>
                    </div>

                </div>

                <!-- Packaging -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" wire:model.live="package" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Emballage produit</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Possibilité de sélectionner un type de colis dans les commandes clients et de forcer une quantité qui est un multiple du nombre d'unités par colis.">
                                <span>
                                    Vendre des produits par multiple du nombre d'unités par paquet
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Deliver content -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" wire:model.live="send_email" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Livrer du contenus par e-mail</span>
                                <a href="" title="documentation" class="k_doc_link">
                                    <i class="bi bi-question-circle-fill"></i>
                                </a>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="L'envoi d'un email est utile si vous avez besoin de partager une information ou un contenu spécifique sur un produit (instructions, règles, liens, médias, etc.). Créez et paramétrez le modèle d'e-mail à partir du formulaire de détail du produit (dans l'onglet Ventes).">
                                <span>
                                    Envoyer un email spécifique au produit une fois la facture validée
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Pricing -->
        <div id="pricing" class="setting_block">
            <h2>Tarification</h2>
            <div class="row mt16 k_settings_container">

                <!-- Discounts -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" wire:model.live="discounts" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Réductions</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Appliquer une remise manuelle sur la ligne de commande client ou afficher les remises calculées à partir des tarifs (option à activer dans la configuration des tarifs)">
                                <span>
                                    Accorder des remises sur les lignes de commande client
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Discounts, Loyalty & Gifts cards -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" wire:model.live="sale_program" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Réductions, Fidélité & Carte Cadeau</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Boostez vos ventes avec plusieurs types de programmes : coupons, promotions, cartes cadeaux, carte de fidélité. Des conditions spécifiques peuvent être définies (produit, client, montant minimum d'achat, période). Les récompenses peuvent être des réductions (% ou montant) ou des produits gratuits.">
                                <span>
                                    Gérer les promotions, les coupons, les cartes de fidélité, les cartes cadeaux & K-Wallet
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
                                <input type="checkbox" wire:model.live="margin" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Marges</span>
                                {{-- <a href="" title="documentation" class="k_doc_link">
                                    <i class="bi bi-question-circle-fill"></i>
                                </a> --}}
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="La marge est calculée comme la somme des prix de vente moins le coût fixé dans la fiche produit.">
                                <span>
                                    Afficher les marges sur les commandes
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Customer Portal -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    {{-- <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" class="form-check-input">
                            </div>
                        </div>
                    </div> --}}
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
                                        <input type="radio" class="form-check-input k_radio_input" wire:model.live="customer_account" id="on_invitation" />
                                        <label class="form-check-label k_form_label" for="on_invitation" data-bs-toggle="tooltip" data-bs-placement="right" title="Sur invitation">
                                            {{ __('Invitation') }}
                                        </label>
                                    </div>
                                    <div class="form-check k_radio_item">
                                        <input type="radio" class="form-check-input k_radio_input" wire:model.live="customer_account" id="free_signup"/>
                                        <label class="form-check-label k_form_label" for="free_signup" data-bs-toggle="tooltip" data-bs-placement="right" title="Inscription gratuite">
                                            {{ __('Gratuit') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Quotations & Orders -->
        <div id="quotation-order" class="setting_block">
            <h2>Devis & Commandes</h2>
            <div class="row mt16 k_settings_container">

                <!-- Sales Warnings -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" wire:model.live="sale_warnings" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Avertissements de vente</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Recevez des avertissements dans les commandes de produits ou de clients
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Lock confirmed sales -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" wire:model.live="lock_confirmed_sales" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Verrouiller les ventes confirmées</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Ne plus modifier les commandes une fois confirmées
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
                                <input type="checkbox" wire:model.live="pro_format_invoice" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Facture pro forma</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Vous permet d'envoyer une facture pro-forma à vos clients
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Shipping -->
        <div id="shipping" class="setting_block">
            <h2>Livraisons</h2>
            <div class="row mt16 k_settings_container">

                <!-- Delivery Mode -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" wire:model.live="shipping_cost" class="form-check-input">
                            </div>
                        </div>
                    </div>
                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Modes de livraison</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Calculer les frais d'expédition des commandes
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

                <!-- Invoicing Policy -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Politique de facturation</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Quantités à facturer à partir des commandes clients
                                </span>
                            </div>
                        </div>
                        <div class="mt16">
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Cette valeur est appliquée par défaut sur tous les nouveaux produits. Ceci peut être modifié dans la fiche du produit.">
                                <!-- What is ordered -->
                                <div>
                                    <div class="form-check k_radio_item">
                                        <input type="radio" class="form-check-input k_radio_input" wire:model.live="invoice_policy" name="invoice_policy" id="ordered" value="on_order"/>
                                        <label class="form-check-label k_form_label" for="ordered">
                                            {{ __('Facturer ce qui est commandé') }}
                                        </label>
                                    </div>
                                </div>
                                <!-- What is delivered -->
                                <div>
                                    <div class="form-check k_radio_item">
                                        <input type="radio" class="form-check-input k_radio_input" wire:model.live="invoice_policy" name="invoice_policy" id="delivered" value="on_delivery"/>
                                        <label class="form-check-label k_form_label" for="delivered">
                                            {{ __('Facturer ce qui est livré') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Down Payments -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Right pane -->
                    <div class="k_setting_right_pane">
                        <div class="mt12">
                            <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                                <span>Accomptes</span>
                            </div>
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                <span>
                                    Produit utilisé pour les acomptes
                                </span>
                            </div>
                        </div>
                        <div class="mt16">
                            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                                @php
                                    $products = \Modules\Inventory\Entities\Product::isCompany(current_company()->id)->get();
                                @endphp
                                <select name="" class="k_input" id="">
                                    <option value=""></option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </div>
</div>
