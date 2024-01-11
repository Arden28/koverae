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
        Schema::create('scrap_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('reference')->nullable();
            $table->decimal('quantity', $precision = 10, $scale = 2)->default(1);
            $table->dateTime('date');
            $table->boolean('replenish_quantity')->default(false);
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->unsignedBigInteger('received_from')->nullable();
            $table->unsignedBigInteger('in_direction_to')->nullable();
            $table->enum('status', ['draft', 'done', 'cancelled'])->nullable();

            $table->foreign('in_direction_to')->references('id')->on('warehouse_locations')->nullOnDelete();
            $table->foreign('received_from')->references('id')->on('warehouse_locations')->nullOnDelete();
            $table->foreign('owner_id')->references('id')->on('contacts')->nullOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->nullOnDelete();
            $table->foreign('company_id')->references('id')->on('companies')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scrap_orders', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
