<?php

namespace Modules\Employee\Database\factories;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Employee\Entities\Workplace;

class WorkplaceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Workplace::class;

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
        return $this->afterCreating(function (Workplace $workplace) {
            // Associate the work$workplace with a real company
            $company = Company::inRandomOrder()->first();
            $workplace->company_id = $company->id;
            $workplace->save();
        });
    }
}

