<?php

namespace Modules\Sales\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Sales\Entities\Price\PriceList;

class PricelistTable extends Table
{

    public function showRoute($id) : string
    {
        return route('sales.pricelists.show' , ['subdomain' => current_company()->domain_name, 'pricelist' => $id, 'menu' => current_menu() ]);
    }

    public function emptyTitle() : string
    {
        return __("Créer une nouvelle liste de prix !");
    }

    public function emptyText() : string
    {
        return __("Un prix est un ensemble de prix de vente ou de règles permettant de calculer le prix des lignes de commande en fonction des produits, des catégories de produits, des dates et des quantités commandées. C'est l'outil parfait pour gérer plusieurs prix, remises saisonnières, etc.
                    Vous pouvez assigner des listes de prix à vos clients ou en sélectionnez une quand vous créez un nouveau devis de vente.");
    }

    public function headerName() : string
    {
        return 'Listes de prix';
    }

    public function query() : Builder
    {
        return PriceList::query();
    }

    public function columns() : array
    {
        return [
            Column::make('name', 'Nom de la liste de prix')->component('columns.common.show-title-link'),
            Column::make('discount_policy', 'Politique de remise')->component('columns.common.pricelist.discount-policy'),
        ];
    }
}
