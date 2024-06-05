<?php

return [

    // Navbar
    'navbar' => [
        'module' => 'Ventes',
        'orders' => [
            'name' => 'Commandes',
            'quotation' => 'Devis',
            'order' => 'Commandes',
            'customer' => 'Clients',
            'teams' => 'Equipes Commerciales',
        ],
        'to_invoice' => [
            'name' => 'A facturer',
            'orders' => 'Commandes à facturer',
        ],
        'product' => [
            'name' => 'Produits',
            'products' => 'Produits',
            'variants' => 'Variantes Produits',
            'pricelists' => 'Listes de prix',
            'discounts' => 'Remises & Fidélités',
            'giftcards' => 'Cartes cadeaux'
        ],
        'report' => [
            'name' => 'Rapports',
            'sales' => 'Ventes',
            'sellers' => 'Vendeurs',
            'customers' => 'Clients',
            'products' => 'Produits',
        ],
        'configuration' => [
            'name' => 'Configuration',
            'setting' => 'Paramètre',
            'sales_teams' => 'Equipes Commerciales',
            'orders' => [
                'name' => 'Commandes',
                'tags' => 'Etiquettes de commandes',
            ],
            'products' => [
                'name' => 'Produits',
                'categories' => 'Catégories de Produits',
                'attributes' => 'Attributs',
            ],
        ],
    ],
    // Control Panel
    'control' => [
        'quotation' => [
            'current_page_list' => 'Devis',
            'current_page' => ' :refence',
            'current_page_new' => 'Nouveau',
            'actions' => [
                'print' => 'Imprimer',
                'duplicate' => 'Dupliquer',
                'delete' => 'Supprimer',
                'markAsSent' => 'Marquer comme envoyé',
                'share' => 'Partager'
            ]
        ],
        'sale' => [
            'current_page_list' => 'Bons de Commandes',
            'current_page' => ' :refence',
            'current_page_new' => 'Nouveau',
            'actions' => [
                'print' => 'Imprimer',
                'duplicate' => 'Dupliquer',
                'delete' => 'Supprimer',
                'generateLink' => 'Générer un lien de paiement',
                'share' => 'Partager'
            ]
        ],
        'program' => [
            'current_page_list' => 'Remises & Fidélités',
            'current_page' => ' :refence',
            'current_page_new' => 'Nouveau',
        ],
    ],
    // Tables
    'table' => [
        'quotation' => [
            'name' => 'Table des Devis',
            'reference' => 'Référence',
            'date' => 'Date',
            'due_date' => "Date d'échéance",
            'shipping_date' => 'Date de livraison',
            'customer' => 'Client',
            'seller' => 'Commercial',
            'sale_team' => 'Equipe commerciale',
            'total' => 'Total',
            'status' => 'Statut',
                // Empty
                'empty' => [
                    'title' => "Créez un nouveau devis, la première étape d'une vente !",
                    'text' => 'Une fois le devis confirmé par le client, il devient un bon de commande.Vous pourrez créer une facture et encaisser le paiement.'
                ]
            ],

            'sale' => [
                'name' => 'Tables des Ventes',
                'reference' => 'Référence',
                'date' => 'Date',
                'shipping_date' => 'Date de livraison',
                'shipping_status' => 'Statut de la livraison',
                'customer' => 'Client',
                'seller' => 'Commercial',
                'sale_team' => 'Equipe de Ventes',
                'total' => 'Total',
                'status' => 'Statut',
                'invoice_status' => 'Statut de facturation',
                // Empty
                'empty' => [
                    'title' => "Créez un nouveau devis, la première étape d'une vente !",
                    'text' => 'Une fois le devis confirmé par le client, il devient un bon de commande.Vous pourrez créer une facture et encaisser le paiement.'
                ]
            ],
            'program' => [
                'name' => 'Nom du programme',
                'type' => 'Type de programme',
                'pos' => 'Point de Ventes',
                // Empty
                'empty' => [
                    'title' => 'Aucun programme trouvé.',
                    'text' => 'Créez-en un à partir de zéro ou utilisez les modèles ci-dessous:'
                ]
            ],
            'pricelist' => [
                'name' => 'Nom de la liste de prix',
                'policy' => 'Politique de remise',
                // Empty
                'empty' => [
                    'title' => 'Créer une nouvelle liste de prix !',
                    'text' => "Un prix est un ensemble de prix de vente ou de règles permettant de calculer le prix des lignes de commande en fonction des produits, des catégories de produits, des dates et des quantités commandées. C'est l'outil parfait pour gérer plusieurs prix, remises saisonnières, etc.Vous pouvez assigner des listes de prix à vos clients ou en sélectionnez une quand vous créez un nouveau devis de vente."
                ]
            ]
    ]

];