<?php

namespace Modules\Manufacturing\Livewire\Cart;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Inventory\Entities\Product;
use Modules\Inventory\Entities\UoM\UnitOfMeasure;
use Modules\Inventory\Entities\UoM\UnitOfMeasureCategory;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;
use Modules\Manufacturing\Entities\BOM\BillOfMaterial;

class BomComponentCart extends Component
{
    public $bom;
    public $inputs = [];

    public $i = 1;
    public $cart_instance;
    public $test= 'hello';

    public function mount($cartInstance, $bom = null){
        $this->cart_instance = $cartInstance;
        if($bom){
            $this->bom = $bom;
            if(count($bom->components) >= 1){
                foreach($bom->components as $component){
                    $this->inputs[] = ['key' => $component->bom_id, 'product' => $component->product_id, 'quantity' => $component->quantity, 'uom' => $component->uom_id];
                }
                $this->dispatch('bom-cart', inputs: $this->inputs);
            }
        }
    }

    // Add a new product in cart
    public function add($i)
    {
        // $i++;
        // array_push($this->inputs, $this->i);
        $location_from = WarehouseLocation::isCompany(current_company()->id)->isType('internal')->first();
        $uom = UnitOfMeasure::isCompany(current_company()->id)->first();
        $this->inputs[] = ['key' => $i, 'product' => '', 'quantity' => 1.00, 'uom' => $uom->id];
        $this->dispatch('bom-cart', inputs: $this->inputs);
    }

    // Remove a product in cart
    public function remove($i)
    {
        unset($this->inputs[$i]);
        $this->inputs = array_values($this->inputs); // Reindex the array
        $this->dispatch('bom-cart', inputs: $this->inputs);
    }
    public function render()
    {
        $products = Product::isCompany(current_company()->id)->get();
        $locations = WarehouseLocation::isCompany(current_company()->id)->get();
        $uoms = UnitOfMeasure::isCompany(current_company()->id)->get();
        return view('manufacturing::livewire.cart.bom-component-cart', compact('products', 'locations', 'uoms'));
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
                    $this->inputs[] = ['key' => $component->bom_id, 'product' => $component->product_id, 'location' => $location_from->id, 'quantity' => $component->quantity, 'uom' => $component->uom_id];
                }
                $this->dispatch('bom-cart', inputs: $this->inputs);
            }
        }
        // else{
        //     unset($this->inputs[$i]);
        //     $this->inputs = array_values($this->inputs); // Reindex the array
        //     $this->dispatch('bom-cart', inputs: $this->inputs);
        // }
    }

    public function updated(){
        $this->dispatch('bom-cart', inputs: $this->inputs);
    }
}
