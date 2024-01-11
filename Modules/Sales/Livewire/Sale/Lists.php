<?php

namespace Modules\Sales\Livewire\Sale;

use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Sales\Entities\Sale;

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
    public function render(Request $request)
    {
        if($request->get('to')){
            $sales = Sale::isCompany(current_company()->id)->isActive()->where('status', $request->get('to'))->orderBy('id', 'DESC')->paginate($this->show);
        }else{
            $sales = Sale::isCompany(current_company()->id)->isActive()->orderBy('id', 'DESC')->paginate($this->show);
        }

        return view('sales::livewire.sale.lists', compact('sales'))
        ->extends('layouts.master');
    }

}
