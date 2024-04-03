<?php

namespace Modules\Pos\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Pos\Entities\Pos\Pos;
use Modules\Pos\Entities\Session\PosSession;

class Overview extends Component
{
    public function render()
    {
        $pos = Pos::isCompany(current_company()->id)->get();
        return view('pos::livewire.overview', compact('pos'))
        ->extends('layouts.master');
    }

    public function openSession(Pos $pos){

        $session = PosSession::create([
            'company_id' => current_company()->id,
            'pos_id'    => $pos->id,
            'start_date'    => now(),
            'open_by_id'   => Auth::user()->id
        ]);
        $session->save();

        $pos->update([
            'active_session_id' => $session->id,
            'status'    => 'active'
        ]);
        $pos->save();

        session(['current_pos' => $pos]);

        return redirect()->route('pos.ui', ['subdomain' => current_company()->domain_name, 'pos' => $pos->id, 'session' =>$pos->sessions()->isOpened()->first()->unique_token]);
    }

    public function continueSession(Pos $pos){

        session(['current_pos' => $pos]);

        return redirect()->route('pos.ui', ['subdomain' => current_company()->domain_name, 'pos' => $pos->id, 'session' =>$pos->sessions()->isOpened()->first()->unique_token]);
    }

}
