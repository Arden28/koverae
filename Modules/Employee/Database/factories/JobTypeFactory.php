<?php

namespace Modules\Employee\Database\factories;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Employee\Entities\JobType;

class JobTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (JobType $jobType) {
            // Associate the jobType with a real company
            $company = Company::inRandomOrder()->first();
            $jobType->company_id = $company->id;
            $jobType->save();
        });
    }
}

