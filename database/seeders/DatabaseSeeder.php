<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Team\Team;
use Illuminate\Database\Seeder;
use Modules\App\Database\Seeders\AppDatabaseSeeder;
use Modules\Dashboards\Database\Seeders\DashboardsDatabaseSeeder;
use Modules\Employee\Database\Seeders\EmployeeDatabaseSeeder;
use Modules\User\Database\Seeders\PermissionsTableSeeder;
use Modules\Inventory\Database\Seeders\InventoryDatabaseSeeder;
use Modules\Settings\Database\Seeders\SettingsDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(PlanTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(AppDatabaseSeeder::class);
        $this->call(SuperUserSeeder::class);
        // $this->call(SettingsDatabaseSeeder::class);
        // $this->call(DashboardsDatabaseSeeder::class);
        // $this->call(EmployeeDatabaseSeeder::class);
        // $this->call(InventoryDatabaseSeeder::class);
    }
}
