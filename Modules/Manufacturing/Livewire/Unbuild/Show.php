<?php

namespace Modules\Manufacturing\Livewire\Unbuild;

use Livewire\Component;
use Modules\Manufacturing\Entities\Unbuild\UnbuildOrder;

class Show extends Component
{
    public UnbuildOrder $unbuild;

    public function mount($unbuild){
        $this->unbuild = $unbuild;
    }

    public function render()
    {
        return view('manufacturing::livewire.unbuild.show');
    }
}
