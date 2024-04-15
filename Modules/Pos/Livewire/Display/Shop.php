<?php

namespace Modules\Pos\Livewire\Display;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Contact\Entities\Contact;
use Modules\Inventory\Entities\Category;
use Modules\Pos\Entities\Pos\Pos;

class Shop extends Component
{
    public Pos $pos;

    public $total_amount = 0, $total_items = 0;
    public bool $show_product_list = true, $show_checkout_box = false;
    public $activeTab = null;

    public function mount($pos){
        $this->pos = $pos;
    }

    public function render()
    {
        $product_categories = Category::isCompany(current_company()->id)->get();
        // $product_categories = Category::isCompany(current_company()->id)->get();
        // $customers = Contact::isCompany(current_company()->id)->isCustomer()->get();
        $customers = Contact::isCompany(current_company()->id)->get();

        return view('pos::livewire.display.shop', compact('product_categories', 'customers'))
        ->extends('pos::layouts.shop');
    }

    #[On('change-total-amount')]
    public function changeTotalAmount($amount){
        $this->total_amount = $amount;
    }

    #[On('change-total-items')]
    public function changeTotalItems($items){
        $this->total_items = $items;
    }

    public function payClick(){
        $this->dispatch('pay-click');
    }

    public function switchToOrder(){
        $this->show_checkout_box = true;
    }
}
