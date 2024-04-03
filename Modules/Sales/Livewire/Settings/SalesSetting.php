<?php

namespace Modules\Sales\Livewire\Settings;

use App\Livewire\Settings\AppSetting;
use App\Livewire\Settings\Block;
use App\Livewire\Settings\Box;
use Livewire\Attributes\On;
use Modules\Settings\Entities\Setting;

class SalesSetting extends AppSetting
{
    public $setting, $company;
    public bool $variant, $uom, $package, $email_delivery, $discount, $sale_program, $margin, $sale_warnings, $lock_confirmed_sales, $has_pro_format_invoice, $has_shipping_cost, $has_pricelist;
    public $customer_account, $pricelist, $invoice_policy, $down_payment;

    public function mount($company){
        $setting = Setting::isCompany($company)->first();
        // $setting = SettingSalesSetting::isCompany(current_company()->id)->first();
        $this->setting = $setting;
        $this->variant = $setting->has_variant;
        $this->uom = $setting->has_uom;
        $this->package = $setting->has_packaging;
        $this->email_delivery = $setting->send_mail_after_confirmation;
        $this->discount = $setting->has_discount;
        $this->sale_program = $setting->has_sale_program;
        $this->margin = $setting->has_margin;
        $this->customer_account = $setting->has_customer_account;
        $this->has_pricelist = $setting->has_pricelist_check;
        $this->pricelist = $setting->pricelist;
        $this->sale_warnings = $setting->has_sale_warnings;
        $this->lock_confirmed_sales = $setting->lock_confirmed_sales;
        $this->has_pro_format_invoice = $setting->has_pro_format_invoice;
        $this->has_shipping_cost = $setting->has_shipping_cost;
        $this->invoice_policy = $setting->has_invoice_policy;
        $this->down_payment = $setting->down_payment;
    }

    public function blocks() : array
    {
        return [
            Block::make('product_catalog', 'Catalogue Produits'),
            Block::make('pricing', 'Tarification'),
            Block::make('quotation', 'Devis & Commandes'),
            Block::make('delivery', 'Livraison'),
            Block::make('invoicing', 'Facturation'),
            // Add more buttons as needed
        ];
    }

    public function boxes() : array
    {
        return [
            // $key, $label, $model, $description, $block, $checkbox, $help

            // Catalog
            Box::make('variant', 'Variantes', 'variant', "Vendre des variantes d'un produit en utilisant des attributs (taille, couleur, etc.)", 'product_catalog', true, 'https://koverae.com/docs/v1/apps/sales/products_prices/products/products/variant.html'),
            Box::make('uom', 'Unités de mesure', 'uom', "Vendre et acheter des produits dans différentes unités de mesure", 'product_catalog', true),
            Box::make('package', 'Emballage produit', 'package', "Vendre des produits par multiple du nombre d'unités par paquet", 'product_catalog', true),
            Box::make('email_delivery', 'Livrer du contenus par e-mail', 'email_delivery', "Envoyer un email spécifique au produit une fois la facture validée", 'product_catalog', true),
            // Pricing
            Box::make('discount', 'Réductions', 'discount', "Accorder des remises sur les lignes de commande client", 'pricing', true),
            Box::make('sale_program', 'Réductions, Fidélité & Carte Cadeau', 'sale_program', "Gérer les promotions, les coupons, les cartes de fidélité, les cartes cadeaux & K-Wallet", 'pricing', true),
            Box::make('margin', 'Marges', 'margin', "Afficher les marges sur les commandes", 'pricing', true),
            Box::make('customer_account', 'Compte Client', 'customer_account', "Laissez vos clients se connecter pour voir leurs documents", 'pricing', false)->component('blocks.boxes.ratio.customer-account'),
            Box::make('pricelist', 'Listes de prix', 'pricelist', "Définissez plusieurs prix par produit, des remises automatisées, etc.", 'pricing', false)->component('blocks.boxes.ratio.pricelist'),
            // Quotation
            Box::make('sale_warnings', 'Avertissements de vente', 'sale_warnings', "Recevez des avertissements dans les commandes de produits ou de clients", 'quotation', true),
            Box::make('lock_confirmed_sales', 'Verrouiller les ventes confirmées', 'lock_confirmed_sales', "Ne plus modifier les commandes une fois confirmées", 'quotation', true),
            Box::make('has_pro_format_invoice', 'Facture pro forma', 'has_pro_format_invoice', "Vous permet d'envoyer une facture pro-forma à vos clients", 'quotation', true),
            // Delivery
            Box::make('has_shipping_cost', 'Modes de livraison', 'has_shipping_cost', "Calculer les frais d'expédition des commandes", 'delivery', true),
            // Invoicing
            Box::make('invoice_policy', 'Politique de facturation', 'invoice_policy', "Quantités à facturer à partir des commandes clients", 'invoicing', false)->component('blocks.boxes.ratio.invoice-policy'),
            Box::make('down_payment', 'Accomptes', 'down_payment', "Produit utilisé pour les acomptes", 'invoicing', false)->component('blocks.boxes.input.simple'),
            // Add more buttons as needed
        ];
    }

    #[On('save')]
    public function save(){
        $setting = $this->setting;

        $setting->update([
            'has_variant' => $this->variant,
            'has_uom' => $this->uom,
            'has_packaging' => $this->package,
            'send_mail_after_confirmation' => $this->email_delivery,
            'has_discount' => $this->discount,
            'has_sale_program' => $this->sale_program,
            'has_margin' => $this->margin,
            'has_customer_account' => $this->customer_account,
            'has_pricelist_check' => $this->has_pricelist,
            'pricelist' => $this->pricelist,
            'has_sale_warnings' =>$this->sale_warnings,
            'lock_confirmed_sales' => $this->lock_confirmed_sales,
            'has_pro_format_invoice' => $this->has_pro_format_invoice,
            'has_shipping_cost' => $this->has_shipping_cost,
            'invoice_policy' => $this->invoice_policy,
            'down_payment' => $this->down_payment,
        ]);
        $setting->save();

        cache()->forget('settings');

        notify()->success('Modifications sauvegardées');
    }
}
