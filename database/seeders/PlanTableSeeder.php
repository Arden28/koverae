<?php

namespace Database\Seeders;

use Bpuig\Subby\Models\Plan;
use Bpuig\Subby\Models\PlanFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monthlyPlan1 = Plan::create([
            'tag' => 'standard',
            'name' => 'Standard',
            'description' => 'Pour une seule app, avec des utilisateurs illimités',
            'price' => 5000,
                'signup_fee' => 0.00,
                'invoice_period' => 1,
                'invoice_interval' => 'month',
                'trial_period' => 15,
                'trial_interval' => 'day',
                'grace_period' => 1,
                'grace_interval' => 'day',
                'tier' => 1,
                'currency' => 'XAF',
        ]);
        $monthlyPlan1->save();

        // Create multiple plan features at once
        $monthlyPlan1->features()->saveMany([

            new PlanFeature([
                'tag' => 'apps',
                'name' => 'Application',
                'description' => '1 app disponible',
                'value' =>1,
                'sort_order' => 1
            ]),

        ]);


        $annualPlan1 = Plan::create([
            'tag' => 'standard annual',
            'name' => 'Standard',
            'description' => '42000 FCFA par an (3500 FCFA par mois)',
            'price' => 42000,
                'signup_fee' => 0.00,
                'invoice_period' => 1,
                'invoice_interval' => 'year',
                'trial_period' => 15,
                'trial_interval' => 'day',
                'grace_period' => 1,
                'grace_interval' => 'day',
                'tier' => 1,
                'currency' => 'XAF',
        ]);
        $annualPlan1->save();

        // Create multiple plan features at once
        $annualPlan1->features()->saveMany([

            new PlanFeature([
                'tag' => 'apps',
                'name' => 'Application',
                'description' => '1 app disponible',
                'value' =>1,
                'sort_order' => 1
            ]),

        ]);


        $monthlyPlan2 = Plan::create([
            'tag' => 'spark',
            'name' => 'Spark',
            'description' => 'Toutes les apps disponibles',
            'price' => 20000,
                'signup_fee' => 0.00,
                'invoice_period' => 1,
                'invoice_interval' => 'month',
                'trial_period' => 15,
                'trial_interval' => 'day',
                'grace_period' => 1,
                'grace_interval' => 'day',
                'tier' => 1,
                'currency' => 'XAF',
        ]);
        $monthlyPlan2->save();

        // Create multiple plan features at once
        $monthlyPlan2->features()->saveMany([

            new PlanFeature([
                'tag' => 'apps',
                'name' => 'Applications',
                'description' => 'Toutes les apps disponibles',
                'value' =>true
            ]),

        ]);

        $annualPlan2 = Plan::create([
            'tag' => 'spark annual',
            'name' => 'Spark',
            'description' => '204000 FCFA par an (17000 FCFA par mois)',
            'price' => 204000,
                'signup_fee' => 0.00,
                'invoice_period' => 1,
                'invoice_interval' => 'year',
                'trial_period' => 15,
                'trial_interval' => 'day',
                'grace_period' => 1,
                'grace_interval' => 'day',
                'tier' => 1,
                'currency' => 'XAF',
        ]);
        $annualPlan2->save();

        // Create multiple plan features at once
        $annualPlan2->features()->saveMany([

            new PlanFeature([
                'tag' => 'apps',
                'name' => 'Applications',
                'description' => 'Toutes les apps disponibles',
                'value' =>true
            ]),

        ]);


        $monthlyPlan3 = Plan::create([
            'tag' => 'enterprise',
            'name' => 'Enterprise',
            'description' => '45000 FCFA par mois',
            'price' => 45000,
            'signup_fee' => 0.00,
            'invoice_period' => 1,
            'invoice_interval' => 'month',
            'trial_period' => 15,
            'trial_interval' => 'day',
            'grace_period' => 1,
            'grace_interval' => 'day',
            'tier' => 1,
            'currency' => 'XAF',
        ]);
        $monthlyPlan3->save();

        // Create multiple plan features at once
        $monthlyPlan3->features()->saveMany([

            // Plan 1 +
            new PlanFeature([

                'tag' => 'apps',
                'name' => 'Applications',
                'description' => 'Toutes les apps disponibles',
                'value' =>true
                ]),

            new PlanFeature([

                'tag' => 'companies',
                'name' => 'Entreprises',
                'description' => 'Pluri-entreprises',
                'value' =>true
                ]),

            new PlanFeature([

                'tag' => 'on premise',
                'name' => 'On premise',
                'description' => 'Koverae On premise',
                'value' =>true
                ]),
        ]);

        $annualPlan3 = Plan::create([
            'tag' => 'enterprise annual',
            'name' => 'Enterprise',
            'description' => '504000 FCFA par an (42000 FCFA par mois)',
            'price' => 504000,
                'signup_fee' => 0.00,
                'invoice_period' => 1,
                'invoice_interval' => 'year',
                'trial_period' => 15,
                'trial_interval' => 'day',
                'grace_period' => 1,
                'grace_interval' => 'day',
                'tier' => 1,
                'currency' => 'XAF',
        ]);
        $annualPlan3->save();


        // Create multiple plan features at once
        $annualPlan3->features()->saveMany([

            // Plan 1 +
            new PlanFeature([

                'tag' => 'apps',
                'name' => 'Applications',
                'description' => 'Toutes les apps disponibles',
                'value' =>true
                ]),

            new PlanFeature([

                'tag' => 'companies',
                'name' => 'Entreprises',
                'description' => 'Pluri-entreprises',
                'value' =>true
                ]),

            new PlanFeature([

                'tag' => 'on premise',
                'name' => 'On premise',
                'description' => 'Koverae On premise',
                'value' =>true
                ]),

        ]);

        }

}
