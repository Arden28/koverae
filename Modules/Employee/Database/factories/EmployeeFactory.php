<?php

namespace Modules\Employee\Database\factories;

use App\Models\Company\Company;
use App\Models\Team\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\Workplace;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    public function definition()
    {
        $country = $this->faker->country; // Generate a random country
        $city = $this->faker->unique()->city; // Generate a unique city within the country

        return [
            'date_of_hire' => $this->faker->date,
            // 'position' => $this->faker->jobTitle,
            'department_id' => null,
            'manager_id' => null,
            // Personal
            'street' => $this->faker->streetAddress,
            'street2' => $this->faker->secondaryAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'personal_email' => $this->faker->unique()->safeEmail,
            'personal_phone' => $this->faker->phoneNumber,
            'bank_account_id' => null, // Customize this as needed
            'language' => config('app.locale'),
            // Educational
            'certificate_level' => $this->faker->randomElement(['diploma', 'bachelor', 'master', 'phd', 'others']),
            'study_field' => $this->faker->word, // Replace with a more specific field if desired
            'school_study' => $this->faker->company,
            // Citizeship
            'nationality' => $country, // Use the same country for nationality
            'national_id' => $this->faker->ean13,
            'passport_no' => $this->faker->randomNumber(8),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'birthday' => $this->faker->date(),
            'birth_place' => "{$city}, {$country}", // Combine city and country
            'birth_country' => $country,
            'is_resident' => $this->faker->boolean(80),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Employee $employee) {
            // Associate the employee with a real company
            $company = Company::inRandomOrder()->first();
            $employee->company_id = $company->id;
            $employee->save();

            // Create a user for the employee
            $user = User::factory()->create();
            $employee->user_id = $user->id;
            $employee->save();

            // Associate the employee with a work address
            $employee->work_address = $company->address;
            $employee->save();

            // Associate the employee with a workplace
            $workplace = Workplace::inRandomOrder()->first();
            $employee->workplace_id = $workplace->id;
            $employee->save();
        });
    }
}

