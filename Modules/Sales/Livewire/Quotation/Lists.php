<?php

namespace Modules\Sales\Livewire\Quotation;

use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Sales\Entities\Quotation\Quotation;

class Lists extends Component
{
    use WithPagination;

    public $view = 'lists';

    public $show = 10;  // Default number of employees to show

    public $selectedQuotation = []; //Checkbox select

    public $deleteId = '';

    public function changeView($view){
        $this->view = $view;
    }

    public function render()
    {
        $quotations = Quotation::isCompany(current_company()->id)->isActive()->orderBy('id', 'DESC')->paginate($this->show);
        return view('sales::livewire.quotation.lists', compact('quotations'))
        ->extends('layouts.master');
        // ->section('content');
    }


    public function destroy(Quotation $quotation) {
        // abort_if(Gate::denies('delete_quotations'), 403);

        $quotation->delete();

        notify()->success('Le devis a bien été supprimé !', 'warning');

        return redirect()->route('quotations.index');
    }
}
