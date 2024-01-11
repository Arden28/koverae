<?php

namespace Modules\Inventory\Livewire\Form;

use App\Livewire\Form\Input;
use App\Livewire\Form\Capsule;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Group;
use App\Livewire\Form\Template\LightWeightForm;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;

class LocationForm extends LightWeightForm
{
    public $location;

    public $name, $parent, $type, $barcode, $frequency, $note, $last_effective_inventory = 0, $last_effective_inventory_date, $next_planned_inventory = 0, $next_planned_inventory_date;

    public bool $is_scrap = false, $is_backorder = false, $is_replenish = false;

    public bool $updateMode = false;

    public function mount($location = null){

        if($location){
            $this->name = $location->name;
            $this->type = $location->type;
            $this->barcode = $location->barcode;
            $this->parent = $location->parent_id;
            $this->frequency = $location->inventory_frequency;
            $this->note = $location->note;
            $this->is_scrap = $location->is_scrap;
            $this->is_backorder = $location->is_backorder;
            $this->is_replenish = $location->is_replenish;
            $this->updateMode = true;
        }else{
            $this->type = 'internal';
            $this->frequency = 0;
        }

    }

    protected $rules = [
        'name' => 'required|string',
        'type' => 'string|required',
        'parent' => 'integer|nullable',
        'frequency' => 'integer|nullable',
        'note' => 'string|nullable',
        'is_scrap' => 'boolean|nullable',
        'is_backorder' => 'boolean|nullable',
        'is_replenish' => 'boolean|nullable',
        // 'warehouses' => 'nullable',
    ];

    public function form() : string
    {
        if($this->updateMode == false){
            return 'store';
        }else{
            return 'update';
        }
    }

    public function actionBarButtons() : array
    {
        return  [
            ActionBarButton::make('new', 'Nouveau', 'new()'),
            ActionBarButton::make('store', 'Sauvegarder', $this->updateMode == false ? 'store' : "update"),
        ];
    }

    public function capsules() : array
    {
        return [
            Capsule::make('putaway_rules', 'Stratégies de rangement', "Les stratégies de rangements de l'emplacement.")->component('capsules.warehouse.location.putaway-rules'),
        ];
    }

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group, $placeholder = null, $help = null)
            Input::make('name', "Nom de l'emplacement", 'text', 'name', 'top-title', 'none', 'none', 'par ex: Stock de réserve')->component('inputs.location.ke-title'),
            Input::make('type', "Type d'emplacement", 'select', 'type', 'left', 'none', 'informations')->component('inputs.select.location.type'),
            Input::make('is_scrap', 'Rébuts ? ', 'checkbox', 'is_scrap', 'left', 'none', 'informations')->component('inputs.checkbox.simple'),
            Input::make('is_backorder', 'Retours ?', 'checkbox', 'is_backorder', 'left', 'none', 'informations')->component('inputs.checkbox.simple'),
            Input::make('is_replenish', 'Réassort ?', 'checkbox', 'is_replenish', 'left', 'none', 'informations')->component('inputs.checkbox.simple'),
            Input::make('barcode', "Code à barres", 'text', 'barcode', 'left', 'none', 'informations'),
            Input::make('note', "Note", 'text', 'note', 'left', 'none', 'informations', "Note externe")->component('inputs.textarea.note'),
            //
            Input::make('frequency', "Fréquence de l'inventaire (Jours)", 'text', 'frequency', 'left', 'none', 'counting'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs = null)
            Group::make('informations',"Informations supplémentaires")->component('tabs.group.large-middle'),
            Group::make('counting',"Comptage périodique")->component('tabs.group.large-middle'),
            // Group::make('rule',"Règles")->component('tabs.group.large-table'),
            // Group::make('return',"Retours", 'general'),
        ];
    }

    public function store(){
        $this->validate();

        $location = WarehouseLocation::create([
            'company_id' => current_company()->id,
            'name' => $this->name,
            'type' => $this->type,
            'parent_id' => $this->parent,
            'inventory_frequency' => $this->frequency,
            'is_scrap' => $this->is_scrap,
            'is_backorder' => $this->is_backorder,
            'is_replenish' => $this->is_replenish,
            'note' => $this->note,
            'last_effective_inventory' => $this->last_effective_inventory,
            'last_effective_inventory_date' => $this->last_effective_inventory_date,
            'next_planned_inventory' => $this->next_planned_inventory,
            'next_planned_inventory_date' => $this->next_planned_inventory_date,
        ]);

        $location->save();

        return redirect()->route('inventory.locations.show', ['location' => $location->id, 'subdomain' => current_company()->domain_name]);

    }

    public function update(){
        $this->validate();

        $location = $this->location;

        $location->update([
            'name' => $this->name,
            'type' => $this->type,
            'parent_id' => $this->parent,
            'inventory_frequency' => $this->frequency,
            'is_scrap' => $this->is_scrap,
            'is_backorder' => $this->is_backorder,
            'is_replenish' => $this->is_replenish,
            'note' => $this->note,
            'last_effective_inventory' => $this->last_effective_inventory,
            'last_effective_inventory_date' => $this->last_effective_inventory_date,
            'next_planned_inventory' => $this->next_planned_inventory,
            'next_planned_inventory_date' => $this->next_planned_inventory_date,
        ]);
        // dd($this->location);
        $location->save();

        return redirect()->route('inventory.locations.show', ['location' => $location->id, 'subdomain' => current_company()->domain_name]);

    }

}
