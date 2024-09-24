<?php

return [
    // Navbar
    'navbar' => [
        'module' => 'Invoicing',
        'overview' => 'Overview',
        'vendor' => [
            'name' => 'Vendors',
            'bills' => 'Bills',
            'refunds' => 'Refunds',
            'payments' => 'Payments',
            'products' => 'Products',
            'vendors' => 'Vendors',
        ],
        'customer' => [
            'name' => 'Customers',
            'invoices' => 'Invoices',
            'credit-notes' => 'Credit Notes',
            'payments' => 'Payments',
            'customers' => 'Customers',
        ],
        'analytic' => [
            'name' => 'Analytics',
            'invoices' => 'Invoices',
            'partner' => [
                'name' => 'Partner Analytics',
                'follow-ups' => 'Follow Up Analysis',
            ],
            'invoice-analytics' => 'Invoice Analysis',
            'payments' => 'Payments',
            'customers' => 'Customers',
        ],
        'configuration' => [
            'name' => 'Configuration',
            'settings' => 'Settings',
            'invoicing' => [
                'name' => 'Invoicing',
                'payment-terms' => 'Payment Terms',
                'follow-ups' => 'Follow Up Levels',
                'incoterms' => 'Incoterms',
            ],
            'bank' => [
                'name' => 'Banks',
                'bank-accounts' => 'Bank Accounts',
            ],
            'accounting' => [
                'name' => 'Accounting',
                'taxes' => 'Taxes',
                'journals' => 'Journals',
                'currencies' => 'Currencies',
                'fiscal-positions' => 'Fiscal Positions',
            ],
            'online-payment' => [
                'name' => 'Online Payment',
                'providers' => 'Payment Providers',
                'methods' => 'Payment Methods',
            ],
            'management' => [
                'name' => 'Management',
                'product-management' => 'Product Management',
            ],
        ],
    ],

    // Control Panel
    'control' => [
            'overview' => [
                'current_page_list' => 'Dashboard',
                'current_page' => ' :refence',
                'current_page_new' => 'New',
            ],
            'payment-term' => [
                'current_page_list' => 'Payment Terms',
                'current_page' => ' :refence',
                'current_page_new' => 'New',
            ],
    ],
    // Tables
    'table' => [
        'payment-term' => [
            'name' => 'Payment Term',
            // Empty
            'empty' => [
                'title' => 'Create a new Payment Term',
                'text' => "Payment terms define the conditions under which you will complete a sale or a purchase."
            ]
        ],
    ],
];