<?php

namespace Modules\Pos\Livewire\Modal;

use LivewireUI\Modal\ModalComponent;
use Modules\Pos\Entities\Session\PosSession;

class CloseSessionModal extends ModalComponent
{
    public PosSession $session;

    public function mount($session){
        $this->session = $session;
    }

    public function render()
    {
        return view('pos::livewire.modal.close-session-modal');
    }
}
