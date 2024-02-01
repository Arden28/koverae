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
        Schema::create('sales_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('module')->nullable();
            // Product
            $table->boolean('has_variant')->default(false);
            $table->boolean('has_uom')->default(false);
            $table->boolean('has_packaging')->default(false);
            $table->boolean('send_mail_after_confirmation')->default(false);
            // Princing
            $table->boolean('has_discount')->default(false);
            $table->boolean('has_sale_program')->default(false);
            $table->boolean('show_margin')->default(false);
            $table->enum('has_customer_account', ['on_invitation', 'free_signup'])->default('free_signup');
            $table->boolean('has_pricelist_check')->default(true);
            $table->enum('has_pricelist', ['multiple', 'advanced'])->default('multiple');
            // Quotation & Order
            $table->boolean('has_sale_warnings')->default(false);
            $table->boolean('lock_confirmed_sales')->default(false);
            $table->boolean('pro_format_invoice')->default(false);
            // Delivery
            $table->boolean('show_shipping_cost')->default(false);
            // Invoicing
            $table->enum('has_invoice_policy', ['ordered', 'delivered'])->default('ordered');
            $table->unsignedBigInteger('down_payment')->nullable();

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
        Schema::table('sales_settings', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
