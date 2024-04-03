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
        Schema::create('product_suppliers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->string('supplier_name');
            $table->string('product_name');
            $table->decimal('product_cost', $precision = 12, $scale = 2)->default(0);
            $table->integer('product_discount')->nullable();
            $table->integer('delivery_lead_time')->nullable();
            $table->decimal('qty', $precision = 12, $scale = 2)->default(0);

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_suppliers', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
