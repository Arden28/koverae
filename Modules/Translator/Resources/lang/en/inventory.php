<?php

return [
    // Control Panel
    'control' => [
        'product-category' => [
            'current_page_list' => 'Product Categories',
            'current_page' => ' :refence',
            'current_page_new' => 'New',
            'actions' => [
                'duplicate' => 'Duplicate',
                'delete' => 'Delete',
            ]
        ],
        'product' => [
            'current_page_list' => 'Producs',
            'current_page' => ' :refence',
            'current_page_new' => 'New',
            'actions' => [
                'archive' => 'Archive',
                'duplicate' => 'Duplicate',
                'delete' => 'Delete',
            ]
        ]
    ],
    // Tables
    'table' => [
        'product-category' => [
            'name' => 'Product Category',
        ],
        'product' => [
            'name' => 'Product Name',
            'internal-reference' => 'Internal Reference',
            'category' => 'Product Category',
            'barcode' => 'Barcode',
            'responsible' => 'Responsible',
            'price' => 'Product Price',
            'cost' => 'Product Cost',
            'country' => 'Country',
            'type' => 'Product Type',
            'quantity' => 'Quantity',
            // Empty
            'empty' => [
                'title' => 'Create a new product',
                'text' => "You must define a product for everything you sell or buy, whether it is a storable product, consumable product or a service."
            ]
        ],
    ],
    // Forms
    'form' => [
        'product-category' => [
            'page-title-new' => 'New Product Category',
            'page-title-list' => 'All Product Categories',
            'reference' => 'New',
            'name' => 'Product Category Form',
            'tabs' => [
                'members' => 'Members',
                'add-member-button' => 'Add Member',
            ],
            'groups' => [
                'stock' => 'Stock Valuation',
                'logistics' => 'Logistics',
            ],
            'capsules' => [
                'products' => [
                    'name' => 'Products',
                    'text' => 'The products belonging to that category.'
                ],
            ],
            'messages' => [
                'success' => [
                    'product-category-create' => 'Product Category created successfully',
                    'product-category-update' => 'Product Category updated successfully',
                    'invoice-create' => 'Invoice created successfully',
                    'product-category-sent' => 'Product Category sent successfully',
                    'product-category-delete' => 'Product Category deleted successfully'
                ],
                'error' => [
                    'product-category-create' => 'An error occurred while creating the sale order',
                    'product-category-sent' => 'An error occurred while sending the sale order',
                    'product-category-delete' => 'An error occurred while deleting the sale order',
                    'product-category-not-found' => 'Product Category not found'
                ]
            ]
        ],
        'product' => [
            'page-title-new' => 'New Product',
            'page-title-list' => 'All Products',
            'reference' => 'New',
            'name' => 'Product Form',
            'capsules' => [
                'on-hand' => [
                    'name' => 'On hand',
                    'text' => 'Quantities available',
                    'units' => 'Units'
                ],
                'prevision' => [
                    'name' => 'Forecasted',
                    'text' => 'Forecasted quantities'
                ],
                'products' => [
                    'name' => 'Products',
                    'text' => 'The products belonging to that category.'
                ],
                'bought' => [
                    'name' => 'Bought',
                    'text' => 'Purchased in the last 365 days.'
                ],
                'sold' => [
                    'name' => 'Sold',
                    'text' => 'Sold in the last 365 days.'
                ],
                'bom' => [
                    'name' => 'Bills Of Materials',
                    'text' => "Product's Bills of materials."
                ],
                'stock-history' => [
                    'name' => 'History',
                    'text' => 'Product history.'
                ],
                'document' => [
                    'name' => 'Documents',
                    'text' => "Product's documents."
                ],
            ],
            'actions' => [
                'update-qty' => 'Update quantity',
                'replenish' => 'Replenish',
                'print' => 'Print Labels'
            ],
            'tabs' => [
                'general' => 'General Informations',
                'sale' => 'Sales',
                'purchase' => 'Purchase',
                'inventory' => 'Inventory',
                'accounting' => 'Accounting',
            ],
            'groups' => [
                'general' => 'Information',
                'supplier' => 'Suppliers',
                'supplier-invoice' => 'Suppliers Bills',
                'purchase-description' => 'Purchase Description',
                'sale-description' => 'Sales Description',
                'logistics' => 'Logistics',
                'tracking' => 'Tracking',
                'packaging' => 'Packaging',
                'customer-receivable' => 'Customer Receivables',
                'customer-payable' => 'Customer Payables',
            ],
            'cart' => [
                'supplier' => [
                    'name' => 'Supplier Name',
                    'quantity' => 'Quantity',
                    'price' => 'Price',
                    'delivery-lead-time' => 'Delivery Lead Time',
                    'product-name' => 'Product Name',
                    'start-date' => 'Start Date',
                    'end-date' => 'End Date',
                    'discount' => 'Discount (%)',
                    'add-line' => 'Add a new supplier'
                ],
                'packaging' => [
                    'name' => 'Packaging Name',
                    'qty' => 'Quantity',
                    'sales' => 'Sales',
                    'purchase' => 'Purchase',
                    'barcode' => 'Barcode',
                    'add-line' => 'Add a new packaging'
                ]
            ]
        ]
    ]
];