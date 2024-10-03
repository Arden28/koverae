<?php

return [
    'name' => 'Invoicing',
    'fiscal-position' => [
        // Default fiscal position
        'default' => [
            'name' => 'Global',
            'taxes' => [],
            'fiscal_positions' => [],
            'chart_of_accounts' => [],
            'legal_statements' => []
        ],
        // Kenya Fiscal position
        'KE' => [
            'name' => 'Kenya',
            'taxes' => [
                'vat' => [
                    'rate' => 16,  // VAT in Kenya is 16%
                    'type' => 'VAT',
                    'exemptions' => ['education', 'healthcare'],
                ],
                'withholding_tax' => [
                    'rate' => 5,
                    'type' => 'Withholding Tax',
                    'applicable_to' => ['contractors', 'consultants']
                ],
            ],
            'fiscal_positions' => [
                'domestic' => 'Standard VAT Rules',
                'international' => 'No VAT',
            ],
            'chart_of_accounts' => [
                // Standard Kenyan Chart of Accounts
                'assets' => ['101' => 'Cash at Bank', '102' => 'Accounts Receivable'],
                'liabilities' => ['201' => 'Accounts Payable', '202' => 'Loans'],
                'income' => ['301' => 'Sales Revenue', '302' => 'Consulting Income'],
                'expenses' => ['401' => 'Salaries', '402' => 'Rent']
            ],
            'legal_statements' => [
                'vat_return' => 'Kenya VAT Return',
                'income_statement' => 'Kenya Income Statement',
            ]
        ]
    ]
];
