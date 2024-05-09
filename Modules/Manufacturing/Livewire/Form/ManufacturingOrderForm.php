<?php

namespace Modules\Manufacturing\Livewire\Form;

use App\Livewire\Form\BaseForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Button\StatusBarButton;
use App\Livewire\Form\Button\ActionButton;
use App\Livewire\Form\Capsule;
use App\Traits\Form\Button\ActionBarButton as ActionBarButtonTrait;
use Carbon\Carbon;
use Modules\Inventory\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;
use Modules\Contact\Entities\Contact;
use Modules\Inventory\Entities\Operation\OperationType;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;
use Modules\Inventory\Services\LogisticService;
use Modules\Manufacturing\Entities\BOM\BillOfMaterial;
use Modules\Manufacturing\Entities\Mo\ManufacturingOrderComponent;
use Modules\Manufacturing\Entities\MO\ManufacturingOrder;

class ManufacturingOrderForm extends BaseForm
{
    use ActionBarButtonTrait;

    public $cartInstance = 'mo';
    public $order;

    public $reference, $status, $product, $quantity, $bom, $schedule_date, $end_date, $responsible, $uom;
    public $operationType, $component_location, $finshed_products_location, $source_document;
    // Cart component
    public $inputs = [];

    public function mount($order = null){
        if($order){
            $this->reference = $order->reference;
            $this->status = $order->status;
            $this->product = $order->product_id;
            $this->quantity = $order->quantity;
            $this->bom = $order->bom_id;
            $this->schedule_date = Carbon::parse($order->schedule_date)->format('Y-m-d H:i:s');
            $this->end_date = Carbon::parse($order->end_date)->format('Y-m-d H:i:s');
            $this->responsible = Contact::find($order->responsible_id)->first()->id;
            $this->operationType = $order->operation_type_id;
            $this->component_location = $order->components_location_id;
            $this->finshed_products_location = $order->finished_products_location_id;
            $this->source_document = $order->source_document;

            $this->blocked = true;
        }else{
            $this->status = 'draft';
            $this->reference = 'Nouveau';
            $this->quantity = 1.00;
            $this->schedule_date = now()->format('Y-m-d H:i:s');
            $this->end_date = now()->addDays(2)->format('Y-m-d H:i:s');
            $this->operationType = OperationType::isCompany(current_company()->id)->isType('manufacturing')->first()->id;
            $this->component_location = WarehouseLocation::isCompany(current_company()->id)->isType('internal')->first()->id;
            $this->finshed_products_location = WarehouseLocation::isCompany(current_company()->id)->isType('internal')->first()->id;
            $this->responsible = Contact::isCompany(current_company()->id)->first()->id;
        }
    }

    protected $rules = [
        'product' => 'required|integer',
        'quantity' => 'required|gt:0',
        'bom' => 'required|integer',
    ];

    public function actionBarButtons() : array
    {
        $status = $this->status;

        $buttons = [
            // key, label, action, primary
            // ActionBarButton::make('invoice', 'Créer une facture', 'storeQT()', 'sale_order'),
            ActionBarButton::make('manufacture', 'Tout produire', "manufactureOrder()", 'confirmed')->component('button.action-bar.if-status'),
            ActionBarButton::make('confirm', 'Confirmer', "confirmOrder()", 'draft')->component('button.action-bar.if-status'),
            ActionBarButton::make('unlock',  $this->blocked ? 'Débloquer' : 'Bloquer', $this->blocked ? "unlock()" : "lock()", 'confirmed')->component('button.action-bar.if-status-normal'),
            ActionBarButton::make('unbuild', __('Déconstruire'), "", 'done')->component('button.action-bar.if-status'),
            // Add more buttons as needed
        ];

        // Define the custom order of button keys
        $customOrder = ['manufacture', 'confirm', 'unlock', 'unbuild']; // Adjust as needed

        // Change dynamicaly the display order depends on status
        return $this->sortActionButtons($buttons, $customOrder, $status);


    }

