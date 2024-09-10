<?php

namespace Modules\Crm\Livewire\Settings;

use App\Livewire\Settings\AppSetting;
use App\Livewire\Settings\Block;
use App\Livewire\Settings\Box;
use App\Livewire\Settings\BoxAction;
use App\Livewire\Settings\BoxInput;
use Livewire\Attributes\On;

class CrmSetting extends AppSetting
{
    public $setting;
    public $running = 'manually', $lead_enrichment = 'automatically';
    public bool $has_multi_teams = false, $has_leads = false, $has_lead_enrichment = true, $has_lead_mining = true, $has_visit_to_leads = false;
    public array $runningOptions = [], $leadOptions = [];

    public function mount($setting){
        $this->setting = $setting;
        $this->has_multi_teams = $setting->has_multi_teams;
        $this->has_leads = $setting->has_leads;
        $this->has_lead_enrichment = $setting->has_lead_enrichment;
        $this->has_lead_mining = $setting->has_lead_mining;
        $this->has_visit_to_leads = $setting->has_visit_to_leads;
        $this->running = $setting->running;
        $this->lead_enrichment = $setting->lead_enrichment;
        
        $runningOptions = [
            ['id' => 'repeatedly', 'label' => __('Repeatedly')],
            ['id' => 'manually', 'label' => __('Manually')],
        ];
        $this->runningOptions = toSelectOptions($runningOptions, 'id', 'label');
        $leadOptions = [
            ['id' => 'on_demand', 'label' => __('Enrich leads on demand only')],
            ['id' => 'automatically', 'label' => __('Enrich leads automatically')],
        ];
        $this->leadOptions = toSelectOptions($leadOptions, 'id', 'label');
    }

    public function blocks() : array{
        return [
            Block::make('crm', __('Customer Relationship')),
            Block::make('lead-generation', __('Leads Generation')),
        ];
    }

    public function boxes() : array{
        return [
            Box::make('multi-teams', 'Multi Teams', 'has_multi_teams', __("Assign salespersons into multiple Sales Teams."), 'crm', true),
            Box::make('leads', 'Leads', 'has_leads', __("Add a qualification step before the creation of an opportunity."), 'crm', true),
            Box::make('recurring-revenue', 'Recurring Revenues', 'has_recurring_revenues', __("Define recurring plans and revenues on Opportunities."), 'crm', true),
            Box::make('rule-based', 'Rule-Based Assignment', 'has_multi_teams', __("Periodically assign leads based on rules."), 'crm', true, "htpps://koverae.com/docs"),
            Box::make('lead-enrichment', 'Lead Enrichment', 'has_lead_enrichment', __("Enrich your leads with company data based on their email addresses."), 'lead-generation', true),
            Box::make('lead-mining', 'Lead Mining', 'has_lead_mining', __("Generate new leads based on their country, industry, size, etc.."), 'lead-generation', true, "hhtps://koverae.com/docs"),
            Box::make('visit-to-lead', 'Visits to Leads', 'has_visit_to_leads', __("Convert visitors of your website into leads and perform data enrichment based on their IP address."), 'lead-generation', true),
        ];
    }

    public function inputs() : array
    {
        return [
            BoxInput::make('rule-running',__('Running'), 'select', 'running', 'rule-based', '', false, $this->runningOptions),
            BoxInput::make('rule-running',null, 'select', 'lead_enrichment', 'lead-enrichment', '', false, $this->leadOptions),
        ];
    }
    
    public function actions() : array
    {
        return [
            BoxAction::make('manage-recurring', 'recurring-revenue', __('Manage Recurring Plans'), 'link', 'bi-arrow-right'),
            BoxAction::make('buy-kredit-enrichment', 'lead-enrichment', __('Buy Kredits'), 'link', 'bi-arrow-right'),
            BoxAction::make('buy-kredit-mining', 'lead-mining', __('Buy Kredits'), 'link', 'bi-arrow-right'),
            BoxAction::make('my-services-enrichent', 'lead-enrichment', __('My Kover Services'), 'link', 'bi-arrow-right'),
            BoxAction::make('my-services-mining', 'lead-mining', __('My Kover Services'), 'link', 'bi-arrow-right'),
        ];
    }

    #[On('save')]
    public function save(){
        $setting = $this->setting;

        $setting->update([
            'has_multi_teams' => $setting->has_multi_teams,
            'has_leads' => $setting->has_leads,
            'has_lead_enrichment' => $setting->has_lead_enrichment,
            'has_lead_mining' => $setting->has_lead_mining,
            'has_visit_to_leads' => $setting->has_visit_to_leads,
            'running' => $setting->running,
            'lead_enrichment' => $setting->lead_enrichment,
        ]);
        $setting->save();

        cache()->forget('settings');

        notify()->success('Changes saved successfully');
    }

}
