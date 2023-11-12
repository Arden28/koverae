<?php

namespace Modules\Dashboards\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Dashboards\Entities\Dashboard;

class DashboardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dashboard::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}

