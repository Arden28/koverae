<?php

namespace Modules\Pos\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Pos\Entities\Pos\Pos;

class PosTable extends Table
{

    public function createRoute() : string
    {

        return route('pos.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('pos.show' , ['subdomain' => current_company()->domain_name, 'pos' => $id, 'menu' => current_menu() ]);
    }

    public function headerName() : string
    {

        return 'Equipes commerciales';
    }

    public function query() : Builder
    {
        return Pos::query();
    }

    public function columns() : array
    {
        return [
            Column::make('name', 'Nom')->component('columns.common.show-title-link'),
            Column::make('status', 'Status')->component('columns.common.pos.status'),
        ];
    }

    public function delete(Pos $pos)
    {
        // $quotation = Quotation::find($quotation);
        $pos->delete();
    }
}
