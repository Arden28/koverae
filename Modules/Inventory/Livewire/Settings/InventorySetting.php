<?php

namespace Modules\Inventory\Livewire\Settings;

use App\Livewire\Settings\AppSetting;
use App\Livewire\Settings\Block;
use App\Livewire\Settings\Box;
use Livewire\Attributes\On;
use Modules\Settings\Entities\Setting;

class InventorySetting extends AppSetting
{
    public $setting, $company;
    public bool $has_packaging, $has_batch_tranfer, $has_warnings, $has_quality, $has_receipt_report, $has_barcode_scanner, $has_shipping_email_confirmation, $has_shipping_sms_confirmation, $has_shipping_signature, $has_delivery_method, $has_variant, $has_uom, $has_package, $has_serial_number, $has_consignment, $has_landed_cost, $has_storage_locations, $has_storage_categories, $has_multistep_routes;
    public $picking_policy, $annual_inventory_day = 31, $annual_inventory_month = 'december';

    public function mount($company){
        $setting = Setting::isCompany($company)->first();
        // $setting = SettingSalesSetting::isCompany(current_company()->id)->first();
        $this->setting = $setting;
        $this->has_package = $setting->has_package;
        $this->has_packaging = $setting->has_packaging;
        $this->has_batch_tranfer = $setting->has_batch_tranfer;
        $this->has_warnings = $setting->has_warnings;
        $this->has_quality = $setting->has_quality;
        $this->has_receipt_report = $setting->has_receipt_report;
        $this->has_barcode_scanner = $setting->has_barcode_scanner;
        $this->has_shipping_email_confirmation = $setting->has_shipping_email_confirmation;
        $this->has_shipping_sms_confirmation = $setting->has_shipping_sms_confirmation;
        $this->has_shipping_signature = $setting->has_shipping_signature;
        $this->has_delivery_method = $setting->has_delivery_method;
        $this->has_variant = $setting->has_variant;
        $this->has_uom = $setting->has_uom;
        $this->has_serial_number = $setting->has_serial_number;
        $this->has_consignment = $setting->has_consignment;
        $this->has_landed_cost = $setting->has_landed_cost;
        $this->has_storage_locations = $setting->has_storage_locations;
        $this->has_storage_categories = $setting->has_storage_categories;
        $this->has_multistep_routes = $setting->has_multistep_routes;
        $this->picking_policy = $setting->picking_policy;
        $this->annual_inventory_day = $setting->annual_inventory_day;
        $this->annual_inventory_month = $setting->annual_inventory_month;
    }

    public function blocks() : array
    {
        return [
            Block::make('operation', 'Opérations'),
            Block::make('barcode', 'Code à barres'),
            Block::make('product', 'Produits'),
            Block::make('shipping', 'Livraison'),
            Block::make('traceability', 'Traçabilité'),
            // Block::make('valuation', 'Estimations'),
            Block::make('warehouse', 'Entrepôt'),
            // Add more buttons as needed
        ];
    }

