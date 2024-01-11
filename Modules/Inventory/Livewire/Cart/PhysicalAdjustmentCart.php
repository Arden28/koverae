<?php

namespace Modules\Inventory\Livewire\Cart;

use App\Livewire\Cart\Column;
use App\Livewire\Cart\SimpleCart;
use Livewire\Attributes\On;

class PhysicalAdjustmentCart extends SimpleCart
{
    public $location, $frequence = 0, $product, $qty, $available_qty, $counted_qty, $difference, $schedule_date, $responsible;

    public function columns() : array
    {
        return [
            // key, label, type, model, placeholder
            Column::make('location_id', "Emplacement", 'text', "location", 'Tapez pour trouver votre emplacement' )->component('dropdown.location-dropdown'),
            Column::make('frequence', "Fréquence d'inventaire", '', 'frequence'),
            Column::make('product_id', "Produit", 'text', "Modules\Inventory\Entities\Product", 'Tapez pour trouver votre produit' )->component('dropdown.product-dropdown'),
            Column::make('qty', "Quantité en stock"),
            Column::make('available_qty', "Quantité disponible"),
            Column::make('counted_qty', "Quantité comptée"),
            Column::make('difference', "Différence"),
            Column::make('schedule_date', "Date programmée"),
            Column::make('responsible', "Responsable"),
        ];
    }

    #[On('product-selected')]
    public function productSelected($name){
        $this->test = $name;
    }
}
