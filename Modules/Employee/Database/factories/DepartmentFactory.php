<?php

namespace Modules\Employee\Database\factories;

use App\Models\Company\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Employee;

class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => null, // You can customize this
            'name' => $this->faker->word,
            'parent_id' => null, // You can customize this
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Department $department) {

            // Associate the department with a real company
            $company = Company::inRandomOrder()->first();
            $department->company_id = $company->id;
            $department->save();

            // Create a department for the employee
            $employee = Employee::inRandomOrder()->first();
            $department->head_id = $employee->id;
            $department->save();

            // Associate the employee with a real job
            $employees = Employee::inRandomOrder()->get();

            foreach($employees as $employee){
                $departments = Department::inRandomOrder()->get();
                foreach($departments as $department_e){
                    $employee->department_id = $department_e->id;
                    $employee->save();
                }
            }
        });
    }
}

