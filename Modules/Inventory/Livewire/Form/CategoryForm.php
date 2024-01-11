<?php

namespace Modules\Inventory\Livewire\Form;

use App\Livewire\Form\Input;
use App\Livewire\Form\Capsule;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Group;
use App\Livewire\Form\Template\LightWeightForm;
use Modules\Inventory\Entities\Category;

class CategoryForm extends LightWeightForm
{
    public $category;

    public $name, $parent, $cost_method, $packaging;

    public $updateMode = false;

    public function mount($category = null){

        if($category){
            $this->updateMode = true;
            $this->name = $category->category_name;
            $this->cost_method = $category->costing_method;
            $this->packaging = $category->reserve_packagings;
        }
        $this->parent = Category::isCompany(current_company()->id)->first()->id;
        $this->cost_method = 'standard';
        $this->packaging = 'only_full';

    }

    protected $rules = [
        'name' => 'required|string',
        'parent' => 'integer|nullable',
        'cost_method' => 'string|required',
        'packaging' => 'string|required',
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

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group, $placeholder = null, $help = null)
            Input::make('name', "Nom de la catégorie", 'text', 'name', 'top-title', 'none', 'none', 'par ex: Chips')->component('inputs.category.ke-title'),
            Input::make('cost_method', 'Méthode de coût', 'checkbox', 'cost_method', 'left', 'none', 'stock')->component('inputs.select.category.cost-method'),
            Input::make('income_account',"Compte de revenue", 'select', 'income_account', 'left', 'none', 'accounting')->component('inputs.select.accounting.income-account'),
            Input::make('expense_account',"Compte de charge", 'select', 'expense_account', 'left', 'none', 'accounting')->component('inputs.select.accounting.charge-account'),
            Input::make('packaging',"Réserve des conditionnement", 'select', 'packaging', 'left', 'none', 'logistic')->component('inputs.select.category.reserve-packaging'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs = null)
            Group::make('stock',"Valorisation du stock")->component('tabs.group.large'),
            Group::make('logistic',"Logistique")->component('tabs.group.large'),
            // Group::make('accounting',"Propriété du compte")->component('tabs.group.large'),
        ];
    }

    public function capsules() : array
    {
        return [
            //
        ];
    }

    public function new(){
        return $this->redirect(route('inventory.products.categories.create', ['subdomain' => current_company()->domain_name]), navigate:true);
    }

    public function store(){
        $this->validate();

        $category = Category::create([
            'company_id' => current_company()->id,
            'category_name' => $this->name,
            'parent_id' => $this->parent,
            'costing_method' => $this->cost_method,
            'reserve_packagings' => $this->packaging,
        ]);
        $category->save();

        return redirect()->route('inventory.products.categories.show', ['category' => $category->id, 'subdomain' => current_company()->domain_name]);

    }

    public function update(){
        $this->validate();
        $category = $this->category;

        $category->update([
            'category_name' => $this->name,
            'parent_id' => $this->parent,
            'reserve_packagings' => $this->packaging,
        ]);
        $category->save();

        return redirect()->route('inventory.products.categories.show', ['category' => $category->id, 'subdomain' => current_company()->domain_name]);

    }
}
