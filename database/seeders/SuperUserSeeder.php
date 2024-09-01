<?php

namespace Database\Seeders;

use App\Models\Company\Company;
use App\Models\Module\InstalledModule;
use App\Models\Team\Team;
use App\Models\User;
use Bpuig\Subby\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Modules\App\Handlers\AppManagerHandler;
use Modules\App\Services\AppInstallationService;
use Modules\Settings\Entities\Setting;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $installationService = new AppInstallationService();

        $code = Uuid::uuid4();

        // Create team
        $team = Team::create([
            'uuid' => $code,
        ]);

        $user = User::create([
            'name' => 'Arden BOUET',
            'email' => 'laudbouetoumoussa@gmail.com',
            'phone' => '+2540745908026',
            'password' => Hash::make('koverae'),
            'is_active' => 1,
            'current_company_id' => 1,
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

        $name = 'Koverae';
        $company_1 = Company::create([
            'team_id' => $team->id,
            'owner_id' => $user->id,
            'name' => $name,
            'reference' => 'KOV',
            'personal_company' => true,
            'domain_name' => "central",
            'website_url' => "central.".env('APP_DOMAIN'),
            'enabled' => 1,
            'email' => 'contact@koverae.com',
            'phone' => +242065996406,
            'address' => 'Parklands Rd',
            'city' => 'Nairobi',
            'country' => 'Republic of Kenya',
            'industry' => 'software',
            'size' => 'small',
            'primary_interest' => 'manage_my_business',
            'default_currency' => 'KES',
        ]);
        $company_1->save();

        $user->update([
            'company_id' => $company_1->id,
            'current_company_id' => $company_1->id
        ]);
        $user->save();


        // Install Modules
        $installationService->installBasicApp($company_1->id);
        $installationService->installBasicAppData($company_1->id);
        // $installApp = new AppManagerHandler;
        // $installApp->install($company_1->id, $user->id);

    }
}
