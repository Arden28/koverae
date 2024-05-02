<?php

namespace Modules\Inventory\Livewire\Form;

use App\Livewire\Form\BaseForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Button\StatusBarButton;
use App\Traits\Form\Button\ActionBarButton as ActionBarButtonTrait;
use Modules\Inventory\Entities\Adjustment\ScrapOrder;
use Modules\Inventory\Entities\Product;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;
use Modules\Inventory\Services\LogisticService;

class ScrapForm extends BaseForm
{
    use ActionBarButtonTrait;
    public $scrap;

    public $reference, $product, $quantity = 1, $replenish_quantity = 0, $from, $to, $source_document, $responsible;

    public bool $updateMode = false, $replenish = false;
    public $status = 'draft';

    public function mount($scrap = null){
        if($scrap){
            $this->reference = $scrap->reference;
            $this->product = $scrap->product_id;
            $this->quantity = $scrap->quantity;
            $this->from = $scrap->received_from;
            $this->to = $scrap->in_direction_to;
            $this->source_document = $scrap->source_document;
            $this->responsible = $scrap->responsible_id;
            $this->replenish = $scrap->replenish;
            $this->updateMode = true;
        }else{
            $this->reference = 'Nouveau';
            $this->quantity = 1;
            $this->from = WarehouseLocation::isCompany(current_company()->id)->first()->id;
            $this->to = WarehouseLocation::isCompany(current_company()->id)->first()->id;

        }

    }

    protected $rules = [
        'product' => 'integer|required',
        'quantity' => 'required',
        'source_document' => 'string|nullable',
        'from' => 'integer|required',
        'to' => 'integer|required',
        'responsible' => 'integer|required',
        'replenish' => 'boolean|nullable',
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
        return [
            ActionBarButton::make('validate', 'Valider', 'validate', 'draft')->component('button.action-bar.if-status'),
            // ActionBarButton::make('storeTeam', 'Sauvegarder', $this->updateMode == false ? 'store' : "update"),
        ];

    }

    public function statusBarButtons() : array
    {
        return [
            StatusBarButton::make('draft', 'Brouillon', 'draft'),
            StatusBarButton::make('done', 'Fait', 'done'),
            StatusBarButton::make('canceled', 'Annulé', 'canceled')->component('button.status-bar.canceled'),
            // Add more buttons as needed
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs = null)
            Group::make('base_info',"Informations Générales", 'none')->component('tabs.group.light'),
            Group::make('general_info',"Informations Générales", 'general')->component('tabs.group.light'),
            Group::make('other_info',"Autres Informations", 'supp_info'),
            // Group::make('return',"Retours", 'general'),
        ];
    }

    public function inputs() : array
    {
        return  [
            // make($key, $label, $scrap, $model, $position, $tab, $group, $placeholder = null, $help = null)
            Input::make('reference', "Reference", 'text', 'reference', 'top-title', 'none', 'none', 'ex: Réception')->component('inputs.reference.new'),
            Input::make('product','Produit', 'select', 'product', 'left', 'none', 'base_info')->component('inputs.select.product'),
            Input::make('quantity',"Quantité", 'input', 'quantity', 'left', 'none', 'base_info'),
            Input::make('from',"Emplacement d'origine", 'select', 'from', 'right', 'none', 'base_info')->component('inputs.select.operations.default_from'),
            Input::make('to',"Emplacement de destination", 'select', 'to', 'right', 'none', 'base_info')->component('inputs.select.operations.default_from'),
            Input::make('source_document',"Document d'origine", 'text', 'source_document', 'right', 'none', 'base_info', 'par ex: SL-0001'),
            //
            Input::make('replenish','Réapprovisonner ces quantités', 'checkbox', 'replenish', 'right', 'none', 'base_info')->component('inputs.checkbox.simple'),
        ];
    }

    public function store(){
        $this->validate();

        $scrap = ScrapOrder::create([
            'company_id' => current_company()->id,
            'product_id' => $this->product,
            'quantity' => $this->quantity,
            'received_from' => $this->from,
            'in_direction_to' => $this->to,
            'date' => now(),
            'replenish_quantity' => $this->replenish_quantity,
            'source_document' => $this->source_document,
            'owner_id' => $this->responsible,
            'status' => 'done',
        ]);
        $scrap->save();

        // Record movement
        $logisticService = new LogisticService();
        $logisticService->launchScrap($scrap);

        $scrap->product->update([
            'product_quantity' => $scrap->product->product_quantity - $scrap->quantity,
        ]);


        return redirect()->route('inventory.adjustments.scraps.show', ['scrap' => $scrap->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);

    }

    public function update(){
        $this->validate();

        $scrap = ScrapOrder::find($this->scrap->id);

        $scrap->update([
            'company_id' => current_company()->id,
            'product_id' => $this->product,
            'quantity' => $this->quantity,
            'received_from' => $this->from,
            'in_direction_to' => $this->to,
            'date' => now(),
            'replenish_quantity' => $this->replenish_quantity,
            'source_document' => $this->source_document,
            'owner_id' => $this->responsible,
            'status' => $this->status,
        ]);
        $scrap->save();

        return redirect()->route('inventory.adjustments.scraps.show', ['scrap' => $scrap->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    public function updateQty(Product $product, $qty){
        $product->update([
            'product_quantity' => $product->product_quantity - $qty
        ]);
        // $product->save();
    }

    public function replenishQty(Product $product, $qty){
        //
    }
}
