<?php

namespace Modules\Inventory\Livewire\Form;

use App\Livewire\Form\BaseForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Button\StatusBarButton;
use App\Traits\Form\Button\ActionBarButton as ActionBarButtonTrait;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Modules\Contact\Entities\Contact;
use Modules\Inventory\Entities\Operation\OperationTransfer;
use Modules\Inventory\Entities\Operation\OperationTransferDetail;
use Modules\Inventory\Entities\Operation\OperationType;
use Modules\Inventory\Entities\Product;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;
use Modules\Inventory\Entities\Warehouse\Warehouse;
use Modules\Inventory\Services\LogisticService;

class OperationTransferForm extends BaseForm
{
    use ActionBarButtonTrait;
    public $transfer;

    public $reference, $contact, $type, $from, $to, $schedule_date, $effective_date, $source_document, $shipping_policy, $responsible, $note;

    public bool $updateMode = false;
    public $status = 'draft';
    public $inputs = [];

    public function mount($transfer = null){
        if($transfer){
            $this->reference = $transfer->reference;
            $this->contact = $transfer->contact_id;
            $this->type = $transfer->operation_type_id;
            $this->schedule_date = Carbon::parse($transfer->schedule_date)->format('Y-m-d H:i:s');
            $this->from = $transfer->received_from;
            $this->to = $transfer->in_direction_to;
            $this->effective_date = $transfer->effective_date;
            $this->source_document = $transfer->source_document;
            $this->responsible = $transfer->responsible_id;
            $this->note = $transfer->note;
            $this->status = $transfer->status;
            $this->updateMode = true;
        }else{
            $this->type = OperationType::isCompany(current_company()->id)->first()->id;
            $this->schedule_date = now()->format('Y-m-d H:i:s');
            $this->from = WarehouseLocation::isCompany(current_company()->id)->first()->id;
            $this->to = WarehouseLocation::isCompany(current_company()->id)->first()->id;
            $this->shipping_policy = 'as_soon_as_possible';
            $this->responsible = Contact::isCompany(current_company()->id)->first()->id;

        }

    }

