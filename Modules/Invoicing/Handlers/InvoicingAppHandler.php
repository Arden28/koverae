<?php
namespace Modules\Invoicing\Handlers;

use App\Models\Company\Company;
use Illuminate\Support\Facades\Log;
use Exception;
use Modules\Accounting\Entities\Journal;
use Modules\App\Handlers\AppHandler;
use Modules\Invoicing\Entities\Incoterm;
use Modules\Invoicing\Entities\Payment\PaymentDueTerm;
use Modules\Invoicing\Entities\Payment\PaymentTerm;
use Ramsey\Uuid\Uuid;

class InvoicingAppHandler extends AppHandler
{
    protected function getModuleSlug()
    {
        return 'invoicing';
    }

    protected function handleInstallation($company)
    {
        // Example: Create invoicing-related data and initial configuration
        $this->createInvoicingDashboards($company);
        $this->createPaymentTerms($company);
        $this->createIncoterms($company);
        $this->createAccountingJournals($company);
    }

    protected function handleUninstallation()
    {
        // Example: Drop blog-related tables and clean up configurations
    }

    

    /**
     * Install specific dashboards for invoicing.
     *
     * @param int $companyId
     */
    private function createInvoicingDashboards(int $companyId): void
    {
        $dashboards = [
            ['slug' => 'invoices_dashboard', 'parent_slug' => 'finances'],
        ];

        foreach ($dashboards as $dashboard) {
            $this->installDashboard($dashboard['slug'], $companyId, $dashboard['parent_slug']);
        }
    }
    
    /**
     * Install Payment Terms.
     *
     * @param int $companyId
     */
    private function createPaymentTerms(int $companyId): void
    {
        // Payment terms array
        $paymentTerms = [
            [
                'name' => 'Immediate Payment',
                'after' => 0,
                'after_date' => 'after_invoice_date',
            ],
            [
                'name' => '15 Days',
                'after' => 15,
                'after_date' => 'after_invoice_date',
            ],
            [
                'name' => '21 Days',
                'after' => 21,
                'after_date' => 'after_invoice_date',
            ],
            [
                'name' => '30 Days',
                'after' => 30,
                'after_date' => 'after_invoice_date',
            ],
            [
                'name' => '45 Days',
                'after' => 45,
                'after_date' => 'after_invoice_date',
            ],
            [
                'name' => 'End of Following Month',
                'after' => null,
                'after_date' => 'after_end_of_the_next_month',
            ],
            [
                'name' => '10 Days after End of Next Month',
                'after' => 10,
                'after_date' => 'after_end_of_the_next_month',
            ],
            [
                'name' => '30% Now, Balance 60 Days',
                'due_amounts' => [
                    [
                        'due_amount' => '30',
                        'due_format' => 'percent',
                        'after' => 0,
                        'after_date' => 'after_invoice_date',
                    ],
                    [
                        'due_amount' => '70',
                        'due_format' => 'percent',
                        'after' => 60,
                        'after_date' => 'after_invoice_date',
                    ]
                ]
            ],
            [
                'name' => '2/7 Net 30',
                'has_early_discount' => true,
                'discount_percentage' => 2,
                'in_advance_day' => 7,
                'after' => 30,
                'after_date' => 'after_invoice_date',
            ],
            [
                'name' => '90 days, on the 10th',
                'after' => 90,
                'month' => 10,
                'after_date' => 'end_of_the_month_of',
            ],
        ];

        // Loop through payment terms and insert into the payment_terms and payment_due_terms tables
        foreach ($paymentTerms as $term) {
            // Insert into payment_terms table
            $paymentTerm = PaymentTerm::create([
                'company_id' => $companyId,
                'name' => $term['name'],
                'has_early_discount' => $term['has_early_discount'] ?? false,
                'discount_percentage' => $term['discount_percentage'] ?? 2,
                'in_advance_day' => $term['in_advance_day'] ?? 7,
                'note' => 'Payment terms: '. $term['name'],
                'reduced_tax' => $term['reduced_tax'] ?? 'on_early_payment',
                
            ]);
            $paymentTerm->save();
    
            // Insert into payment_due_terms table for terms that have due_amounts defined
            if (isset($term['due_amounts'])) {
                foreach ($term['due_amounts'] as $dueTerm) {
                    PaymentDueTerm::create([
                        'company_id' => $companyId,
                        'payment_term_id' => $paymentTerm->id,
                        'due_amount' => $dueTerm['due_amount'],
                        'due_format' => $dueTerm['due_format'],
                        'after' => $dueTerm['after'],
                        'after_date' => $dueTerm['after_date'],
                    ]);
                }
            } else {
                // Insert the main payment due term for single payment term
                PaymentDueTerm::create([
                    'company_id' => $companyId,
                    'payment_term_id' => $paymentTerm->id,
                    'due_amount' => 100,
                    'due_format' => 'percent',
                    'after' => $term['after'] ?? null,
                    'after_date' => $term['after_date'] ?? 'after_invoice_date',
                    'month' => $term['month'] ?? 0,
                ]);
            }
        }
    
    }
    
