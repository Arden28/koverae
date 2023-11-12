<?php

namespace Database\Seeders;

use App\Models\Company\Company;
use App\Models\Team\Team;
use App\Models\User;
use Bpuig\Subby\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $code = Uuid::uuid4();

        // Create team
        $team = Team::create([
            'uuid' => $code,
        ]);

        $user = User::create([
            'name' => 'Arden BOUET',
            'email' => 'laudbouetoumoussa@koverae.com',
            'phone' => '+242064074926',
            'password' => Hash::make('koverae'),
            'is_active' => 1,
            'current_company_id' => 1,
            'email_verified_at' => now(),
            'phone_verified_at' => now(),
        ]);

        $superAdmin = 'Super Admin';

        $user->assignRole($superAdmin);

        // Update user's team
        $user->team_id = $team->id;
        $user->save();

        // Update user_id's team
        $team->user_id = $user->id;
        $team->save();

        // Create the Team's companies

        $name = 'Kusa SA';
        $company_1 = Company::create([
            'user_id' => $user->id,
            'name' => $name,
            'reference' => 'KS',
            'personal_company' => true,
            'domain_name' => Str::slug($name),
            'enabled' => 1,
            'email' => 'contact@kusa.cg',
            'phone' => +242067250015,
            'phone_2' => +242055690216,
            'address' => '503 Blvrd Denis Sassou Nguesso',
            'city' => 'Brazzaville',
            'country' => 'Republique of the Congo',
            'domain' => 'other',
            'size' => 'small',
            'primary_interest' => 'manage_my_business',
            // 'default_currency' => ,
        ]);
        $company_1->save();

        $name_2 = "Banéo";
        $company_2 = Company::create([
            'user_id' => $user->id,
            'name' => $name_2,
            'reference' => 'BN',
            'personal_company' => true,
            'domain_name' => Str::slug($name_2),
            'enabled' => 1,
            'email' => 'contact@baneo.cg',
            'phone' => +242067157654,
            'phone_2' => +242059654327,
            'address' => '23 rue Albert Matsimou | Mayanga',
            'city' => 'Brazzaville',
            'country' => 'Republique of the Congo',
            'domain' => 'other',
            'size' => 'small',
            'primary_interest' => 'manage_my_business',
        ]);
        $company_2->save();

        // Subscription

        $plan = Plan::find(3);

        $team->newSubscription(
            'main', // identifier tag of the subscription. If your application offers a single subscription, you might call this 'main' or 'primary'
            $plan, // Plan or PlanCombination instance your subscriber is subscribing to
            $plan->name, // Human-readable name for your subscription
            $plan->description, // Description
            null, // Start date for the subscription, defaults to now()
            'credit_card' // Payment method service defined in config
        );


    }
}
