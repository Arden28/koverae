<?php

namespace Modules\Inventory\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Inventory\Entities\Category;
use Modules\Inventory\Entities\Product;

class InventoryDatabaseSeeder extends Seeder
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
        Category::factory(1)->create();
        Product::factory(5)->create();
    }
}
