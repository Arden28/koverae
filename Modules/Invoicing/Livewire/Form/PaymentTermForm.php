<?php

namespace Modules\Invoicing\Livewire\Form;

use Modules\App\Livewire\Components\Form\Group;
use Modules\App\Livewire\Components\Form\Input;
use Modules\App\Livewire\Components\Form\Table;
use Modules\App\Livewire\Components\Table\Column;
use Modules\App\Livewire\Components\Form\Template\LightWeightForm;

class PaymentTermForm extends LightWeightForm
{
    public $term;
    public $name, $note, $dueTerms;

    protected $rules = [
        'name' => 'required|string|max:75'
    ];

    public function mount($term = null){
        if($term){
            $this->term = $term;
            $this->name = $term->name;
            $this->note = $term->note;
            
            $this->dueTerms = $term->dueTerms;
        }
    }
    

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs = null)
            Group::make('due-term',__("Due Terms"))->component('form.tab.group.table'),
            Group::make('term-preview',__("Term Preview"))->component('tabs.group.large-middle'),
        ];
    }

    public function inputs() : array
    {
        return [
            Input::make('name', __('Payment Term'), 'text', 'name', 'top-title', 'none', 'none', __('e.g. 28 days'))->component('form.input.ke-title'),
            Input::make('note', __('Note'), 'textarea', 'note', 'left', 'none', 'term-preview', __('Internal notes on contact....'), null)->component('form.input.textarea.tabs-middle'),
        ];
    }

    public function tables() : array
    {
        return  [
            // make($key, $label,$type, $tabs = null, $group = null)
            Table::make('bank-account',"Info", null, 'due-term', $this->dueTerms),
        ];
    }

    public function columns() : array
    {
        return  [
            // make($key, $label)
            Column::make('due_amount',__('Amount'), 'bank-account'),
            Column::make('due_format',__('Rate Type'), 'bank-account'),
            Column::make('after',__("Due in Days"), 'bank-account'),
            Column::make('after_date',__("Due Date"), 'bank-account'),
        ];
    }

}
