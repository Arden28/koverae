<?php

namespace Modules\Inventory\Livewire\Form;

use App\Livewire\Form\Template\SimpleForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Button\StatusBarButton;
use App\Traits\Form\Button\ActionBarButton as ActionBarButtonTrait;
use Modules\Contact\Entities\Contact;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;

class PhysicalAdjustmentForm extends SimpleForm
{
    use ActionBarButtonTrait;
    public $scrap;

    public $reference, $schedule_date, $source_document, $responsible;

    public bool $updateMode = false, $replenish = false;
    public $status = 'draft';

    public function mount($scrap = null){
        if($scrap){
            $this->reference = $scrap->reference;
            $this->source_document = $scrap->source_document;
            $this->responsible = $scrap->responsible_id;
            $this->updateMode = true;
        }else{
            $this->schedule_date = now()->format('Y-m-d H:i:s');
            $this->responsible = Contact::isCompany(current_company()->id)->first()->id;

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

    public function inputs() : array
    {
        return  [
            // make($key, $label, $scrap, $model, $position, $tab, $group, $placeholder = null, $help = null)
            Input::make('reference', "Reference", 'text', 'reference', 'top-title', 'none', 'none', 'ex: Réception')->component('inputs.reference.new'),
            Input::make('responsible','Responsable', 'select', 'responsible', 'left', 'none', 'base_info')->component('inputs.select.contact'),
            Input::make('schedule_date',"Date prévue", 'datetime-local', 'schedule_date', 'right', 'none', 'base_info')->component('inputs.date.local'),
            Input::make('source_document',"Document d'origine", 'text', 'source_document', 'right', 'none', 'base_info', 'par ex: SL-0001'),
            //
        ];
    }

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('general','Produits')->component('tabs.adjustment-physical'),
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
        return [
            ActionBarButton::make('apply', 'Appliquer', 'apply', 'done'),
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


}
