<?php

namespace Modules\Inventory\Livewire\Form;

use App\Livewire\Form\Template\SimpleForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use Modules\Inventory\Entities\Operation\OperationType;
use Modules\Inventory\Entities\Warehouse\Warehouse;

class OperationTypeForm extends SimpleForm
{
    public $type;

    public $name, $operation_type, $prefix, $warehouse, $updateMode = false;

    public function mount($type = null){
        if($type){
            $this->name = $type->name;
            $this->operation_type = $type->operation_type;
            $this->prefix = $type->prefix;
            $this->updateMode = true;
        }else{
            $this->warehouse = Warehouse::isCompany(current_company()->id)->first()->id;
        }

    }

    protected $rules = [
        'name' => 'required|string',
        'operation_type' => 'required|string',
        'prefix' => 'required|string|max:5',
    ];

    public function form() : string
    {
        if($this->updateMode == false){
            return 'store';
        }else{
            return '';
        }
    }

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group, $placeholder = null, $help = null)
            Input::make('name', "Type d'opération", 'text', 'name', 'top-title', 'none', 'none', 'ex: Réception')->component('inputs.ke-title'),
            Input::make('operation_type',"Type", 'select', 'operation_type', 'left', 'general', 'general_info')->component('inputs.select.operations.type'),
            Input::make('sequence_prefix','Préfix', 'text', 'prefix', 'left', 'general', 'general_info'),
            Input::make('default_origin',"Emplacement d'origine par défaut", 'select', 'default_origin', 'left', 'general', 'locations')->component('inputs.select.operations.default_from'),
            Input::make('default_destination',"Emplacement de destination par défaut", 'select', 'default_destination', 'left', 'general', 'locations')->component('inputs.select.operations.default_from'),
        ];
    }

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('general','Général'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs = null)
            Group::make('general_info',"Informations Générales", 'general')->component('tabs.group.light'),
            Group::make('locations',"Emplacements", 'general')->component('tabs.group.large-middle'),
            // Group::make('return',"Retours", 'general'),
        ];
    }

    public function actionBarButtons() : array
    {
        return  [
            ActionBarButton::make('new', 'Nouveau', 'new()'),
            ActionBarButton::make('storeTeam', 'Sauvegarder', $this->updateMode == false ? 'store' : "update"),
        ];
    }

    public function statusBarButtons() : array
    {
        return [

        ];
    }

    public function capsules() : array
    {
        return [

        ];
    }

    public function actionButtons() : array
    {
        return [

        ];
    }

    public function new(){
        return $this->redirect(route('inventory.operation-types.create', ['subdomain' => current_company()->domain_name]), navigate:true);
    }

    public function store(){
        $this->validate();

        $operationType = OperationType::create([
            'company_id' => current_company()->id,
            'warehouse_id' => $this->warehouse,
            'name' => $this->name,
            'operation_type' => $this->operation_type,
            'prefix' => $this->prefix,
        ]);
        $operationType->save();

        return $this->redirect(route('inventory.operation-types.show', ['type' => $operationType->id, 'subdomain' => current_company()->domain_name]), navigate:true);

    }

    public function update(){
        $this->validate();

        $type = OperationType::find($this->type->id);

        $type->update([
            'company_id' => current_company()->id,
            'name' => $this->name,
            'operation_type' => $this->operation_type,
            'prefix' => $this->prefix,
        ]);
        $type->save();

        // return $this->redirect(route('inventory.operation-types.show', ['type' => $type->id, 'subdomain' => current_company()->domain_name]), navigate:true);
    }

}
