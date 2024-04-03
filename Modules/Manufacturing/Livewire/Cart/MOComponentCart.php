<?php

namespace Modules\Manufacturing\Livewire\Cart;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Inventory\Entities\Product;
use Modules\Inventory\Entities\UoM\UnitOfMeasureCategory;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;
use Modules\Manufacturing\Entities\BOM\BillOfMaterial;

class MOComponentCart extends Component
{
    public $order;
    public $inputs = [];

    public $i = 1;
    public $cart_instance;
    public $test= 'hello';

    public function mount($cartInstance, $order = null){
        $this->cart_instance = $cartInstance;
        if($order){
            $this->order = $order;
            if(count($order->components) >= 1){
                foreach($order->components as $component){
                    $this->inputs[] = ['key' => $component->bom_id, 'product' => $component->product_id, 'location' => $component->source_location_id, 'quantity' => $component->quantity, 'uom' => 'Unité(s)'];
                }
                $this->dispatch('manufacturing-cart', inputs: $this->inputs);
            }
        }
    }

    // Add a new product in cart
    public function add($i)
    {
        // $i++;
        // array_push($this->inputs, $this->i);
        $location_from = WarehouseLocation::isCompany(current_company()->id)->isType('internal')->first();
        $this->inputs[] = ['key' => $i, 'product' => '', 'location' => $location_from->id, 'quantity' => 0, 'uom' => 'Unité(s)' ];
        $this->dispatch('manufacturing-cart', inputs: $this->inputs);
    }

    // Remove a product in cart
    public function remove($i)
    {
        unset($this->inputs[$i]);
        $this->inputs = array_values($this->inputs); // Reindex the array
        $this->dispatch('manufacturing-cart', inputs: $this->inputs);
    }

    public function render()
    {
        $products = Product::isCompany(current_company()->id)->get();
        $locations = WarehouseLocation::isCompany(current_company()->id)->get();
        return view('manufacturing::livewire.cart.m-o-component-cart', compact('products', 'locations'));
    }

    #[On('add-bom-component')]
    public function addBomComponent($value){
        if($value){
            $bom = BillOfMaterial::find($value)->first();
            $this->test = count($bom->components);
            $components = $bom->components;
            // Location
            $location_from = WarehouseLocation::isCompany(current_company()->id)->isType('internal')->first();
            if(count($components) >= 1){
                foreach($components as $component){
                    $this->inputs[] = ['key' => $component->bom_id, 'product' => $component->product_id, 'location' => $location_from->id, 'quantity' => $component->quantity, 'uom' => $component->uom->name, 'uom_id' => $component->uom->id];
                }
                $this->dispatch('manufacturing-cart', inputs: $this->inputs);
            }
        }
        // else{
        //     unset($this->inputs[$i]);
        //     $this->inputs = array_values($this->inputs); // Reindex the array
        //     $this->dispatch('manufacturing-cart', inputs: $this->inputs);
        // }
    }

    public function updated(){
        $this->dispatch('manufacturing-cart', inputs: $this->inputs);
    }

}
