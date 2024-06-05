<?php

return [
    // Control Panel
    'control' => [
        'contact' => [
            'current_page_list_customer' => 'Customers',
            'current_page_list' => 'Contacts',
            'current_page' => ' :refence',
            'current_page_new' => 'New',
            'actions' => [
                'archive' => 'Archive',
                'duplicate' => 'Duplicate',
                'delete' => 'Delete',
                'send-sms' => 'Send SMS Text Message',
                'download-vcard' => 'Download (Vcard)',
                'grant-access' => 'Grant Portal Access',
            ]
        ]
    ],
    // Tables
    'table' => [
        'customer' => [
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'city' => 'City',
            'country' => 'Country',
            // Empty
            'empty' => [
                'title' => 'Create a new contact in your address book.',
                'text' => "Koverae vous aide à facilement suivre toutes les activités liées à un client."
            ]
        ],

    ]
];