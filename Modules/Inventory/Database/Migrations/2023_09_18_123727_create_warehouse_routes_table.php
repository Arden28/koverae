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
        Schema::create('warehouse_routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->string('name');
            $table->boolean('product_category')->default(true);
            $table->boolean('product')->default(true);
            $table->boolean('warehouse')->default(false);
            $table->boolean('sale_order')->default(true);
            $table->boolean('packaging')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('warehouses')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warehouse_routes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
