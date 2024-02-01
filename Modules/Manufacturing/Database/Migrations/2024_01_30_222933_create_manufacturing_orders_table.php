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
        Schema::create('manufacturing_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('reference');
            $table->dateTime('schedule_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->dateTime('deadline_date')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('serial_number')->nullable();
            $table->unsignedBigInteger('bom_id')->nullable();
            $table->string('source_document')->nullable();
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->unsignedBigInteger('responsible_id')->nullable();
            $table->string('mo_readness')->nullable();
            $table->decimal('quantity')->nullable();
            $table->unsignedBigInteger('uom_id')->nullable();
            $table->enum('status', ['draft', 'confirmed', 'to_close', 'done', 'canceled', 'locked', 'scrapped', 'unbuilt'])->default('draft');
            $table->unsignedBigInteger('operation_type_id')->nullable();
            $table->unsignedBigInteger('components_location_id')->nullable();
            $table->unsignedBigInteger('finished_products_location_id')->nullable();
            $table->enum('flexible_consumption', ['allowed', 'allowed_with_warning', 'blocked'])->default('allowed_with_warning');
            $table->integer('lead_time_days')->default(0);
            $table->integer('preparation_days')->default(0);


            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('bom_id')->references('id')->on('bill_of_materials')->cascadeOnDelete();
            $table->foreign('contact_id')->references('id')->on('contacts')->cascadeOnDelete();
            $table->foreign('uom_id')->references('id')->on('unit_of_measures')->restrictOnDelete();
            $table->foreign('operation_type_id')->references('id')->on('operation_types')->cascadeOnDelete();
            $table->foreign('responsible_id')->references('id')->on('contacts')->cascadeOnDelete();
            $table->foreign('components_location_id')->references('id')->on('warehouse_locations')->cascadeOnDelete();
            $table->foreign('finished_products_location_id')->references('id')->on('warehouse_locations')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('manufacturing_orders', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
