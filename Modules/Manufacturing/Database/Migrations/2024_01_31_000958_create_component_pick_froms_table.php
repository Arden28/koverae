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
        Schema::create('component_pick_froms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('component_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->decimal('quantity')->nullable();
            $table->unsignedBigInteger('uom_id')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('uom_id')->references('id')->on('unit_of_measures')->restrictOnDelete();
            $table->foreign('component_id')->references('id')->on('manufacturing_order_components')->cascadeOnDelete();
            $table->foreign('location_id')->references('id')->on('warehouse_locations')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('component_pick_froms', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
