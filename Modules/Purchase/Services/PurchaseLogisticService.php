<?php

namespace Modules\Purchase\Services;

use Modules\Inventory\Entities\Operation\OperationTransfer;
use Modules\Inventory\Entities\Operation\OperationTransferDetail;
use Modules\Inventory\Entities\Operation\OperationType;
use Modules\Inventory\Entities\Product;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;

class PurchaseLogisticService
{
    public function launchReception($purchase){

        if(module('inventory')){

            // Launch delivery operation
            $from = WarehouseLocation::isCompany(current_company()->id)->isType('supplier')->get()->first();
            $to = WarehouseLocation::isCompany(current_company()->id)->isType('view')->isName('WH')->first();
            $type = OperationType::isCompany(current_company()->id)->isType('receipt')->get()->first();

            $transfer = OperationTransfer::create([
                'company_id' => current_company()->id,
                'contact_id' => $purchase->supplier_id,
                'operation_type_id' => $type->id,
                'received_from' => $from->id,
                'in_direction_to' => $to->id,
                'schedule_date' => $purchase->expected_arrival_date,
                'effective_date' => $purchase->deadline_date,
                'source_document' => $purchase->reference,
                // 'responsible_id' => $purchase->responsible,
                'shipping_policy' => $purchase->shipping_policy,
                'note' => $purchase->note,
                'status' => 'ready',
            ]);
            $transfer->save();

            foreach ($purchase->purchaseDetails as $detail) {
                $transfer_details = OperationTransferDetail::create([
                    'company_id' => current_company()->id,
                    'product_id' => $detail->product_id,
                    'operation_transfer_id' => $transfer->id,
                    'product_name' => Product::find($detail->product_id)->product_name,
                    'demand' => $detail->quantity,
                    'quantity' => Product::find($detail->product_id)->product_quantity,
                    'schedule_date' => $purchase->schedule_date,
                    'deadline_date' => $purchase->deadline_date,
                ]);
                $transfer_details->save();
            }
        }
    }
}
