<?php

namespace Modules\Calendar\Livewire\Settings;

use App\Livewire\Settings\AppSetting;
use App\Livewire\Settings\Block;
use App\Livewire\Settings\Box;
use App\Livewire\Settings\BoxInput;
use Livewire\Attributes\On;

class CalendarSetting extends AppSetting
{
    public $setting;
    public $google_calendar_client_id, $google_calendar_secret, $outlook_calendar_client_id, $outlook_calendar_secret;
    public bool $has_google_calendar, $has_outlook_calendar, $google_calendar_pause_sync, $outlook_calendar_pause_sync;

    public function mount($setting){
        $this->setting = $setting;
        $this->has_google_calendar = $setting->has_google_calendar;
        $this->google_calendar_client_id = $setting->google_calendar_client_id;
        $this->google_calendar_secret = $setting->google_calendar_secret;
        $this->google_calendar_pause_sync = $setting->google_calendar_pause_sync;
        $this->has_outlook_calendar = $setting->has_outlook_calendar;
        $this->outlook_calendar_client_id = $setting->outlook_calendar_client_id;
        $this->outlook_calendar_secret = $setting->outlook_calendar_secret;
        $this->outlook_calendar_pause_sync = $setting->outlook_calendar_pause_sync;
    }

    public function blocks() : array
    {
        return [
            Block::make('calendar', __('Calendar Settings')),
        ];
    }

    public function boxes() : array
    {
        return [
            Box::make('google-calendar', 'Google Calendar', 'has_google_calendar', __("Synchronize your calendar with Google Calendar."), 'calendar', true, "https://koverae.com/docs"),
            Box::make('outlook-calendar', 'Outlook Calendar', 'has_outlook_calendar', __("Synchronize your calendar with Outlook."), 'calendar', true, "https://koverae.com/docs"),
        ];
    }

    public function inputs() : array
    {
        return [
            BoxInput::make('google-client',__('Client ID'), 'text', 'google_calendar_client_id', 'google-calendar', '', false),
            BoxInput::make('google-client',__('Client Secret Key'), 'text', 'google_calendar_client_secret', 'google-calendar', '', false),
            BoxInput::make('google-client',__('Pause the syncronization'), 'checkbox', 'google_calendar_pause_sync', 'google-calendar', '', false)->component('blocks.boxes.input.checkbox'),
            BoxInput::make('outlook-client',__('Client ID'), 'text', 'outlook_calendar_client_id', 'outlook-calendar', '', false),
            BoxInput::make('outlook-client',__('Client Secret Key'), 'text', 'outlook_calendar_client_secret', 'outlook-calendar', '', false),
            BoxInput::make('outlook-client',__('Pause the syncronization'), 'checkbox', 'outlook_calendar_pause_sync', 'outlook-calendar', '', false)->component('blocks.boxes.input.checkbox'),
        ];
    }

    #[On('save')]
    public function save(){
        $setting = $this->setting;

        $setting->update([
            'has_google_calendar' => $setting->has_google_calendar,
            'google_calendar_client_id' => $setting->google_calendar_client_id,
            'google_calendar_secret' => $setting->google_calendar_secret,
            'google_calendar_pause_sync' => $setting->google_calendar_pause_sync,
            'has_outlook_calendar' => $setting->has_outlook_calendar,
            'outlook_calendar_client_id' => $setting->outlook_calendar_client_id,
            'outlook_calendar_secret' => $setting->outlook_calendar_secret,
            'outlook_calendar_pause_sync' => $setting->outlook_calendar_pause_sync,
        ]);
        $setting->save();

        cache()->forget('settings');

        notify()->success('Changes saved successfully');
    }

}