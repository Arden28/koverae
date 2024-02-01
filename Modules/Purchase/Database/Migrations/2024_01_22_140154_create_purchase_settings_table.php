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
        Schema::create('purchase_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('module')->nullable();
            // Orders
            $table->boolean('order_approval')->default(false);
            $table->decimal('minimum_order_ammount', $precision = 12, $scale = 2)->default(0);
            $table->boolean('lock_confirm_order')->default(false);
            $table->boolean('warnings')->default(false);
            $table->boolean('purchase_agreements')->default(false);
            $table->boolean('receipt_reminder')->default(true);
            // Invoicing
            $table->enum('bill_policy', ['ordered', 'delivered'])->default('delivered');
            $table->boolean('has_way_matching')->default(false);
            // Product
            $table->boolean('has_variant')->default(false);
            $table->boolean('has_uom')->default(false);
            $table->boolean('has_packaging')->default(false);
            // Logistics
            $table->boolean('dropshipping')->default(false);

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
        Schema::table('purchase_settings', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
