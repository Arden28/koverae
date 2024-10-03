<?php
namespace Modules\Invoicing\Handlers;

use App\Models\Company\Company;
use Illuminate\Support\Facades\Log;
use Exception;

class FiscalLocalizationHandler
{

    protected function handleInstallation($company)
    {
        // Example: Create fiscal-localization data and initial configuration
    }

    protected function handleUninstallation()
    {
        // Example: Drop blog-related tables and clean up configurations
    }

    // Kenya Fiscal Localization
    private function createKenyaFiscalLocalization(int $companyId, string $country_code = null){
        // Chart of Account
        
        $charts = [
            //
        ];


        // Taxes
        $taxes = [
            // 16%
            [
                'name' => 'VAT (16%)',
                'descripption' => 'Sales VAT 16%',
                'wording_on_invoice' => 'VAT 16%',
                'computation_type' => 'percentage',
                'type' => 'sales',
                'rate' => 16.00,
                'amount' => 16.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => [
                    'code_type' => 'Taxation Type',
                    'code' => 'B',
                    'name' => 'B-Standard Rated',
                    'description' => 'B-Standard Rated',
                    'sequence' => 2,
                    'tax_rate' => 16.00,
                    'is_active' => true,
                ]
            ],
            // 8%
            [
                'name' => 'VAT (8%)',
                'descripption' => 'Sales VAT 8%',
                'wording_on_invoice' => 'VAT 8%',
                'computation_type' => 'percentage',
                'type' => 'sales',
                'rate' => 8.00,
                'amount' => 8.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => [
                    'code_type' => 'Taxation Type',
                    'code' => 'B',
                    'name' => 'B-Standard Rated',
                    'description' => 'B-Standard Rated',
                    'sequence' => 2,
                    'tax_rate' => 8.00,
                    'is_active' => true,
                ]
            ],
            // Sales VAT Zero Rated
            [
                'name' => '0%',
                'descripption' => 'Sales VAT Zero Rated',
                'wording_on_invoice' => '0%',
                'computation_type' => 'percentage',
                'type' => 'sales',
                'rate' => 0.00,
                'amount' => 0.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => [
                    'code_type' => 'Taxation Type',
                    'code' => 'C',
                    'name' => 'C-Zero Rated',
                    'description' => 'C-Zero Rated',
                    'sequence' => 3,
                    'tax_rate' => 0.00,
                    'is_active' => true,
                ]
            ],
            // Sales VAT Exempt
            [
                'name' => '0% EXEMPT',
                'descripption' => 'Sales VAT Exempt',
                'wording_on_invoice' => 'Exempt',
                'computation_type' => 'percentage',
                'type' => 'sales',
                'rate' => 0.00,
                'amount' => 0.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => [
                    'code_type' => 'Taxation Type',
                    'code' => 'A',
                    'name' => 'A-Exempt',
                    'description' => 'A-Exempt',
                    'sequence' => 1,
                    'tax_rate' => 0.00,
                    'is_active' => true,
                ]
            ],
            // Export(0)
            [
                'name' => '0% EXPORT',
                'descripption' => 'Export(0)',
                'wording_on_invoice' => 'Exempt',
                'computation_type' => 'percentage',
                'type' => 'sales',
                'rate' => 0.00,
                'amount' => 0.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => [
                    'code_type' => 'Taxation Type',
                    'code' => 'A',
                    'name' => 'A-Exempt',
                    'description' => 'A-Exempt',
                    'sequence' => 1,
                    'tax_rate' => 0.00,
                    'is_active' => true,
                ]
            ],

            // 3WH
            [
                'name' => '3% WHT',
                'descripption' => '3% WHT',
                'wording_on_invoice' => '3%',
                'computation_type' => 'percentage',
                'type' => 'sales',
                'rate' => -3.00,
                'amount' => -3.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => []
            ],
            // 5WHT
            [
                'name' => '5% WHT',
                'descripption' => '5% WHT',
                'wording_on_invoice' => '5%',
                'computation_type' => 'percentage',
                'type' => 'sales',
                'rate' => -5.00,
                'amount' => -5.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => []
            ],
            // 10WH
            [
                'name' => '10% WHT',
                'descripption' => '10% WHT',
                'wording_on_invoice' => '10%',
                'computation_type' => 'percentage',
                'type' => 'sales',
                'rate' => -10.00,
                'amount' => -10.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => []
            ],
            // 12WH
            [
                'name' => '12% WHT',
                'descripption' => '12% WHT',
                'wording_on_invoice' => '12%',
                'computation_type' => 'percentage',
                'type' => 'sales',
                'rate' => -12.00,
                'amount' => -12.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => []
            ],
            // 15WHT
            [
                'name' => '15% WHT',
                'descripption' => '15% WHT',
                'wording_on_invoice' => '15%',
                'computation_type' => 'percentage',
                'type' => 'sales',
                'rate' => -15.00,
                'amount' => -15.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => []
            ],
            // 20WH
            [
                'name' => '20% WHT',
                'descripption' => '20% WHT',
                'wording_on_invoice' => '20%',
                'computation_type' => 'percentage',
                'type' => 'sales',
                'rate' => -20.00,
                'amount' => -20.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => []
            ],
            // 25WHT
            [
                'name' => '25% WHT',
                'descripption' => '25% WHT',
                'wording_on_invoice' => '25%',
                'computation_type' => 'percentage',
                'type' => 'sales',
                'rate' => -25.00,
                'amount' => -25.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => []
            ],
            // 30WH
            [
                'name' => '30% WHT',
                'descripption' => '30% WHT',
                'wording_on_invoice' => '30%',
                'computation_type' => 'percentage',
                'type' => 'sales',
                'rate' => -30.00,
                'amount' => -30.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => []
            ],

            // Purchase
            
            // 16%
            [
                'name' => 'VAT (16%)',
                'descripption' => 'Purchases VAT 16%',
                'wording_on_invoice' => 'VAT 16%',
                'computation_type' => 'percentage',
                'type' => 'purchases',
                'rate' => 16.00,
                'amount' => 16.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => [
                    'code_type' => 'Taxation Type',
                    'code' => 'B',
                    'name' => 'B-Standard Rated',
                    'description' => 'B-Standard Rated',
                    'sequence' => 2,
                    'tax_rate' => 16.00,
                    'is_active' => true,
                ]
            ],
            // 8%
            [
                'name' => 'VAT (8%)',
                'descripption' => 'Purchases VAT 8%',
                'wording_on_invoice' => 'VAT 8%',
                'computation_type' => 'percentage',
                'type' => 'purchases',
                'rate' => 8.00,
                'amount' => 8.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => [
                    'code_type' => 'Taxation Type',
                    'code' => 'B',
                    'name' => 'B-Standard Rated',
                    'description' => 'B-Standard Rated',
                    'sequence' => 2,
                    'tax_rate' => 8.00,
                    'is_active' => true,
                ]
            ],
            // Purchases VAT Zero Rated
            [
                'name' => '0%',
                'descripption' => 'Purchases VAT Zero Rated',
                'wording_on_invoice' => '0%',
                'computation_type' => 'percentage',
                'type' => 'purchases',
                'rate' => 0.00,
                'amount' => 0.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => [
                    'code_type' => 'Taxation Type',
                    'code' => 'C',
                    'name' => 'C-Zero Rated',
                    'description' => 'C-Zero Rated',
                    'sequence' => 3,
                    'tax_rate' => 0.00,
                    'is_active' => true,
                ]
            ],
            // Purchases VAT Exempt
            [
                'name' => '0% EXEMPT',
                'descripption' => 'Purchases VAT Exempt',
                'wording_on_invoice' => 'Exempt',
                'computation_type' => 'percentage',
                'type' => 'purchases',
                'rate' => 0.00,
                'amount' => 0.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => [
                    'code_type' => 'Taxation Type',
                    'code' => 'A',
                    'name' => 'A-Exempt',
                    'description' => 'A-Exempt',
                    'sequence' => 1,
                    'tax_rate' => 0.00,
                    'is_active' => true,
                ]
            ],
            

            // 3WH
            [
                'name' => '3% WHT',
                'descripption' => '3% WHT',
                'wording_on_invoice' => '3%',
                'computation_type' => 'percentage',
                'type' => 'purchases',
                'rate' => -3.00,
                'amount' => -3.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => []
            ],
            // 5WHT
            [
                'name' => '5% WHT',
                'descripption' => '5% WHT',
                'wording_on_invoice' => '5%',
                'computation_type' => 'percentage',
                'type' => 'purchases',
                'rate' => -5.00,
                'amount' => -5.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => []
            ],
            // 10WH
            [
                'name' => '10% WHT',
                'descripption' => '10% WHT',
                'wording_on_invoice' => '10%',
                'computation_type' => 'percentage',
                'type' => 'purchases',
                'rate' => -10.00,
                'amount' => -10.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => []
            ],
            // 12WH
            [
                'name' => '12% WHT',
                'descripption' => '12% WHT',
                'wording_on_invoice' => '12%',
                'computation_type' => 'percentage',
                'type' => 'purchases',
                'rate' => -12.00,
                'amount' => -12.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => []
            ],
            // 15WHT
            [
                'name' => '15% WHT',
                'descripption' => '15% WHT',
                'wording_on_invoice' => '15%',
                'computation_type' => 'percentage',
                'type' => 'purchases',
                'rate' => -15.00,
                'amount' => -15.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => []
            ],
            // 20WH
            [
                'name' => '20% WHT',
                'descripption' => '20% WHT',
                'wording_on_invoice' => '20%',
                'computation_type' => 'percentage',
                'type' => 'purchases',
                'rate' => -20.00,
                'amount' => -20.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => []
            ],
            // 25WHT
            [
                'name' => '25% WHT',
                'descripption' => '25% WHT',
                'wording_on_invoice' => '25%',
                'computation_type' => 'percentage',
                'type' => 'purchases',
                'rate' => -25.00,
                'amount' => -25.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => []
            ],
            // 30WH
            [
                'name' => '30% WHT',
                'descripption' => '30% WHT',
                'wording_on_invoice' => '30%',
                'computation_type' => 'percentage',
                'type' => 'purchases',
                'rate' => -30.00,
                'amount' => -30.00,
                'distribution-invoice' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'distribution-refund' => [
                    [
                        'amount' => 0,
                        'based_on' => 'base_price',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => false
                    ],
                    [
                        'amount' => 100,
                        'based_on' => 'tax',
                        'tax-grid' => [],
                        'accounting-account' => null,
                        'closing-entry' => true
                    ]
                ],
                'kra-tax-code' => []
            ],

        ];

    }

}