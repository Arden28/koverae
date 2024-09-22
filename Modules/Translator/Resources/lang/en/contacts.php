<?php

return [
    // Navbar
    'navbar' => [
        'module' => 'Contact',
        'contacts' => 'Contacts',
        'configuration' => [
            'name' => 'Configuration',
            'honorifics' => 'Honorifics',
            'contact-labels' => 'Contact labels',
            'industries' => 'Industries',
            'localization' => [
                'name' => 'Localization',
                'country-groups' => 'Country Groups',
                'countries' => 'Countries',
                'states' => 'Fed. States',
            ],
            'bank-accounts' => [
                'name' => 'Bank Accounts',
                'banks' => 'Banks',
                'bank-accounts' => 'Bank Accounts',
            ],
        ],
    ],
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
            ],
            'honorific' => [
                'current_page_list' => 'Honorifics',
                'current_page' => ' :refence',
                'current_page_new' => 'New',
            ],
            'tag' => [
                'current_page_list' => 'Contact Labels',
                'current_page' => ' :refence',
                'current_page_new' => 'New',
            ],
            'country' => [
                'current_page_list' => 'Countries',
                'current_page' => ' :refence',
                'current_page_new' => 'New',
            ],
            'bank' => [
                'current_page_list' => 'Banks',
                'current_page' => ' :refence',
                'current_page_new' => 'New',
            ],
            'bank-account' => [
                'current_page_list' => 'Bank Accounts',
                'current_page' => ' :refence',
                'current_page_new' => 'New',
            ],
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
                'title' => 'Create a new contact in your address book',
                'text' => "Koverae helps you easily track all activities related to a customer."
            ]
        ],
        'honorific' => [
            'title' => 'Title',
            'abbreviation' => 'Short Form',
            // Empty
            'empty' => [
                'title' => 'Create a new Title',
                'text' => 'Manage Contact Titles as well as their abbreviations (e.g. "Mr.", "Mrs.", etc).'
            ]
        ],
        'tag' => [
            'name' => 'Name',
            'color' => 'Color',
            // Empty
            'empty' => [
                'title' => 'Create a new Contact Label',
                'text' => 'Label your contacts to sort, filter, and monitor them effectively.'
            ]
        ],
        'industry' => [
            'name' => 'Industry',
            'full-name' => 'Full Name',
            // Empty
            'empty' => [
                'title' => 'Create a new Contact Label',
                'text' => 'Label your contacts to sort, filter, and monitor them effectively.'
            ]
        ],
        'country' => [
            'name' => 'Country Name',
            'code' => 'Country Code',
            // Empty
            'empty' => [
                'title' => 'No Country Found!',
                'text' => 'Manage the countries that can be assigned to your contacts.'
            ]
        ],
        'bank' => [
            'name' => 'Bank Name',
            'bic' => 'Bank Indentifier Code',
            'country' => 'Country',
            // Empty
            'empty' => [
                'title' => 'Add a new Bank',
                'text' => 'Banks are the financial institutions where you and your contacts hold accounts.'
            ]
        ],
        'bank-account' => [
            'no' => 'Account Number',
            'bank' => 'Bank Name',
            'holder' => 'Account Holder',
            // Empty
            'empty' => [
                'title' => 'Add a new Bank Account',
                'text' => 'Easily manage the bank accounts related to you and your contacts from here.'
            ]
        ],

    ]
];
