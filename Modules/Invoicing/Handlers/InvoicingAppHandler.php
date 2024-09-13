<?php
namespace Modules\Invoicing\Handlers;

use App\Models\Company\Company;
use Illuminate\Support\Facades\Log;
use Exception;
use Modules\Accounting\Entities\Journal;
use Modules\App\Handlers\AppHandler;
use Modules\Invoicing\Entities\Incoterm;
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