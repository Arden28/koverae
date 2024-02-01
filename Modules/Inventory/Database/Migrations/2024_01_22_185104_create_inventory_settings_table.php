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
        Schema::create('inventory_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('module')->nullable();
            // Operation
            $table->boolean('has_packaging')->default(false);
            $table->boolean('has_batch_tranfer')->default(false);
            $table->boolean('has_warnings')->default(false);
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

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_settings', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