    public function statusBarButtons() : array
    {
        return [
            StatusBarButton::make('draft', 'Brouillon', 'draft'),
            // StatusBarButton::make('sent', 'A clotû', 'to_close'),
            StatusBarButton::make('confirmed', 'Confirmé', 'confirmed'),
            StatusBarButton::make('done', 'Fait', 'done'),
            // Add more buttons as needed
        ];
    }

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('order','Composants')->component('tabs.manufacturing-order'),
            Tabs::make('miscellaneous','Divers'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs)
            Group::make('miscellaneous','Miscellaneous', 'miscellaneous')->component('tabs.group.light')
        ];
    }

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group)
            Input::make('product','Produit', 'select', 'product', 'left', 'none', 'none')->component('inputs.select.product'),
            Input::make('quantity','Quantité', 'tel', 'quantity', 'left', 'none', 'none')->component('inputs.product.quantity'),
            Input::make('bom','Nomenclature', 'select', 'bom', 'left', 'none', 'none')->component('inputs.select.bom'),
            Input::make('schedule_date','Date prévue', 'datetime-local', 'schedule_date', 'right', 'none', 'none'),
            Input::make('end_date','Date de fin', 'datetime-local', 'end_date', 'right', 'none', 'none'),
            Input::make('responsible','Responsable', 'select', 'responsible', 'right', 'none', 'none')->component('inputs.select.contact'),

            Input::make('operationType',"Type d'opération", 'select', 'operationType', 'left', 'miscellaneous', 'miscellaneous')->component('inputs.select.operations.operation-type'),
            Input::make('component_location',"Emplacement des compsants", 'select', 'component_location', 'left', 'miscellaneous', 'miscellaneous')->component('inputs.select.operations.default_from'),
            Input::make('finshed_products_location',"Emplacement des produits finis", 'select', 'finshed_products_location', 'left', 'miscellaneous', 'miscellaneous')->component('inputs.select.operations.default_from'),
            Input::make('source_document',"Document source", 'text', 'source_document', 'right', 'miscellaneous', 'miscellaneous')
        ];
    }

    #[On('manufacturing-cart')]
    public function updateInputs($inputs){
        $this->inputs = $inputs;
    }

    #[On('set-product-bom')]
    public function setBom($product){
        if($product){
            $product = Product::find($this->product);
            $this->bom = $product->bom->id;
        }
    }

    public function updatedBom(){
        $this->dispatch('add-bom-component', value: $this->bom);
    }

    #[On('update-manufacture')]
    public function updateOrder(){
        // $this->validate();
        $order = $this->order;

        $order->update([
            'schedule_date' => $this->schedule_date,
            'end_date' => $this->end_date,
            'product_id' => $this->product,
            // 'serial_number' => $this->serial_number,
            'bom_id' => $this->bom,
            'source_document' => $this->source_document,
            'responsible_id' => $this->responsible,
            'quantity' => $this->quantity,
            'uom_id' => $this->uom,
            'status' => 'confirmed',
            'operation_type_id' => $this->operationType,
            'components_location_id' => $this->component_location,
            'finished_products_location_id' => $this->finshed_products_location,
        ]);

        foreach ($order->components as $component) {
            $component->delete();
        }

        foreach($this->inputs as $component){
            ManufacturingOrderComponent::create([
                'company_id' => current_company()->id,
                'mo_id' => $order->id,
                'product_id' => $component['product'],
                'quantity' => $component['quantity'],
                'source_location_id' => $component['location'],
            ]);
        }

        // Record movement
        $logisticService = new LogisticService();
        $logisticService->launchManufacturing($order);

        $order->save();
        return redirect()->route('manufacturing.orders.show', ['order' => $order->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    public function confirmOrder(){

        $this->validate();

        $order = ManufacturingOrder::create([
            'company_id' => current_company()->id,
            'schedule_date' => $this->schedule_date,
            'end_date' => $this->end_date,
            'product_id' => $this->product,
            // 'serial_number' => $this->serial_number,
            'bom_id' => $this->bom,
            'source_document' => $this->source_document,
            'responsible_id' => $this->responsible,
            'quantity' => $this->quantity,
            'uom_id' => $this->uom,
            'status' => 'confirmed',
            'operation_type_id' => $this->operationType,
            'components_location_id' => $this->component_location,
            'finished_products_location_id' => $this->finshed_products_location,
        ]);

        foreach($this->inputs as $component){
            ManufacturingOrderComponent::create([
                'company_id' => current_company()->id,
                'mo_id' => $order->id,
                'product_id' => $component['product'],
                'quantity' => $component['quantity'],
                'demand' => $component['quantity'],
                'source_location_id' => $component['location'],
            ]);
        }

        // Record movement
        $logisticService = new LogisticService();
        $logisticService->launchManufacturing($order);

        $order->save();
        return redirect()->route('manufacturing.orders.show', ['order' => $order->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    public function manufactureOrder(){
        // $this->validate();
        $manufacture = $this->order;

        // Update the manufacture order status
        $manufacture->update([
            'status' => 'done',
        ]);

        // Update the stock movement status
        if($manufacture->moves->last()){
            $move = $manufacture->moves->last();
            $move->update([
                'status' => 'done'
            ]);
        }

        // Update the product quantity
        foreach($manufacture->components as $component){
            //Update the product quantity
            $component->product->update([
                'product_quantity' => $component->product->product_quantity - $component->quantity,
            ]);
        }

        // Update the component quantity
        $manufacture->product->update([
            'product_quantity' => $manufacture->product->product_quantity + $manufacture->quantity
        ]);

        return redirect()->route('manufacturing.orders.show', ['order' => $manufacture->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    public function unlock(){
        $this->blocked = false;
        $this->dispatch('unlock-manufacturing');
    }

    public function lock(){
        $this->blocked = true;
        $this->dispatch('lock-manufacturing');
    }
}