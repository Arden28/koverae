<?php

namespace Modules\Inventory\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Inventory\Entities\Adjustment\InventoryAdjustment;
use Modules\Inventory\Entities\History\InventoryMove;

class PhysicalInventoryTable extends Table
{

    public function emptyTitle() : string
    {
        return __("Votre stock est actuellement vide");
    }

    public function emptyText() : string
    {
        return __("Appuyez sur le bouton CRÉER pour définir la quantité pour chaque produit de votre stock ou importez-les depuis une feuille de calcul via l'importation.");
    }

    public function headerName() : string
    {

        return "Produits";
    }

    public function query() : Builder
    {
        return InventoryAdjustment::query();
    }

    public function columns() : array
    {
        return [
            Column::make('product_id', "Produit")->component('columns.common.product'),
            Column::make('last_counted_date', "Date du dernier décompte")->component('columns.common.date.timestamps'),
            Column::make('available_quantity', "Quantité disponible"),
            Column::make('quantity', "Quantité en stock"),
            Column::make('counted_quantity', "Quantité comptée"),
            Column::make('difference', "Différence"),
            Column::make('scheduled_date', "Date planifiée")->component('columns.common.date.timestamps'),
            Column::make('user_id', "Utilisateur")->component('columns.common.user.user'),
        ];
    }

    public function delete(InventoryAdjustment $adjustment)
    {
        // $adjustment = OperationType::find($adjustment);
        $adjustment->delete();
    }
}
