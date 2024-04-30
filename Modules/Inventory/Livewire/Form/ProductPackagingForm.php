<?php

namespace Modules\Inventory\Livewire\Form;

use App\Livewire\Form\Template\LightWeightForm;
use App\Livewire\Form\Input;
use Livewire\Attributes\On;
use Modules\Inventory\Entities\Product\ProductPackaging;

class ProductPackagingForm extends LightWeightForm
{
    public $packaging;
    public $name, $packet_type, $product, $contained_quantity = 1, $barcode;
    public bool $saleable = true, $buyable = true, $updateMode = false;

    public function mount($packaging = null){
        if($packaging){
            $this->updateMode = true;
            $this->name = $packaging->name;
            $this->packet_type = $packaging->packet_type_id;
            $this->product = $packaging->product_id;
            $this->contained_quantity = $packaging->contained_quantity;
            $this->barcode = $packaging->barcode;
            $this->saleable = $packaging->is_saleable;
            $this->buyable = $packaging->is_buyable;
        }
    }

    protected $rules = [
        'name' => 'required|string|max:50',
        'packet_type' => 'nullable|integer',
        'product' => 'required|integer',
        'contained_quantity' => 'required|number',
        'barcode' => 'nullable|string',
        'saleable' => 'required|boolean',
        'buyable' => 'required|boolean',
    ];

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group, $placeholder = null, $help = null)
            Input::make('name', "Conditionnement", 'text', 'name', 'top-title', 'none', 'none')->component('inputs.ke-title'),
            Input::make('product', 'Produit', 'select', 'product', 'left', 'none', 'none')->component('inputs.select.product'),
            Input::make('packet_type', 'Type de colis', 'select', 'packet_type', 'right', 'none', 'none')->component('inputs.select.product'),
            Input::make('contained_quantity', 'Quantité contenue', 'text', 'contained_quantity', 'left', 'none', 'none', '', 'Quantité de produit contenue dans le conditionnement.'),
            Input::make('barcode', 'Code-barres', 'text', 'barcode', 'left', 'none', 'none', '', "Code à barres utilisé pour l'identification du conditionnement. Scannez ce code-barres à partir d'un transfert dans l'App Barcode pour déplacer toutes les unitées contenues."),
            Input::make('saleable', 'Produit', 'checkbox', 'saleable', 'right', 'none', 'none', '', 'Si vrai, le conditionnement peut être utilisé dans le bon de commande.')->component('inputs.checkbox.simple'),
            Input::make('buyable', 'Produit', 'checkbox', 'buyable', 'right', 'none', 'none', '', 'Si vrai, le conditionnement peut être utilisé dans le bon de commande.')->component('inputs.checkbox.simple'),
        ];
    }

    #[On('create-packaging')]
    public function storePackaging(){
        // $this->validate();

        $packaging = ProductPackaging::create([
            'company_id' => current_company()->id,
            'product_id' => $this->product,
            'name' => $this->name,
            'packet_type_id' => $this->packet_type,
            'contained_quantity' => $this->contained_quantity,
            'barcode' => $this->barcode,
            'is_saleable' => $this->saleable,
            'is_buyable' => $this->buyable,
        ]);
        $packaging->save();
        return redirect()->route('inventory.products.packaging.show', ['packaging' => $packaging->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    #[On('update-packaging')]
    public function updatePackaging(){
        $this->validate();

        $packaging = $this->packaging;
        $packaging->update([
            'name' => $this->name,
            'packet_type_id' => $this->packet_type,
            'contained_quantity' => $this->contained_quantity,
            'barcode' => $this->barcode,
            'is_saleable' => $this->saleable,
            'is_buyable' => $this->buyable,
        ]);
        $packaging->save();
        return redirect()->route('inventory.products.packaging.show', ['packaging' => $packaging->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

}
