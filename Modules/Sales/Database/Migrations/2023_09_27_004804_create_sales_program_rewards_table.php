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
        Schema::create('sales_program_rewards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('program_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->enum('reward_type', ['free_product', 'discount'])->default('free_product');
            $table->integer('qty_rewarded')->default(0);
            $table->decimal('discount', $precision = 12, $scale = 2)->default(0);
            $table->enum('discount_type', ['order', 'cheapest', 'specific'])->default('order');
            $table->mediumText('description')->nullable();
            $table->decimal('max_discount_amount', $precision = 12, $scale = 2)->default(0);
            $table->string('discounted_products')->nullable();
            $table->string('discounted_product_categories')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('program_id')->references('id')->on('sales_programs')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales_program_rewards', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
