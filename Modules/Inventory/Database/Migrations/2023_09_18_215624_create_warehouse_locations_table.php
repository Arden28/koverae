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
        Schema::create('warehouse_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name');
            $table->enum('type', ['view', 'supplier', 'internal', 'customer', 'loss_inventory', 'production', 'transit'])->default('internal');
            $table->boolean('is_scrap')->default(false);
            $table->boolean('is_backorder')->default(false);
            $table->boolean('is_replenish')->default(false);
            $table->string('barcode')->nullable();
            $table->integer('inventory_frequency')->default(0); // Days
            $table->integer('last_effective_inventory')->default(0); // Qties
            $table->date('last_effective_inventory_date')->nullable(); // Date
            $table->integer('next_planned_inventory')->default(0); // Qties
            $table->date('next_planned_inventory_date')->nullable(); // Date
            $table->mediumText('note')->nullable();


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
        Schema::table('warehouse_locations', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