    protected $rules = [
        'type' => 'integer|required',
        'contact' => 'integer|required',
        'schedule_date' => 'required|string',
        'effective_date' => 'string|nullable',
        'source_document' => 'string|nullable',
        'from' => 'integer|required',
        'to' => 'integer|required',
        'responsible' => 'integer|required',
        'note' => 'string|nullable',
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
            // make($key, $label, $transfer, $model, $position, $tab, $group, $placeholder = null, $help = null)
            Input::make('reference', "Reference", 'text', 'reference', 'top-title', 'none', 'none', 'ex: Réception')->component('inputs.reference.simple'),
            Input::make('contact','Contact', 'select', 'contact', 'left', 'none', 'base_info')->component('inputs.select.contact'),
            Input::make('type',"Type d'opération", 'select', 'type', 'left', 'none', 'base_info')->component('inputs.select.operations.operation-type'),
            Input::make('from',"Emplacement d'origine", 'select', 'from', 'right', 'none', 'base_info')->component('inputs.select.operations.default_from'),
            Input::make('to',"Emplacement de destination", 'select', 'to', 'right', 'none', 'base_info')->component('inputs.select.operations.default_from'),
            Input::make('schedule_date',"Date prévue", 'datetime-local', 'schedule_date', 'right', 'none', 'base_info')->component('inputs.date.local'),
            Input::make('source_document',"Document d'origine", 'text', 'source_document', 'right', 'none', 'base_info', 'par ex: SL0001'),
            //
            Input::make('shipping_policy','Politique de livraison', 'select', 'shipping_policy', 'left', 'supp_info', 'other_info')->component('inputs.select.shipping.policy'),
            Input::make('responsible','Responsable', 'select', 'responsible', 'left', 'supp_info', 'other_info')->component('inputs.select.contact'),
            Input::make('note','Note', 'textarea', 'note', 'left', 'note', 'none', "Ajouter une note qui sera ajoutée au bon de préparation")->component('inputs.textarea.note'),
        ];
    }

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('order','Opérations')->component('tabs.operation-transfer'),
            Tabs::make('supp_info','Info supplémentaire'),
            Tabs::make('note','Note')->component('tabs.note.summary'),
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

    public function actionBarButtons() : array
    {
        $status = $this->status;

        $buttons = [
            ActionBarButton::make('mark', 'Marquer comme à faire', 'markAsReady()', 'draft')->component('button.action-bar.if-status'),
            ActionBarButton::make('validate', isset($this->transfer->operationType->operation_type) === 'receipt' ? 'Recevoir les produits' : 'Valider', 'validateOperation', 'ready')->component('button.action-bar.if-status'),
            ActionBarButton::make('cancelled', 'Annuler', 'cancelOp', 'done'),
            ActionBarButton::make('storeTeam', 'Sauvegarder', $this->updateMode == false ? 'store' : "update", 'droft'),
        ];

        // Define the custom order of button keys
        $customOrder = ['mark', 'validate', 'cancelled', 'preview']; // Adjust as needed

        // Change dynamicaly the display order depends on status
        return $this->sortActionButtons($buttons, $customOrder, $status);
    }

    public function statusBarButtons() : array
    {
        return [
            StatusBarButton::make('draft', 'Brouillon', 'draft'),
            StatusBarButton::make('waiting', 'En attente', 'waiting')->component('button.status-bar.waiting'),
            StatusBarButton::make('ready', 'Prêt', 'ready'),
            StatusBarButton::make('done', 'Fait', 'done'),
            StatusBarButton::make('canceled', 'Annulé', 'canceled')->component('button.status-bar.canceled'),
            // Add more buttons as needed
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
        return redirect()->route('inventory.operation-transfers.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    #[On('transfer-cart')]
    public function updateInputs($inputs){
        $this->inputs = $inputs;
    }

    #[On('create-transfer')]
    public function store($status = null){
        $this->validate();

        $transfer = OperationTransfer::create([
            'company_id' => current_company()->id,
            'contact_id' => $this->contact,
            'operation_type_id' => $this->type,
            'received_from' => $this->from,
            'in_direction_to' => $this->to,
            'schedule_date' => $this->schedule_date,
            'effective_date' => $this->effective_date,
            'source_document' => $this->source_document,
            'responsible_id' => $this->responsible,
            'shipping_policy' => $this->shipping_policy,
            'note' => $this->note,
            'status' => $status ?? $this->status,
        ]);

        foreach($this->inputs as $detail){
            OperationTransferDetail::create([
                'company_id' => current_company()->id,
                'product_id' => $detail['product'],
                'operation_transfer_id' => $transfer->id,
                'product_name' => Product::find($detail['product'])->product_name,
                'demand' => $detail['demand'],
                'quantity' => Product::find($detail['product'])->product_quantity,
                'description' => $detail['description'],
                'schedule_date' => $detail['schedule_date'],
                'deadline_date' => $detail['deadline_date'],
            ]);
        }

        $transfer->save();

        // Record movement
        $logisticService = new LogisticService();
        $logisticService->recordStockMove($transfer);

        return redirect()->route('inventory.operation-transfers.show', ['transfer' => $transfer->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);

    }

    #[On('update-transfer')]
    public function update(){
        $this->validate();

        $transfer = OperationTransfer::find($this->transfer->id);

        $transfer->update([
            'contact_id' => $this->contact,
            'operation_type_id' => $this->type,
            'received_from' => $this->from,
            'in_direction_to' => $this->to,
            'schedule_date' => $this->schedule_date,
            'effective_date' => $this->effective_date,
            'source_document' => $this->source_document,
            'responsible_id' => $this->responsible,
            'shipping_policy' => $this->shipping_policy,
            'note' => $this->note,
            'status' => $this->status,
        ]);
        $transfer->save();

        return redirect()->route('inventory.operation-transfers.show', ['transfer' => $transfer->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    // Mark as ready
    public function markAsReady(){
        if($this->transfer){
            $transfer = $this->transfer;

            $transfer->update([
                'status' => 'ready'
            ]);
            $transfer->save();
            return redirect()->route('inventory.operation-transfers.show', ['transfer' => $transfer->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        }else{
            $this->store('done');
        }
    }

    public function validateOperation(){
        // Launch the validation process
        $operation = $this->transfer;

        $operation->update([
            'status' => 'done',
        ]);

        foreach($operation->details as $detail){
            $detail->product->update([
                'product_quantity' => $detail->product->product_quantity + $detail->demand,
            ]);
        }
        if($operation->moves->last()){
            $move = $operation->moves->latest();
            $move->update([
                'status' => 'done'
            ]);
        }

        return redirect()->route('inventory.operation-transfers.show', ['transfer' => $operation->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    public function cancelOp(){
        $operation = $this->transfer;

        $operation->update([
            'status' => 'cancelled'
        ]);
        return redirect()->route('inventory.operation-transfers.show', ['transfer' => $operation->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);

    }
}
