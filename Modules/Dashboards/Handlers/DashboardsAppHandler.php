<?php
namespace Modules\Dashboards\Handlers;

use App\Models\Company\Company;
use Illuminate\Support\Facades\Log;
use Exception;
use Modules\App\Handlers\AppHandler;
use Modules\Dashboards\Entities\AppDashboard;
use Modules\Dashboards\Entities\Dashboard;
use Modules\Dashboards\Entities\InstalledDashboard;
class DashboardsAppHandler extends AppHandler
{
    protected function getModuleSlug()
    {
        return 'dashboards';
    }

    protected function handleInstallation($company)
    {
        // Example: Create settings-related data and initial configuration
        $this->createDashboards($company);
    }

    protected function handleUninstallation()
    {
        // Example: Drop blog-related tables and clean up configurations
    }


    /**
     * Create dashboards for the company.
     *
     * @param int $companyId
     */
    public function createDashboards(int $companyId): void
    {
        $dashboards = [
            ['name' => 'Sales', 'slug' => 'sales'],
            ['name' => 'Finance', 'slug' => 'finances'],
            ['name' => 'Logistics', 'slug' => 'logistics'],
            ['name' => 'Services', 'slug' => 'field_of_service'],
            ['name' => 'CRM', 'slug' => 'crm'],
            ['name' => 'Human Resources', 'slug' => 'human_resources'],
            ['name' => 'Website', 'slug' => 'website'],
            ['name' => 'Subscription', 'slug' => 'subscriptions'],
        ];

        foreach ($dashboards as $dashboardData) {
            $dashboard = Dashboard::create([
                'name' => $dashboardData['name'],
                'slug' => $dashboardData['slug'],
                'company_id' => $companyId,
                'is_enable' => true,
            ]);

            // Install apps within the dashboards
            $this->installDashboardApps($dashboard, $companyId);
        }
    }

    /**
     * Install specific dashboard apps based on the dashboard slug.
     *
     * @param Dashboard $dashboard
     * @param int $companyId
     */
    private function installDashboardApps(Dashboard $dashboard, int $companyId): void
    {
        $apps = match ($dashboard->slug) {
            'sales' => [
                ['name' => 'Sales', 'slug' => 'sales_dashboard', 'app_id' => 6],
                ['name' => 'Products', 'slug' => 'products_dashboard', 'app_id' => 6],
                ['name' => 'Point Of Sales', 'slug' => 'pos_dashboard', 'app_id' => 8],
            ],
            'finances' => [
                ['name' => 'Accounting', 'slug' => 'accounting_dashboard', 'app_id' => 2],
                ['name' => 'Invoicing', 'slug' => 'invoices_dashboard', 'app_id' => 2],
            ],
            'logistics' => [
                ['name' => 'Purchase', 'slug' => 'purchases_dashboard', 'app_id' => 4],
                ['name' => 'Suppliers', 'slug' => 'suppliers_dashboard', 'app_id' => 4],
                ['name' => 'On Hand Inventory', 'slug' => 'inventory_dashboard', 'app_id' => 3],
            ],
            default => [],
        };

        foreach ($apps as $app) {
            AppDashboard::create([
                'name' => $app['name'],
                'company_id' => $companyId,
                'parent_slug' => $dashboard->slug,
                'slug' => $app['slug'],
                'dash_id' => $dashboard->id,
                'app_id' => $app['app_id'],
                'is_enable' => true,
            ]);
        }
    }
}