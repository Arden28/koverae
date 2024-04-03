<?php

namespace Modules\Pos\Livewire\Form;

use App\Livewire\Form\Template\SimpleForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use Livewire\Attributes\On;
use Modules\Inventory\Entities\Operation\OperationType;
use Modules\Inventory\Entities\Warehouse\Warehouse;
use Modules\Pos\Entities\Pos\Pos;
use Modules\Pos\Entities\Pos\PosSetting;

class PosForm extends SimpleForm
{
    public $pos;
    public $name, $warehouse;
    public bool $multiple_employee = false, $is_restaurant = false;

    public $updateMode = false;

    public function mount($pos = null){
        if($pos){
            $this->pos = $pos;
            $this->updateMode = true;
            $this->name = $pos->name;
            $this->multiple_employee = $pos->has_multiple_employee;
            $this->is_restaurant = $pos->is_restaurant;
            $this->warehouse = Warehouse::isCompany(current_company()->id)->first()->id;

        }else{
            $this->warehouse = Warehouse::isCompany(current_company()->id)->first()->id;
        }
    }

    // Real-time validation rules
    protected $rules = [
        'name' => 'required|string|max:60',
        'multiple_employee' => 'boolean|required',
        'is_restaurant' => 'boolean|required',
    ];

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs = null)
            Group::make('info',"Informations Supplémentaires", 'none'),
        ];
    }

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group, $placeholder = null, $help = null)
            Input::make('name', "Point de ventes", 'text', 'name', 'top-title', 'none', 'none', 'ex: Boutique Marie Reine')->component('inputs.ke-title'),
            Input::make('is_restaurant',"Est un restaurant/bar", 'select', 'is_restaurant', 'left', 'none', 'info')->component('inputs.checkbox.advance'),
            Input::make('multiple_employee',"Plusieurs employés par session", 'select', 'multiple_employee', 'left', 'none', 'info', 'Autoriser la connexion et la commutation entre les employés sélectionnés', "Les employés peuvent scanner leur badge ou saisir un code PIN pour se connecter à une session POS. Ces identifiants sont configurables dans l'onglet *Paramètres RH* de la fiche employé")->component('inputs.checkbox.advance'),
        ];
    }

    #[On('create-pos')]
    public function storePos(){
        $this->validate();
        $pos = Pos::create([
            'company_id' => current_company()->id,
            'name' => $this->name,
            'has_multiple_employee' => $this->multiple_employee,
            'is_restaurant' => $this->is_restaurant,
        ]);
        $pos->save();

        PosSetting::create([
            'company_id' => current_company()->id,
            'pos_id' => $pos->id,
            'warehouse_id' => $this->warehouse,
        ]);

        return redirect()->route('pos.show', ['subdomain' => current_company()->domain_name, 'pos' => $pos->id, 'menu' => current_menu()]);
    }

    #[On('update-pos')]
    public function updatePos(){
        $this->validate();
        $pos = $this->pos;

        $pos->update([
            'name' => $this->name,
            'has_multiple_employee' => $this->multiple_employee,
            'is_restaurant' => $this->is_restaurant,
        ]);
        $pos->save();

        $pos->setting->delete();

        PosSetting::create([
            'company_id' => current_company()->id,
            'pos_id' => $pos->id,
            'warehouse_id' => $this->warehouse,
        ]);

        return redirect()->route('pos.show', ['subdomain' => current_company()->domain_name, 'pos' => $pos->id, 'menu' => current_menu()]);
    }

    public function createOp(){
        if(Pos::isCompany(current_company()->id)->count() >= 1){
            OperationType::create([
                'company_id' => current_company()->id,
                'warehouse_id' => $this->warehouse,
                'name' => 'Commandes PDV',
                'operation_type' => 'delivery',
                'prefix' => 'POS',
            ]);
        }
    }

}
