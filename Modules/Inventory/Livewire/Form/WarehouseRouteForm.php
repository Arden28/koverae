<?php

namespace Modules\Inventory\Livewire\Form;

use App\Livewire\Form\Input;
use App\Livewire\Form\Capsule;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Group;
use App\Livewire\Form\Template\LightWeightForm;
use Modules\Inventory\Entities\Warehouse\WarehouseRoute;

class WarehouseRouteForm extends LightWeightForm
{
    public $route;

    public $name, $product_category;
    public bool $product;
    public bool $warehouse;
    public bool $sale_order;
    public bool $packaging;
    public $updateMode = false;
    public $warehouses;

    public function mount($route = null){

        if($route){
            $this->name = $route->name;
            $this->product = $route->product;
            $this->product_category = $route->product_category;
            $this->warehouse = $route->warehouse;
            $this->sale_order = $route->sale_order;
            $this->packaging = $route->packaging;
            $this->updateMode = true;
            $this->warehouses = $route->warehouses;
        }

    }

    protected $rules = [
        'name' => 'required|string',
        'product' => 'boolean|required',
        'product_category' => 'boolean|required',
        'warehouse' => 'boolean|required',
        'sale_order' => 'boolean|required',
        'packaging' => 'boolean|required',
        // 'warehouses' => 'nullable',
    ];

    public function form() : string
    {
        if($this->updateMode == false){
            return 'store';
        }else{
            return '';
        }
    }

    public function actionBarButtons() : array
    {
        return  [
            ActionBarButton::make('new', 'Nouveau', 'new()'),
            ActionBarButton::make('store', 'Sauvegarder', $this->updateMode == false ? 'store' : "update"),
        ];
    }

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group, $placeholder = null, $help = null)
            Input::make('name', "Entrepôt", 'text', 'name', 'top-title', 'none', 'none', 'ex: Réception')->component('inputs.ke-title'),
            Input::make('warehouse', 'Entrepôts', 'checkbox', 'warehouse', 'left', 'none', 'applicable')->component('inputs.checkbox.simple'),
            Input::make('sale_order', 'Ligne de commande', 'checkbox', 'sale_order', 'left', 'none', 'applicable')->component('inputs.checkbox.simple'),
            Input::make('product', 'Produits', 'checkbox', 'product', 'right', 'none', 'applicable')->component('inputs.checkbox.simple'),
            Input::make('packaging', 'Emballages', 'checkbox', 'packaging', 'right', 'none', 'applicable')->component('inputs.checkbox.simple'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs = null)
            Group::make('applicable',"Appliccable sur")->component('tabs.group.large'),
            Group::make('rule',"Règles")->component('tabs.group.large-table'),
            // Group::make('return',"Retours", 'general'),
        ];
    }

    public function capsules() : array
    {
        return [
            //
        ];
    }

    public function store(){
        $this->validate();

        $route = WarehouseRoute::create([
            'company_id' => current_company()->id,
            'name' => $this->name,
            'warehouse' => $this->warehouse,
            'product' => $this->product,
            'sale_order' => $this->sale_order,
            'packaging' => $this->packaging,
            'product_category' => $this->product_category,
            'warehouses' => $this->warehouses,
        ]);
        $route->save();

        return redirect()->route('inventory.warehouses.routes.show', ['route' => $route->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);

    }

    public function update(){
        $this->validate();

        $route = WarehouseRoute::find($this->route->id);

        $route->update([
            'name' => $this->name,
            'warehouse' => $this->warehouse,
            'product' => $this->product,
            'sale_order' => $this->sale_order,
            'packaging' => $this->packaging,
            'product_category' => $this->product_category,
            'warehouses' => $this->warehouses,
        ]);
        $route->save();

        // return $this->redirect(route('inventory.warehouses.show', ['type' => $type->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]), navigate:true);
    }
}
