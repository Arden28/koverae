<?php

namespace Modules\Settings\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Settings\Entities\Setting;
use Modules\Settings\Entities\Currency;
use Illuminate\Support\Str;
class SettingsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        $currency_1 = Currency::create([
            'company_id'         => 1,
            'currency_name'      => 'Franc CFA',
            'code'               => Str::upper('FCFA'),
            'symbol'             => 'XAF',
            'thousand_separator' => '.',
            'decimal_separator'  => ',',
            // 'exchange_rate'      => 1
        ]);

        $currency_2 = Currency::create([
            'company_id'         => 2,
            'currency_name'      => 'Franc CFA',
            'code'               => Str::upper('FCFA'),
            'symbol'             => 'XAF',
            'thousand_separator' => '.',
            'decimal_separator'  => ',',
            // 'exchange_rate'      => 1
        ]);

        $setting_1 = Setting::create([
            'company_id'   => 1,
            'default_currency_id' => $currency_1->id,
            'default_currency_position' => 'suffix',
        ]);
        $setting_1->save();

        $setting_1 = Setting::create([
            'company_id'   => 2,
            'default_currency_id' => $currency_2->id,
            'default_currency_position' => 'suffix',
        ]);
        $setting_1->save();
    }
}
