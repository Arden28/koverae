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
        Schema::create('inventory_moves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('reference');
            $table->dateTime('date')->nullable();
            $table->unsignedBigInteger('source_location_id')->nullable();
            $table->unsignedBigInteger('destination_location_id')->nullable();
            $table->decimal('quantity')->nullable();
            $table->unsignedBigInteger('uom_id')->nullable();
            $table->unsignedBigInteger('responsible_id')->nullable();
            $table->enum('status', ['draft', 'done'])->default('done');
            $table->string('source_document')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('uom_id')->references('id')->on('unit_of_measures')->restrictOnDelete();
            $table->foreign('source_location_id')->references('id')->on('warehouse_locations')->cascadeOnDelete();
            $table->foreign('destination_location_id')->references('id')->on('warehouse_locations')->cascadeOnDelete();
            $table->foreign('responsible_id')->references('id')->on('contacts')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_moves', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
