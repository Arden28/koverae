<?php

namespace Modules\Employee\Database\factories;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\Job;
use Modules\Employee\Entities\JobType;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Job $job) {
            // Associate the job with a real company
            $company = Company::inRandomOrder(2, 80)->first();
            $job->company_id = $company->id;
            $job->save();

            // Associate the job with a real department
            $department = Department::inRandomOrder()->first();
            $job->department_id = $department->id;
            $job->save();

            // Associate the job with a real job_type
            $jobType = JobType::inRandomOrder()->first();
            $job->job_type_id = $jobType->id;
            $job->save();

            // Associate the employee with a real job
            $employees = Employee::inRandomOrder()->get();

            foreach($employees as $employee){
                $jobs = Job::inRandomOrder()->get();
                foreach($jobs as $job_e){
                    $employee->job_id = $job_e->id;
                    $employee->save();
                }
            }
        });
    }
}

