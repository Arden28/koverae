<?php

namespace Modules\Sales\Services;

use Modules\Sales\Entities\Sale;

class SaleService{

    public function createSale(array $data)
    {
        return Sale::create($data);
    }

}
