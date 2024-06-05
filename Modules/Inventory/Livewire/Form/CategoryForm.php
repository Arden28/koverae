<?php

namespace Modules\Inventory\Livewire\Form;

use App\Livewire\Form\Input;
use App\Livewire\Form\Capsule;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Group;
use App\Livewire\Form\Template\LightWeightForm;
use Livewire\Attributes\On;
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
            $this->parent = $category->parent_id;
        }
        // $this->parent = Category::isCompany(current_company()->id)->first()->id;
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

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group, $placeholder = null, $help = null)
            Input::make('name', __('translator::components.inputs.product-category-name.label'), 'text', 'name', 'top-title', 'none', 'none', __('translator::components.inputs.product-category-name.placeholder'))->component('inputs.category.ke-title'),
            Input::make('cost_method', __('translator::components.inputs.cost-method.label'), 'checkbox', 'cost_method', 'left', 'none', 'stock')->component('inputs.select.category.cost-method'),
            Input::make('income_account',__('translator::components.inputs.income-account.label'), 'select', 'income_account', 'left', 'none', 'accounting')->component('inputs.select.accounting.income-account'),
            Input::make('expense_account',__('translator::components.inputs.expense-account.label'), 'select', 'expense_account', 'left', 'none', 'accounting')->component('inputs.select.accounting.charge-account'),
            Input::make('packaging',__('translator::components.inputs.reserve-packaging.label'), 'select', 'packaging', 'left', 'none', 'logistic')->component('inputs.select.category.reserve-packaging'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs = null)
            Group::make('stock',__('translator::inventory.form.product-category.groups.stock'))->component('tabs.group.large'),
            Group::make('logistic',__('translator::inventory.form.product-category.groups.logistics'))->component('tabs.group.large'),
            // Group::make('accounting',"Propriété du compte")->component('tabs.group.large'),
        ];
    }

    public function capsules() : array
    {
        return [
            Capsule::make('sale', __('translator::inventory.form.product-category.capsules.products.name'), __('translator::inventory.form.product-category.capsules.products.text'))->component('capsules.product-category.product-capsule'),
        ];
    }

    public function new(){
        return redirect()->route('inventory.products.categories.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    #[On('create-category')]
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

        return redirect()->route('inventory.products.categories.show', ['category' => $category->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);

    }

    #[On('update-category')]
    public function update(){
        $this->validate();
        $category = $this->category;

        $category->update([
            'category_name' => $this->name,
            'parent_id' => $this->parent,
            'reserve_packagings' => $this->packaging,
        ]);
        $category->save();

        return redirect()->route('inventory.products.categories.show', ['category' => $category->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);

    }
}