<?php

namespace Modules\Employee\Livewire\Seetings;

use App\Livewire\Settings\AppSetting;
use App\Livewire\Settings\Block;
use App\Livewire\Settings\Box;
use App\Livewire\Settings\BoxAction;
use App\Livewire\Settings\BoxInput;
use Livewire\Attributes\On;
use Modules\Employee\Entities\WorkingHour;

class EmployeeSetting extends AppSetting
{
    public $setting;
    public bool $presence_based_on_system, $presence_based_on_attendance, $has_remote_work, $has_advanced_presence_control, $control_based_on_email_sent, $control_based_on_ip_address, $has_skills_management, $has_employee_editing;
    public $minimum_email_to_send, $ip_addresses, $default_working_hour;
    public array $workingHours = [];

    public function mount($setting){
        $this->setting = $setting;
        $this->presence_based_on_system = $setting->presence_based_on_system;
        $this->has_remote_work = $setting->has_remote_work;
        $this->presence_based_on_attendance = $setting->presence_based_on_attendance;
        $this->has_advanced_presence_control = $setting->has_advanced_presence_control;
        $this->control_based_on_email_sent = $setting->control_based_on_email_sent;
        $this->control_based_on_ip_address = $setting->control_based_on_ip_address;
        $this->has_skills_management = $setting->has_skills_management;
        $this->has_employee_editing = $setting->has_employee_editing;
        $this->minimum_email_to_send = $setting->minimum_email_to_send;
        $this->ip_addresses = $setting->ip_addresses;
        $this->default_working_hour = $setting->default_working_hour_id;
        
        $workingHours = WorkingHour::isCompany(current_company()->id)->get();
        $this->workingHours = toSelectOptions($workingHours, 'id', 'name');
    }

    public function blocks() : array
    {
        return [
            Block::make('employees', __('Employees')),
            Block::make('employee-right', __('Employee Profile Access Rights')),
            Block::make('work-organization', __('Workforce Structure')),
        ];
    }

    public function boxes() : array
    {
        return [
            Box::make('skill-management', __('Skills Management'), 'has_skills_management', __('Enhance employee profiles with qualifications and resumes'), 'employees', true),
            Box::make('remote-work', __('Remote Work'), 'has_remote_work', __('Show remote work configurations and detailed reports for each employee. Presence icons will reflect their remote work locations'), 'employees', true),
            Box::make('attendance-monitoring', __('Attendance Monitoring'), '', null, 'employees', false),
            Box::make('advanced-attendance', __('Advanced Attendance Monitoring'), 'has_advanced_presence_control', __('Attendance reporting interface with email and IP address verification.'), 'employees', true),
            // Employee Update Rights
            Box::make('employee-update', __('Employee Profile Management'), 'has_employee_editing', __('Permit employees to modify their personal information.'), 'employee-right', true),
            // Workforce Structure
            Box::make('working-hour', __('Company Working Hours'), 'has_remote_work', __('Establish a standard company timetable to regulate employee work hours'), 'work-organization', false),
            // Box::make('remote-work', __('Remote Work'), 'has_remote_work', __(''), 'employees', true),
        ];

    }

    public function inputs() : array
    {
        return [
            BoxInput::make('attendances',__('Attendance-Based'), 'checkbox', 'presence_based_on_attendance', 'attendance-monitoring', '', false)->component('blocks.boxes.input.checkbox.simple'),
            BoxInput::make('system',__('Based on System User Status'), 'checkbox', 'presence_based_on_system', 'attendance-monitoring', '', false)->component('blocks.boxes.input.checkbox.simple'),
            BoxInput::make('ip-address',__('Based on IP Address Location'), 'checkbox', 'control_based_on_ip_address', 'advanced-attendance', '', false, ['parent' => $this->has_advanced_presence_control])->component('blocks.boxes.input.checkbox.depends'),
            BoxInput::make('ip-addresses',__('IP Addresses (comma-separated)'), 'tel', 'ip_addresses', 'advanced-attendance', '', false, ['parent' => $this->has_advanced_presence_control])->component('blocks.boxes.input.depends'),
            BoxInput::make('email-sent',__('Based on Email Volume Sent'), 'checkbox', 'control_based_on_email_sent', 'advanced-attendance', '', false, ['parent' => $this->has_advanced_presence_control])->component('blocks.boxes.input.checkbox.depends'),
            BoxInput::make('min-emails',__('Required Email Send Count'), 'tel', 'minimum_email_to_send', 'advanced-attendance', '', false, ['parent' => $this->has_advanced_presence_control])->component('blocks.boxes.input.depends'),
            BoxInput::make('working-hours',null, 'select', 'default_working_hour', 'working-hour', '', false, $this->workingHours),
        ];
    }
    
    #[On('save')]
    public function save()
    {
        $setting = $this->setting;
        $setting->update([
            'presence_based_on_system' => $this->presence_based_on_system,
            'has_remote_work' => $this->has_remote_work,
            'presence_based_on_attendance' => $this->presence_based_on_attendance,
            'has_advanced_presence_control' => $this->has_advanced_presence_control,
            'control_based_on_email_sent' => $this->control_based_on_email_sent,
            'control_based_on_ip_address' => $this->control_based_on_ip_address,
            'has_skills_management' => $this->has_skills_management,
            'has_employee_editing' => $this->has_employee_editing,
            'minimum_email_to_send' => $this->minimum_email_to_send,
            'ip_addresses' => $this->ip_addresses,
            'default_working_hour_id' => $this->default_working_hour,
        ]);
        $setting->save();

        cache()->forget('settings');

        notify()->success('Changes have been saved');
        return redirect()->route('settings.general', ['subdomain' => current_company()->domain_name, 'view' => 'employee', 'menu' => current_menu()]);
    }
}
