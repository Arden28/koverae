<?php

namespace Modules\Inventory\Services;

use Modules\Inventory\Entities\History\InventoryMove;

class LogisticService{

    public function recordStockMove($transfer){

        foreach($transfer->details as $detail)
        InventoryMove::create([
            'company_id' => current_company()->id,
            'product_id' => $detail->product_id,
            'reference' => $transfer->reference,
            'date' => now(),
            // 'source_location_id' => ,
            // 'destination_location_id' => ,
            // 'quantity' => ,
            // 'uom_id' => ,
            // 'responsible_id' => ,
            // 'source_document' => ,

        ]);
    }
}
