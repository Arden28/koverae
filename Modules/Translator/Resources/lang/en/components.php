<?php

return [
    // Inputs
    'inputs' => [
        'customer' => [
            'label' => 'Customer',
        ],
        'date' => [
            'label' => 'Date',
        ],
        'expiration-date' => [
            'label' => 'Expiration Date',
        ],
        'payment-term' => [
            'label' => 'Payment Term',
            'select' => [
                'immediate' => "Immediate payment",
                '7_days' => '7 days',
                '15_days' => '15 days',
                '21_days' => '21 days',
                '30_days' => '30 days',
                '45_days' => '45 days',
                'end_of_next_month' => 'End of next month',
            ]
        ],
        'payment-reference' => [
            'label' => 'Payment Reference',
        ],
        'sales-teams' => [
            'label' => 'Sales Teams',
        ],
        'seller' => [
            'label' => 'Seller',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'delivery-policy' => [
            'label' => 'Delivery Policy',
            'select' => [
                'after_done' => 'When all products are ready',
                'as_soon_as_possible' => 'As soon as possible'
            ]
        ],
        'delivery-date' => [
            'label' => 'Delivery Date',
        ],
        'delivery-status' => [
            'label' => 'Delivery Status',
        ],
        'tax-position' => [
            'label' => 'Tax Position',
        ],
        'original-document' => [
            'label' => 'Original Document',
        ],
        'campaign' => [
            'label' => 'Campaign',
        ],
        'medium' => [
            'label' => 'Medium',
        ],
        'source' => [
            'label' => 'Source',
        ],
        'note' => [
            'label' => 'Internal Note',
            'placeholder' => 'Internal Note'
        ],
        'pricelist-name' => [
            'label' => 'Pricelist Name',
            'placeholder' => 'eg: Resellers in Brazzaville'
        ],
        'journal' => [
            'label' => 'Journal',
        ],
        'customer-bank-account' => [
            'label' => 'Customer Bank Account',
        ],
        'customer-reference' => [
            'label' => 'Customer Reference',
        ],
        'sale-team-name' => [
            'label' => 'Team Name',
            'placeholder' => 'ex: Barakuda Team'
        ],
        'sale-team-leader' => [
            'label' => 'Team Leader',
        ],
        'email-alias' => [
            'label' => 'Alias',
        ],
        'invoice-target' => [
            'label' => 'Invoicing Target',
            'title' => 'Revenue target for the current month (total excluding tax of confirmed invoices)',
            'month' => 'Month'
        ],
        // Product Category
        'product-category-name' => [
            'label' => 'Category',
            'placeholder' => 'e.g. Chips'
        ],
        'parent-category' => [
            'label' => 'Parent Category',
        ],
        'cost-method' => [
            'label' => 'Costing Method',
            'select' => [
                'standard' => 'Standard',
                'fifo' => 'First In First Out (FIFO)',
                'avco' => 'Average Cost (AVCO)',
            ]
        ],
        'income-account' => [
            'label' => 'Income Account',
        ],
        'expense-account' => [
            'label' => 'Expense Account',
        ],
        'price-variance-account' => [
            'label' => 'Price Variance Account',
        ],
        'reserve-packaging' => [
            'label' => 'Reserve of Packaging',
            'select' => [
                'only_full' => 'Reserve only full packaging',
                'partial' => 'Reserve partial packaging'
            ]
        ],
        'force-removal-strategy' => [
            'label' => 'Force Removal Strategy',
        ],
        // Product
        'product-name' => [
            'label' => 'Product Name',
            'placeholder' => 'e.g. Banéo 100g'
        ],
        'product-type' => [
            'label' => 'Product Type',
            'select' => [
                'storable' => 'Storable Product',
                'consumable' => 'Consumable',
                'service' => 'Service',
                'booking-fee' => 'Booking Fees',
                'text' => [
                    'storable' => 'Stockable products are physical items for which stock quantities are managed.',
                    'consumable' => 'Consumables are physical products for which you do not manage the stock level: they are always available.'
                ]
            ]
        ],
        'invoicing-policy' => [
            'label' => 'Invoicing Policy',
            'select' => [
                'delivered' => 'Delivered Quantity',
                'ordered' => 'Ordered Quantity',
                'prepaid' => 'Fixed Price / Prepaid',
            ]
        ],
        'product-checkboxes' => [
            'can-be-sold' => 'Can be Sold',
            'can-be-purchased' => 'Can be Purchased',
            'can-be-subscribed' => 'Is reccurent',
            'can-be-rented' => 'Can be Rented',
        ],
        'uom' => [
            'label' => 'Unit of Measure',
            'select' => [

            ]
        ],
        'sale-price' => [
            'label' => 'Sales Price',
            'all-included' => 'all taxes included'
        ],
        'customer-taxes' => [
            'label' => 'Customer Taxes',
        ],
        'cost' => [
            'label' => 'Cost',
        ],
        'product-category' => [
            'label' => 'Product Category',
        ],
        'internal-reference' => [
            'label' => 'Internal Reference',
        ],
        'barcode' => [
            'label' => 'Barcode',
        ],
        'product-tags' => [
            'label' => 'Product Tags',
        ],
        'supplier-taxes' => [
            'label' => 'Suppliers Taxes',
        ],
        'control-policy' => [
            'label' => 'Control Policy',
            'select' => [
                'ordered' => 'On ordered quantities',
                'received' => 'On received quantities'
            ]
        ],
        'purchase-description' => [
            'label' => 'Purchase Description',
            'placeholder' => 'This note is added to purchase orders.'
        ],
        'sale-description' => [
            'label' => 'Sales Description',
            'placeholder' => 'This note is added to sales orders.'
        ],
        'responsible' => [
            'label' => 'Responsible',
        ],
        'weight' => [
            'label' => 'Weight',
        ],
        'volume' => [
            'label' => 'Volume',
        ],
        'customer-lead-time' => [
            'label' => 'Customer Lead Time',
            'days' => 'days'
        ],
        'product-tracking' => [
            'label' => 'Tracking',
            'select' => [
                'unique-number' => 'Unique serial number',
                'lots' => 'Lots',
                'no-tracking' => 'No Tracking'
            ]
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
        'tags' => [
            'label' => 'Tags',
        ],
    ],
    // Cart
    'carts' => [
        'summary' => [
            'conditions' => 'Terms and Conditions',
            'discount' => 'Discounts',
            'total_wt' => 'Total WT',
            'taxes' => 'Taxes',
            'total' => 'Total',
        ]
    ],
    // Loading
    'loading' => [
        'text' => 'Loading...',
    ],
    // Control Panel
    'control-panel' => [
        'new' => 'New',
    ],
    // Modals
    'modals' => [
        'salesperson' => [
            'title-add' => 'Add: Salespersons',
            'title-open' => 'Open: Salespersons',
            'title-create' => 'Create: Salesperson',
            'buttons' => [
                'select' => 'Select',
                'new' => 'New',
                'close' => 'Close',
                'save' => 'Save',
                'save-close' => 'Save & Close',
                'save-new' => 'Save & New',
                'discard' => 'Discard',
                'remove' => 'Remove',
            ],
            'tables' => [
                'add-table' => [
                    'name' => 'Name',
                    'email' => 'Email',
                    'last-log' => 'Latest Login',
                    'status' => 'Status',
                ]
            ],
            'form' => [
                'alert' => "You are inviting a new user",
                'name' => [
                    'label' => 'Name',
                    'placeholder' => 'e.g. Arden BOUET'
                ],
                'email' => [
                    'label' => 'Email',
                    'placeholder' => "e.g. email@your-company.com"
                ],
                'phone' => [
                    'label' => 'Phone',
                ],
                'create-employee' => [
                    'label' => 'Create an Employee',
                ],
            ]
        ],
        'update-qty' => [
            'title' => 'Update the Quantity of :product',
            'qty-statement' => 'The current quantity of :product is :qty :uom',
            'qty' => 'Quantity',
            'buttons' => [
               'apply' => 'Apply',
                'discard' => 'Discard',
            ],
            'messages' => [
                'updated-success' => 'The quantity has been updated successfully',
            ]
        ],
        'replenish-qty' => [
            'title' => "Not enough in stock? Let's replenish !",
            'qty-statement' => 'The current quantity of :product is :qty :uom',
            'qty' => 'Quantity',
            'date' => 'Schedule Date',
            'route' => [
                'label' => 'Preferred Route',
                'select' => [
                    'buy' => 'Buy',
                    'manufacture' => 'Manufacture'
                ]
            ],
            'supplier' => 'Supplier',
            'buttons' => [
               'confirm' => 'Confirm',
                'discard' => 'Discard',
            ],
            'messages' => [
                'replenish-success' => 'The following replenishment order has been generated :reference',
            ]
        ]

    ],

];