    public function boxes() : array
    {
        return [
            // $key, $label, $model, $description, $block, $checkbox, $help

            // Catalog
            Box::make('has_package', 'Paquets', 'has_package', "Mettez vos produits dans des packs (par exemple des colis, des cartons) et tracez-les", 'operation', true, 'https://koverae.com/docs/v1/apps/sales/products_prices/products/products/variant.html'),
            Box::make('has_batch_tranfer', 'Transfers par lots', 'has_batch_tranfer', "Traiter les transferts par lots par travailleur", 'operation', true, 'https://koverae.com/docs/v1/apps/sales/products_prices/products/products/variant.html'),
            Box::make('has_warnings', 'Avertissements', 'has_warnings', "Recevoir des avertissements informatifs ou bloquants sur les partenaires", 'operation', true),
            Box::make('picking_policy', 'Politique de Picking', 'picking_policy', "Quand commencer à expédier", 'operation', true)->component('blocks.boxes.inventory.picking-policy'),
            Box::make('has_quality', 'Contrôle qualité', 'has_quality', "Ajoutez des contrôles qualité à vos opérations de transfert", 'operation', true),
            Box::make('annual_inventory', "Jour et mois de l'inventaire annuel", 'has_quality', "Jour et mois où les inventaires annuels doivent avoir lieu", 'operation', false)->component('blocks.boxes.inventory.annual-inventory'),
            Box::make('has_receipt_report', 'Rapport de réception', 'has_receipt_report', "Visualiser et allouer les quantités reçues", 'operation', true),
            // Barcode
            Box::make('has_barcode_scanner', 'Code à barres', 'has_barcode_scanner', "Traitez les opérations plus rapidement grâce aux codes-barres", 'barcode', true),
            //Shipping
            Box::make('has_shipping_email_confirmation', 'Confirmation par e-mail', 'has_shipping_email_confirmation', "Envoyer un e-mail de confirmation automatique lorsque les commandes de livraison sont effectuées", 'shipping', true),
            Box::make('has_shipping_sms_confirmation', 'Confirmation par SMS', 'has_shipping_sms_confirmation', "Envoyer un message texte SMS de confirmation automatique lorsque les commandes de livraison sont effectuées", 'shipping', true)->component('blocks.boxes.shipping.sms-confirmation'),
            Box::make('has_shipping_signature', 'Signature', 'has_shipping_signature', "Exiger une signature sur le bon de livraison", 'shipping', true),
            // Product
            Box::make('has_variant', 'Variantes', 'has_variant', "Vendre des variantes d'un produit en utilisant des attributs (taille, couleur, etc.)", 'product', true, 'https://koverae.com/docs/v1/apps/sales/products_prices/products/products/variant.html'),
            Box::make('has_uom', 'Unités de mesure', 'has_uom', "Vendre et acheter des produits dans différentes unités de mesure", 'product', true),
            Box::make('has_packaging', 'Conditionnements produit', 'has_packaging', "Gérer les conditionnements de produits (exemples: pack de 12 bouteilles, boîte de 10 pièces)", 'product', true),
            //Traceability
            Box::make('has_serial_number', 'Lots et numéros de série', 'has_serial_number', "Obtenez une traçabilité complète des fournisseurs aux clients", 'traceability', true, 'https://koverae.com/docs/v1/apps/sales/products_prices/products/products/variant.html'),
            Box::make('has_consignment', 'Consignation', 'has_consignment', "Définir le propriétaire des produits stockés", 'traceability', true, 'https://koverae.com/docs/v1/apps/sales/products_prices/products/products/variant.html'),
            // Warehouse
            Box::make('has_storage_locations', 'Emplacements de stockage', 'has_storage_locations', "Suivez l'emplacement des produits dans votre entrepôt", 'warehouse', true, 'https://koverae.com/docs/v1/apps/sales/products_prices/products/products/variant.html')->component('blocks.boxes.inventory.storage-location'),

            // Add more buttons as needed
        ];
    }

    #[On('save')]
    public function save(){
        $setting = $this->setting;
        $setting->update([
            'has_packaging' => $this->has_packaging,
            'has_batch_tranfer' => $this->has_batch_tranfer,
            'has_warnings' => $this->has_warnings,
            'has_quality' => $this->has_quality,
            'has_receipt_report' => $this->has_receipt_report,
            'has_barcode_scanner' => $this->has_barcode_scanner,
            'has_shipping_email_confirmation' => $this->has_shipping_email_confirmation,
            'has_shipping_sms_confirmation' => $this->has_shipping_sms_confirmation,
            'has_shipping_signature' => $this->has_shipping_signature,
            'has_delivery_method' => $this->has_delivery_method,
            'has_variant' => $this->has_variant,
            'has_uom' => $this->has_uom,
            'has_serial_number' => $this->has_serial_number,
            'has_consignment' => $this->has_consignment,
            'has_landed_cost' => $this->has_landed_cost,
            'has_storage_locations' => $this->has_storage_locations,
            'has_storage_categories' => $this->has_storage_categories,
            'has_multistep_routes' => $this->has_multistep_routes,
            'annual_inventory_day' => $this->annual_inventory_day,
            'annual_inventory_month' => $this->annual_inventory_month,
            'picking_policy' => $this->picking_policy,
        ]);
        $setting->save();

        cache()->forget('settings');

        notify()->success('Modifications sauvegardées');
    }
}
