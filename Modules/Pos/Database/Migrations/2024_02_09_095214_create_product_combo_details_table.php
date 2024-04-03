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
        Schema::create('product_combo_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('combo_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->decimal('extra_price', $precision = 12, $scale = 2)->default(0.00);
            $table->decimal('original_price', $precision = 12, $scale = 2)->default(0.00);

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('combo_id')->references('id')->on('product_combos')->cascadeOnDelete();
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
        Schema::table('product_combo_details', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
