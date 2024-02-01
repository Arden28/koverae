<?php

namespace Modules\Purchase\Livewire\Settings;

use App\Livewire\Settings\AppSetting;
use App\Livewire\Settings\Block;
use App\Livewire\Settings\Box;
use Livewire\Attributes\On;
use Modules\Settings\Entities\Setting;

class PurchaseSetting extends AppSetting
{
    public $setting, $company;

    public $has_approval_order,  $has_lock_confirm_order, $has_purchase_warnings, $has_receipt_reminder, $has_purchase_agreements, $has_variant, $has_uom, $has_packaging, $has_way_matching;
    public $min_amount = 100000, $bill_policy;

    public function mount($company){
        $setting = Setting::isCompany($company)->first();
        $this->setting = $setting;
        $this->has_approval_order = $setting->has_approval_order;
        $this->has_lock_confirm_order = $setting->has_lock_confirm_order;
        $this->has_purchase_warnings = $setting->has_purchase_warnings;
        $this->has_receipt_reminder = $setting->has_receipt_reminder;
        $this->has_purchase_agreements = $setting->has_purchase_agreements;
        $this->has_variant = $setting->has_variant;
        $this->has_uom = $setting->has_uom;
        $this->has_packaging = $setting->has_packaging;
        $this->bill_policy = $setting->bill_policy;
        $this->has_way_matching = $setting->has_way_matching;
    }

    public function blocks() : array
    {
        return [
            Block::make('order', 'Commandes'),
            Block::make('product', 'Produits'),
            Block::make('invoicing', 'Facturation'),
            // Block::make('logistics', 'Logistique'),
            // Add more buttons as needed
        ];
    }

    public function boxes() : array
    {
        return [
            // Order
            Box::make('has_approval_order', 'Approbation du bon de commande', 'has_approval_order', "Demander aux gestionnaires d'approuver les commandes supérieures à un montant minimum", 'order', true)->component('blocks.boxes.minimum-amount'),
            Box::make('has_lock_confirm_order', 'Verrouiller les commandes confirmées', 'has_lock_confirm_order', "Verrouillez automatiquement les commandes confirmées pour empêcher toute modification", 'order', true),
            Box::make('has_purchase_warnings', 'Avertissements', 'has_purchase_warnings', "Recevez des avertissements dans les commandes de produits ou de fournisseurs", 'order', true),
            Box::make('has_receipt_reminder', 'Rappels de réception', 'has_receipt_reminder', "Rappelez automatiquement la date de réception à vos fournisseurs", 'order', true),
            Box::make('has_purchase_agreements', "Contrats d'approvisionement", 'has_purchase_agreements', "Gérez vos contrats d'achat (appels d'offres, commandes provisionnelles)", 'order', true),
            // Products
            Box::make('has_variant', 'Variantes', 'has_variant', "Vendre des variantes d'un produit en utilisant des attributs (taille, couleur, etc.)", 'product', true),
            Box::make('has_uom', 'Unités de mesure', 'has_uom', "Vendre et acheter des produits dans différentes unités de mesure", 'product', true),
            Box::make('has_packaging', 'Emballage produit', 'has_packaging', "Vendre des produits par multiple du nombre d'unités par paquet", 'product', true),
            // Invoicing
            Box::make('bill_policy', 'Politique de facturation', 'bill_policy', "Quantités facturées par les fournisseurs", 'invoicing', false)->component('blocks.boxes.ratio.bill-policy'),
            Box::make('has_way_matching', 'Correspondance à trois voies', 'has_way_matching', "Assurez-vous de payer uniquement les factures pour lesquelles vous avez reçu les marchandises que vous avez commandées", 'invoicing', true),
        ];
    }

    #[On('save')]
    public function save(){
        $setting = $this->setting;

        $setting->update([
            'has_variants' => $this->has_variants,
            'has_lock_confirm_order' => $this->has_lock_confirm_order,
            'has_purchase_warnings' => $this->has_purchase_warnings,
            'has_receipt_reminder' => $this->has_receipt_reminder,
            'has_purchase_agreements' => $this->has_purchase_agreements,
            'has_variant' => $this->has_variant,
            'has_uom' => $this->has_uom,
            'has_packaging' => $this->has_packaging,
            'bill_policy' => $this->bill_policy,
            'has_way_matching' => $this->has_way_matching,
        ]);
        $setting->save();

        cache()->forget('settings');

        notify()->success('Modifications sauvegardées');
    }

}
