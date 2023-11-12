<?php

namespace Modules\Employee\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\Job;
use Modules\Employee\Entities\JobType;
use Modules\Employee\Entities\Workplace;

class EmployeeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
        JobType::factory(5)->create();
        Workplace::factory(5)->create();
        Employee::factory(15)->create();
        Department::factory(3)->create();
        Job::factory(10)->create();
    }
}
