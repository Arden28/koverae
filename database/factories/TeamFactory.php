<?php

namespace Database\Factories;

use App\Models\Team\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Team\Team>
 */
class TeamFactory extends Factory
{
    protected $model = Team::class;

    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid,
            'user_id' => null,
            'is_active' => $this->faker->boolean(80), // 80% chance of being true
        ];
    }
}
