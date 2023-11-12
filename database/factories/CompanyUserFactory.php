<?php

namespace Database\Factories;

use App\Models\Company\Company;
use App\Models\Team\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyUserFactory extends Factory
{
    protected $model = CompanyUser::class;

    public function definition()
    {
        return [
            'company_id' => function () {
                return Company::inRandomOrder()->value('id');
            },
            'user_id' => function () {
                return User::inRandomOrder()->value('id');
            },
            'team_id' => Team::inRandomOrder()->value('id'),
            'role' => $this->faker->randomElement(['Admin', 'Manager', 'Employee']),
        ];
    }
}
