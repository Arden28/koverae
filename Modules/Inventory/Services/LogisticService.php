<?php

namespace Modules\Inventory\Services;

use Modules\Inventory\Entities\History\InventoryMove;
use Modules\Inventory\Entities\Operation\OperationTransfer;
use Modules\Inventory\Entities\Operation\OperationTransferDetail;
use Modules\Inventory\Entities\Operation\OperationType;
use Modules\Inventory\Entities\Product;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;

class LogisticService{

    public function recordStockMove($transfer){

        foreach($transfer->details as $detail){
            InventoryMove::create([
                'company_id' => current_company()->id,
                'operation_transfer_id' => $transfer->id,
                'product_id' => $detail->product_id,
                'reference' => $transfer->reference,
                'date' => now(),
                'source_location_id' => $transfer->received_from,
                'destination_location_id' => $transfer->in_direction_to,
                'quantity' => $detail->quantity,
                'demand' => $detail->demand,
                'uom_id' => $detail->product->uom_id,
                'responsible_id' => $transfer->responsible_id,
                'source_document' => $transfer->reference,
                'status' => 'draft'

            ]);
        }
    }

    public function recordStockMoveOnAdjustment($product, $quantity){

        InventoryMove::create([
            'company_id' => current_company()->id,
            'product_id' => $product->id,
            'reference' => __('Quantité de produit mise à jour'),
            'date' => now(),
            // 'source_location_id' => ,
            // 'destination_location_id' => ,
            'quantity' => $quantity,
            'demand' => $quantity,
            'uom_id' => $product->uom_id,
            // 'responsible_id' => ,
            'source_document' => $product->product_name,

        ]);
    }
    public function launchReception($purchase){

        if(module('inventory')){

            // Launch reception operation
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

            $this->recordStockMove($transfer);
        }
    }

    public function launchDelivery($sale){
        if(module('sales')){

            // Launch delivery operation
            $from = WarehouseLocation::isCompany(current_company()->id)->isType('internal')->first();
            $to = WarehouseLocation::isCompany(current_company()->id)->isType('customer')->first();
            $type = OperationType::isCompany(current_company()->id)->isType('delivery')->first();

            $transfer = OperationTransfer::create([
                'company_id' => current_company()->id,
                'contact_id' => $sale->customer_id,
                'operation_type_id' => $type->id,
                'received_from' => $from->id,
                'in_direction_to' => $to->id,
                'schedule_date' => $sale->shipping_date,
                'effective_date' => $sale->shipping_date,
                'source_document' => $sale->reference,
                // 'responsible_id' => $sale->responsible,
                'shipping_policy' => $sale->shipping_policy,
                'note' => $sale->note,
                'status' => 'ready',
            ]);
            $transfer->save();

            foreach ($sale->saleDetails as $detail) {
                $transfer_details = OperationTransferDetail::create([
                    'company_id' => current_company()->id,
                    'product_id' => $detail->product_id,
                    'operation_transfer_id' => $transfer->id,
                    'product_name' => Product::find($detail->product_id)->product_name,
                    'demand' => $detail->quantity,
                    'quantity' => Product::find($detail->product_id)->product_quantity,
                    'schedule_date' => $sale->shipping_date,
                    'deadline_date' => $sale->shipping_date,
                ]);
                $transfer_details->save();
            }

            $this->recordStockMove($transfer);

        }
    }

}