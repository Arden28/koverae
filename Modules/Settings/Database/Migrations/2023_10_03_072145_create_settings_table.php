<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            // UoM
            $table->enum('weight', ['kilograms', 'pounds'])->default('kilograms');
            $table->enum('volume', ['cubic_meter', 'cubic_feet'])->default('cubic_meter');
            // Statistics
            $table->boolean('has_digest_email')->default(true);
            // Contact
            $table->boolean('has_quick_find')->default(true);
            // Permissions
            $table->enum('has_customer_account', ['on_invitation', 'free_signup'])->default('free_signup');
            $table->boolean('has_reset_password')->default(true);
            $table->boolean('has_default_access_right')->default(true);
            $table->boolean('has_import_from_xls')->default(true);
            // Integrations
            $table->boolean('has_mail_plugin')->default(false);
            $table->boolean('has_oauth_authentication')->default(false);
            $table->boolean('has_geo_localization')->default(false);
            $table->enum('geolocation_provider', ['open_street_map', 'google_place_map'])->default('open_street_map');
            $table->boolean('has_google_authentification')->default(false);
            $table->string('google_authentification_client_id')->nullable();
            $table->string('open_street_map_client_id')->nullable();
            $table->boolean('has_linkedin_authentification')->default(false);
            $table->boolean('has_recaptcha')->default(false);
            $table->boolean('has_cloudfare_turnstile')->default(false);
            // Calendar Settings
            $table->boolean('has_outlook_calendar')->default(false);
            $table->boolean('has_google_calendar')->default(false);
                // Outlook calendar settings
                $table->string('outlook_calendar_client_id')->nullable();
                $table->string('outlook_calendar_client_secret')->nullable();
                $table->boolean('outlook_calendar_pause_sync')->default(false);
                // Google calendar settings
                $table->string('google_calendar_client_id')->nullable();
                $table->string('google_calendar_client_secret')->nullable();
                $table->boolean('google_calendar_pause_sync')->default(false);
            // Product
            $table->boolean('has_variant')->default(false);
            $table->boolean('has_uom')->default(false);
            $table->boolean('has_packaging')->default(false);
            $table->boolean('has_package')->default(false);
            $table->boolean('send_mail_after_confirmation')->default(false);
            // Princing
            $table->boolean('has_discount')->default(false);
            $table->boolean('has_sale_program')->default(false);
            $table->boolean('has_margin')->default(false);
            $table->boolean('has_pricelist_check')->default(true);
            $table->enum('pricelist', ['multiple', 'advanced'])->default('multiple');
            // Quotation & Order
            $table->boolean('has_sale_warnings')->default(false);
            $table->boolean('lock_confirmed_sales')->default(false);
            $table->boolean('has_pro_format_invoice')->default(false);
            // Delivery
            $table->boolean('has_shipping_cost')->default(false);
            // Invoicing
            $table->enum('invoice_policy', ['ordered', 'delivered'])->default('ordered');
            $table->unsignedBigInteger('down_payment')->nullable();
            $table->enum('bill_policy', ['ordered', 'delivered'])->default('delivered');
            $table->boolean('has_way_matching')->default(false);
            // Orders
            $table->boolean('has_order_approval')->default(false);
            $table->decimal('minimum_order_ammount', $precision = 12, $scale = 2)->default(0);
            $table->boolean('has_lock_confirm_order')->default(false);
            $table->boolean('has_warnings')->default(false);
            $table->boolean('has_purchase_agreements')->default(false);
            $table->boolean('has_receipt_reminder')->default(true);
            // Operation
            $table->boolean('has_batch_tranfer')->default(false);
            $table->enum('picking_policy', ['as_soon_as_possible', 'after_done'])->default('as_soon_as_possible');
            $table->boolean('has_quality')->default(false);
            $table->integer('annual_inventory_day')->default(31);
            $table->string('annual_inventory_month')->default('december');
            $table->boolean('has_receipt_report')->default(false);
            // Barcode
            $table->boolean('has_barcode_scanner')->default(false);
            // Shipping
            $table->boolean('has_shipping_email_confirmation')->default(false);
            $table->boolean('has_shipping_sms_confirmation')->default(false);
            $table->boolean('has_shipping_signature')->default(false);
            $table->boolean('has_delivery_method')->default(false);
            // Traceability
            $table->boolean('has_serial_number')->default(false);
            $table->boolean('has_consignment')->default(false);
            // Valuation
            $table->boolean('has_landed_cost')->default(false);
            // Warehouse
            $table->boolean('has_storage_locations')->default(false);
            $table->boolean('has_storage_categories')->default(false);
            $table->boolean('has_multistep_routes')->default(false);
            // Advanced scheduling
            $table->boolean('has_sale_security_lead_time')->default(false);
            $table->integer('expected_delivery_days')->default(false);
            $table->boolean('has_purchase_security_lead_time')->default(false);
            $table->integer('expected_receipt_days')->default(false);
            $table->integer('days_to_purchase')->default(false);
            //Logisitc
            $table->boolean('has_dropshipping')->default(false);
            // Taxes
            $table->unsignedBigInteger('default_sales_tax_id')->nullable();
            $table->unsignedBigInteger('default_purchase_tax_id')->nullable();
            $table->enum('rounding_method', ['round_per_line', 'round_globally'])->default('round_per_line');
            $table->unsignedBigInteger('fiscal_country')->nullable();
            // Currencies
            $table->integer('default_currency_id')->nullable();
            $table->string('default_currency_position')->default('suffix');
            // Customer Invoice
            $table->string('default_sending_options')->nullable();
            $table->boolean('has_customer_address')->default(false);
            $table->boolean('has_customer_invoice_warnings')->default(false);
            $table->boolean('has_cash_rounding')->default(false);
            $table->boolean('has_sale_receipt')->default(false);
            $table->unsignedBigInteger('default_incoterm_id')->nullable();
            $table->boolean('has_default_terms')->default(false);
            $table->enum('default_terms', ['note', 'link'])->default('note');
            $table->tinyText('default_term_note')->nullable();
            $table->boolean('has_default_credit_limit')->default(false);
            $table->decimal('default_credit_limit', $precision = 12, $scale = 2)->default(0);
            // Customer Payments
            $table->boolean('has_invoice_online_payment')->default(true);
            $table->boolean('has_batch_payments')->default(false);
            $table->boolean('has_invoice_qr_code')->default(false);
            // Vendor Bills
            $table->boolean('has_purchase_receipt')->default(false);
            // Vendor Payments
            // Digitalization
            // Analytics
            $table->boolean('has_margin_analysis')->default(false);
            $table->boolean('has_customer_rating')->default(false);
            // Employees
            $table->string('presence_control')->default('on_system');
            $table->boolean('presence_based_on_system')->default(false);
            $table->boolean('presence_based_on_attendance')->default(false);
            $table->boolean('has_advanced_presence_control')->default(false);
            $table->boolean('control_based_on_email_sent')->default(false);
            $table->integer('minimum_email_to_send')->default(0);
            $table->boolean('control_based_on_ip_address')->default(false);
            $table->integer('ip_addresses')->nullable();
            $table->boolean('has_skills_management')->default(false);
            // Work Organization
            $table->unsignedBigInteger('default_working_hour_id')->default(false);
            // Employee Update Rights
            $table->boolean('has_employee_editing')->default(false);
            // CRM
            $table->boolean('has_recurring_revenues')->default(false);
            $table->boolean('has_leads')->default(false);
            $table->boolean('has_multi_teams')->default(false);
            $table->boolean('has_rule_based_assignment')->default(false);
            $table->enum('running', ['manually', 'repeatedly'])->default('manually');
            // Tasks Management
            $table->boolean('has_recurring_tasks')->default(false);
            $table->boolean('has_task_dependencies')->default(false);
            $table->boolean('has_project_stages')->default(false);
            $table->boolean('has_milestones')->default(false);
            // Time Management
            $table->boolean('has_timesheets')->default(false);
            // Planning
            $table->boolean('has_unassignment')->default(false);
            $table->integer('days_before_unassignment')->default(0);
            $table->boolean('has_project_planning')->default(false);
            //Expenses
            $table->boolean('has_expense_incoming_email')->default(false);
            $table->string('expense_incoming_email')->nullable();
            $table->boolean('has_reimburse_in_payslip')->default(false);
            $table->unsignedBigInteger('default_expense_category_id')->nullable();
            // Expense Accounting
            $table->unsignedBigInteger('expense_journal_id')->nullable(); //Expense: Employee Expense
            $table->string('expense_payment_method')->default('cash');
            //Fiscal Period
            $table->integer('fiscal_year_day')->default(31); //Dernier jour de l'année fiscal
            $table->string('fiscal_year_month')->default('december'); //Dernier mois de l'année fiscal
            $table->boolean('has_multiple_fiscal_year')->default(false);
            $table->date('invoicing_switch_threshold')->nullable(); //Seuil de changement de facturation
            $table->boolean('has_fiscal_dynamic_reports')->default(false);
            // Accounting Analytics
            $table->boolean('has_accounting_analytics')->default(false); //Suivez les coûts et les revenus par projet, département, etc.
            $table->boolean('has_budget_management')->default(false)->comment('Utiliser les budgets pour comparer les revenus et les coûts réels avec ceux attendus');
            // (Storno) Contre-ecriture Accounting
            $table->boolean('has_storno_accounting')->default(false); //Lorsqu'une erreur est commise dans une écriture comptable, au lieu de supprimer l'entrée erronée, on effectue une opération de contre-passation pour annuler les effets de l'erreur.
            // Stock Valuation
            $table->unsignedBigInteger('property_income_account_id')->nullable();
            $table->unsignedBigInteger('property_expense_account_id')->nullable();
            $table->boolean('has_stock_automatic_accounting')->default(false);
            $table->unsignedBigInteger('stock_valuation_account_id')->nullable();
            $table->unsignedBigInteger('stock_journal_id')->nullable();
            $table->unsignedBigInteger('stock_input_account_id')->nullable();
            $table->unsignedBigInteger('stock_output_account_id')->nullable();
            // Manufacturing
            $table->boolean('has_subcontracting')->default(false);
            $table->boolean('has_workshop')->default(true);
            $table->boolean('has_manufacturing_order_unlocked')->default(false);
            $table->boolean('has_production_security_delay')->default(false);
            $table->integer('production_security_delay')->default(0);

            // Peut être agrandi

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};