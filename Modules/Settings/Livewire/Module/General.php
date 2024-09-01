<?php

namespace Modules\Settings\Livewire\Module;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Url;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Company\CompanyInvitation;
use Modules\Settings\Entities\Setting;

class General extends Component
{

    public function render()
    {
        $setting = Setting::find(settings()->id)->first();
        return view('settings::livewire.module.general', compact('setting'));
    }
}
