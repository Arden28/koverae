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
        Schema::create('product_packagings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('packet_type_id')->nullable();
            $table->string('name');
            $table->decimal('contained_quantity', $precision = 10, $scale = 2)->default(1);
            $table->string('barcode')->nullable();
            $table->boolean('is_saleable')->default(true);
            $table->boolean('is_buyable')->default(true);
            $table->unsignedBigInteger('uom_id')->nullable();// Unit of measure

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('uom_id')->references('id')->on('unit_of_measures')->restrictOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_packagings', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
