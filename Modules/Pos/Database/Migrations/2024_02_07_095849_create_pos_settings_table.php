<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pos_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('pos_id')->nullable();
            // Mobile self-order & Kiosk
            $table->enum('self_ordering', ['disable', 'qr_menu', 'qr_menu_ordering', 'kiosk'])->default('qr_menu');
            // If self-order is qr_menu, qr_menu_ordering or kiosk
            $table->unsignedBigInteger('default_language_id')->nullable();
            $table->unsignedBigInteger('available_language_id')->nullable();
            // Payment
            $table->unsignedBigInteger('default_payment_method_id')->nullable();
            $table->boolean('automatically_validate_order')->default(true); //On termainal payment
            $table->boolean('has_maximum_difference_at_closing')->default(false); //On termainal payment
            $table->decimal('maximum_difference_at_closing', $precision = 12, $scale = 2)->default(0.00); //On termainal payment
            $table->boolean('has_tips')->default(false); //Accept customer tips or convert their change to a tip
            // POS Interface
            $table->boolean('has_start_category')->default(false);
            $table->unsignedBigInteger('start_category_id')->nullable();
            $table->boolean('has_restricted_categories')->default(false);
            $table->string('restricted_categories')->nullable();
            $table->boolean('has_large_scrollbar')->default(false);
            $table->boolean('has_margin_cost')->default(false);
            // Accounting
            $table->unsignedBigInteger('defaulft_sales_tax_id')->nullable();
            $table->unsignedBigInteger('defaulft_temporary_account_id')->nullable();
            $table->boolean('has_flexible_taxes')->default(false);
            $table->unsignedBigInteger('defaulft_fiscal_position_id')->nullable();
            $table->string('allowed_fiscal_positions')->nullable();
            $table->unsignedBigInteger('defaulft_order_journal_id')->nullable();
            $table->unsignedBigInteger('defaulft_invoice_journal_id')->nullable();
            // Sales
            $table->unsignedBigInteger('sales_team_id')->nullable();
            $table->unsignedBigInteger('down_payment_product_id')->nullable();
            // Pricing
            $table->boolean('has_price_control')->default(false);
            $table->boolean('has_line_discounts')->default(false);
            $table->boolean('has_sales_program')->default(false);
            $table->boolean('has_pricer')->default(false);
            $table->enum('product_prices', ['tax-excluded', 'tax-included'])->default('tax-included');
            // Bills & Receipts
            $table->boolean('has_customer_header_footer')->default(false);
            $table->boolean('has_automatic_receipt_printer')->default(false);
            $table->boolean('has_qr_code_on_ticket')->default(false);
            $table->boolean('has_unique_code_on_ticket')->default(false); //Add a 6-digit code on the receipt to allow the user to request the invoice for an order on the portal.
            // Payment Terminals
            // Connected Devices
            $table->boolean('has_preparation_display')->default(false); //Display orders on the preparation display
            // Inventory
            $table->unsignedBigInteger('operation_type_id')->nullable(); //Used to record product pickings. Products are consumed from its default source location.
            $table->boolean('has_allow_ship_later')->default(false);
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->enum('shipping_policy', ['after_done', 'as_soon_as_possible'])->nullable();
            $table->unsignedBigInteger('barcode_nomenclature_id')->nullable()->comment('Use barcodes to scan products, customer cards, etc');

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('pos_id')->references('id')->on('pos')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pos_settings', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
