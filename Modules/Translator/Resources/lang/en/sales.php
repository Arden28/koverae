<?php

return [
    // Navbar
    'navbar' => [
        'module' => 'Sales',
        'orders' => [
            'name' => 'Orders',
            'quotation' => 'Quotations',
            'order' => 'Orders',
            'customer' => 'Customers',
            'teams' => 'Sales Teams',
        ],
        'to_invoice' => [
            'name' => 'To invoice',
            'orders' => 'Orders to invoice',
        ],
        'product' => [
            'name' => 'Products',
            'products' => 'Products',
            'variants' => 'Product Variants',
            'pricelists' => 'Price lists',
            'discounts' => 'Discounts & Loyalty',
            'giftcards' => 'Gift cards'
        ],
        'report' => [
            'name' => 'Reports',
            'sales' => 'Sales',
            'sellers' => 'Sellers',
            'customers' => 'Customers',
            'products' => 'Products',
        ],
        'configuration' => [
            'name' => 'Configuration',
            'setting' => 'Settings',
            'sales_teams' => 'Sales Teams',
            'orders' => [
                'name' => 'Orders',
                'tags' => 'Sales Tags'
            ],
            'products' => [
                'name' => 'Products',
                'categories' => 'Products Categories',
                'attributes' => 'Products Attributes',
            ],
        ],
    ],
    // Control Panel
    'control' => [
        'quotation' => [
            'current_page_list' => 'Quotations',
            'current_page' => ' :refence',
            'current_page_new' => 'New',
            'actions' => [
                'print' => 'Print',
                'duplicate' => 'Duplicate',
                'delete' => 'Delete',
                'markAsSent' => 'Mark as sent',
                'share' => 'Share'
            ]
        ],
        'sale' => [
            'current_page_list' => 'Sales Orders',
            'current_page' => ' :refence',
            'current_page_new' => 'New',
            'actions' => [
                'print' => 'Print',
                'duplicate' => 'Duplicate',
                'delete' => 'Delete',
                'generateLink' => 'Generate a payment link',
                'share' => 'Share'
            ]
        ],
        'program' => [
            'current_page_list' => 'Discounts & Loyalty',
            'current_page' => ' :refence',
            'current_page_new' => 'New',
        ],
        'pricelist' => [
            'current_page_list' => 'Price Lists',
            'current_page' => ' :refence',
            'current_page_new' => 'New',
        ],
        'team' => [
            'current_page_list' => 'Sales Teams',
            'current_page' => ' :refence',
            'current_page_new' => 'New',
            'actions' => [
                'print' => 'Print',
                'duplicate' => 'Duplicate',
                'delete' => 'Delete',
                'generateLink' => 'Generate a payment link',
                'share' => 'Share',
                'transform' => 'Transform into invoice / credit note'
            ]
        ],
        'invoice' => [
            'current_page_list' => 'Invoices',
            'current_page' => ' :refence',
            'current_page_new' => 'New',
            'actions' => [
                'print' => 'Print',
                'duplicate' => 'Duplicate',
                'delete' => 'Delete',
                'generateLink' => 'Generate a payment link',
                'share' => 'Share',
                'transform' => 'Transform into invoice / credit note'
            ]
        ],
    ],
    // Tables
    'table' => [
        'quotation' => [
            'name' => 'Quotation Table',
            'reference' => 'Reference',
            'date' => 'Date',
            'due_date' => "Expected Date",
            'shipping_date' => 'Shipping Date',
            'customer' => 'Customer',
            'seller' => 'Seller',
            'sale_team' => 'Sales Team',
            'total' => 'Total',
            'status' => 'Status',
            // Empty
            'empty' => [
                'title' => 'Create a new quote, the first step to a sale!',
                'text' => 'Once the quote is confirmed by the customer, it becomes a sale order. You will be able to create an invoice and collect payment.'
            ]
        ],
        'sale' => [
            'name' => 'Sale Table',
           'reference' => 'Reference',
           'date' => 'Date',
           'shipping_date' => 'Shipping Date',
           'shipping_status' => 'Shipping Status',
           'customer' => 'Customer',
           'seller' => 'Seller',
           'sale_team' => 'Sales Team',
           'total' => 'Total',
           'status' => 'Status',
           'invoice_status' => 'Invoice Status',
           // Empty
           'empty' => [
               'title' => 'Create a new quote, the first step to a sale!',
               'text' => 'Once the quote is confirmed by the customer, it becomes a sale order. You will be able to create an invoice and collect payment.'
           ]
        ],
        'program' => [
            'name' => 'Program Name',
            'type' => 'Program Type',
            'pos' => 'Point Of Sales',
            // Empty
            'empty' => [
                'title' => 'No program found.',
                'text' => 'Create one from scratch, or use a templates below:'
            ]
        ],
        'pricelist' => [
            'name' => 'Price List Name',
            'policy' => 'Discount Policy',
            // Empty
            'empty' => [
                'title' => 'Create a new price list!',
                'text' => "A price is a set of sales prices or rules for calculating the price of order lines based on products, product categories, dates, and quantities ordered. It's the perfect tool for managing multiple prices, seasonal discounts, etc. You can assign price lists to your customers or select one when you create a new sales quote."
            ]
        ],
        'team' => [
            'name' => 'Name',
            'alias' => 'Alias',
            'leader' => "Team's Leader",
            'goal' => 'Billing Goal',
            // Empty
            'empty' => [
                'title' => 'Create a sales team and track your performance!',
                'text' => "Create a sales team, add members to it and track your performance."
            ]
        ],
    ],
    // Forms
    'form' => [
        'quotation' => [
            'page-title-new' => 'New Quotation',
            'page-title-list' => 'Quotations',
            'reference' => 'New',
            'name' => 'Quotation Form',
            'tabs' => [
                'orders' => 'Orders',
                'others' => 'Other Information',
                'note' => 'Note'
            ],
            'groups' => [
                'sales' => 'Sales',
                'delivery' => 'Shipping',
                'invoicing' => 'Invoicing',
                'tracking' => 'Tracking',
            ],
            'actions' => [
                'send-email' => 'Send by Email',
                'confirm' => 'Confirm',
                'preview' => 'Preview',
                'lock' => 'Lock',
                'unlock' => 'Unlock',
                'cancel' => 'Cancel',
            ],
            'status' => [
                'quotation' => 'Quotation',
                'sent' => 'Sent',
                'order' => 'Sale Order',
                'canceled' => 'Canceled'
            ],
            'capsules' => [
                'sales' => [
                    'name' => 'Sales Orders',
                    'text' => 'Sales generated via the quote.'
                ]
            ],
            'cart' => [
                'product' => 'Product',
                'description' => 'Product description',
                'quantity' => 'Quantity',
                'price' => 'Price',
                'wt' => 'Without Taxes',
                'line' => 'Add a line'
            ],
            'messages' => [
                'success' => [
                    'quotation-create' => 'Quote created successfully',
                    'sale-order-create' => 'Sale Order created successfully',
                    'quotation-sent' => 'Quotation sent successfully',
                    'quotation-delete' => 'Quotation deleted successfully'
                ],
                'error' => [
                    'quotation-create' => 'An error occurred while creating the quote',
                    'quotation-sent' => 'An error occurred while sending the quote',
                    'quotation-delete' => 'An error occurred while deleting the quote',
                    'quotation-not-found' => 'Quote not found'
                ]
            ]

        ],
        'sale' => [
            'page-title-new' => 'New Sale Order',
            'page-title-list' => 'Sale Orders',
            'reference' => 'New',
            'name' => 'Sale Form',
            'tabs' => [
                'orders' => 'Orders',
                'others' => 'Other Information',
                'note' => 'Note'
            ],
            'groups' => [
                'sales' => 'Sales',
                'delivery' => 'Shipping',
                'invoicing' => 'Invoicing',
                'tracking' => 'Tracking',
            ],
            'actions' => [
                'invoice' => 'Create an invoice',
                'send-email' => 'Send by Email',
                'make-quotation' => 'Set a quote',
                'preview' => 'Preview',
                'lock' => 'Lock',
                'unlock' => 'Unlock',
                'cancel' => 'Cancel',
            ],
            'status' => [
                'quotation' => 'Quotation',
                'sent' => 'Sent',
                'order' => 'Sale Order',
                'canceled' => 'Canceled'
            ],
            'capsules' => [
                'quotations' => [
                    'name' => 'Quotations',
                    'text' => 'The quotes that generated this order.'
                ],
                'invoices' => [
                    'name' => 'Invoices',
                    'text' => 'The invoices that were generated by this order.'
                ],
                'shipping' => [
                    'name' => 'Shippings',
                    'text' => 'Shippings that were generated by this order.'
                ]
            ],
            'cart' => [
                'product' => 'Product',
                'description' => 'Product description',
                'quantity' => 'Quantity',
                'price' => 'Price',
                'wt' => 'Without Taxes',
                'line' => 'Add a line'
            ],
            'messages' => [
                'success' => [
                    'sale-create' => 'Sale Order created successfully',
                    'sale-update' => 'Sale Order updated successfully',
                    'invoice-create' => 'Invoice created successfully',
                    'sale-sent' => 'Sale Order sent successfully',
                    'sale-delete' => 'Sale Order deleted successfully'
                ],
                'error' => [
                    'sale-create' => 'An error occurred while creating the sale order',
                    'sale-sent' => 'An error occurred while sending the sale order',
                    'sale-delete' => 'An error occurred while deleting the sale order',
                    'sale-not-found' => 'Sale order not found'
                ]
            ]

        ],
        'pricelist' => [
            'page-title-new' => 'New Price List',
            'page-title-list' => 'Price Lists',
            'reference' => 'New',
            'name' => 'Price list Form',
            'tabs' => [
                'rules' => 'Pricing Rules',
                'configuration' => 'Configuration',
            ],
            'groups' => [
                'base_info' => 'General Information',
                'availability' => 'Availability',
                'discount' => 'Discount',
            ],
            'actions' => [
                'invoice' => 'Create an invoice',
                'send-email' => 'Send by Email',
                'make-quotation' => 'Set a quote',
                'preview' => 'Preview',
                'lock' => 'Lock',
                'unlock' => 'Unlock',
                'cancel' => 'Cancel',
            ],
            'status' => [
                'quotation' => 'Quotation',
                'sent' => 'Sent',
                'order' => 'Sale Order',
                'canceled' => 'Canceled'
            ],
            'capsules' => [
                'quotations' => [
                    'name' => 'Quotations',
                    'text' => 'The quotes that generated this order.'
                ],
                'invoices' => [
                    'name' => 'Invoices',
                    'text' => 'The invoices that were generated by this order.'
                ],
                'shipping' => [
                    'name' => 'Shippings',
                    'text' => 'Shippings that were generated by this order.'
                ]
            ],
            'messages' => [
                'success' => [
                    'sale-create' => 'Sale Order created successfully',
                    'sale-update' => 'Sale Order updated successfully',
                    'invoice-create' => 'Invoice created successfully',
                    'sale-sent' => 'Sale Order sent successfully',
                    'sale-delete' => 'Sale Order deleted successfully'
                ],
                'error' => [
                    'sale-create' => 'An error occurred while creating the sale order',
                    'sale-sent' => 'An error occurred while sending the sale order',
                    'sale-delete' => 'An error occurred while deleting the sale order',
                    'sale-not-found' => 'Sale order not found'
                ]
            ]
        ],
        'invoice' => [
            'page-title-new' => 'New Invoice',
            'page-title-list' => 'Invoices',
            'reference' => 'New',
            'name' => 'Invoice Form',
            'tabs' => [
                'order' => 'Invoice lines',
                'accounting_entry' => 'Accounting entries',
                'other' => 'Others'
            ],
            'groups' => [
                'invoice' => 'Invoice',
            ],
            'actions' => [
                'register-payment' => 'Register Payment',
                'send-email' => 'Send by Email',
                'confirm' => 'Confirm',
                'draft' => 'Return to draft',
                'preview' => 'Preview',
                'lock' => 'Lock',
                'unlock' => 'Unlock',
                'cancel' => 'Cancel',
            ],
            'status' => [
                'draft' => 'Draft',
                'posted' => 'Posted',
                'canceled' => 'Canceled',
            ],
            'capsules' => [
                'orders' => [
                    'name' => 'Sale Orders',
                    'text' => 'The sale orders that generated this invoice.'
                ],
            ],
            'cart' => [
                'product' => 'Product',
                'label' => 'Label',
                'quantity' => 'Quantity',
                'price' => 'Price',
                'wt' => 'Without Taxes',
                'line' => 'Add a line'
            ],
            'messages' => [
                'success' => [
                    'sale-create' => 'Sale Order created successfully',
                    'sale-update' => 'Sale Order updated successfully',
                    'invoice-create' => 'Invoice created successfully',
                    'sale-sent' => 'Sale Order sent successfully',
                    'sale-delete' => 'Sale Order deleted successfully'
                ],
                'error' => [
                    'sale-create' => 'An error occurred while creating the sale order',
                    'sale-sent' => 'An error occurred while sending the sale order',
                    'sale-delete' => 'An error occurred while deleting the sale order',
                    'sale-not-found' => 'Sale order not found'
                ]
            ]

        ],
        'team' => [
            'page-title-new' => 'New Sales Team',
            'page-title-list' => 'All Sales Teams',
            'reference' => 'New',
            'name' => 'Sale Team Form',
            'tabs' => [
                'members' => 'Members',
                'add-member-button' => 'Add Member',
            ],
            'groups' => [
                'team' => 'Team Details',
            ],
            'actions' => [
                'register-payment' => 'Register Payment',
                'send-email' => 'Send by Email',
                'confirm' => 'Confirm',
                'draft' => 'Return to draft',
                'preview' => 'Preview',
                'lock' => 'Lock',
                'unlock' => 'Unlock',
                'cancel' => 'Cancel',
            ],
            'status' => [
                'draft' => 'Draft',
                'posted' => 'Posted',
                'canceled' => 'Canceled',
            ],
            'capsules' => [
                'orders' => [
                    'name' => 'Sale Orders',
                    'text' => 'The sale orders that generated this invoice.'
                ],
            ],
            'cart' => [
                'product' => 'Product',
                'label' => 'Label',
                'quantity' => 'Quantity',
                'price' => 'Price',
                'wt' => 'Without Taxes',
                'line' => 'Add a line'
            ],
            'messages' => [
                'success' => [
                    'sale-create' => 'Sale Order created successfully',
                    'sale-update' => 'Sale Order updated successfully',
                    'invoice-create' => 'Invoice created successfully',
                    'sale-sent' => 'Sale Order sent successfully',
                    'sale-delete' => 'Sale Order deleted successfully'
                ],
                'error' => [
                    'sale-create' => 'An error occurred while creating the sale order',
                    'sale-sent' => 'An error occurred while sending the sale order',
                    'sale-delete' => 'An error occurred while deleting the sale order',
                    'sale-not-found' => 'Sale order not found'
                ]
            ]

        ],
    ],
    // Pages
    'page' => [
        'sales-analysis' => [
            'title' => 'Sales Analysis'
        ]
    ],
    'settings' => [
        
    ]
        
];