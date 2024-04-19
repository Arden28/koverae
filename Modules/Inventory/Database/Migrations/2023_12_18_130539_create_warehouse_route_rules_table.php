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
        Schema::create('warehouse_route_rules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->json('warehouses')->nullable();
            $table->string('name');
            $table->enum('action', ['pull_from', 'push_to', 'pull_push', 'buy'])->nullable();
            $table->unsignedBigInteger('operation_type_id')->nullable();
            $table->unsignedBigInteger('source_location_id')->nullable();
            $table->unsignedBigInteger('destination_location_id')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->cascadeOnDelete();
            $table->foreign('operation_type_id')->references('id')->on('operation_types')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warehouse_route_rules', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
