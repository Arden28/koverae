<?php

namespace Modules\Inventory\Livewire\Form;

use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Capsule;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Template\LightWeightForm;
use Modules\Inventory\Entities\Warehouse\Warehouse;
use Modules\Inventory\Traits\WarehouseTrait;

class WarehouseForm extends LightWeightForm
{
    use WarehouseTrait;

    public $warehouse;

    public $name, $address, $short_name, $updateMode = false, $routes;

    public function mount($warehouse = null){

        if($warehouse){
            $this->name = $warehouse->name;
            $this->short_name = $warehouse->short_name;
            $this->address = $warehouse->address;
            $this->updateMode = true;
            $this->routes = $warehouse->routes;
        }

    }

    protected $rules = [
        'name' => 'required|string',
        'short_name' => 'required|string|max:5',
        'address' => 'required|string',
    ];

    public function form() : string
    {
        if($this->updateMode == false){
            return 'storeWarehouse';
        }else{
            return '';
        }
    }

    public function actionBarButtons() : array
    {
        return  [
            ActionBarButton::make('new', 'Nouveau', 'new()'),
            ActionBarButton::make('storeWarehouse', 'Sauvegarder', $this->updateMode == false ? 'store' : "update"),
        ];
    }

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group, $placeholder = null, $help = null)
            Input::make('name', "Entrepôt", 'text', 'name', 'top-title', 'none', 'none', 'ex: Réception')->component('inputs.ke-title'),
            Input::make('short_name', 'Nom court', 'text', 'short_name', 'left', 'none', 'none'),
            Input::make('address','Adresse', 'text', 'address', 'right', 'none', 'none'),
        ];
    }

    // public function groups() : array
    // {
    //     return  [
    //         //
    //     ];
    // }

    public function capsules() : array
    {
        return [
            Capsule::make('routes', 'Route(s)', 'Les ventes générées via le devis.')->component('capsules.warehouse.routes'),
        ];
    }

    public function store(){
        $this->validate();

        $data = [
            'company_id' => current_company()->id,
            'name' => $this->name,
            'short_name' => $this->short_name,
            'address' => $this->address,
        ];

        $warehouse = $this->storeWarehouse($data);

        return redirect()->route('inventory.warehouses.show', ['warehouse' => $warehouse->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);

    }

    public function update(){
        $this->validate();

        $warehouse = Warehouse::find($this->warehouse->id);

        $warehouse->update([
            'name' => $this->name,
            'short_name' => $this->short_name,
            'address' => $this->address,
        ]);
        $warehouse->save();

        // return $this->redirect(route('inventory.warehouses.show', ['type' => $type->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]), navigate:true);
    }
}
