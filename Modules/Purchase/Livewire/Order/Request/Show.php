<?php

namespace Modules\Purchase\Livewire\Order\Request;

use Livewire\Component;
use Modules\Purchase\Entities\Request\RequestQuotation;

class Show extends Component
{
    public $request;

    public function mount (RequestQuotation $request){
        $this->request = $request;
    }

    public function render()
    {
        return view('purchase::livewire.order.request.show')
        ->extends('layouts.master');
    }
}
