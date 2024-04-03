<?php

namespace Modules\Dashboards\Database\Seeders;

use App\Models\Company\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Dashboards\Entities\AppDashboard;
use Modules\Dashboards\Entities\Dashboard;

class DashboardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // Get the companies
        $companies= Company::all();

        foreach($companies as $c){
            // Create dashboards for the company
            $dash1 = Dashboard::create([
                'name' => 'Ventes',
                'slug' => 'sales',
                'company_id' => $c->id,
                'is_enable' => true,
            ]);
            $dash1->save();

                $sales_dashboard = AppDashboard::create([
                    'name' => 'Ventes',
                    'parent_slug' => 'sales',
                    'slug' => 'sales_dashboard',
                    'dash_id' => $dash1->id,
                    'app_id' => 6,
                    'is_enable' => true,
                ]);
                $sales_dashboard->save();

                $products_dashboard = AppDashboard::create([
                    'name' => 'Produits',
                    'parent_slug' => 'sales',
                    'slug' => 'products_dashboard',
                    'dash_id' => $dash1->id,
                    'app_id' => 6,
                    'is_enable' => true,
                ]);
                $products_dashboard->save();

                $pos_dashboard = AppDashboard::create([
                    'name' => 'Point de vente',
                    'parent_slug' => 'sales',
                    'slug' => 'pos_dashboard',
                    'dash_id' => $dash1->id,
                    'app_id' => 8,
                    'is_enable' => true,
                ]);
                $pos_dashboard->save();

            $dash2 = Dashboard::create([
                'name' => 'Finance',
                'slug' => 'finances',
                'company_id' => $c->id,
                'is_enable' => true,
            ]);
            $dash2->save();

                $invoices_dashboard = AppDashboard::create([
                    'name' => 'Facturation',
                    'parent_slug' => 'finances',
                    'slug' => 'invoices_dashboard',
                    'dash_id' => $dash2->id,
                    'app_id' => 2,
                    'is_enable' => true,
                ]);
                $invoices_dashboard->save();

            $dash3 = Dashboard::create([
                'name' => 'Logistiques',
                'slug' => 'logistics',
                'company_id' => $c->id,
                'is_enable' => true,
            ]);
            $dash3->save();

                // App Dashboards
                $purchases_dashboard = AppDashboard::create([
                    'name' => 'Achats',
                    'parent_slug' => 'logistics',
                    'slug' => 'purchases_dashboard',
                    'dash_id' => $dash3->id,
                    'app_id' => 4,
                    'is_enable' => true,
                ]);
                $purchases_dashboard->save();

                $vendors_dashboard = AppDashboard::create([
                    'name' => 'Fournisseurs',
                    'parent_slug' => 'logistics',
                    'slug' => 'suppliers_dashboard',
                    'dash_id' => $dash3->id,
                    'app_id' => 4,
                    'is_enable' => true,
                ]);
                $vendors_dashboard->save();

                $inventory_on_hand_dashboard = AppDashboard::create([
                    'name' => 'Inventaire disponible',
                    'parent_slug' => 'logistics',
                    'slug' => 'inventory_dashboard',
                    'dash_id' => $dash3->id,
                    'app_id' => 3,
                    'is_enable' => true,
                ]);
                $inventory_on_hand_dashboard->save();

                $inventory_on_hand_dashboard = AppDashboard::create([
                    'name' => 'Flux des stocks',
                    'parent_slug' => 'logistics',
                    'slug' => 'stock_flow_dashboard',
                    'dash_id' => $dash3->id,
                    'app_id' => 3,
                    'is_enable' => true,
                ]);
                $inventory_on_hand_dashboard->save();


            $dash4 = Dashboard::create([
                'name' => 'Services',
                'slug' => 'field_of_service',
                'company_id' => $c->id,
                'is_enable' => true,
            ]);
            $dash4->save();
                // App Dashboards
                $projects_dashboard = AppDashboard::create([
                    'name' => 'Projets',
                    'parent_slug' => 'field_of_service',
                    'slug' => 'projects_dashboard',
                    'dash_id' => $dash4->id,
                    'app_id' => 15,
                    'is_enable' => true,
                ]);
                $projects_dashboard->save();

                $timesheets_dashboard = AppDashboard::create([
                    'name' => 'Feuille de Temps',
                    'parent_slug' => 'field_of_service',
                    'slug' => 'timesheets_dashboard',
                    'dash_id' => $dash4->id,
                    'app_id' => 16,
                    'is_enable' => true,
                ]);
                $timesheets_dashboard->save();


            $dash5 = Dashboard::create([
                'name' => 'CRM',
                'slug' => 'crm',
                'company_id' => $c->id,
                'is_enable' => true,
            ]);
            $dash5->save();
                // App Dashboards
                //Leads
                $leads_dashboard = AppDashboard::create([
                    'name' => 'Leads',
                    'parent_slug' => 'crm',
                    'slug' => 'leads_dashboard',
                    'dash_id' => $dash5->id,
                    'app_id' => 7,
                    'is_enable' => true,
                ]);
                $leads_dashboard->save();
                //Pipeline
                $leads_dashboard = AppDashboard::create([
                    'name' => 'Pipeline',
                    'parent_slug' => 'crm',
                    'slug' => 'pipelines_dashboard',
                    'dash_id' => $dash5->id,
                    'app_id' => 7,
                    'is_enable' => true,
                ]);
                $leads_dashboard->save();


            $dash6 = Dashboard::create([
                'name' => 'Ressources Humaines',
                'slug' => 'human_resources',
                'company_id' => $c->id,
                'is_enable' => true,
            ]);
            $dash6->save();

            $dash7 = Dashboard::create([
                'name' => 'Site Internet',
                'slug' => 'website',
                'company_id' => $c->id,
                'is_enable' => true,
            ]);
            $dash7->save();
        }
        // $this->call("OthersTableSeeder");
    }
}
