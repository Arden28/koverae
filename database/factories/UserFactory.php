<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'team_id' => null,
            'current_company_id' => 0,
            'current_pos_id' => 0,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->unique()->phoneNumber,
            'email_verified_at' => now(),
            'phone_verified_at' => now(),
            'password' => Hash::make('koverae'), // Default password is 'password'
            'is_active' => 1,
            'remember_token' => Str::random(10),
            'last_logged_in_at' => now(),
            'locale' => config('app.locale'),
        ];
    }
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
