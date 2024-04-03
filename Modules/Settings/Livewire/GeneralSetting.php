<?php

namespace Modules\Settings\Livewire;

use App\Models\Module\InstalledModule;
use App\Models\Module\Module;
use App\Models\Team\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Url;


class GeneralSetting extends Component
{
    #[Url(as: 'view', keep: true)]
    public $view = 'general';

    public function render()
    {
        $team = Team::where('id', Auth::user()->team->id)->where('uuid', Auth::user()->team->uuid)->first();

        return view('settings::livewire.general-setting', compact('team'))
        ->extends('layouts.master');
    }

    public function changePanel($panel){
        return $this->view = $panel;
    }
}