    /**
     * Install incoterms.
     *
     * @param int $companyId
     */
    private function createIncoterms(int $companyId): void
    {
        $incoterms = [
            [
                'company_id' => $companyId,
                'code' => "EXW",
                'name' => "At the factory"
            ],
            [
                'company_id' => $companyId,
                'code' => "FCA",
                'name' => "Free Carrier"
            ],
            [
                'company_id' => $companyId,
                'code' => "FAS",
                'name' => "Free Alongside Ship"
            ],
            [
                'company_id' => $companyId,
                'code' => "FOB",
                'name' => "Free On Board"
            ],
            [
                'company_id' => $companyId,
                'code' => "CFR",
                'name' => "Cost and Freight"
            ],
            [
                'company_id' => $companyId,
                'code' => "CIF",
                'name' => "Cost, Insurance, and Freight"
            ],
            [
                'company_id' => $companyId,
                'code' => "CPT",
                'name' => "Carriage Paid To"
            ],
            [
                'company_id' => $companyId,
                'code' => "CIP",
                'name' => "Carriage and Insurance Paid To"
            ],
            [
                'company_id' => $companyId,
                'code' => "DPU",
                'name' => "Delivered at Place Unloaded"
            ],
            [
                'company_id' => $companyId,
                'code' => "DAP",
                'name' => "Delivered at Place"
            ],
            [
                'company_id' => $companyId,
                'code' => "DDP",
                'name' => "Delivered Duty Paid"
            ],
            
        ];
        foreach($incoterms as $incoterm){
            Incoterm::create($incoterm);
        }
    }
    
    /**
     * Install specific dashboards for invoicing.
     *
     * @param int $companyId
     */
    private function createAccountingJournals(int $companyId): void
    {
        $journals = [
            [
                'company_id' => $companyId,
                'name' => 'Customer Invoices',
                'type' => 'sale',
                'short_code' => 'INV'
            ],
            [
                'company_id' => $companyId,
                'name' => 'Supplier Invoices',
                'type' => 'purchase',
                'short_code' => 'BILL'
            ],
            [
                'company_id' => $companyId,
                'name' => 'Miscellaneous Operations',
                'type' => 'miscellaneous',
                'short_code' => 'MISC'
            ],
            [
                'company_id' => $companyId,
                'name' => 'Stock Valuation',
                'type' => 'miscellaneous',
                'short_code' => 'STJ'
            ],
            [
                'company_id' => $companyId,
                'name' => 'Exchange Rate Difference',
                'type' => 'miscellaneous',
                'short_code' => 'EXCH'
            ],
            [
                'company_id' => $companyId,
                'name' => 'VAT on Payments',
                'type' => 'miscellaneous',
                'short_code' => 'CABA'
            ],
            [
                'company_id' => $companyId,
                'name' => 'Bank',
                'type' => 'bank',
                'short_code' => 'BNK1'
            ],
            [
                'company_id' => $companyId,
                'name' => 'Cash',
                'type' => 'cash',
                'short_code' => 'CSH1'
            ],
        ];
        foreach($journals as $journal){
            Journal::create($journal);
        }
    }
}