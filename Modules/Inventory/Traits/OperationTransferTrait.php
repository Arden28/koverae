<?php

namespace Modules\Inventory\Traits;

use Modules\Inventory\Entities\Operation\OperationTransfer;
use Modules\Inventory\Entities\Warehouse\Warehouse;

trait OperationTransferTrait{
    public function storeOperattionTransfer($data, $details)
    {
        $transfer = OperationTransfer::create($data);

        return $transfer;
    }
}
