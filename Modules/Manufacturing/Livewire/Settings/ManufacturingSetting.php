<?php

namespace Modules\Manufacturing\Livewire\Settings;

use App\Livewire\Settings\AppSetting;
use App\Livewire\Settings\Block;
use App\Livewire\Settings\Box;
use Livewire\Attributes\On;
use Modules\Settings\Entities\Setting;

class ManufacturingSetting extends AppSetting
{
    public $setting, $company;
    public bool $has_subcontracting, $has_workshop, $has_barcode_scanner, $has_manufacturing_order_unlocked, $has_quality, $has_production_security_delay;
    public $production_security_delay;

    public function mount($company){
        $setting = Setting::isCompany($company)->first();
        $this->setting = $setting;
        $this->has_subcontracting = $setting->has_subcontracting;
        $this->has_workshop = $setting->has_workshop;
        $this->has_barcode_scanner = $setting->has_barcode_scanner;
        $this->has_manufacturing_order_unlocked = $setting->has_manufacturing_order_unlocked;
        $this->has_quality = $setting->has_quality;
        $this->has_production_security_delay = $setting->has_production_security_delay;
        $this->production_security_delay = $setting->production_security_delay;

    }

    public function blocks() : array
    {
        return [
            Block::make('operation', 'Opérations'),
            Block::make('planing', 'Planing'),
        ];
    }

    public function boxes() : array
    {
        return [
            // $key, $label, $model, $description, $block, $checkbox, $help

            // Operation
            Box::make('has_subcontracting', 'Sous-traitance', 'has_subcontracting', "Sous-traiter la production de certains produits", 'operation', true, 'https://koverae.com/docs'),
            Box::make('has_workshop', 'Atelier', 'has_workshop', "Gérer vos ordres de fabrication dans l'application Atelier", 'operation', true),
            Box::make('has_barcode_scanner', 'Lecteur de codes-barres', 'has_barcode_scanner', "Traiter les ordres de fabrication à partir de l'application code-barres", 'operation', true),
            Box::make('has_manufacturing_order_unlocked', 'Déverrouiller les ordres de fabrication', 'has_manufacturing_order_unlocked', "Autoriser les utilisateurs du module de modifier les quantités à consommer, sans devoir passer par une approbation", 'operation', true),
            Box::make('has_quality', 'Contrôle qualité', 'has_quality', "Ajoutez des contrôles qualité à vos opérations de transfert", 'operation', true),
            // Planing
            Box::make('has_production_security_delay', 'Délai de sécurité', 'has_security_delay', "Planifier les ordres de fabrication plus tôt pour éviter les retards", 'planing', true, 'https://koverae.com/docs'),
        ];
    }

    #[On('save')]
    public function save(){
        $setting = $this->setting;
        $setting->update([
            'has_subcontracting' => $this->has_subcontracting,
            'has_workshop' => $this->has_workshop,
            'has_barcode_scanner' => $this->has_barcode_scanner,
            'has_manufacturing_order_unlocked' => $this->has_manufacturing_order_unlocked,
            'has_quality' => $this->has_quality,
            'has_production_security_delay' => $this->has_production_security_delay,
            'production_security_delay' => $this->production_security_delay,
        ]);
        $setting->save();

        cache()->forget('settings');

        notify()->success('Modifications sauvegardées');
        return redirect()->route('settings.general', ['subdomain' => current_company()->domain_name, 'view' => 'manufacturing', 'menu' => current_menu()]);
    }

}
