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
        Schema::create('operation_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->string('name');
            $table->enum('operation_type', ['receipt', 'delivery', 'internal_transfer', 'manufacturing'])->default('receipt');
            $table->string('prefix');
            $table->string('barcode')->nullable();
            $table->unsignedBigInteger('return_type_id')->nullable();
            $table->enum('booking_method', ['confirmation', 'manually', 'before_scheduled_date'])->default('confirmation');
            $table->enum('backorder', ['ask', 'always', 'never']);
            // Hardware

            // Location
            $table->unsignedBigInteger('default_from_location_id')->nullable();
            $table->unsignedBigInteger('default_to_location_id')->nullable();

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
        Schema::table('operation_types', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
