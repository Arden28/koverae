<?php

namespace Modules\Inventory\Traits;

use Modules\Inventory\Entities\Warehouse\Warehouse;

trait WarehouseTrait{
    public function storeWarehouse($data)
    {
        $warehouse = Warehouse::create($data);

        return $warehouse;
    }
}
