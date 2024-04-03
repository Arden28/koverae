<?php

namespace Modules\Settings\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Settings\Entities\Setting;
use Modules\Settings\Entities\System\SystemParameter;
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

        // $currencies = [
        //     // Devises d'Afrique Centrale
        //     ['currency_name' => 'Franc CFA d’Afrique Centrale', 'code' => 'XAF', 'symbol' => 'FCFA', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix', 'exchange_rate' => 583.00],
        //     ['currency_name' => 'Franc CFA d’Afrique de l’Ouest', 'code' => 'XOF', 'symbol' => 'FCFA', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix', 'exchange_rate' => 583.00],
        //     ['currency_name' => 'Franc Congolais', 'code' => 'CDF', 'symbol' => 'FC', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix', 'exchange_rate' => 2000.00],
        //     ['currency_name' => 'Kwanza Angolais', 'code' => 'AOA', 'symbol' => 'Kz', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix', 'exchange_rate' => 650.00],
        //     ['currency_name' => 'Franc Camerounais', 'code' => 'XAF', 'symbol' => 'FCFA', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix', 'exchange_rate' => 583.00],

        //     // African Currencies
        //     ['currency_name' => 'Nigerian Naira', 'code' => 'NGN', 'symbol' => '₦', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix', 'exchange_rate' => 411.57],
        //     ['currency_name' => 'Rand sud-africain', 'code' => 'ZAR', 'symbol' => 'R', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix', 'exchange_rate' => 14.87],
        //     // Asian Currencies
        //     ['currency_name' => 'Yen japonais', 'code' => 'JPY', 'symbol' => '¥', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix', 'exchange_rate' => 110.27],
        //     ['currency_name' => 'Roupie indien', 'code' => 'INR', 'symbol' => '₹', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix', 'exchange_rate' => 74.33],
        //     // European Currencies
        //     ['currency_name' => 'Euro', 'code' => 'EUR', 'symbol' => '€', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix', 'exchange_rate' => 0.85],
        //     ['currency_name' => 'Livre sterling', 'code' => 'GBP', 'symbol' => '£', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix', 'exchange_rate' => 0.75],
        //     // American Currencies
        //     ['currency_name' => 'Dollars américain', 'code' => 'USD', 'symbol' => '$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix', 'exchange_rate' => 1],
        //     ['currency_name' => 'Dollar canadien', 'code' => 'CAD', 'symbol' => '$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix', 'exchange_rate' => 1.25],
        //     // Add more currencies as needed
        // ];

        // foreach ($currencies as $currency) {
        //     Currency::create($currency);
        // }


        //Settings
        $system_parameter = SystemParameter::create([
            'company_id' => 1,
            'database_create_date' => now(),
            'database_expiration_date' => now()->addDays(8),
        ]);
        $system_parameter->save();

        $setting = Setting::create([
            'company_id'   => 1,
            'default_currency_id' => 1,
            'default_currency_position' => 'suffix',
        ]);
        $setting->save();
    }
}
